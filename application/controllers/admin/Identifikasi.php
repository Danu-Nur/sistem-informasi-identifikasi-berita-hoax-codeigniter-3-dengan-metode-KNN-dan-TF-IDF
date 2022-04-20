<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Identifikasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Kata_Dataset');
		$this->load->model('M_Dataset');
		$this->load->model('M_Kata_Uji');
		$this->load->model('M_Keyword');
		$this->load->model('M_Uji');
		$this->load->model('M_Chace');
		$this->load->model('M_Bobot_Uji');
		$this->load->model('M_Metode');
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
			'label' => 'id user',
			'rules' => 'required'],

			['field' => 'DATA_UJI',
			'label' => 'data testing',
			'rules' => 'required']
        ];
    }
	public function index()
	{
		

		$iden = $this->M_Identifikasi->getAllJoin();
		
		$data = array(
			'judul' => 'HASIL IDENTIFIKASI',
			// 'id' => $this->M_METODE->hasilKnn($ID_DATA_UJI),
			// 'id2' => $ret->$data['ID_BERITA'],
			'hsl' => $iden,
			'contents' => 'admin/v_identifikasi'
		);
		$this->load->view('template/index',$data);
	}

	public function startKNN($id = null)
	{
		$this->M_Metode->cekKategori($id);

		redirect('admin/Identifikasi');
		
	}

	public function play()
	{
		$mdl = $this->M_Uji;
		$validation = $this->form_validation;
		$post = $this->input->post();
		$validation->set_rules($this->rules());
		if ($validation->run() == FALSE){
			redirect('admin/Admin');
		} else {
			$data = array(
				'ID_USER' => $post['ID_USER'],
				'DATA_UJI' => $post['DATA_UJI'],
			);
			$getId = $mdl->add($data);

			$this->M_Metode->cekKategori($getId);

			redirect('admin/Identifikasi/detailIdentifikasi/'.$getId);
		}
	}

	public function detailIdentifikasi($id = null)
	{
		if(!isset($id))
    	{
    		$id = $this->input->post('id');
    	}
    	if (!isset($id)) redirect('admin/Identifikasi');
		$this->M_Metode->cekKategori($id);
		$testing = $this->M_Identifikasi->getdetail($id);
		$bobotKata = $this->M_Kata_Uji->getdetail($id);
		$bobotDoc = $this->M_Identifikasi_detail->getdetail($id);

		$data = array(
			'judul' => 'HASIL IDENTIFIKASI',
			'berita' => 'Data Testing',
			'hsl' => $testing,
			'tabel' => 'Bobot Kata TF.IDF',
			'hsl2' => $bobotKata,
			'jarak' => 'Hasil Perhitungan K-NN ( K = '.count($bobotDoc).' )',
			'hsl3' => $bobotDoc,
			'contents' => 'admin/v_detail_identifikasi'
		);
		$this->load->view('template/index',$data);
		
	}

	public function delete($id = NULL)
	{
		if (!isset($id)) show_404();
		$this->M_Identifikasi->deleteUji($id);
		$this->M_Identifikasi_detail->deleteUji($id);
		$this->M_Chace->deleteUji($id);
		$this->M_Kata_Uji->deleteUji($id);
		$this->M_Uji->delete($id); 

		redirect('admin/Identifikasi');         
		
	} 

}


?>
