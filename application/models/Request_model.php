<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Request_model extends CI_Model
{
  
  	
	//datatable serverside

	var $table = 'member_premium_request'; //nama tabel dari database
  var $column_order = array(null,'name','email','phone','fotoKtp','status','ket','created',null); //Sesuaikan dengan field
  var $column_search = array('name','email','status'); //field yang diizin untuk pencarian 
  var $order = array('id_rm' => 'asc'); // default order 

  private function _get_datatables_query($status)
  {

      $this->db->from($this->table);
      $this->db->join('users', "$this->table.id_user = users.id", 'inner');
      if($status != '') {
        $this->db->where('status',$status);
      }

      $i = 0;

      foreach ($this->column_search as $item) // looping awal
      {
          if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
          {

              if ($i === 0) // looping awal
              {
                  $this->db->group_start();
                  $this->db->like($item, $_POST['search']['value']);
              } else {
                  $this->db->or_like($item, $_POST['search']['value']);
              }

              if (count($this->column_search) - 1 == $i)
                  $this->db->group_end();
          }
          $i++;
      }

      if (isset($_POST['order'])) {
          $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
      } else if (isset($this->order)) {
          $order = $this->order;
          $this->db->order_by(key($order), $order[key($order)]);
      }
  }

  function get_datatables($status)
  {
      $this->_get_datatables_query($status);
      if ($_POST['length'] != -1)
          $this->db->limit($_POST['length'], $_POST['start']);
      $query = $this->db->get();
      return $query->result();
  }

  function count_filtered($status)
  {
      $this->_get_datatables_query($status);
      $query = $this->db->get();
      return $query->num_rows();
  }

  public function count_all($status)
  {
      $this->db->from($this->table);
  if($status != '') {
    $this->db->where('status', $status);
  }

      return $this->db->count_all_results();
  }

//end datatable serverside



  function get_all()
  {
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->join('users', "$this->table.id_user = users.id", 'inner');

    $query = $this->db->get();
    return $query->result();
  }

  // Mendapatkan satu baris data berdasarkan ID
  function get_by_id($id)
  {
      $this->db->select('*');
      $this->db->from($this->table);
      $this->db->where("id_user", $id);

      $query = $this->db->get();
      return $query->row_array(); // Menggunakan row() untuk mendapatkan satu baris
  }
  
   function get_by_idRm($id)
  {
      $this->db->select('*');
      $this->db->from($this->table);
      $this->db->where("id_rm", $id);

      $query = $this->db->get();
      return $query->row_array(); // Menggunakan row() untuk mendapatkan satu baris
  }

}
