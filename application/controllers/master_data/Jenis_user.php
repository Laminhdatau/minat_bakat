<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_user extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title']	=	"Jabatan";
		$data['role']	=	$this->MasterDataModel->getRole();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('master_data/jenis_user',$data);
		$this->load->view('templates/footer',$data);
	}

	public function new()
	{
		$data = array(
			'role'	=>  $this->input->post('jenis_user')
		);

		$tambah = $this->MasterDataModel->newRole($data);

		if ($tambah == true) {
			$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> Berhasil Menambahakan Jenis User Baru.');
		} else {
			$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Gagal Menambahakan Jenis User Baru.');
		}
		redirect('master_data/jenis_user');
	}

	public function hapus($id)
	{
		$hapus = $this->MasterDataModel->deleteRole($id);

		if ($hapus == true) {
			$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> Berhasil Menghapus Jenis User.');
		} else {
			$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Gagal Menghapus Jenis User.');
		}
		redirect('master_data/jenis_user');
	}
}
