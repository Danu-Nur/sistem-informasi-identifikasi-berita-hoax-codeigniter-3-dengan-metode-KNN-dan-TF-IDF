<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('M_Kata_Dataset');
		$this->load->model('M_Dataset');
		$this->load->model('M_Kata_Uji');
		$this->load->model('M_Uji');
		$this->load->model('M_Chace');
		$this->load->model('M_Bobot_Uji');
		$this->load->model('M_Metode');
		$this->load->model('M_Identifikasi');
		$this->load->model('M_Identifikasi_detail');

		if($this->session->userdata('STATUS_USER') != 'USER'){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Anda Belum Login !!!
				</div>');
			redirect('Welcome');
		}
	}
	
	

	public function index()
	{
		$data2 = array(
			'judul' => 'HOME',
			'contents' => 'user/V_dashboard'
		);
		$this->load->view('user/index',$data2);
		
	}

}

/* End of file Admin.php */
?>
