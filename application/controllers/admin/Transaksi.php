<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require 'vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
class Transaksi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('tgl_indo');
    $this->load->model('Cart_model');
    $this->load->model('Transaksi_detail_model');
     $this->load->model('Transaksi_model');
    $this->load->model('Jam_model');
    $this->load->model('Company_model');
    $this->load->model('Lapangan_model');
    $this->load->model('Bank_model');
     $this->load->model('Ion_auth_model');
    	date_default_timezone_set('Asia/Jakarta');
    $this->data['module']         = 'Transaksi';
     $this->data['module2']         = 'Tambah Transaksi';
    $this->data['button_submit']  = 'Simpan';
    $this->data['button_reset']   = 'Reset';

    $this->data['company_data'] 			= $this->Company_model->get_by_company();

    if(!$this->ion_auth->logged_in()){redirect('admin/auth/login', 'refresh');}
		elseif(!$this->ion_auth->is_superadmin() && !$this->ion_auth->is_admin()){redirect(base_url());}
		
	   	// Set your Merchant Server Key
		\Midtrans\Config::$serverKey = 'Mid-server-m9Yqx9_oggo5xsIdFgaZDt4Z';
		// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
		\Midtrans\Config::$isProduction = true;
		// Set sanitization on (default)
		\Midtrans\Config::$isSanitized = true;
		// Set 3DS transaction for credit card to true
		\Midtrans\Config::$is3ds = true;
  }

  public function index()
  {
    $this->data['title']    = 'Data '.$this->data['module'];
    

    $this->load->view('back/transaksi/transaksi_list',$this->data);
  }
  
   public function ambildata()
  {
    
      if ($this->input->is_ajax_request() == true) {
          $list = $this->Transaksi_model->get_datatables();
          $data = array();
          $no = $_POST['start'];
          foreach ($list as $field) {
              $sts=$field->status;
              if ($sts == 0) {
                $status = '<button type="button" name="status" class="btn btn-primary"><i class="fa fa-ban"></i> BELUM CHECKOUT</button>';
              } elseif ($sts == 1) {
                $status = '<button type="button" name="status" class="btn btn-warning"><i class="fa fa-minus-circle"></i> BELUM LUNAS</button>';
              } elseif ($sts == 2) {
                $status = '<button type="button" name="status" class="btn btn-success"><i class="fa fa-check"></i> LUNAS</button>';
              } elseif ($sts == 3) {
                $status = '<button type="button" name="status" class="btn btn-danger"><i class="fa fa-remove"></i> EXPIRED</button>';
              } elseif ($sts == 4) {
                $status = '<button type="button" name="status" class="btn btn-danger"><i class="fa fa-remove"></i>BATAL</button>';
              } else {
                  // Handle other status values if needed
                $status = '<span class="badge badge-custom-secondary">Unknown Status</span>';
              }

              if($field->status == '1' & $field->tipe_trx == '2'){ 
				$button=' <a href=" ' . base_url('admin/transaksi/set_lunas/').$field->id_trans .' ">
							<button name="update" class="btn btn-success"><i class="fa fa-check"></i> Set Lunas</button>
						</a>
						<a href="'. base_url('admin/transaksi/set_batal/').$field->id_trans . ' ">
							<button name="update" class="btn btn-danger"><i class="fa fa-check"></i>Batalkan</button>
						</a>
						';
			  } else {
			      $button=' <a href=" ' . base_url('admin/transaksi/detail/').$field->id_trans .' ">
							<button name="update" class="btn btn-primary"><i class="fa fa-search-plus"></i> Detail</button>
							</a>';
			  }

			

              $no++;
              $row = array();
          
              $row[] = $no;
              $row[] = $field->id_invoice;
              $row[] = $field->name;
              $row[] = $field->created_date;
              $row[] = $field->grand_total;
              $row[] = $status;
              $row[] = $button;
         
              $data[] = $row;
          }

          $output = array(
              "draw" => $_POST['draw'],
              "recordsTotal" => $this->Transaksi_model->count_all(),
              "recordsFiltered" => $this->Transaksi_model->count_filtered(),
              "data" => $data,
          );
          //output dalam format JSON
          echo json_encode($output);
      } else {
          exit('Maaf data tidak bisa ditampilkan');
      }
  }
  
   public function tambahTrx()
  {
    $this->data['title']    = 'Data '.$this->data['module2'];
    // $this->data['get_all']  = $this->Cart_model->get_all();

    $this->load->view('back/transaksi/transaksi_add',$this->data);
  }

  public function create($id=null)
  {
      $this->data['title'] = 'Keranjang Belanja';
      if ($id !=  null) {
        $this->data['lapang'] = $this->Lapangan_model->get_by_id($id);
        // var_dump($this->data['lapang']);

        if($this->data['lapang'] == null) {
          redirect(site_url('admin/transaksi/create'));
          die;
        }
      }

      $this->data['tanggal'] = array(
        'name'        => 'tanggal[]',
        'id'          => 'tanggal',
        'class' 			=> 'tanggal',
        'required'    => '',
        'autocomplete'    => 'off',
        'placeholder'   => 'Pilih tanggal', // Tambahkan placeholder di sini
		'readonly'      => 'readonly', // Tambahkan readonly di sini
      );
    

      $this->data['lapangan_new'] 	= $this->Lapangan_model->get_allJoin();
      
       $this->data['users'] 	= $this->ion_auth->get_all_usersCtm()->result();

      $this->load->view('back/transaksi/transaksi_add', $this->data);
  }
  
  public function setCtm() {
     
    // Ambil tahun yang dipilih dari form
    $ctm = $this->input->post('selected_Ctm');

    $_SESSION['ctm-change']=$ctm;
 
}
  
  
  public function buyL($id)
	{	
		if (!$this->ion_auth->logged_in()) {
			// $this->session->set_flashdata('message', '<div class="alert alert-danger alert">Silahkan login dulu</div>');
			// redirect(base_url('auth/login'));
			$usrid=0;
			$ip= $this->input->ip_address();
		} else {
			$usrid=$this->session->userdata('user_id');
			$ip=$this->input->ip_address();
		}
		// ambil data produk
		$row = $this->Lapangan_model->get_by_id($id);

		// cek id produk
		if ($row) {
			// cek transaksi per user sedang login
			$cek_transaksi 	= $this->Cart_model->cek_transaksi();
			$id_trans 			= $cek_transaksi->id_trans;

			// cek data barang yang dibeli dan masuk ke tabel transaksi_detail
			$notransdet 				= $this->Cart_model->get_notransdet($id);

			// jika transaksi sudah ada
			if ($cek_transaksi) {
				// jika barang yang dibeli sudah ada di cart == update
				if ($notransdet) {
					$this->create();
				}
				// jika barang yang dibeli belum ada di cart == tambahkan
				else {
					$data2 = array(
						'trans_id'    => $id_trans,
						'lapangan_id' => $id,
						'harga_jual'  => $row->harga,
						'total'       => $row->harga,
					);

					$this->Cart_model->insert_detail($data2);

					// set pesan data berhasil dibuat
					$this->session->set_flashdata('message', '<div class="alert alert-success alert">Booking berhasil ditambahkan</div>');
					redirect(site_url('admin/transaksi/create'));
				}
			}
			// jika belum ada transaksi
			else {
				// mengambil 1 data terakhir dari tabel untuk pengecekan id_invoice
				$hasil_cek = $this->Cart_model->create_invoiceCode();

				// jika data tidak sama NULL atau tidak kosong atau datanya sudah ada di tabel maka buat id_invoice yang selanjutnya
				if ($hasil_cek != NULL) {
					// mengganti string dengan fungsi substr dari hasil_cek data terakhir
					$kode_akhir = substr($hasil_cek->id_invoice, 10, 6);
					// membuat id_invoice
					$kode2      = str_pad($kode_akhir + 1, 4, '0', STR_PAD_LEFT);
				}
				// jika datanya masih kosong maka buat id_invoice baru
				else {
					$kode2 = "0001";
				}

				// pembuatan tanggal
				$kode1  = date('ymd');
				/*$kode   = "J-".$kode1."-".$kode2;*/
				$kode   = "K-" . $kode1 . "-" . $kode2;
                
                    if (!isset($_SESSION['ctm-change'])) {
                      $idCtm=$usrid;
                    } else {
                      $idCtm=$_SESSION['ctm-change'];
                    }
				$data = array(
					'id_invoice'      => $kode,
					'user_id'  		  => $idCtm,
					'ip_addres'  	  => $ip,
					'created_date'    => date('Y-m-d'),
					'created_time'    => date("G:i:s")
				);

				// eksekusi query INSERT
				$this->Cart_model->insert($data);

				$cek_transaksi 	= $this->Cart_model->cek_transaksi();

				$data2 = array(
					'trans_id'  	=> $cek_transaksi->id_trans,
					'lapangan_id' => $id,
					'harga_jual'  => $row->harga,
					'total'  	=> $row->harga,
				);

				$this->Cart_model->insert_detail($data2);

				// set pesan data berhasil dibuat
				$this->session->set_flashdata('message', '<div class="alert alert-success alert">Barang berhasil ditambahkan</div>');
				redirect(site_url('admin/transaksi/create'));
			}
		} else {
			$this->session->set_flashdata('message', '
				<div class="alert alert-block alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
					<i class="ace-icon fa fa-bullhorn green"></i> Data tidak ditemukan
				</div>');
			redirect(base_url('admin/transaksi/create'));
		}
	}

  public function delete($id)
	{
		$id = $this->uri->segment(4);

		$row 			= $this->Cart_model->get_by_id_detail($id);

		if ($row) {
			$id_transdet 			= $row->id_transdet;

			$this->Cart_model->delete($id_transdet);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert">Booking Anda Berhasil dihapus</div>');
			redirect(base_url('admin/transaksi/create'));
		}
		// Jika data tidak ada
		else {
			$this->session->set_flashdata('message', '<div class="alert alert-warning alert">Booking tidak ditemukan</div>');
			redirect(base_url('admin/transaksi/create'));
		}
	}

	public function empty_cart($id_trans)
	{
		$id_trans = $this->uri->segment(4);

		$this->Cart_model->kosongkan_keranjang($id_trans);

		$this->session->set_flashdata('message', '<div class="alert alert-block alert-success"><i class="ace-icon fa fa-bullhorn green"></i> Keranjang Anda telah dikosongkan</div>');

		redirect(base_url('admin/transaksi/create'));
	}


  public function checkout()
	{
		$count = count($this->input->post('lapangan'));
		for ($i = 0; $i < $count; $i++) {
			$data_detail[$i] = array(
				'id_transdet'   => $this->input->post('id_transdet[' . $i . ']'),
				'tanggal'       => $this->input->post('tanggal[' . $i . ']'),
				'jam_mulai'     => $this->input->post('jam_mulai[' . $i . ']'),
				'durasi'        => $this->input->post('durasi[' . $i . ']'),
				'harga_jual'    => $this->input->post('harga_jual[' . $i . ']'),
				'jam_selesai'   => $this->input->post('jam_mulai[' . $i . ']') + $this->input->post('durasi[' . $i . ']') . ":00:00",
				'total'   			=> $this->input->post('harga_jual[' . $i . ']') * $this->input->post('durasi[' . $i . ']'),
			);

			$this->db->update_batch('transaksi_detail', $data_detail, 'id_transdet');
		}

		if ($this->session->userdata('usertype') == "3") {
			// ambil nilai diskon
			$this->db->select('harga');
			$this->db->where('id', '1');
			$query = $this->db->get('diskon')->row();
			$diskon = $query->harga;
		} else {
			$diskon = '0';
		}
		
		 if (!isset($_SESSION['ctm-change'])) {
          $idCtm=$this->session->userdata('user_id');
        } else {
          $idCtm=$_SESSION['ctm-change'];
        }

		$this->db->select_sum('total');
		$this->db->join('transaksi_detail', 'transaksi.id_trans = transaksi_detail.trans_id');
		$this->db->where('id_trans', $this->input->post('id_trans'));
		$this->db->where('user_id', $idCtm);
		$query = $this->db->get('transaksi')->row();

		$gtotal = $query->total - $diskon;

		$this->db->where('id_trans', $this->input->post('id_trans'));
		$this->db->where('user_id', $idCtm);
		$this->db->update('transaksi', array(
			'subtotal'		=>	$query->total,
			'diskon'			=>	$diskon,
			'grand_total'	=>	$gtotal,
			'deadline'		=>	date('Y-m-d H:i:s', strtotime('1 hour')),
			'catatan'     => $this->input->post('catatan'),
			'status'			=>	'1',
			'id_sycPlat'			=>	'1',
			'tipe_trx'			=>	'2',
			'created_time'    => date("G:i:s"),
		));

    redirect(site_url('admin/transaksi/finished'));
	}

	public function finished()
	{
		$this->data['title'] 							= 'Pembayaran';
		
		$this->data['cart_latest']	    				= $this->Cart_model->get_cart_per_customer_latest();
		$this->data['cart_finished']	    			= $this->Cart_model->get_cart_per_customer_finished($this->data['cart_latest']->id_trans)->result();
		$this->data['cart_finished_row']   			    = $this->Cart_model->get_cart_per_customer_finished($this->data['cart_latest']->id_trans)->row();
		$this->data['data_bank'] 						= $this->Bank_model->get_all();

		$datainv = $this->Cart_model->get_cart_per_customer_finished($this->data['cart_latest']->id_trans)->row_array();

		$inv=$datainv['id_invoice'] ;
		$sts1=$datainv['status'] ;
		$grand_total=$datainv['grand_total'] ;
		if($sts1 > 1) {
			redirect(site_url('admin/transaksi/finishedSukses'));
		}
		$params = array(
			'transaction_details' => array(
				'order_id' => $inv,
				'gross_amount' => $grand_total,
			)
		);
		
		$this->data['snapToken'] = \Midtrans\Snap::getSnapToken($params);
		$this->load->view('back/transaksi/finished', $this->data);
	}

    public function download_invoice($id)
	{
		$row 						= $this->Cart_model->get_by_id($id);

		if ($row) {
			ob_start();

			$this->data['cart_finished']	    			= $this->Cart_model->get_cart_per_customer_finished($id)->result();
			$this->data['cart_finished_row']   			= $this->Cart_model->get_cart_per_customer_finished($id)->row();

			$this->data['data_bank'] 								= $this->Bank_model->get_all();

			$this->load->view('front/cart/download_invoice', $this->data);

			$html = ob_get_contents();
			$html = '<title style="font-family: freeserif">' . nl2br($html) . '</title>';
			ob_end_clean();

			$pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array(10, 0, 10, 0));
			$pdf->setDefaultFont('Arial');
			$pdf->setTestTdInOnePage(false);
			$pdf->WriteHTML($html);
			$pdf->Output('download_invoice.pdf');
		} else {
			$this->session->set_flashdata('message', "<script>alert('Data tidak ditemukan');</script>");
			redirect(site_url());
		}
	}


  public function create_action()
  {
    $this->load->helper('clean_helper');
    $this->_rules();

    if ($this->form_validation->run() == FALSE)
    {
      $this->create();
    }
      else
      {
        // mengambil 1 data terakhir dari tabel untuk pengecekan id_invoice
        $hasil_cek = $this->Transaksi_model->create_invoiceCode();

        // jika data tidak sama NULL atau tidak kosong atau datanya sudah ada di tabel maka buat id_invoice yang selanjutnya
        if($hasil_cek != NULL)
        {
          // mengganti string dengan fungsi substr dari hasil_cek data terakhir
          $kode_akhir = substr($hasil_cek->id_invoice,10,6);
          // membuat id_invoice
          $kode2      = str_pad($kode_akhir+1, 4, '0', STR_PAD_LEFT);
        }
          // jika datanya masih kosong maka buat id_invoice baru
          else{$kode2 = "0001";}

        // pembuatan tanggal
        $kode1  = date('ymd');
        /*$kode   = "J-".$kode1."-".$kode2;*/
        $kode   = "J-".$kode1."-".$kode2;

        $transaksi = array(
          'id_invoice'      => $kode,
          'customer'        => $this->input->post('customer'),
          'grand_total'     => clean($this->input->post('grand_total')),
          'bayar'           => clean($this->input->post('bayar')),
          'kembalian'       => clean($this->input->post('kembalian')),
          'catatan'         => $this->input->post('catatan'),
          'cabang'          => $this->session->userdata('cabang'),
          'company'         => $this->session->userdata('company'),
          'created_by'      => $this->session->userdata('username'),
          'created_date'    => date('Y-m-d'),
          'created_time'    => date("h:i:s")
        );
        $this->Transaksi_model->insert($transaksi);

        $this->db->select_max('id_transaksi');
        $result = $this->db->get('transaksi')->row_array();

        // menghitung total data yang dientry berdasarkan nama_barang
        $count = count($this->input->post('nama_barang'));

        // looping data yang diinput dan disimpan dalam variabel $data_detail[$i]
        for($i=0;$i<$count;$i++)
        {
          $data_detail[$i] = array(
            'transaksi_id'    => $result['id_transaksi'],
            'barang_id'       => $this->input->post('nama_barang['.$i.']'),
            'qty'             => $this->input->post('qty['.$i.']'),
            'ket'             => $this->input->post('ket['.$i.']'),
            'harga_jual'      => $this->input->post('harga_jual['.$i.']'),
            'total'           => $this->input->post('total['.$i.']'),
            'created_by'      => $this->session->userdata('username'),
            'created_date'    => date('Y-m-d'),
            'created_time'    => date("h:i:s")
          );
        }
        // eksekusi query INSERT dan UPDATE + looping
        foreach($data_detail as $transaksi_detail)
        {
          $this->Transaksi_model->insert2($transaksi_detail);
        }

        // set pesan data berhasil dibuat
        $this->session->set_flashdata('message', '<div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Data berhasil dibuat</div>');
        redirect(site_url('transaksi'));
      }
  }

  public function detail($id)
  {
    $this->load->model('Bank_model');

    $invoice = $this->uri->segment(4);
    $row      = $this->Cart_model->get_by_id($invoice);

    if($row)
    {
      $this->data['title']              = 'Detail '.$this->data['module'];

      $this->data['cart_finished']	    			= $this->Cart_model->get_cart_per_customer_finished_back($invoice)->result();
  		$this->data['cart_finished_row']   			= $this->Cart_model->get_cart_per_customer_finished_back($invoice)->row();
  		$this->data['data_bank'] 								= $this->Bank_model->get_all();

      $this->load->view('back/transaksi/transaksi_detail', $this->data);
    }
      else
      {
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert">Data tidak ditemukan</div>');
        redirect(site_url('admin/transaksi'));
      }
  }

  public function print($id)
  {
    $row = $this->Transaksi_model->get_by_id($id);

    if(!$row)
    {
      $this->session->set_flashdata('message', "<script>alert('Data tidak ditemukan');</script>");
      redirect(site_url('transaksi'));
    }
    elseif($this->ion_auth->is_superadmin() && $this->session->userdata('company') != $row->company)
    {
      $this->session->set_flashdata('message', "<script>alert('Data tidak ditemukan');</script>");
      redirect(site_url('transaksi'));
    }
    elseif($this->ion_auth->is_admin() && $this->session->userdata('cabang') != $row->cabang)
    {
      $this->session->set_flashdata('message', "<script>alert('Data tidak ditemukan');</script>");
      redirect(site_url('transaksi'));
    }
      else
      {
        if($this->ion_auth->is_superadmin())
        {
          $data['cek_data']   = $this->Transaksi_model->get_by_id_print_superadmin($id);
          $data['transaksi_detail'] = $this->Transaksi_model->get_by_id_print_detail_superadmin($id);
        }
        elseif($this->ion_auth->is_admin())
        {
          $data['cek_data']   = $this->Transaksi_model->get_by_id_print_admin($id);
          $data['transaksi_detail'] = $this->Transaksi_model->get_by_id_print_detail_admin($id);
        }

        if($data['cek_data'])
        {
          $this->load->view('back/transaksi/print', $data);
        }
          else
          {
            $this->session->set_flashdata('message', "<script>alert('Data tidak ditemukan');</script>");
            redirect(site_url('transaksi'));
          }
      }
  }

  public function set_lunas($id)
  {
    $row = $this->Cart_model->get_by_id($id);

    if ($row)
    {
      $this->db->where('id_trans', $id);
  		$this->db->update('transaksi', array(
  			'status'			=>	'2',
  		));

      $this->session->set_flashdata('message', '<div class="alert alert-success alert">Transaksi berhasil dinyatakan LUNAS</div>');
      redirect(site_url('admin/transaksi'));
    }
      // Jika data tidak ada
      else
      {
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert">Transaksi tidak ditemukan</div>');
        redirect(site_url('admin/transaksi'));
      }
  }
  
   public function set_batal($id)
  {
    $row = $this->Cart_model->get_by_id($id);

    if ($row)
    {
      $this->db->where('id_trans', $id);
  		$this->db->update('transaksi', array(
  			'status'			=>	'4',
  		));

      $this->session->set_flashdata('message', '<div class="alert alert-success alert">Transaksi berhasil dibatalkan</div>');
      redirect(site_url('admin/transaksi'));
    }
      // Jika data tidak ada
      else
      {
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert">Transaksi tidak ditemukan</div>');
        redirect(site_url('admin/transaksi'));
      }
  }

  public function getJamMulai()
	{
		$tanggal = $this->input->post('tanggal');
		$lapangan_id = $this->input->post('lapangan_id');
		$id_cabor = $this->input->post('id_cabor');
	
		if ($tanggal === FALSE || $lapangan_id === FALSE) {
			echo json_encode(array());
			die();
		}
	
		$result = array();
	
		// Tentukan rentang waktu dari sekarang hingga 5 hari ke depan
		$today = new DateTime($tanggal); // Gunakan tanggal input sebagai titik awal
		$fiveDaysLater = clone $today;
		$fiveDaysLater->add(new DateInterval('P5D'));
		
		$currentDate = clone $today;

		while ($currentDate <= $fiveDaysLater) {
			$tanggal = $currentDate->format('Y-m-d');
	
			// Ambil daftar jam secara keseluruhan
			$list_jam = $this->Jam_model->getByCb($id_cabor);
	
			// Ambil daftar jam mulai yang terpakai pada tanggal tersebut
			$list_jam_terpakai = $this->Transaksi_detail_model->get_jam_mulai_terpakai($tanggal, $lapangan_id);
	
			// Inisialisasi status booked untuk setiap jam
			$statusBooked = array_fill_keys(array_column($list_jam_terpakai, 'jam_mulai'), false);
	
			// Set status booked sesuai data yang ada
			foreach ($list_jam_terpakai as $bookedJam) {
				$statusBooked[$bookedJam->jam_mulai] = true;
			}

       // Check session for the 'cart_itemsBack' key
       $cartItems = $this->session->userdata('cart_itemsBack');

	
			// Loop untuk menentukan jam mulai yang tersedia pada tanggal tersebut
			foreach ($list_jam as $a_jam) {
				$a_jam_row = new stdClass();
				$a_jam_row->id = $a_jam->id;
				$a_jam_row->jam_mulai = $a_jam->jam;
				$a_jam_row->durasi = $a_jam->durasi;
				$a_jam_row->jam_selesai = $a_jam->jam_selesai;
				$a_jam_row->harga_jual = $a_jam->harga_jual;
				$a_jam_row->harga_jual_sabtu = $a_jam->harga_jual_sabtu;
				$a_jam_row->harga_jual_minggu = $a_jam->harga_jual_minggu;
				$a_jam_row->tgl = $tanggal;
	
				// Cek apakah jam tersebut telah di-booking
				$isBooked = $statusBooked[$a_jam->jam];
				$a_jam_row->is_booked = $isBooked;

        // Cek apakah data sesi ada dan apakah ada entri untuk idBlend
        $idBlendKey = $lapangan_id . $a_jam->id . $tanggal;
        $rowSesi = ($cartItems && isset($cartItems[$idBlendKey])) ? $cartItems[$idBlendKey] : null;

        // Tambahkan status true jika ada entri untuk idBlend
        $a_jam_row->is_sesicart = ($rowSesi !== null);

	
				array_push($result, $a_jam_row);
			}
	
			$currentDate->add(new DateInterval('P1D'));
		}
	
		echo json_encode($result);
	}

  public function saveCart() {
		// Ambil data dari form atau dari data lainnya
		$idblend = $this->input->post('idblend');
		$id = $this->input->post('id');
		$lapangan_id = $this->input->post('lapangan_id');
		$harga_fix = $this->input->post('harga_fix');
		$tgl = $this->input->post('tgl');
	
		// Ambil data session keranjang yang sudah ada
		$cartItems = $this->session->userdata('cart_itemsBack');
	
		// Bentuk data yang akan disimpan dalam session
		$dataToStore = array(
			'idblend' => $idblend,
			'id_jam' => $id,
			'lapangan_id' => $lapangan_id,
			'harga_fix' => $harga_fix,
			'tgl' => $tgl
		);
	
		// Tambahkan atau update data pada array sesuai dengan kunci id
		$cartItems[$idblend] = $dataToStore;
	
		// Simpan data ke dalam session
		$this->session->set_userdata('cart_itemsBack', $cartItems);
	
		// Output atau respon JSON (opsional)
		echo json_encode(['status' => 'success', 'message' => 'Data berhasil ditambahkan ke keranjang']);
	}
	
	function  show_countSesiCart() {
		if(isset($this->session) && isset($this->session->userdata['cart_itemsBack'])){
		 $cartItems = $this->session->userdata('cart_itemsBack');
		 $data['jml_itm']=	count($cartItems);
		} else {
			$data['jml_itm']= 0 ;
			
		}

		echo $data['jml_itm'] ;
	}

	public function removeCartItem()
	{
		// Ambil data idblend dari form atau dari data lainnya
		$idblendToRemove = $this->input->post('idblend');

		// Ambil data session keranjang yang sudah ada
		$cartItems = $this->session->userdata('cart_itemsBack');

		// Periksa apakah item dengan idblend tersebut ada di dalam session
		if (isset($cartItems[$idblendToRemove])) {
			// Hapus item dari array sesuai dengan kunci idblend
			unset($cartItems[$idblendToRemove]);

			// Simpan data yang baru ke dalam session
			$this->session->set_userdata('cart_itemsBack', $cartItems);

			// Output atau respon JSON (opsional)
			echo json_encode(['status' => 'success', 'message' => 'Item berhasil dihapus dari keranjang']);
		} else {
			// Output atau respon JSON (opsional)
			echo json_encode(['status' => 'error', 'message' => 'Item tidak ditemukan di keranjang']);
		}
	}

	public function cekCartItem()
	{
		// Ambil data idblend dari form atau dari data lainnya
		$idblendToRemove = $this->input->post('idblend');

		// Ambil data session keranjang yang sudah ada
		$cartItems = $this->session->userdata('cart_itemsBack');

		// Periksa apakah item dengan idblend tersebut ada di dalam session
		if (isset($cartItems[$idblendToRemove])) {
		

			// Output atau respon JSON (opsional)
			echo json_encode(['status' => 'success', 'message' => 'Item ada dalam keranjang']);
		} else {
			// Output atau respon JSON (opsional)
			echo json_encode(['status' => 'error', 'message' => 'Item tidak ditemukan di keranjang']);
		}
	}


	// Controller method untuk mengambil data item keranjang
	public function getCartItems()
{
    // Mendapatkan data item keranjang dari sesi
    $cartItems = $this->session->userdata('cart_itemsBack');

    // Menambahkan custom field ke setiap item dalam array
    foreach ($cartItems as &$item) {
		$idJm=$item['id_jam'];
		$idL=$item['lapangan_id'];
		$row_jam = $this->Jam_model->getByid($idJm);
		$rowL= $this->Lapangan_model->get_by_id1($idL);
        // Misalnya, menambahkan field 'custom_field' dengan nilai 'custom_value'
        $item['jam_mulai'] = $row_jam['jam'];
        $item['jam_selesai'] = $row_jam['jam_selesai'];
		$item['nama_lapangan'] = $rowL['nama_lapangan'];
		$item['foto'] = $rowL['foto'];
    }

    // Set content type sebagai JSON
    $this->output->set_content_type('application/json');

    // Mengirimkan array yang telah diperbarui sebagai JSON
    $this->output->set_output(json_encode(['cart_items' => $cartItems]));
}

	public function confirmCart()
	{
		$this->data['title'] = 'Konfirmasi Pesanan';
		$this->load->view('back/transaksi/confirmCart', $this->data);
	}
	
	

  public function confirmPesan()
	{	
		if (!$this->ion_auth->logged_in()) {
			// $this->session->set_flashdata('message', '<div class="alert alert-danger alert">Silahkan login dulu</div>');
			// redirect(base_url('auth/login'));
			$usrid=0;
			$ip= $this->input->ip_address();
			redirect(base_url('admin/auth/register'));

		} else {
			$usrid=$this->session->userdata('user_id');
			$ip=$this->input->ip_address();
		}

		if (!isset($_SESSION['ctm-change'])) {
		$idCtm=$usrid;
		$diskon = '0';
		} else {
		$idCtm=$_SESSION['ctm-change'];
		$userRow 	= $this->ion_auth->get_all_usersCtmId($idCtm)->row_array();
		$typeUsr=$userRow['usertype'];

		if ($typeUsr == "3") {
			// ambil nilai diskon
			$this->db->select('harga');
			$this->db->where('id', '1');
			$query = $this->db->get('diskon')->row();
			$diskon = $query->harga;
			} else {
				$diskon = '0';
			}

		}

		// mengambil 1 data terakhir dari tabel untuk pengecekan id_invoice
		$hasil_cek = $this->Cart_model->create_invoiceCode();

		// jika data tidak sama NULL atau tidak kosong atau datanya sudah ada di tabel maka buat id_invoice yang selanjutnya
		if ($hasil_cek != NULL) {
			// mengganti string dengan fungsi substr dari hasil_cek data terakhir
			$kode_akhir = substr($hasil_cek->id_invoice, 10, 6);
			// membuat id_invoice
			$kode2      = str_pad($kode_akhir + 1, 4, '0', STR_PAD_LEFT);
		}
		// jika datanya masih kosong maka buat id_invoice baru
		else {
			$kode2 = "0001";
		}


		$cartItems1 = $this->session->userdata('cart_itemsBack');
		// Menambahkan custom field ke setiap item dalam array
		foreach ($cartItems1 as $item) {
		$stotal+=$item['harga_fix'];
		  // $this->Cart_model->insert_detail($data2);
		}


		function hitungTotalSetelahDiskon($stotal, $diskon) {
			// Mengurangi jumlah diskon dari total
			$total_setelah_diskon = $stotal - ($diskon / 100 * $stotal);
			
			return $total_setelah_diskon;
		}
		
		// Contoh penggunaan:
	
		$total_setelah_diskon = hitungTotalSetelahDiskon($stotal, $diskon);
		$diskonRp=$stotal-$total_setelah_diskon;
		// echo $diskonRp ;
	
		// die;
			// pembuatan tanggal
			$kode1  = date('ymd');
			/*$kode   = "J-".$kode1."-".$kode2;*/
			$kode   = "L-" . $kode1 . "-" . $kode2;

			$data1 = array(
				'id_invoice'        => $kode,
				'user_id'  		    => $idCtm,
				'ip_addres'  	    => $ip,
				'subtotal'		    => $stotal,
				'diskonPersen'	    => $diskon,
				'diskon'		    => $diskonRp,
				'grand_total'	    => $total_setelah_diskon,
				'deadline'		    => date('Y-m-d H:i:s', strtotime('1 hour')),
				'catatan'         	=> '',
				'status'		    => '1',
				'id_sycPlat'	    => '1',
        		'tipe_trx'			=>	'2',
				'created_date'    	=> date('Y-m-d'),
				'created_time'    	=> date("G:i:s")
			);

				// eksekusi query INSERT
				$this->Cart_model->insert($data1);
				// Get the insert id
				$insert_id = $this->db->insert_id();



		  // Mendapatkan data item keranjang dari sesi
		  $cartItems = $this->session->userdata('cart_itemsBack');
		  // Menambahkan custom field ke setiap item dalam array
		  foreach ($cartItems as $item) {
			$idJm=$item['id_jam'];
			$row_jam = $this->Jam_model->getByid($idJm);
			
			$data2 = array(
				'trans_id'    => $insert_id,
				'lapangan_id' => $item['lapangan_id'],
				'tanggal'     => $item['tgl'],
				'jam_mulai'   => $row_jam['jam'],
				'durasi'   	  =>  $row_jam['durasi'],
				'jam_selesai' => $row_jam['jam_selesai'],
				'harga_jual'  => $item['harga_fix'],
				'total'       => $item['harga_fix'],
			);

			$this->Cart_model->insert_detail($data2);
		  }

		  $this->session->unset_userdata('cart_itemsBack');

		  redirect(site_url('admin/transaksi/finished'));
		
	}
	
	
    public function finishedSukses()
	{
		$this->data['title'] 							= 'Transaksi Selesai';

		$this->data['cart_latest']	    				= $this->Cart_model->get_cart_per_customer_latest();
		$this->data['cart_finished']	    			= $this->Cart_model->get_cart_per_customer_finished($this->data['cart_latest']->id_trans)->result();
		$this->data['cart_finished_row']   			    = $this->Cart_model->get_cart_per_customer_finished($this->data['cart_latest']->id_trans)->row();
		$this->data['data_bank'] 						= $this->Bank_model->get_all();

		$datainv = $this->Cart_model->get_cart_per_customer_finished($this->data['cart_latest']->id_trans)->row_array();

		
		$this->load->view('back/transaksi/suksesFinished', $this->data);
	}





  // public function print($id)
  // {
  //   $this->load->helper('tgl_indo');
  //   $this->load->model('Company_model');
  //
  //   if($data['cek_data'])
  //   {
  //     Include the main TCPDF library (search for installation path).
  //     require_once('assets/plugins/tcpdf/tcpdf.php');
  //
  //     // create new PDF document
  //     $pdf = new TCPDF('P', 'mm', array('58','48'), true, 'UTF-8', false);
  //     // $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  //
  //     // set document information
  //     $pdf->SetCreator('AzmiColeJr');
  //     $pdf->SetAuthor('AzmiColeJr');
  //     $pdf->SetTitle('Print '.$row->id_invoice);
  //
  //     // Set font
  //     // dejavusans is a UTF-8 Unicode font, if you only need to
  //     // print standard ASCII chars, you can use core fonts like
  //     // helvetica or times to reduce file size.
  //     $pdf->SetFont('helvetica', '', 5, '', true);
  //
  //     // remove default header/footer
  //     $pdf->setPrintHeader(false);
  //     $pdf->setPrintFooter(false);
  //
  //     // set margins
  //     $pdf->SetMargins('10', '10', '100');
  //
  //     // set auto page breaks
  //     $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
  //
  //     // set image scale factor
  //     $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
  //
  //     // set some language-dependent strings (optional)
  //     if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
  //         require_once(dirname(__FILE__).'/lang/eng.php');
  //         $pdf->setLanguageArray($l);
  //     }
  //
  //     // Add a page
  //     // This method has several options, check the source code documentation for more information.
  //     $pdf->AddPage();
  //
  //     // set text shadow effect
  //     $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
  //
  //     // Set some content to print
  //     $html = $this->load->view('back/transaksi/print', $data, true);;
  //
  //     // Print text using writeHTMLCell()
  //     $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
  //
  //     // ---------------------------------------------------------
  //
  //     // Close and output PDF document
  //     // This method has several options, check the source code documentation for more information.
  //     $pdf->Output('Print '.$row->id_invoice.'.pdf', 'I');
  //   }
  //     else
  //     {
  //       $this->session->set_flashdata('message', "<script>alert('Data tidak ditemukan');</script>");
  //       redirect(site_url('transaksi'));
  //     }
  // }

  public function update_diskon($id)
  {
    $this->db->select('id, harga');
    $this->db->where('id', '1');
    $row = $this->db->get('diskon')->row();

    $this->data['diskon'] = $row;

    if ($row)
    {
      $this->data['title']          = 'Ubah Data Diskon Member';
      $this->data['action']         = site_url('admin/transaksi/update_diskon_action');
      $this->data['button_submit']  = 'Simpan';
      $this->data['button_reset']   = 'Reset';

      $this->data['id'] = array(
        'name'  => 'id',
        'id'    => 'id',
        'type'  => 'hidden',
      );

      $this->data['harga'] = array(
        'name'  => 'harga',
        'id'    => 'harga',
        'type'  => 'number',
        'class' => 'form-control',
      );

      $this->load->view('back/transaksi/update_diskon', $this->data);
    }
      else
      {
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert">Data tidak ditemukan</div>');
        redirect(site_url('admin/transaksi/update_diskon/1'));
      }
  }

  public function update_diskon_action()
  {
    $this->form_validation->set_rules('harga', 'Diskon Member', 'required');

    if ($this->form_validation->run() == FALSE)
    {
      $this->update($this->input->post('id'));
    }
      else
      {
        $data = array(
          'harga'   => $this->input->post('harga'),
        );

        $this->db->where('id',$this->input->post('id'));
        $this->db->update('diskon', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert">Edit Data Berhasil</div>');
        redirect(site_url('admin/transaksi/update_diskon/1'));
      }
  }

  public function _rules()
  {
    $this->form_validation->set_rules('nama_barang[]', 'Nama Barang', 'required');
    $this->form_validation->set_rules('bayar', 'Bayar', 'required');
    $this->form_validation->set_rules('kembalian', 'Kembalian', 'required');
    // set pesan form validasi error
    $this->form_validation->set_message('required', '{field} wajib diisi');

    $this->form_validation->set_rules('id_transaksi', 'id_transaksi', 'trim');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert">', '</div>');
  }
  
  
  public function registerCtm()
	{
		$this->data['title'] 							= 'Tambah Customer';

		/* setting bawaan ionauth */
		$tables 					= $this->config->item('tables','ion_auth');
		$identity_column 	= $this->config->item('identity','ion_auth');

		$this->data['identity_column'] = $identity_column;

		// validasi form input
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|is_unique[users.name]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('nohp', 'No. HP', 'trim|numeric');

		// set pesan
		$this->form_validation->set_message('required', '{field} mohon diisi');
		$this->form_validation->set_message('valid_email', 'Format email tidak benar');
		$this->form_validation->set_message('numeric', 'No. HP harus angka');
		$this->form_validation->set_message('is_unique', '%s telah terpakai, silahkan ganti dengan yang lain');

		// cek form_validation dan register ke db
		if ($this->form_validation->run() == true)
		{
			$email    = strtolower($this->input->post('email'));

      $randomNumber = rand(100, 100000); // Angka acak antara 1 dan 100
			// data tambahan yang untuk dimasukkan pada tabel
			$additional_data = array(
				'name' 				=> $this->input->post('nama'),
				'username'  	=> $this->input->post('nama'). $randomNumber,
				'phone'      	=> $this->input->post('nohp'),
				'address'    	=> '-',
				'provinsi' 		=> '6',
				'kota'   		=> '152',
				'usertype'      => '4',
			);

			// mengirimkan data yang sudah disediakan diatas $additional_data $email, $identity $password
			$this->ion_auth->registerCtm($email, $additional_data);

			// check to see if we are creating the user | redirect them back to the admin page
			$this->session->set_flashdata('message', '<div class="alert alert-success alert">Registrasi Customer Berhasil </div>');
			redirect(base_url('admin/transaksi/create'));
		}
			else
			{
				// display the create user form | set the flash data error message if there is one
				$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
                redirect(base_url('admin/transaksi/create'));
			}
	}


}
