<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Bobot_Uji extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->model('M_Kata_uji');
			$this->load->model('M_Dataset');
			$this->load->model('M_Metode');

	
			if($this->session->userdata('STATUS_USER') != 'ADMIN'){
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					Anda Belum Login !!!
					</div>');
				redirect('Welcome');
			}  
		}

		public function index()
		{
			$this->M_Metode->buatIndexDataset();

			$this->M_Metode->hitungBobotDataset();

			$mdl = $this->M_Kata_Dataset;

			$data = array(
				'judul' => 'BOBOT KATA DATASET',
				'trem' => $mdl->getAll(),
				'trem2' => $mdl->getAllJoin(),
				'contents' => 'admin/v_kata_dataset'
			);
			
			$this->load->view('template/index',$data);

		}

}

?>
