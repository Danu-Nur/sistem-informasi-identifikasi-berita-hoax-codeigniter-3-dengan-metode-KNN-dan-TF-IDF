<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_User extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
		$this->load->library('form_validation');

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
		$validation = $this->form_validation;
		$post = $this->input->post();
		$data = array(
			'judul' => 'DATA USER',
			'sub' => 'Tambah Data',
			'sub2' => 'Edit Data',
			'usr' => $mdl->getAll(),
			'contents' => 'admin/v_user'
		);
		
		$validation->set_rules($this->rules());
		if ($validation->run() == FALSE){
			$this->load->view('template/index',$data);
		} else {
			$data = array(
				'EMAIL' => $post['EMAIL'],
				'USRNAMA' => $post['USRNAMA'],
				'PASWORD' => $post['PASWORD'],
				'STATUS_USER' => $post['STATUS_USER'],);
			$mdl->add($data);
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect('admin/Data_User');
		}
	}

	public function edit($ID_USER = NULL)
	{
		if(!isset($ID_USER))
    	{
    		$ID_USER = $this->input->post('ID_USER');
    	}
		if(!isset($ID_USER)) redirect('admin/Data_User');
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
		redirect('admin/Data_User');
	}

	public function delete($id = NULL)
	{
		if (!isset($id)) show_404();                  
    	if ($this->M_User->delete($id)) 
    		{             
    			redirect('admin/Data_User');         
    		}     
    } 
}


?>
