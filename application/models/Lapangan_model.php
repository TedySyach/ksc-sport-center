<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lapangan_model extends CI_Model
{
  public $table = 'lapangan';
  public $cabor_table = 'cabor';
  public $id    = 'id_lapangan';
  public $order = 'DESC';

	function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

  function get_all()
  {
    $this->db->order_by('nama_lapangan','ASC');
    return $this->db->get($this->table)->result();
  }
  
   function get_allJoin()
  {
    $this->db->order_by('id_lapangan','ASC');
    $this->db->join($this->cabor_table, 'lapangan.id_cabor = cabor.id_cabor', 'left'); // Adjust the join condition
    return $this->db->get($this->table)->result();
  }
  
  function get_allApi($id = null)
  {

        if ($id === null) {

          $query = "SELECT id_lapangan,nama_lapangan,harga,CONCAT('http://localhost/futsal/assets/images/lapangan/',foto) as foto
          from $this->table order by nama_lapangan asc 
          ";
   
        } else {
          $query = "SELECT id_lapangan,nama_lapangan,harga,CONCAT('http://localhost/futsal/assets/images/lapangan/',foto) as foto
          from $this->table where id_lapangan = '$id' order by nama_lapangan asc 
          ";
        }

        return $this->db->query($query)->result_array();
   
  }

  function get_allApiBySyc($id = null)
  {

        if ($id === null) {

          $query = "SELECT id_lapangan,nama_lapangan,harga,CONCAT('http://localhost/futsal/assets/images/lapangan/',foto) as foto
          from $this->table order by nama_lapangan asc 
          ";
   
        } else {
          $query = "SELECT lapangan.id_lapangan, lapangan.nama_lapangan, lapangan.harga, 
          CONCAT('http://localhost/futsal/assets/images/lapangan/', lapangan.foto) as foto
          FROM $this->table AS lapangan
          JOIN synchronization_plat ON lapangan.id_sycPlat = synchronization_plat.id_syc
          WHERE synchronization_plat.id_merchat_upos = '$id'
          ORDER BY lapangan.nama_lapangan ASC";

        }

        return $this->db->query($query)->result_array();
   
  }

  function get_allApiOrg($id = null)
  {

        if ($id === null) {

          $query = "SELECT id_lapangan,nama_lapangan,harga,CONCAT('http://localhost/futsal/assets/images/lapangan/',foto) as foto
          from $this->table order by nama_lapangan asc 
          ";
   
        } else {
          $query = "SELECT lapangan.id_lapangan, lapangan.nama_lapangan, lapangan.harga, 
          CONCAT('http://localhost/futsal/assets/images/lapangan/', lapangan.foto) as foto
          FROM $this->table AS lapangan
          JOIN synchronization_plat ON lapangan.id_sycPlat = synchronization_plat.id_syc
          WHERE synchronization_plat.id_organize_daftarin = '$id'
          ORDER BY lapangan.nama_lapangan ASC";

        }

        return $this->db->query($query)->result_array();
   
  }

  function get_all_home()
  {
    $this->db->order_by('nama_lapangan', 'ASC');
    return $this->db->get($this->table)->result();
  }
  
   function get_all_homeByid($id= null)
  {
    $this->db->order_by('nama_lapangan', 'ASC');
    $this->db->where('id_cabor', $id);
    return $this->db->get($this->table)->result();
  }

  function ambil_lapangan()
  {
    $this->db->order_by('nama_lapangan', 'ASC');
  	$data=$this->db->get('lapangan');
  	if($data->num_rows()>0)
    {
  		foreach ($data->result_array() as $row)
			{
				$result['']= '- Pilih Lapangan -';
				$result[$row['id_lapangan']]= ucwords(strtolower($row['nama_lapangan']));
			}
			return $result;
		}
	}

  function ambil_subkat($kat)
  {
    $this->db->where('id_kat',$kat);
  	// $this->db->order_by('judul_subkat','asc');
  	$sql_subkat=$this->db->get('sublapangan');
  	if($sql_subkat->num_rows()>0)
    {
  		foreach ($sql_subkat->result_array() as $row)
      {
        $result[$row['id_sublapangan']]= ucwords(strtolower($row['judul_sublapangan']));
      }
      return $result;
    }
    // else
    // {
		//   $result['-']= '- Belum Ada Sub Lapangan -';
		// }
    // return $result;
	}

  function ambil_sublapangan($kat_id)
  {
  	$this->db->where('id_kat',$kat_id);
  	$this->db->order_by('judul_sublapangan','asc');
  	$sql=$this->db->get('sublapangan');
  	if($sql->num_rows()>0)
    {
  		foreach ($sql->result_array() as $row)
      {
        $result[$row['id_sublapangan']]= ucwords(strtolower($row['judul_sublapangan']));
      }
    }
    else
    {
		  $result['-']= '- Belum Ada SubLapangan -';
		}
    return $result;
	}

  function ambil_supersubkat($subkat_id)
  {
  	$this->db->where('id_subkat',$subkat_id);

  	$sql=$this->db->get('supersublapangan');
  	if($sql->num_rows()>0)
    {
  		foreach ($sql->result_array() as $row)
      {
        $result[$row['id_supersublapangan']]= ucwords(strtolower($row['judul_supersublapangan']));
      }
    }
    else
    {
		  $result['-']= '- Belum Ada SuperSubLapangan -';
		}
    return $result;
	}

  function ambil_supersublapangan($subkat_id)
  {
  	$this->db->where('id_subkat',$subkat_id);

  	$sql=$this->db->get('supersublapangan');
  	if($sql->num_rows()>0)
    {
  		foreach ($sql->result_array() as $row)
      {
        $result[$row['id_supersublapangan']]= ucwords(strtolower($row['judul_supersublapangan']));
      }
    }
    else
    {
		  $result['-']= '- Belum Ada SuperSubLapangan -';
		}
    return $result;
	}

  function get_list_by_lapangan($slug, $limit=null, $offset=null)
  {
    $this->db->join('lapangan', 'produk.kat_id=lapangan.id_lapangan');
    $this->db->where('lapangan.slug_kat', $slug);
    $this->db->limit($limit, $offset);

    return $this->db->get('produk');
  }

  function get_by_lapangan_nr($slug)
  {
    $this->db->join('lapangan', 'produk.kat_id=lapangan.id_lapangan');
    $this->db->where('lapangan.slug_kat', $slug);

    return $this->db->get('produk')->num_rows();
  }

  function get_list_by_sublapangan($slug, $limit=null, $offset=null)
  {
    $this->db->join('sublapangan', 'produk.subkat_id=sublapangan.id_sublapangan');
    $this->db->where('sublapangan.slug_subkat', $slug);
    $this->db->limit($limit, $offset);

    return $this->db->get('produk');
  }

  function get_by_sublapangan_nr($slug)
  {
    $this->db->join('sublapangan', 'produk.subkat_id=sublapangan.id_sublapangan');
    $this->db->where('sublapangan.slug_subkat', $slug);

    return $this->db->get('produk')->num_rows();
  }

  function get_list_by_superslapangan($slug, $limit=null, $offset=null)
  {
    $this->db->join('supersublapangan', 'produk.supersubkat_id=supersublapangan.id_supersublapangan');
    $this->db->where('supersublapangan.slug_supersubkat', $slug);
    $this->db->limit($limit, $offset);

    return $this->db->get('produk');
  }

  function get_by_superslapangan_nr($slug)
  {
    $this->db->join('supersublapangan', 'produk.supersubkat_id=supersublapangan.id_supersublapangan');
    $this->db->where('supersublapangan.slug_supersubkat', $slug);

    return $this->db->get('produk')->num_rows();
  }

  function get_all_new_home()
  {
    $this->db->limit(4);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_all_lapangan_sidebar()
  {
    $this->db->order_by('judul_lapangan', 'asc');
    return $this->db->get($this->table)->result();
  }

  function get_total_row_lapangan()
  {
    return $this->db->get($this->table)->count_all_results();
  }

  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->row();
  }
  function get_by_id1($id)
  {
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->row_array();
  }

  function get_by_id_front($id)
  {
    $this->db->from('produk');
    $this->db->where('slug_subkat', $id);
    $this->db->join('sublapangan', 'produk.subkat_id = sublapangan.id_sublapangan');
    $this->db->order_by('id_produk','desc');
    return $this->db->get();
  }

  // get total rows
  function total_rows()
  {
    return $this->db->get($this->table)->num_rows();
  }

  function insert($data)
  {
    $this->db->insert($this->table, $data);
  }

  function update($id, $data)
  {
    $this->db->where($this->id,$id);
    $this->db->update($this->table, $data);
  }

  function delete($id)
  {
    $this->db->where($this->id, $id);
    $this->db->delete($this->table);
  }

  function del_by_id($id)
  {
    $this->db->select("foto");
    $this->db->where($this->id,$id);
    return $this->db->get($this->table)->row();
  }

}
