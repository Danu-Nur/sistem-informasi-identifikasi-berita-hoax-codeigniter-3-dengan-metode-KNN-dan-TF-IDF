<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dataset extends CI_Model 
{
	public $_table = 'tb_data_berita';
    public $idm = 'ID_BERITA';

	public function getAll()
    {
        return $this->db->get($this->_table)->result_array();
    }

	public function getAllJoin()
    {
		
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('tb_user', 'tb_user.ID_USER = tb_data_berita.ID_USER');
		$this->db->join('tb_keyword', 'tb_keyword.ID_KEYWORD = tb_data_berita.ID_KEYWORD');
		
        return $this->db->get()->result();
    }

	public function getById($id){
        return $this->db->get_where($this->_table, ['ID_BERITA' => $id])->row();
    } 

	public function getdetail($id)
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('tb_keyword', 'tb_keyword.ID_KEYWORD = tb_data_berita.ID_KEYWORD');
		$this->db->where('tb_data_berita.ID_BERITA', $id);

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

?>
