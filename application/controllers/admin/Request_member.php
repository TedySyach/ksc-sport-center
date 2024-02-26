<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Request_member extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Request_model');
    $this->load->model('Ion_auth_model');
    date_default_timezone_set('Asia/Jakarta');

    $this->data['module'] = 'Request Member';

    if(!$this->ion_auth->logged_in()){redirect('admin/auth/login', 'refresh');}
    elseif(!$this->ion_auth->is_superadmin() && !$this->ion_auth->is_admin()){redirect(base_url());}
  }

  public function index()
  {
    $this->data['title']    = 'Data '.$this->data['module'];
    $this->data['get_all']  = $this->Request_model->get_all();

    $this->load->view('back/member/request_member_list', $this->data);
  }

    
  public function ambildata()
  {
      @ $status=  $_POST['status'];
      if (!$status) {
          $status = '';
      } 
      if ($this->input->is_ajax_request() == true) {
          $list = $this->Request_model->get_datatables($status);
          $data = array();
          $no = $_POST['start'];
          foreach ($list as $field) {
              $sts=$field->status;
              if ($sts == 0) {
                $status = '<span class="badge badge-custom-secondary">Pengajuan</span>';
              } elseif ($sts == 1) {
                  $status = '<span class="badge badge-custom-success">Pengajuan diterima</span>';
              } elseif ($sts == 2) {
                  $status = '<span class="badge badge-custom-danger">Pengajuan Ditolak</span>';
              } elseif ($sts == 3) {
                  $status = '<span class="badge badge-custom-secondary">Pengajuan Ditangguhkan</span>';
              } else {
                  // Handle other status values if needed
                  $status = '<span class="badge badge-custom-secondary">Unknown Status</span>';
              }

              $foto='<img src=" '. base_url("assets/images/user/").$field->fotoKtp .' " style="max-width: 80%; height: auto;">';

              $no++;
              $row = array();
          
              $row[] = $no;
              $row[] = $field->name;
              $row[] = $field->email;
              $row[] = $field->phone;
              $row[] = $foto;
              $row[] = $status;
              $row[] = $field->ket;
              $row[] = $field->created;
              $row[] = '<button title="Konfirmasi" class="btn btn-sm btn-primary" data-id="'.$field->id_rm.'" data-toggle="modal" data-target="#exampleModal" ><i class="fa fa-tasks" aria-hidden="true"></i> </button>';
         
         
              $data[] = $row;
          }

          $output = array(
              "draw" => $_POST['draw'],
              "recordsTotal" => $this->Request_model->count_all($status),
              "recordsFiltered" => $this->Request_model->count_filtered($status),
              "data" => $data,
          );
          //output dalam format JSON
          echo json_encode($output);
      } else {
          exit('Maaf data tidak bisa ditampilkan');
      }
  }

  public function konfirmaction()
    {
        $id = $this->input->post('id');
        $sts=$this->input->post('status');
        $data = array(
          'status'              => $this->input->post('status'),
          'ket'                 => $this->input->post('ket'),
          'updated'             =>  date("Y-m-d H:i:s")
        );

        $this->db->where('id_rm', $id);
        $this->db->update('member_premium_request', $data);
    
         // Cek apakah update berhasil
          if ($this->db->affected_rows() > 0) {
            //ubah ke member premium hanya jika pengajuan diterima
            if($sts == 1) {
              $dataRmrow  = $this->Request_model->get_by_idRm($id);
              $idUsr= $dataRmrow['id_user'];

              $dataTipe = array(
                'usertype'  => 3
              );
    
              // mengecek apakah sedang mengupdate data user
              $this->ion_auth->update($idUsr, $dataTipe);
            }
            // Jika berhasil
            $response = array(
                'status' => 'success',
                'message' => 'Data berhasil di-update.'
            );
        } else {
            // Jika gagal atau tidak ada perubahan
            $response = array(
                'status' => 'error',
                'message' => 'Tidak ada perubahan pada data.'
            );
        }

        // Mengirim respon dalam format JSON
        header('Content-Type: application/json');
        echo json_encode($response);
       
     
    }

 
}
