<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_Uji extends CI_Model 
{
	public $_table = 'tb_data_uji';
    public $idm = 'ID_DATA_UJI';

	public function getAll()
    {
        return $this->db->get($this->_table)->result_array();
    }

	public function getAllJoin()
    {
		
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('tb_user', 'tb_user.ID_USER = tb_data_uji.ID_USER');
        return $this->db->get()->result();
    }

	public function getById($id)
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where('ID_DATA_UJI', $id);
		return $this->db->get()->result_array();
	}

    public function cekK($data)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('ID_DATA_UJI',$data['ID_DATA_UJI']);
        $this->db->where($data['DATA_UJI']);
        // $this->db->like('DATA_UJI', $data['DATA_UJI']);
        
        return count($this->db->get()->result());
        
        // $query = "SELECT count(*) FROM tb_data_uji WHERE $gabung";
        // return $this->db->query($query);
        
    }

    public function add($data)
    {
        $this->db->insert($this->_table, $data);
		return $this->db->insert_id();
    }

	public function delete($id)
	{        
        return $this->db->delete($this->_table, [$this->idm => $id]);     
    }

    public function edit($data)
    {
        $this->db->where($this->idm, $data[$this->idm]);
        $this->db->update($this->_table, $data);
    }
}

?>
