<?php 
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Saran extends CI_Controller {

	 public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Saran');

		if($this->session->userdata('STATUS_USER') != 'ADMIN'){
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
		$mdl = $this->M_Saran;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$data = array(
			'judul' => 'FEEDBACK',
			'sub' => 'Tambah Data',
			'sub2' => 'Edit Data',
			'sar' => $mdl->getAllJoin(),
			'contents' => 'admin/v_saran'
		);
		
		$validation->set_rules($this->rules());
		if ($validation->run() == FALSE){
			$this->load->view('template/index',$data);
		} else {
			$data = array(
				'ID_USER' => $post['ID_USER'],
				'SARAN' => $post['SARAN'],
			);
			$mdl->add($data);
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect('admin/Saran');
		}
	}

	public function edit($ID_SARAN = NULL)
	{
		if(!isset($ID_SARAN))
    	{
    		$ID_SARAN = $this->input->post('ID_SARAN');
    	}
		if(!isset($ID_SARAN)) redirect('admin/Saran');
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
		$this->session->set_flashdata('success', 'Berhasil diupdate'); 
		}
		redirect('admin/Saran');
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
