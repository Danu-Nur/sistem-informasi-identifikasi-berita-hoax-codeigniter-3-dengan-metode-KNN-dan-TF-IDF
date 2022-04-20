<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Bobot_Uji extends CI_Model 
{
	public $_table = 'tb_bobot_uji';
    public $idm = 'ID_UJI';

	public function getAll()
    {
        return $this->db->get($this->_table)->result_array();
    }

	public function getAllJoin()
    {
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('tb_data_uji', 'tb_data_uji.ID_DATA_UJI = tb_bobot_uji.ID_DATA_UJI');
        return $this->db->get()->result();
    }

	public function getDistinct()
	{
		$this->db->distinct();
		$this->db->select('ID_DATA_UJI');
		$this->db->from('tb_bobot_kata_uji');
		return $this->db->get()->result_array();
		
	}

	public function getID($id)
	{
		$this->db->distinct();
		$this->db->select('ID_DATA_UJI');
		$this->db->from('tb_bobot_kata_uji');
		$this->db->where('ID_DATA_UJI', $id);
		
		return $this->db->get()->result_array();
		
	}

	public function getBobotTrem($id)
	{
		$this->db->select('BOBOT_KATA_UJI');
		$this->db->from('tb_bobot_kata_uji');
		$this->db->where('ID_DATA_UJI', $id);
		return $this->db->get()->result_array();
		
	}

    public function add($data)
    {
        $this->db->insert($this->_table, $data);
    }

	public function del_data(){
		return $this->db->truncate($this->_table);
	}

}
?>
