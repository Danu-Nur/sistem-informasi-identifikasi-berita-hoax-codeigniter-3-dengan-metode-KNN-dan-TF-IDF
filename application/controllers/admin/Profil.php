<?php 
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Profil extends CI_Controller {
 
	public function __construct()
		{
			parent::__construct();
			$this->load->model('M_User');
	
			if($this->session->userdata('STATUS_USER') != 'ADMIN'){
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					Anda Belum Login !!!
					</div>');
				redirect('Welcome');
			}  
		}

		public function rules(){ 
			return [
				['field' => 'USRNAMA',
				'label' => 'Username',
				'rules' => 'required'],
	
				['field' => 'PASWORD',
				'label' => 'Password',
				'rules' => 'required']
			];
		}

	public function index()
	{
		$mdl = $this->M_User;
		$id = $this->session->userdata('ID_USER');
		$data = array(
			'judul' => 'PROFIL AKUN',
			'sub2' => 'EDIT PROFIL AKUN',
			'prof' => $mdl->getAll($id),
			'prof1' => $mdl->getById($id),
			'contents' => 'admin/v_profile'
		);
		$this->load->view('template/index',$data);
	}

	public function edit($ID_USER = NULL)
	{
		if(!isset($ID_USER))
    	{
    		$ID_USER = $this->input->post('ID_USER');
    	}
		if(!isset($ID_USER)) redirect('admin/Profil');
		$mdl = $this->M_User;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$validation->set_rules($this->rules()); 

        if ($validation->run()){
			$data = array(
			'ID_USER' => $ID_USER,
			'EMAIL' => $post['EMAIL'],
			'USRNAMA' => $post['USRNAMA'],
			'PASWORD' => $post['PASWORD'],
			'STATUS_USER' => $post['STATUS_USER'],
		);
		$mdl->edit($data);
		$this->session->set_flashdata('success', 'Berhasil diupdate'); 
		}
		redirect('admin/Profil');
	}

}


?>
