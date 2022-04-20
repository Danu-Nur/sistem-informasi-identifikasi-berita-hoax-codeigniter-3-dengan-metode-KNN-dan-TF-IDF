<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_Saran extends CI_Model 
{
	public $_table = 'tb_saran';
    public $idm = 'ID_SARAN';

	public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

	public function getAllJoin()
    {
		
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('tb_user', 'tb_user.ID_USER = tb_saran.ID_USER');
        return $this->db->get()->result();
    }

	public function getAllUser($id){
        $this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('tb_user', 'tb_user.ID_USER = tb_saran.ID_USER');
		$this->db->where('tb_saran.ID_USER', $id);
		
        return $this->db->get()->result();
    } 

    public function add($data)
    {
        $this->db->insert($this->_table, $data);
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

/* End of file M_Admin.php */


 ?>
