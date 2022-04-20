<?php 
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class User_saran extends CI_Controller {

	 public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Saran');

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
			'label' => 'ID User',
			'rules' => 'required'],

			['field' => 'SARAN',
			'label' => 'saran',
			'rules' => 'required']
        ];
    }

    public function index()
    {
		$id = $this->session->userdata('ID_USER');
		$mdl = $this->M_Saran;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$data = array(
			'judul' => 'FEEDBACK',
			'sub' => 'Tambah Pesan',
			'sub2' => 'Edit Pesan',
			'sar' => $mdl->getAllUser($id),
			'contents' => 'user/v_saran'
		);
		
		$validation->set_rules($this->rules());
		if ($validation->run() == FALSE){
			$this->load->view('user/index',$data);
		} else {
			$data = array(
				'ID_USER' => $post['ID_USER'],
				'SARAN' => $post['SARAN'],
			);
			$mdl->add($data);
			$this->session->set_flashdata('success', 'Pesan Berhasil Dikirim');
			redirect('user/User_saran');
		}
	}

	public function edit($ID_SARAN = NULL)
	{
		if(!isset($ID_SARAN))
    	{
    		$ID_SARAN = $this->input->post('ID_SARAN');
    	}
		if(!isset($ID_SARAN)) redirect('user/User_saran');
		$mdl = $this->M_Saran;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$validation->set_rules($this->rules()); 

        if ($validation->run()){
			$data = array(
			'ID_SARAN' => $ID_SARAN,
			'ID_USER' => $post['ID_USER'],
			'SARAN' => $post['SARAN'],
		);
		$mdl->edit($data);
		$this->session->set_flashdata('success', 'Pesan Berhasil Diedit'); 
		}
		redirect('user/User_saran');
	}

	public function delete($id = NULL)
	{
		if (!isset($id)) show_404();                  
    	if ($this->M_Saran->delete($id)) 
    		{             
    			redirect('admin/Saran');         
    		}     
    } 

}

?>
