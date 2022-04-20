<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class M_User extends CI_Model 
	{
	public $_table = 'tb_user';
    public $idm = 'ID_USER';

	public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

	public function getById($id){
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where($this->idm, $id);
		
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

	public function getAllHasil($id)
    {
		$this->db->select('*');
		$this->db->from('tb_identifikasi');
		$this->db->join('tb_data_uji', 'tb_data_uji.ID_DATA_UJI = tb_identifikasi.ID_DATA_UJI');
		$this->db->join('tb_user', 'tb_user.ID_USER = tb_data_uji.ID_USER');
		$this->db->where('tb_user.ID_USER', $id);
        return $this->db->get()->result();
    }

	public function getdata($data)
	{
		$this->db->select('*');
		$this->db->from('tb_identifikasi');
		$this->db->join('tb_data_uji', 'tb_data_uji.ID_DATA_UJI = tb_identifikasi.ID_DATA_UJI');
		$this->db->join('tb_user', 'tb_user.ID_USER = tb_data_uji.ID_USER');
		$this->db->where('tb_user.ID_USER', $data['ID_USER']);
		$this->db->where('tb_identifikasi.ID_DATA_UJI', $data['ID_DATA_UJI']);
		return $this->db->get()->result();
	}

	public function getdatakata($data)
	{
		$this->db->select('*');
		$this->db->from('tb_bobot_kata_uji');
		$this->db->join('tb_data_uji', 'tb_data_uji.ID_DATA_UJI = tb_bobot_kata_uji.ID_DATA_UJI');
		$this->db->join('tb_user', 'tb_user.ID_USER = tb_data_uji.ID_USER');
		$this->db->where('tb_user.ID_USER', $data['ID_USER']);
		$this->db->where('tb_bobot_kata_uji.ID_DATA_UJI', $data['ID_DATA_UJI']);
		return $this->db->get()->result();
	}

	public function getdetailhasil($data)
	{
		$this->db->select('*');
		$this->db->from('tb_detail_identifikasi');
		$this->db->join('tb_data_berita', 'tb_data_berita.ID_BERITA = tb_detail_identifikasi.ID_BERITA');
		$this->db->join('tb_data_uji', 'tb_data_uji.ID_DATA_UJI = tb_detail_identifikasi.ID_DATA_UJI');
		$this->db->join('tb_user', 'tb_user.ID_USER = tb_data_uji.ID_USER');
		$this->db->where('tb_user.ID_USER', $data['ID_USER']);
		$this->db->where('tb_detail_identifikasi.ID_DATA_UJI', $data['ID_DATA_UJI']);
		return $this->db->get()->result();
	}
}

?>
