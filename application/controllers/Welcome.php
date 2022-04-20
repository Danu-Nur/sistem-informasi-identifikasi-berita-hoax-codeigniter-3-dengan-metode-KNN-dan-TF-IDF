<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct()     
	{         
		parent::__construct();         
		$this->load->model("M_login");       
		$this->load->library('form_validation');     
	} 

	public function index()
	{
		$this->form_validation->set_rules('USRNAMA', 'USERNAME', 'required',['required' => 'Username wajib diisi !!!']);
		$this->form_validation->set_rules('PASWORD', 'PASSWORD', 'required',['required' => 'Password wajib diisi !!!']);
		if($this->form_validation->run()==FALSE)
		{
			$data = array(
				'judul' => 'LOGIN'
			);
			$this->load->view('v_login',$data);
		}else{
			$auth = $this->M_login->cek_login();
			if($auth == FALSE)
			{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					Username atau Password anda salah !!! </div>');
				redirect('Welcome');
			}else{
				$array = array(
					'ID_USER' => $auth->ID_USER,
					'USRNAMA'=> $auth->USRNAMA,
					'STATUS_USER'=> $auth->STATUS_USER );
				
				$this->session->set_userdata( $array );
				

				switch ($auth->STATUS_USER) {
					case 'ADMIN' : redirect('admin/Admin');
						break;
					
					case 'USER' : redirect('user/User');
						break;

						default : ;break;
				}
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Welcome');
	}

	public function rules(){ 
        return [
			['field' => 'EMAIL',
			'label' => 'Email',
			'rules' => 'required'],

			['field' => 'USRNAMA',
			'label' => 'Usernama',
			'rules' => 'required'],

			['field' => 'PASWORD',
			'label' => 'Password',
			'rules' => 'required']
        ];
    }

    public function regis()
    {
		$mdl = $this->M_login;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$data = array(
			'judul' => 'REGISTRASI'
		);
		
		$validation->set_rules($this->rules());
		if ($validation->run() == FALSE){
			$this->load->view('v_regis',$data);
		} else {
			$data = array(
				'EMAIL' => $post['EMAIL'],
				'USRNAMA' => $post['USRNAMA'],
				'PASWORD' => $post['PASWORD'],
			);
			$mdl->add($data);
			$this->session->set_flashdata('success', 'Registrasi Berhasil');
			redirect('Welcome');
		}
	}
}
