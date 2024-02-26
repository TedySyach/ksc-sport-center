<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Call_backMidtrans extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model yang dibutuhkan
        $this->load->model('Cart_model');
        $this->load->helper('tgl_indo');
    }
    public function index() {
        // Mengambil seluruh isi permintaan HTTP
        $raw_input = $this->input->raw_input_stream;
    
        // Mencoba mendekode JSON
        $notification_body = json_decode($raw_input, true);
    
        // Inisialisasi respons
        $response = [];
    
        // Periksa apakah JSON berhasil diuraikan
        if ($notification_body !== null) {
            // Mengambil data yang Anda butuhkan
            $order_id = $notification_body['order_id'];
            $trx_id = $notification_body['transaction_id'];
            $status_code = $notification_body['status_code'];
            $payment_type = $notification_body['payment_type'];

            if($payment_type == 'credit_card') {
                $company_code=$notification_body['card_type'];
                $bank_transfer=$notification_body['bank'];
                $va=$notification_body['approval_code'];
            } else if ($payment_type == 'bank_transfer') {
                if (isset($notification_body['va_numbers'])) {
                    // Mengambil elemen pertama dari array 'va_numbers'
                    $va_number_data = $notification_body['va_numbers'][0];
                    $company_code='-';
                    $bank_transfer=$va_number_data['bank'];
                    $va= $va_number_data['va_number'];
                } else {
                    $company_code='-';
                    $bank_transfer='Permata';
                    $va=$notification_body['permata_va_number'];
                }

            }  else if ($payment_type == 'echannel') {
                $company_code=$notification_body['biller_code'];
                $bank_transfer='Mandiri';
                $va=$notification_body['bill_key'];
            }
            else {
                $company_code='-';
                $bank_transfer='-';
                $va='-';
            }

            // Mengonversi status_code ke pesan yang sesuai
            switch ($status_code) {
                case 200:
                    $message = 2 ;
                    break;
                case 201:
                    $message = 1 ;
                    break;
                case 202:
                    $message = 3;
                    break;
                default:
                    $message = 4;
                    break;
            }

            $cek_transaksi 	= $this->Cart_model->cek_transaksiCallBack($order_id);
		    $id_transKudeta=$cek_transaksi->id_trans;

			$this->db->where('id_trans', $id_transKudeta);
			$this->db->update('transaksi', array(
				'status'		    =>	$message,
				'payment_type'		=>	$payment_type,
				'company_code'		=>	$company_code,
				'bank_transfer'		=>	$bank_transfer,
				'va'		        =>	$va
			));

            $this->Sendemail($id_transKudeta);
    
    
            // Menyusun respons
            $response['status_code'] = $status_code;
            $response['message'] = $message;
            $response['order_id'] = $order_id;
        } else {
            // JSON tidak dapat diuraikan
            $response['status_code'] = 500; // Kode status error, sesuaikan sesuai kebutuhan
            $response['message'] = "Error: Failed to decode JSON.";
        }
    
        // Mengembalikan respons dalam format JSON
        $this->output
            ->set_status_header($response['status_code'])
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response));
    }
    
    
    
	
	public function Sendemail($id_transKudeta) {  
		$cart_finished    			= $this->Cart_model->get_cart_per_customer_finishedCall($id_transKudeta)->result();
		$cart_finished_row 			= $this->Cart_model->get_cart_per_customer_finishedCall($id_transKudeta)->row();
		$email=$cart_finished_row->email;
		$payment_method= $cart_finished_row->payment_type;


		if($cart_finished_row->status == '1'){
			$sts="<b style='color:red'>Belum Lunas </b>";
		} elseif($cart_finished_row->status == '2'){
			$sts="<b style='color:green'>Belum Lunas</b>";
		} else {
			$sts="Kadaluarsa / Batal";
		}

		try {
			$this->load->library('email');
	
			// Email dan nama pengirim
			$this->email->from('no-reply@kscsportcenter.com', 'kscsportcenter.com');
	
			// Email penerima
			$this->email->to($email); // Ganti dengan email tujuan
	
			// Subject email
			$this->email->subject('Invoice');
	
			// Isi email
			$invoice_number = $cart_finished_row->id_invoice;
			
	
			$message = '<html><head><style>';
			$message .= 'body {font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;}';
			$message .= 'table {width: 100%; border-collapse: collapse; margin-top: 20px;}';
			$message .= 'th, td {padding: 10px; text-align: left; border-bottom: 1px solid #ddd;}';
			$message .= 'th {background-color: #f2f2f2;}';
			$message .= '.total {text-align: right; font-weight: bold;}';
			$message .= '</style></head><body>';
			$message .= '<h1>Invoice</h1>';
			$message .= '<p>Invoice Number: ' . $invoice_number . ' ('.$sts. ')</p>';
			$message .= '<table>';
			$message .= '<tr><th>Nama Lapangan</th><th>Harga Per 2 Jam</th><th>Tanggal</th><th>Waktu</th><th>Total</th></tr>';
			$total_amount = 0;
			foreach ($cart_finished as $product) {
				$message .= '<tr><td>' . $product->nama_lapangan . '</td><td>' . number_format($product->harga_jual) . '</td><td>' . tgl_indo($product->tanggal) . '</td><td>' . $product->jam_mulai.'-'. $product->jam_selesai.'</td><td>' . number_format($product->total) . '</td></tr>';
			}
			$message .= '<tr><td colspan="4">SubTotal:</td><td>Rp.' . number_format($cart_finished_row->subtotal) . '</td></tr>';
			$message .= '<tr><td colspan="4">Diskon (Member):</td><td>Rp.' . number_format($cart_finished_row->diskon) . '</td></tr>';
			$message .= '<tr><td colspan="4">Grand Total:</td><td>Rp.' . number_format($cart_finished_row->grand_total) . '</td></tr>';
			$message .= '</table>';
			$message .= '<p>Payment Method: ' . $payment_method . '</p>';
			$message .= '</body></html>';
	
			$this->email->message($message);
			$this->email->set_mailtype('html');
	
			// Lakukan pengiriman email
			if ($this->email->send()) {
				echo 'Sukses! email berhasil dikirim.';
			} else {
				throw new Exception('Error! email tidak dapat dikirim.');
			}
		} catch (Exception $e) {
			echo 'Terjadi kesalahan: ' . $e->getMessage();
		}
	}

  
    
}
