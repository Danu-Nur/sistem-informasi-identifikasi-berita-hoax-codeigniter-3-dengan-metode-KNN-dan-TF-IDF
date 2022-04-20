<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Identifikasi extends CI_Model 
{
	public $_table = 'tb_identifikasi';
    public $idm = 'ID_IDENTIFIKASI';

	public function getAll()
    {
        return $this->db->get($this->_table)->result_array();
    }

	public function getAllJoin()
    {
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('tb_data_uji', 'tb_data_uji.ID_DATA_UJI = tb_identifikasi.ID_DATA_UJI');
		
        return $this->db->get()->result();
    }

	public function getdetail($id)
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('tb_data_uji', 'tb_data_uji.ID_DATA_UJI = tb_identifikasi.ID_DATA_UJI');
		$this->db->where('tb_identifikasi.ID_DATA_UJI', $id);
		return $this->db->get()->result();
	}

	public function getById($id)
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('tb_data_uji', 'tb_data_uji.ID_DATA_UJI = tb_identifikasi.ID_DATA_UJI');
		$this->db->where('ID_DATA_UJI', $id);
		return $this->db->get()->result_array();
	}

	public function cekData($data)
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where('ID_DATA_UJI', $data['ID_DATA_UJI']);
		
		return count($this->db->get()->result());
		
	}

    public function add($data)
    {
        $this->db->insert($this->_table, $data);
    }

	public function updateData($data)
	{
		$this->db->where('ID_DATA_UJI', $data['ID_DATA_UJI']);
		$this->db->update($this->_table, $data);
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
