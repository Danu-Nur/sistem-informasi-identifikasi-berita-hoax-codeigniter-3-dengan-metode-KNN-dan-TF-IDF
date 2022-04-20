<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Identifikasi_detail extends CI_Model 
{
	public $_table = 'tb_detail_identifikasi';
    public $idm = 'ID_DETAIL';

	public function getAll()
    {
        return $this->db->get($this->_table)->result_array();
    }

	public function getAllJoin()
    {
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('tb_data_berita', 'tb_data_berita.ID_BERITA = tb_detail_identifikasi.ID_BERITA');
		$this->db->join('tb_data_uji', 'tb_data_uji.ID_DATA_UJI = tb_detail_identifikasi.ID_DATA_UJI');
		$this->db->group_by('tb_data_uji.ID_DATA_UJI');
		
        return $this->db->get()->result();
    }

	public function getById($id)
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('tb_data_berita', 'tb_data_berita.ID_BERITA = tb_detail_identifikasi.ID_BERITA');
		$this->db->join('tb_data_uji', 'tb_data_uji.ID_DATA_UJI = tb_detail_identifikasi.ID_DATA_UJI');
		$this->db->where('tb_detail_identifikasi.ID_DATA_UJI', $id);
		$this->db->order_by('tb_detail_identifikasi.JARAK_EUCLIDEAN', 'asc');
		// $this->db->limit(1);
		return $this->db->get()->row_array();
	}

	public function getdetail($id)
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('tb_data_berita', 'tb_data_berita.ID_BERITA = tb_detail_identifikasi.ID_BERITA');
		$this->db->join('tb_data_uji', 'tb_data_uji.ID_DATA_UJI = tb_detail_identifikasi.ID_DATA_UJI');
		$this->db->where('tb_detail_identifikasi.ID_DATA_UJI', $id);
		return $this->db->get()->result();
	}

	public function getDistinct()
	{
		$this->db->distinct();
		$this->db->select('ID_DATA_UJI');
		$this->db->from($this->_table);
		return $this->db->get()->result_array();
		
	}

	public function cekData($data)
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where('ID_DATA_UJI', $data['ID_DATA_UJI']);
		$this->db->where('ID_BERITA', $data['ID_BERITA']);
		// $this->db->where('JARAK_EUCLIDEAN', $data['JARAK_EUCLIDEAN']);
		
		return count($this->db->get()->result());
		
	}

    public function add($data)
    {
        $this->db->insert($this->_table, $data);
    }

	public function updateData($data)
	{
		$this->db->where('ID_DATA_UJI', $data['ID_DATA_UJI']);
		$this->db->where('ID_BERITA', $data['ID_BERITA']);
		$this->db->update($this->_table, $data);
	}

	public function delete($id)
	{        
        return $this->db->delete($this->_table, ['ID_BERITA' => $id]);     
    }

	public function deleteUji($id)
	{        
        return $this->db->delete($this->_table, ['ID_DATA_UJI' => $id]);
    }

	public function del_data()
	{
		$this->db->truncate($this->_table);
		
	}

}
?>
