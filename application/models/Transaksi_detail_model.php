<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_detail_model extends CI_Model{
    
  //datatable serverside

  var $table = 'transaksi_detail'; //nama tabel dari database
  var $column_order = array(null,'id_invoice','tipe_trx','payment_type','created_date','nama_lapangan','Waktu','diskonPersen','harga_jual','total','status',null); //Sesuaikan dengan field
  var $column_search = array('id_invoice','created_date','status'); //field yang diizin untuk pencarian 
  var $order = array('id_transdet' => 'desc'); // default order 

  private function _get_datatables_query($tgl_start,$tgl_end)
	{

		$this->db->from($this->table);
		$this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
		$this->db->join('lapangan', 'transaksi_detail.lapangan_id = lapangan.id_lapangan');
		$this->db->where('status',2);
		 
		// Filter berdasarkan periode
		if (!empty($tgl_start) && !empty($tgl_end)) {
			$this->db->where("created_date BETWEEN '$tgl_start' AND '$tgl_end'");
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

	function get_datatables($tgl_start,$tgl_end)
	{
		$this->_get_datatables_query($tgl_start,$tgl_end);
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($tgl_start,$tgl_end)
	{
		$this->_get_datatables_query($tgl_start,$tgl_end);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($tgl_start,$tgl_end)
	{
		$this->db->from($this->table);
		$this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
		$this->db->join('lapangan', 'transaksi_detail.lapangan_id = lapangan.id_lapangan');
		$this->db->where('status',2);
		// Filter berdasarkan periode
		if (!empty($tgl_start) && !empty($tgl_end)) {
			$this->db->where("created_date BETWEEN '$tgl_start' AND '$tgl_end'");
		}

		return $this->db->count_all_results();
	}

	//end datatable serverside
    public function get_dataEx($tgl_start,$tgl_end) {
		$this->db->from($this->table);
		$this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
		$this->db->join('lapangan', 'transaksi_detail.lapangan_id = lapangan.id_lapangan');
		$this->db->where('status',2);
		 
		// Filter berdasarkan periode
		if (!empty($tgl_start) && !empty($tgl_end)) {
			$this->db->where("created_date BETWEEN '$tgl_start' AND '$tgl_end'");
		}

		$query = $this->db->get();
		return $query->result();
	}

    function get_jam_mulai_terpakai($tanggal, $lapangan_id) {
		// ... (kode sebelumnya)
		
		date_default_timezone_set('Asia/Jakarta');
		$now = date("Y-m-d G:i:s");
		$fiveDaysLater = new DateTime();
		$fiveDaysLater->add(new DateInterval('P5D'));
	
		$sql = "
			SELECT
				jam_mulai, durasi, jam_selesai, created_time, status
			FROM transaksi_detail
			INNER JOIN transaksi ON transaksi_detail.trans_id = transaksi.id_trans
			WHERE tanggal = ? AND lapangan_id = ? 
			AND (status = '1' OR status = '2')
			AND (
				(status = '2') OR 
				(status = '1' AND tipe_trx = '2') OR 
				(
					status = '1' AND tipe_trx = '1' AND 
					TIMESTAMPDIFF(SECOND, transaksi.created_time, '$now') > 0 AND 
					TIMESTAMPDIFF(SECOND, transaksi.created_time, '$now') <= 180
				)
			)
			AND tanggal <= ?
		";
	
		$query = $this->db->query($sql, array($tanggal, $lapangan_id, $fiveDaysLater->format('Y-m-d')));
	
		return $query->result();
	}

	function get_jam_mulai_terpakaiBack($tanggal, $lapangan_id){
        // 		$this->db->select('jam_mulai, durasi, jam_selesai,status');
        // 		$this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
        // 		$this->db->where('tanggal', $tanggal);
        // 		$this->db->where('lapangan_id', $lapangan_id);
        // 			$this->db->where('(status = "1" OR status = "2")'); // Gunakan operator OR untuk status 1 atau 2
        // 		return $query = $this->db->get('transaksi_detail')->result();
        
            date_default_timezone_set('Asia/Jakarta');
            $now = date("Y-m-d G:i:s");

		    $sql = "
				SELECT
					jam_mulai, durasi, jam_selesai, created_time, status
				FROM transaksi_detail
				INNER JOIN transaksi ON transaksi_detail.trans_id = transaksi.id_trans
				WHERE tanggal = ? AND lapangan_id = ? 
				AND (status = '1' OR status = '2')
				AND (
					(status = '2') OR 
					(status = '1' AND tipe_trx = '2') OR 
					(status = '1' AND tipe_trx = '1'  AND  TIMESTAMPDIFF(SECOND, transaksi.created_time, '$now') > 0 AND TIMESTAMPDIFF(SECOND, transaksi.created_time, '$now') <= 180)
				)
			";

			$query = $this->db->query($sql, array($tanggal, $lapangan_id));

			return $query->result();

	}
	
	
	function get_jam_selesai_terpakai($tanggal, $lapangan_id, $jam_selesai) {
		$this->db->select('jam_mulai, durasi, jam_selesai, status');
		$this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
		$this->db->where('tanggal', $tanggal);
		$this->db->where('lapangan_id', $lapangan_id);
		$this->db->where('status', '2');
		$this->db->where('jam_mulai', $jam_selesai);
		$query = $this->db->get('transaksi_detail');
	
		// Menghitung jumlah baris (record) yang dihasilkan
		$num_rows = $query->num_rows();
	
		return $num_rows;
	}
}
