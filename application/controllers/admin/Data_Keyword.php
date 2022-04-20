<?php 
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Data_Keyword extends CI_Controller {
 
	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Keyword');
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
			['field' => 'KEYWORDS',
			'label' => 'Keywords',
			'rules' => 'required']
        ];
    }

    public function index()
    {
		$mdl = $this->M_Keyword;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$data = array(
			'judul' => 'DATA KEYWORDS',
			'sub' => 'Tambah Data',
			'sub2' => 'Edit Data',
			'keyw' => $mdl->getAll2(),
			'contents' => 'admin/v_keyword'
		);
		
		$validation->set_rules($this->rules());
		if ($validation->run() == FALSE){
			$this->load->view('template/index',$data);
		} else {
			$data = array(
				'KEYWORDS' => $post['KEYWORDS'],);
			$mdl->add($data);
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect('admin/Data_Keyword');
		}
	}

	public function edit($ID_KEYWORD = NULL)
	{
		if(!isset($ID_KEYWORD))
    	{
    		$ID_KEYWORD = $this->input->post('ID_KEYWORD');
    	}
		if(!isset($ID_KEYWORD)) redirect('admin/Data_Keyword');
		$mdl = $this->M_Keyword;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$validation->set_rules($this->rules()); 

        if ($validation->run()){
			$data = array(
			'ID_KEYWORD' => $ID_KEYWORD,
			'KEYWORDS' => $post['KEYWORDS'],
		);
		$mdl->edit($data);
		$this->session->set_flashdata('success', 'Berhasil diupdate'); 
		}
		redirect('admin/Data_Keyword');
	}

	public function delete($id = NULL)
	{
		if (!isset($id)) show_404();                  
    	if ($this->M_Keyword->delete($id)) 
    		{             
    			redirect('admin/Data_Keyword');         
    		}     
    } 
}

?>
