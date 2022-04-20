<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kata_Uji extends CI_Model 
{
	public $_table = 'tb_bobot_kata_uji';
    public $idm = 'ID_KATA_UJI';

	public function getAll()
    {
        return $this->db->get($this->_table)->result_array();
    }

	public function getById($id)
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where('ID_DATA_UJI', $id);
		return $this->db->get()->result_array();
	}

	public function getdetail($id)
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where('ID_DATA_UJI', $id);
		return $this->db->get()->result();
	}

	public function getAllJoin()
    {
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('tb_data_uji', 'tb_data_uji.ID_DATA_UJI = tb_bobot_kata_uji.ID_DATA_UJI');
        return $this->db->get()->result();
    }

	public function getAnd($id,$kata)
	{
		$query = "SELECT FREK_UJI FROM tb_bobot_kata_uji WHERE ID_DATA_UJI = '$id' AND TREM_UJI = '$kata'";
		return $this->db->query($query);
		
	}

	public function getDF($data)
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where('TREM_UJI',$data['TREM_DATASET']);
		return count($this->db->get()->result());
	}

    public function add($data)
    {
        $this->db->insert($this->_table, $data);
    }


	public function deleteUji($id)
	{        
        return $this->db->delete($this->_table, ['ID_DATA_UJI' => $id]);
    }

	public function del_data(){
		return $this->db->truncate($this->_table);
	}

	public function updateData($data)
	{
		$this->db->where('ID_DATA_UJI',$data['ID_DATA_UJI']);
		$this->db->where('TREM_UJI',$data['TREM_UJI']);
		$this->db->update($this->_table, $data);
	}

	public function updateBobot($data)
	{
		$this->db->where($this->idm,$data[$this->idm]);
		$this->db->update($this->_table, $data);
	}
}
?>
