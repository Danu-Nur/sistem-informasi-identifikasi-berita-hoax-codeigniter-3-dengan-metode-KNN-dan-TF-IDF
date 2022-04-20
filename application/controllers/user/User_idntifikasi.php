<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User_idntifikasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Kata_Dataset');
		$this->load->model('M_Dataset');
		$this->load->model('M_Kata_Uji');
		$this->load->model('M_Keyword');
		$this->load->model('M_Uji');
		$this->load->model('M_User');
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
	
	public function rules(){ 
        return [
			['field' => 'ID_USER',
			'label' => 'id user',
			'rules' => 'required'],

			['field' => 'DATA_UJI',
			'label' => 'data testing',
			'rules' => 'required']
        ];
    }
	public function index($id = null)
	{
		// $this->M_Metode->buatIndexKataUji($id);
		// $this->M_Metode->hitungBobotUji($id);
		// $this->M_Metode->hitungKNN($id);

		$user = $this->session->userdata('ID_USER');

		$iden = $this->M_User->getAllHasil($user);
		
		$data = array(
			'judul' => 'HASIL IDENTIFIKASI',
			'hsl' => $iden,
			'contents' => 'user/v_identifikasi'
		);
		$this->load->view('user/index',$data);
	}

	public function play()
	{
		$mdl = $this->M_Uji;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$validation->set_rules($this->rules());
		if ($validation->run() == FALSE){
			redirect('user/User');
		} else {
			$data = array(
				'ID_USER' => $post['ID_USER'],
				'DATA_UJI' => $post['DATA_UJI'],
			);
			$getId = $mdl->add($data);

			$this->M_Metode->cekKategori($getId);

			redirect('user/User_idntifikasi/detailIdentifikasi/'.$getId);
		}
	}

	public function detailIdentifikasi($id = null)
	{
		$user = $this->session->userdata('ID_USER');
		if(!isset($id))
    	{
    		$id = $this->input->post('id');
    	}
    	if (!isset($id)) redirect('user/User_idntifikasi');

		$data2 = array(
			'ID_USER' => $user,
			'ID_DATA_UJI' => $id,
		);

		$testing = $this->M_User->getdata($data2);
		$bobotKata = $this->M_User->getdatakata($data2);
		$bobotDoc = $this->M_User->getdetailhasil($data2);

		$data = array(
			'judul' => 'HASIL IDENTIFIKASI',
			'berita' => 'Data Testing',
			'hsl' => $testing,
			'tabel' => 'Bobot Kata TF.IDF',
			'hsl2' => $bobotKata,
			'jarak' => 'Hasil Perhitungan K-NN ( K = '.count($bobotDoc).' )',
			'hsl3' => $bobotDoc,
			'contents' => 'user/v_detail_identifikasi'
		);
		$this->load->view('user/index',$data);
		
	}

	public function delete($id = NULL)
		{
			if (!isset($id)) show_404();                  
			$this->M_Identifikasi->deleteUji($id);
			$this->M_Identifikasi_detail->deleteUji($id);
			$this->M_Kata_Uji->deleteUji($id);
			$this->M_Uji->delete($id);
			
			redirect('user/User_idntifikasi');         
			
		}

}


?>
