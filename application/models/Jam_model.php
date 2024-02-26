<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jam_model extends CI_Model{

    //datatable serverside

	var $table = 'jam'; //nama tabel dari database
    var $column_order = array(null,'jam','durasi','jam_selesai','harga_jual','harga_jual_sabtu','harga_jual_minggu',null); //Sesuaikan dengan field
    var $column_search = array('jam','durasi','jam_selesai'); //field yang diizin untuk pencarian 
    var $order = array('id' => 'asc'); // default order 

     private function _get_datatables_query($caborId)
    {

        $this->db->from($this->table);
		if($caborId != '') {
			$this->db->where('id_cabor_jam', $caborId);
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

    function get_datatables($caborId)
    {
        $this->_get_datatables_query($caborId);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($caborId)
    {
        $this->_get_datatables_query($caborId);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($caborId)
    {
        $this->db->from($this->table);
		if($caborId != '') {
			$this->db->where('id_cabor_jam', $caborId);
		}

        return $this->db->count_all_results();
    }

	//end datatable serverside

	public function get_all() {
        return $this->db->get('jam')->result();
    }

	public function getByid($id= null) {
		// Assuming $this->db is your database connection object
		$this->db->select('id,jam,durasi,jam_selesai');
		$this->db->where('id', $id);
		return $this->db->get('jam')->row_array();
	}
	
	public function getByidBack($id= null) {
		// Assuming $this->db is your database connection object
		$this->db->select('id,jam,durasi,jam_selesai,harga_jual,harga_jual_sabtu,harga_jual_minggu');
		$this->db->where('id', $id);
		return $this->db->get('jam')->row_array();
	}

	function update($id, $data)
	{
	  $this->db->where('id',$id);
	  $this->db->update('jam', $data);
	}
	
	

	function get(){
		$this->db->select('id,jam,durasi,jam_selesai,harga_jual,harga_jual_sabtu,harga_jual_minggu');
		$this->db->where('is_available', '1');
		$this->db->order_by('jam', 'asc');
		return $query = $this->db->get('jam')->result();
		// $sql = "
		// 			select
		// 				jam
		// 			from jam
		// 			where is_available = 1
		// 			order by jam
		// 		";
		// $query = $this->db->query($sql);
		//
		// return $query->result();
	}
	
	function getByCb($id= null){
		$this->db->select('id,jam,durasi,jam_selesai,harga_jual,harga_jual_sabtu,harga_jual_minggu');
		$this->db->where('is_available', '1');
		$this->db->where('id_cabor_jam', $id);
		$this->db->order_by('jam', 'asc');
		return $query = $this->db->get('jam')->result();
		// $sql = "
		// 			select
		// 				jam
		// 			from jam
		// 			where is_available = 1
		// 			order by jam
		// 		";
		// $query = $this->db->query($sql);
		//
		// return $query->result();
	}

	function get_jam_range($jam_mulai, $jam_selesai){
		$this->db->select('jam');
		$this->db->where('jam >=', $jam_mulai);
		$this->db->where('jam <', $jam_selesai);
		$this->db->order_by('jam', 'asc');
		return $query = $this->db->get('jam')->result();
		// $sql = "
		// 	SELECT
		// 		jam
		// 	FROM futsal_jam
		// 	WHERE (jam >= ? AND jam < ?)
		// 		AND is_available = 1
		// 	ORDER BY jam
		// ";
		//
		// $query = $this->db->query($sql, array($jam_mulai, $jam_selesai));

	}
}
