<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dataset extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('M_Dataset');
			$this->load->model('M_Metode');
			$this->load->model('M_Keyword');
			$this->load->model('M_Kata_Dataset');
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
	
				['field' => 'ID_KEYWORD',
				'label' => 'ID KEYWORD',
				'rules' => 'required'],

				['field' => 'SUMBER',
				'label' => 'Sumber',
				'rules' => 'required'],

				['field' => 'BERITA',
				'label' => 'Berita',
				'rules' => 'required']
			];
		}
	
		public function index()
		{
			$mdl = $this->M_Dataset;
			$mdl2 = $this->M_Keyword;
			$validation = $this->form_validation;
			$post = $this->input->post();
			$data = array(
				'judul' => 'DATASET BERITA',
				'sub' => 'Tambah Data',
				'sub2' => 'Edit Data',
				'datber' => $mdl->getAllJoin(),
				'kw' => $mdl2->getAll(),
				'contents' => 'admin/v_dataset_berita'
			);
			
			$validation->set_rules($this->rules());
			if ($validation->run() == FALSE){
				$this->load->view('template/index',$data);
			} else {
				$data = array(
					'ID_USER' => $post['ID_USER'],
					'ID_KEYWORD' => $post['ID_KEYWORD'],
					'SUMBER' => $post['SUMBER'],
					'BERITA' => $post['BERITA'],
					'STATUS_BERITA' => $post['STATUS_BERITA'],
				);
				$mdl->add($data);
				$this->session->set_flashdata('success', 'Berhasil disimpan');
				$this->hitungTFIDF();
			}
		}

		public function hitungTFIDF()
		{
			$this->M_Metode->buatIndexDataset();
			$this->M_Metode->hitungBobotDataset();
			redirect('admin/Dataset');
		}

		public function detailData($id = null)
		{	
			$mdl = $this->M_Dataset;
			$mdl2 = $this->M_Kata_Dataset;
			$mdl3 = $this->M_Keyword;
			$data = array(
				'judul' => 'DETAIL DATASET',
				'berita' => 'DATA TRAINING',
				'sub2' => 'Edit Data',
				'ber' => $mdl->getdetail($id),
				'kw' => $mdl3->getAll(),
				'tabel' => 'BOBOT KATA DATASET',
				'bobot' => $mdl2->getdetail($id),
				'contents' => 'admin/v_detail_dataset'
			);
			$this->load->view('template/index',$data);
		}

		public function editdetail($ID_BERITA = NULL)
		{
			if(!isset($ID_BERITA))
			{
				$ID_BERITA = $this->input->post('ID_BERITA');
			}
			if(!isset($ID_BERITA)) redirect('admin/Dataset/detailData/'.$ID_BERITA);
			$mdl = $this->M_Dataset;
			$validation = $this->form_validation;
			$post = $this->input->post();
			$validation->set_rules($this->rules()); 
	
			if ($validation->run()){
				$data = array(
				'ID_BERITA' => $ID_BERITA,
				'ID_USER' => $post['ID_USER'],
				'ID_KEYWORD' => $post['ID_KEYWORD'],
				'SUMBER' => $post['SUMBER'],
				'BERITA' => $post['BERITA'],
				'STATUS_BERITA' => $post['STATUS_BERITA']
			);
			$mdl->edit($data);
			$this->session->set_flashdata('success', 'Berhasil diupdate'); 
			}
			redirect('admin/Dataset/detailData/'.$ID_BERITA);
		}
	
		public function edit($ID_BERITA = NULL)
		{
			if(!isset($ID_BERITA))
			{
				$ID_BERITA = $this->input->post('ID_BERITA');
			}
			if(!isset($ID_BERITA)) redirect('admin/Dataset');
			$mdl = $this->M_Dataset;
			$validation = $this->form_validation;
			$post = $this->input->post();
			$validation->set_rules($this->rules()); 
	
			if ($validation->run()){
				$data = array(
				'ID_BERITA' => $ID_BERITA,
				'ID_USER' => $post['ID_USER'],
				'ID_KEYWORD' => $post['ID_KEYWORD'],
				'SUMBER' => $post['SUMBER'],
				'BERITA' => $post['BERITA'],
				'STATUS_BERITA' => $post['STATUS_BERITA']
			);
			$mdl->edit($data);
			$this->session->set_flashdata('success', 'Berhasil diupdate'); 
			}
			redirect('admin/Dataset');
		}
	
		public function delete($id = NULL)
		{
			if (!isset($id)) show_404();                  
			$this->M_Identifikasi_detail->delete($id);
			$this->M_Kata_Dataset->delete($id);
			$this->M_Dataset->delete($id);
			
			redirect('admin/Dataset');         
			
		} 

}

/* End of file Dataset.php */

?>
