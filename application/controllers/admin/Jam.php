<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jam extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Jam_model');
    $this->load->model('Cabor_model');

    $this->data['module'] = 'Waktu && Harga';

    if(!$this->ion_auth->logged_in()){redirect('admin/auth/login', 'refresh');}
    elseif(!$this->ion_auth->is_superadmin() && !$this->ion_auth->is_admin()){redirect(base_url());}
  }

  public function index()
  {
    $this->data['title']    = 'Data '.$this->data['module'];
    $this->data['cabor'] 	= $this->Cabor_model->get_all();
  

    $this->load->view('back/jam/jam_list', $this->data);
  }
  
   public function ambildata()
  {
      @ $caborId= $_POST['caborId'];
      if (!$caborId) {
          $caborId = '';
      }
      if ($this->input->is_ajax_request() == true) {
          $list = $this->Jam_model->get_datatables($caborId);
          $data = array();
          $no = $_POST['start'];
          foreach ($list as $field) {
              $no++;
              $row = array();
          
              $row[] = $no;
              $row[] = $field->jam;
              $row[] = $field->durasi;
              $row[] = $field->jam_selesai;
              $row[] = $field->harga_jual;
              $row[] = $field->harga_jual_sabtu;
              $row[] = $field->harga_jual_minggu;
              $row[] = anchor(site_url('admin/jam/update/'.$field->id),'<i class="fa fa-pencil"></i>','title="Edit", class="btn btn-sm btn-warning"'); echo ' ';
            
             
              $data[] = $row;
          }

          $output = array(
              "draw" => $_POST['draw'],
              "recordsTotal" => $this->Jam_model->count_all($caborId),
              "recordsFiltered" => $this->Jam_model->count_filtered($caborId),
              "data" => $data,
          );
          //output dalam format JSON
          echo json_encode($output);
      } else {
          exit('Maaf data tidak bisa ditampilkan');
      }
  }
    


  public function update($id)
  {
    $row = $this->Jam_model->getByidBack($id);
    $this->data['jam'] = $this->Jam_model->getByidBack($id);
    // var_dump($this->data['jam']);

    if ($row)
    {
      $this->data['title']          = 'Ubah Data '.$this->data['module'];
      $this->data['action']         = site_url('admin/jam/update_action');
      $this->data['button_submit']  = 'Simpan';
      $this->data['button_reset']   = 'Reset';

      $this->data['id_jam'] = array(
        'name'  => 'id_jam',
        'id'    => 'id_jam',
        'type'  => 'hidden',
      );

      $this->data['harga'] = array(
        'name'  => 'harga',
        'id'    => 'harga',
        'type'  => 'number',
        'class' => 'form-control',
        'required'  => 'required', // Add this line to make the field required
      );

      $this->data['harga_sabtu'] = array(
        'name'  => 'harga_sabtu',
        'id'    => 'harga_sabtu',
        'type'  => 'number',
        'class' => 'form-control',
        'required'  => 'required', // Add this line to make the field required
      );

      $this->data['harga_minggu'] = array(
        'name'  => 'harga_minggu',
        'id'    => 'harga_minggu',
        'type'  => 'number',
        'class' => 'form-control',
        'required'  => 'required', // Add this line to make the field required
      );


      $this->load->view('back/jam/jam_edit', $this->data);
    }
      else
      {
        $this->session->set_flashdata('message', '
        <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
					<i class="ace-icon fa fa-bullhorn green"></i> Data tidak ditemukan
        </div>');
        redirect(site_url('admin/jam'));
      }
  }

  public function update_action()
  {
   
        $data = array(
          'harga_jual'              => $this->input->post('harga'),
          'harga_jual_sabtu'        => $this->input->post('harga_sabtu'),
          'harga_jual_minggu'       => $this->input->post('harga_minggu'),
        );

        $this->Jam_model->update($this->input->post('id_jam'), $data);
        $this->session->set_flashdata('message', '
        <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
					<i class="ace-icon fa fa-bullhorn green"></i> Data berhasil disimpan
        </div>');
        redirect(site_url('admin/jam'));
     
  }

 
}
