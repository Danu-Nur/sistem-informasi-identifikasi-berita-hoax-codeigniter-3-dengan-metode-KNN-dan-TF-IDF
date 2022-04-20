<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Chace extends CI_Model 
{
	public $_table = 'tb_cache';
    public $idm = 'ID_BOBOT_DATASET';

	public function getAll()
    {
        return $this->db->get($this->_table)->result_array();
    }

	public function getLimit($id)
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where('ID_DATA_UJI', $id);
		$this->db->order_by('JARAK_EUCLIDEAN', 'asc');
		$this->db->limit(3);

		return $this->db->get()->result_array();
	}

	public function getDistinctCache()
	{
		$this->db->distinct();
		$this->db->select('ID_DATA_UJI');
		$this->db->from($this->_table);
		return $this->db->get()->result_array();
		
	}

	public function getById($id)
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where('ID_DATA_UJI', $id);
		$this->db->get()->result_array();
	}

	public function getAllJoin()
    {
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('tb_data_berita', 'tb_data_berita.ID_BERITA = tb_bobot_kata_dataset.ID_BERITA');
        return $this->db->get()->result();
    }

	public function getAnd($id)
	{
		$this->db->select('*');
		$this->db->from('tb_bobot_kata_uji');
		$this->db->where('ID_DATA_UJI', $id);
		return $this->db->get()->result_array();
	}
	
	public function getDistinct()
	{
		$this->db->distinct();
		$this->db->select('ID_BERITA');
		$this->db->from('tb_bobot_kata_dataset');
		return $this->db->get()->result_array();
		
	}

	public function getBobotTrem($data)
	{
		$id = $data['ID_BERITA'];
		$trem = $data['TREM_UJI'];

		$query = "SELECT * FROM tb_bobot_kata_dataset
		WHERE ID_BERITA = '$id' AND TREM_DATASET = '$trem' ";
		return $this->db->query($query)->row_array();
		
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
		$this->db->where('ID_BERITA',$data['ID_BERITA']);
		$this->db->where('TREM_DATASET',$data['TREM_DATASET']);
		$this->db->update($this->_table, $data);
	}

	public function getNDoc()
	{
		$this->db->select('*');
		$this->db->from('tb_data_berita');
		return count($this->db->get()->result());
	}

	public function getDF($data)
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where('TREM_DATASET',$data['TREM_DATASET']);
		return count($this->db->get()->result());
	}

	public function updateBobot($data)
	{
		$this->db->where($this->idm,$data[$this->idm]);
		$this->db->update($this->_table, $data);
	}
}
?>
