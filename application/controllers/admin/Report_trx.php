<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Report_trx extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Transaksi_detail_model');
    $this->load->model('Ion_auth_model');
    date_default_timezone_set('Asia/Jakarta');

    $this->data['module'] = 'Laporan Detail Transaksi (LUNAS) ';

    if(!$this->ion_auth->logged_in()){redirect('admin/auth/login', 'refresh');}
    elseif(!$this->ion_auth->is_superadmin() && !$this->ion_auth->is_admin()){redirect(base_url());}
  }

  public function index()
  {
    $this->data['title']    = 'Data '.$this->data['module'];
 

    $this->load->view('back/transaksi/report_trx', $this->data);
  }
  
  
  public function ambildataExcel()
  {
      @$tgl_start = $this->input->get('fromDate');
      if (!$tgl_start) {
          $tgl_start = '';
          $tgl_end = '';
      } else {
          $tgl_start = $this->input->get('fromDate');
          $tgl_end = $this->input->get('toDate');
      }
  
      $list = $this->Transaksi_detail_model->get_dataEx($tgl_start, $tgl_end);
      $data = array();
      $total = 0; // Inisialisasi variabel untuk menghitung grand total
      $no = 1;
      foreach ($list as $field) {
          $stotal = $field->total;
          $diskon = $field->diskonPersen;
          $tipeTrx = ($field->tipe_trx == '1') ? 'Online' : 'Offline';
          $total_setelah_diskon = $stotal - ($diskon / 100 * $stotal);
          $diskonRp = $stotal - $total_setelah_diskon;
          $waktu = $field->tanggal . ' ' . $field->jam_mulai . ' - ' . $field->jam_selesai;
  
          $row = array();
          $row[] = $no++;
          $row[] = 'Invoice: ' . $field->id_invoice;
          $row[] = $tipeTrx;
          $row[] = $field->payment_type;
          $row[] = $field->created_date;
          $row[] = $field->nama_lapangan;
          $row[] = $waktu;
          $row[] = $diskon . ' % = (' . $diskonRp . ')';
          $row[] = number_format($field->harga_jual);
          $row[] = number_format($total_setelah_diskon);
          $data[] = $row;
  
          $total += $total_setelah_diskon; // Menambahkan total setiap baris ke grand total
      }
  
      // Menambahkan baris baru untuk grand total dengan keterangan "Grand Total"
      $data[] = array('Grand Total', '', '', '', '', '', '', '', '', number_format($total));

  
      // Membuat file Excel menggunakan PhpSpreadsheet
      $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();
  
      // Header
      $header = array('No', 'Invoice', 'Tipe Transaksi', 'Tipe Pembayaran', 'Tanggal Buat', 'Nama Lapangan', 'Waktu', 'Diskon', 'Harga Jual', 'Total');
      $column = 1;
      foreach ($header as $col) {
          $sheet->setCellValueByColumnAndRow($column++, 1, $col);
      }
  
      // Data
      $row = 2;
      foreach ($data as $rowData) {
          $column = 1;
          foreach ($rowData as $value) {
              $sheet->setCellValueByColumnAndRow($column++, $row, $value);
          }
          $row++;
      }
  
      // Konfigurasi nama file Excel
      $filename = 'data_transaksi.xlsx';
  
      // Mengirim file Excel untuk diunduh tanpa menyimpan
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment;filename="' . $filename . '"');
      header('Cache-Control: max-age=0');
  
      $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
      $writer->save('php://output');
  }
  

  public function ambildata()
  {
      // @ $tgl_start=  $_POST['tgl_start'];
        @$tgl_start = $this->input->post('fromDate');

        if (!$tgl_start) {
          $tgl_start = '';
          $tgl_end = '';
        } 
        else {
          $tgl_start = $this->input->post('fromDate');
          $tgl_end = $this->input->post('toDate');
        }
  
        function hitungTotalSetelahDiskon($stotal, $diskon) {
          // Mengurangi jumlah diskon dari total
          $total_setelah_diskon = $stotal - ($diskon / 100 * $stotal);
          
          return $total_setelah_diskon;
        }

      if ($this->input->is_ajax_request() == true) {
          $list = $this->Transaksi_detail_model->get_datatables($tgl_start,$tgl_end);
          $data = array();
          $no = $_POST['start'];
          foreach ($list as $field) {
              $stotal=$field->total;
              $diskon=$field->diskonPersen;
              $tipeTrx=$field->tipe_trx;
              if($tipeTrx == '1') 
              {
                $tipeTrx='Online';
              } else {
                $tipeTrx='Offline';
              }

             
              
              // Contoh penggunaan:
            
              $total_setelah_diskon = hitungTotalSetelahDiskon($stotal, $diskon);
              $diskonRp=$stotal-$total_setelah_diskon;

              $waktu = $field->tanggal.'<br>'.$field->jam_mulai.' - '.$field->jam_selesai;

              $transaksi= 'Invoice: ' .$field->id_invoice. '<br>Tipe Transaksi: ' .  $tipeTrx . '<br>Tipe Pembayaran: '.  $field->payment_type;
             
              $no++;
              $row = array();
          
              $row[] = $no;
              $row[] = $transaksi;
              $row[] = $field->created_date;
              $row[] = $field->nama_lapangan;
              $row[] = $waktu;
              $row[] = $diskon.' % = ('.$diskonRp.')';
              $row[] = number_format($field->harga_jual);
              $row[] = number_format($total_setelah_diskon);
              $row[] = $field->status;
           
              $data[] = $row;
          }

          $output = array(
              "draw" => $_POST['draw'],
              "recordsTotal" => $this->Transaksi_detail_model->count_all($tgl_start,$tgl_end),
              "recordsFiltered" => $this->Transaksi_detail_model->count_filtered($tgl_start,$tgl_end),
              "data" => $data,
          );
          //output dalam format JSON
          echo json_encode($output);
      } else {
          exit('Maaf data tidak bisa ditampilkan');
      }
  }
 
}
