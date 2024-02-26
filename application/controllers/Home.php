<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->data['title'] = 'Home';

		$this->load->model('Company_model');
		$this->load->model('Event_model');
		$this->load->model('Foto_model');
		$this->load->model('Kontak_model');
		$this->load->model('Lapangan_model');
		$this->load->model('Slider_model');
		$this->load->model('Cabor_model');

		$this->data['company_data'] 	= $this->Company_model->get_by_company();
		$this->data['event_new'] 			= $this->Event_model->get_all_new_home();
		$this->data['foto_data'] 			= $this->Foto_model->get_all_new_home();
		$this->data['slider_data'] 		= $this->Slider_model->get_all_home();
		$this->data['kontak'] 				= $this->Kontak_model->get_all();
		$this->data['lapangan_new'] 	= $this->Lapangan_model->get_all_home();
		$this->data['cabor'] 	= $this->Cabor_model->get_all();

		$id = isset($_GET['id']) ? $_GET['id'] : null;

		if ($id) {
			// Jika parameter 'id' ada, gunakan model get_all_homeByid
			$this->data['lapangan_new'] = $this->Lapangan_model->get_all_homeByid($id);
		} else {
			// Jika parameter 'id' tidak ada, gunakan model get_all_home
			$this->data['lapangan_new'] = $this->Lapangan_model->get_all_home();
		}

		$this->load->view('front/home/body', $this->data);
	}

}
