<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Data_Uji extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Uji');
		$this->load->model('M_Kata_Uji');
		$this->load->model('M_Chace');
		$this->load->model('M_Identifikasi');
		$this->load->model('M_Identifikasi_detail');

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

			['field' => 'DATA_UJI',
			'label' => 'DATA UJI',
			'rules' => 'required']
		];
	}

	public function index()
	{
		$mdl = $this->M_Uji;
		$validation = $this->form_validation;
		$post = $this->input->post();
		
		$data = array(
			'judul' => 'DATA TESTING',
			'sub' => 'Tambah Data',
			'sub2' => 'Edit Data',
			'datji' => $mdl->getAllJoin(),
			'contents' => 'admin/v_data_uji'
		);
		
		$validation->set_rules($this->rules());
		if ($validation->run() == FALSE){
			$this->load->view('template/index',$data);
		} else {
			$data = array(
				'ID_USER' => $post['ID_USER'],
				'DATA_UJI' => $post['DATA_UJI'],
			);
			$mdl->add($data);
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect('admin/Data_Uji');
		}
	}

	public function edit($ID_DATA_UJI = NULL)
	{
		if(!isset($ID_DATA_UJI))
		{
			$ID_DATA_UJI = $this->input->post('ID_DATA_UJI');
		}
		if(!isset($ID_DATA_UJI)) redirect('admin/Data_Uji');
		$mdl = $this->M_Uji;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$validation->set_rules($this->rules()); 

		if ($validation->run()){
			$data = array(
			'ID_DATA_UJI' => $ID_DATA_UJI,
			'ID_USER' => $post['ID_USER'],
			'DATA_UJI' => $post['DATA_UJI'],
		);
		$mdl->edit($data);
		$this->session->set_flashdata('success', 'Berhasil diupdate'); 
		}
		redirect('admin/Data_Uji');
	}

	public function delete($id = NULL)
	{
		if (!isset($id)) show_404();
		$this->M_Identifikasi->deleteUji($id);
		$this->M_Identifikasi_detail->deleteUji($id);
		$this->M_Chace->deleteUji($id);
		$this->M_Kata_Uji->deleteUji($id);
		$this->M_Uji->delete($id); 

		redirect('admin/Data_Uji');         
		
	} 
 
 }
 
 /* End of file Data_Uji.php */
 
?>
