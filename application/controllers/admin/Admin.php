<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
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

		if($this->session->userdata('STATUS_USER') != 'ADMIN'){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Anda Belum Login !!!
				</div>');
			redirect('Welcome');
		}
	}
	
	

	public function index($id = null)
	{
		$mdl = $this->M_Metode;
		// $a = $mdl->buatIndexDataset();
		// $b = $mdl->hitungBobotDataset();
		// $hsl = $a+$b;
		$data2 = array(
			'judul' => 'HOME',
			// 'lama' => $hsl,
			// 'lama' => $mdl->buatIndexDataset(),
			// 'lama' => $mdl->hitungBobotDataset(),
			// 'lama' => $mdl->buatIndexKataUji($id),
			// 'lama' => $mdl->hitungKNN($id),
			// 'lama' => $mdl->lanjutKNN($id),
			// 'lama' => $mdl->knnClass(),
			'contents' => 'admin/V_dashboard'
		);
		$this->load->view('template/index',$data2);
		
	}

}

/* End of file Admin.php */
?>
