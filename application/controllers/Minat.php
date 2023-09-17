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
		if (!empty($data['a'])) {
			$data['idp'] = explode(', ', $data['a']->id_pelajaran);
			$data['pl'] = explode(', ', $data['a']->pelajaran);
			$data['idj'] = explode(', ', $data['a']->id_jurusan);
			$data['j'] = explode(', ', $data['a']->jurusan);
			$data['n'] = explode(',', $data['a']->nilai);
			$data['ka'] = explode(',', $data['a']->nilai_keaktifan);
			$data['t'] = explode(',', $data['a']->nilai_keterampilan);
			$combinedData = [];
			for ($i = 0; $i < count($data['idj']); $i++) {
				$combinedData[] = [
					'id_pelajaran' => $data['idp'][$i],
					'pelajaran' => $data['pl'][$i],
					'id_jurusan' => $data['idj'][$i],
					'jurusan' => $data['j'][$i],
					'nilai' => $data['n'][$i],
					'nilaktif' => $data['ka'][$i],
					'niltampil' => $data['t'][$i]
				];
			}

			$data['data1'] = $combinedData[0];
			$data['data2'] = $combinedData[1];
			$data['data3'] = $combinedData[2];
		}

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
		$nis = $this->session->userdata('nis');

		$id_jurusan1 = $this->input->post('id_jurusan')[1];
		$id_pelajaran1 = $this->input->post('id_pelajaran')[1];
		$nilai1 = $this->input->post('nilai')[1];
		$nilaiaktif1 = $this->input->post('nilaiaktif')[1];
		$nilaitampil1 = $this->input->post('nilaitampil')[1];

		$id_jurusan2 = $this->input->post('id_jurusan')[2];
		$id_pelajaran2 = $this->input->post('id_pelajaran')[2];
		$nilai2 = $this->input->post('nilai')[2];
		$nilaiaktif2 = $this->input->post('nilaiaktif')[2];
		$nilaitampil2 = $this->input->post('nilaitampil')[2];

		$id_jurusan3 = $this->input->post('id_jurusan')[3];
		$id_pelajaran3 = $this->input->post('id_pelajaran')[3];
		$nilai3 = $this->input->post('nilai')[3];
		$nilaiaktif3 = $this->input->post('nilaiaktif')[3];
		$nilaitampil3 = $this->input->post('nilaitampil')[3];

		$pima = [
			'nis' => $nis,
			'id_pelajaran' => $id_pelajaran1 . ',' . $id_pelajaran2 . ',' . $id_pelajaran3
		];

		$bio = [
			'nis' => $nis,
			'id_jurusan' => $id_jurusan1 . ',' . $id_jurusan2 . ',' . $id_jurusan3
		];

		$nilai = [
			'nis' => $nis,
			'id_pelajaran' => $id_pelajaran1 . ',' . $id_pelajaran2 . ',' . $id_pelajaran3,
			'nilai' => $nilai1 . ',' . $nilai2 . ',' . $nilai3
		];

		$nilaiak = [
			'nis' => $nis,
			'id_pelajaran' => $id_pelajaran1 . ',' . $id_pelajaran2 . ',' . $id_pelajaran3,
			'nilai_keaktifan' => $nilaiaktif1 . ',' . $nilaiaktif2 . ',' . $nilaiaktif3
		];

		$nilaitam = [
			'nis' => $nis,
			'id_pelajaran' => $id_pelajaran1 . ',' . $id_pelajaran2 . ',' . $id_pelajaran3,
			'nilai_keterampilan' => $nilaitampil1 . ',' . $nilaitampil2 . ',' . $nilaitampil3
		];

		$id_pelajaran = [$id_pelajaran1, $id_pelajaran2, $id_pelajaran3];
		$id_jurusan = [$id_jurusan1, $id_jurusan2, $id_jurusan3];

		$nilai_tam = [];

		for ($i = 0; $i < count($id_pelajaran); $i++) {
			$nilai_tam[] = [
				'nis' => $nis,
				'id_pelajaran' => $id_pelajaran[$i],
				'id_jurusan' => $id_jurusan[$i]
			];
		}
		$this->db->query('update tbl_biodata set status="1" where nis="' . $nis . '"');
		$this->db->insert('tbl_pilihan_mapel', $pima);
		$this->db->insert('tbl_nilai', $nilai);
		$this->db->insert('tbl_nilai_keaktifan', $nilaiak);
		$this->db->insert('tbl_nilai_keterampilan', $nilaitam);
		$this->db->insert_batch('tbl_jur_pel', $nilai_tam);
		$this->db->where('nis', $nis);
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

		$this->db->where('nis', $nis);
		$this->db->delete('tbl_nilai_keaktifan');

		$this->db->where('nis', $nis);
		$this->db->delete('tbl_nilai_keterampilan');

		$this->db->where('nis', $nis);
		$this->db->delete('tbl_jur_pel');

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
