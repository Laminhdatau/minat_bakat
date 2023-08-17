<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title']	=	"Jurusan";
		$data['jurusan']	=	$this->MasterDataModel->getJurusan();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('master_data/jurusan',$data);
		$this->load->view('templates/footer',$data);
	}

	public function new()
	{
		$data = array(
			'jurusan'	=>  $this->input->post('jurusan')
		);

		$tambah = $this->MasterDataModel->newJurusan($data);

		if ($tambah == true) {
			$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> Berhasil Menambahakan Jurusan Baru.');
		} else {
			$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Gagal Menambahakan Jurusan Baru.');
		}
		redirect('master_data/jurusan');
	}

	public function hapus($id)
	{
		$hapus = $this->MasterDataModel->deleteJurusan($id);

		if ($hapus == true) {
			$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> Berhasil Menghapus Jurusan.');
		} else {
			$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Gagal Menghapus Jurusan.');
		}
		redirect('master_data/jurusan');
	}
}
