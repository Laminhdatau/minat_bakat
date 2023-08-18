<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Minat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->nis = $this->session->userdata('nis');
	}

	public function index()
	{
		$data['title']	=	"Minat";
		$data['v']	=	$this->UserModel->getSiswa($this->nis)->row();
		$data['a']	=	$this->UserModel->getNilaiSemua($this->nis)->row();

		$data['jurusan']	=	$this->MasterDataModel->getJur();
		$this->load->view('minatbakat', $data);
	}

	public function getMapelByJurusan()
	{
		$id = $this->input->post('id_jurusan');
		$data = $this->MasterDataModel->getMapelByJurusan($id);
		echo json_encode($data);
	}


	public function simpan()
	{


		$pima = [
			'nis' => $this->input->post('nis'),
			'id_pelajaran' => $this->input->post('id_pelajaran')
		];

		$bio = [
			'nis' => $pima['nis'],
			'id_jurusan' => $this->input->post('id_jurusan')
		];

		$nilai = [
			'nis' => $pima['nis'],
			'id_pelajaran' => $pima['id_pelajaran'],
			'nilai' => $this->input->post('nilai')
		];

		$this->db->query('update tbl_biodata set status="1" where nis="' . $pima['nis'] . '"');
		$this->db->insert('tbl_pilihan_mapel', $pima);
		$this->db->insert('tbl_nilai', $nilai);

		$this->db->where('nis', $pima['nis']);
		$this->db->update('tbl_biodata', $bio);
		$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> Berhasil Simpan.');
		redirect('minat');
	}

	public function hapus($nis)
	{
		$this->db->where('nis', $nis);
		$this->db->delete('tbl_pilihan_mapel');

		$this->db->where('nis', $nis);
		$this->db->delete('tbl_nilai');

		$data = array('status' => '0');
		$this->db->where('nis', $nis);
		$this->db->update('tbl_biodata', $data);

		$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> Berhasil Reset Pilihan.');
		redirect('minat');
	}

	public function kirim($id)
	{
		$data = $this->db->query('update tbl_biodata set status="2" where nis="' . $id . '"');
		if (!$data) {
			$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Gagal Mengirim.');
			redirect('minat');
		} else {
			$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> Berhasil Mengirim.');
			redirect('minat');
		}
	}
}