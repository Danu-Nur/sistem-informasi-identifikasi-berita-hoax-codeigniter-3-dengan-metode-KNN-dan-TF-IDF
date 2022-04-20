<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kata_Dataset extends CI_Model 
{
	public $_table = 'tb_bobot_kata_dataset';
    public $idm = 'ID_KATA_DATASET';

	public function getAll()
    {
        return $this->db->get($this->_table)->result_array();
    }

	public function getAllJoin()
    {
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('tb_data_berita', 'tb_data_berita.ID_BERITA = tb_bobot_kata_dataset.ID_BERITA');
        return $this->db->get()->result();
    }

	public function getdetail($id)
    {
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where('ID_BERITA',$id);
        return $this->db->get()->result();
    }

	public function getAnd($id,$kata)
	{
		$query = "SELECT FREK_DATASET FROM tb_bobot_kata_dataset WHERE ID_BERITA = '$id' AND TREM_DATASET = '$kata'";
		return $this->db->query($query);
		
	}
	
	public function getTrem($trem){
        $this->db->select('BOBOT_KATA_DATASET');
		$this->db->from($this->_table);
		$this->db->where('TREM_DATASET', $trem);
		
		return $this->db->get()->result();
		
    }

    public function add($data)
    {
        $this->db->insert($this->_table, $data);
    }

	public function delete($id)
	{        
        return $this->db->delete($this->_table, ['ID_BERITA' => $id]);
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
		$this->db->where('TREM_DATASET',$data);
		return count($this->db->get()->result());
	}

	public function updateBobot($data)
	{
		$this->db->where($this->idm,$data[$this->idm]);
		$this->db->update($this->_table, $data);
	}
}
?>
