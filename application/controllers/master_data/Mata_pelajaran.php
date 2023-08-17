<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mata_pelajaran extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title']		=	"Mata Pelajaran";
		$data['pelajaran']	=	$this->MasterDataModel->getPelajaran();
		$data['jurusan']	= $this->db->where_not_in('id_jurusan',[1])->get('tbl_mst_jurusan')->result();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('master_data/mata_pelajaran',$data);
		$this->load->view('templates/footer',$data);
	}

	public function new()
	{
		$data = array(
			'pelajaran'	=>  $this->input->post('mata_pelajaran'),
			'id_jurusan'	=>  $this->input->post('id_jurusan')
		);

		$tambah = $this->MasterDataModel->newPelajaran($data);

		if ($tambah == true) {
			$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> Berhasil Menambahakan Mata Pelajaran Baru.');
		} else {
			$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Gagal Menambahakan Mata Pelajaran Baru.');
		}
		redirect('master_data/mata_pelajaran');
	}

	public function hapus($id)
	{
		$hapus = $this->MasterDataModel->deletePelajaran($id);

		if ($hapus == true) {
			$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> Berhasil Menghapus Data Mata Pelajaran.');
		} else {
			$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Gagal Menghapus Data Mata Pelajaran.');
		}
		redirect('master_data/mata_pelajaran');
	}
}
