<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cabor_model extends CI_Model
{
  public $table = 'cabor';
  public $id    = 'id_cabor';
  public $order = 'asc';

  function get_all()
  {
    return $this->db->get($this->table)->result();
  }

}
