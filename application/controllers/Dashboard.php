<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{

		$data['title'] = "Beranda";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('templates/footer', $data);
	}


	public function profile($id)
	{
		$a['title'] = "Profile";
		$a['jurusan'] = $this->db->where_not_in('id_jurusan', [1, 2])
			->get('tbl_mst_jurusan')
			->result();
		$a['data'] = $this->db->query('select * from tbl_user a left join tbl_biodata b on b.nis=a.nis where a.nis="' . $id . '"')->row();
		$this->load->view('auth/profile', $a);
	}
	public function ubahprofile($id)
	{
		$ortu = $this->input->post('ortu');
		$ortuarray = (!empty($ortu)) ? implode('/', $ortu) : null;
		$config['upload_path'] = './public/dist/img';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = 5048;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('userfile')) {
			$upload = $this->upload->data();
			$data = [
				'user_image' => $upload['file_name'],
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
			];
		} else {
			$data = [
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
			];
		}

		$bio = [
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'alamat' => $this->input->post('alamat'),
			'ortu' => $ortuarray
		];

		$this->db->where('nis', $id);
		$this->db->update('tbl_user', $data);

		$this->db->where('nis', $id);
		$this->db->update('tbl_biodata', $bio);

		$this->session->set_flashdata('success', 'Profil berhasil diubah.');
		redirect('dashboard');
	}
}
