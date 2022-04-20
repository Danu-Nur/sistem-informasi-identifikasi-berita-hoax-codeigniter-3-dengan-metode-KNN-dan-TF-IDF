<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model 
{
	public $_table = 'tb_user';
    public $idm = 'ID_USER';

	public function cek_login()
	{
		$USRNAMA = set_value('USRNAMA');
		$PASWORD = set_value('PASWORD');

		$result   = $this->db->where('USRNAMA',$USRNAMA)
							->where('PASWORD',$PASWORD)
							->limit(1)
							->get('tb_user');

		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return array();
		}
	}

	public function add($data)
    {
        $this->db->insert($this->_table, $data);
    }
}

?>
