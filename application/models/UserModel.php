<?php

class UserModel extends CI_Model
{
	public function getNilaiSemua($id)
	{
		return $this->db->query('select u.id_user,b.*,n.nilai,j.jurusan,p.pelajaran from tbl_user u 
		, tbl_biodata b 
		, tbl_pilihan_mapel m 
		, tbl_mst_pelajaran p
		, tbl_nilai n 
		, tbl_mst_jurusan j
		where b.nis=u.nis
		and m.nis=u.nis
		and m.nis=b.nis
		and n.nis=u.nis
		and n.nis=b.nis
		and n.nis=m.nis
		and j.id_jurusan=b.id_jurusan
		and p.id_pelajaran=m.id_pelajaran
		and p.id_pelajaran=n.id_pelajaran
		and j.id_jurusan=b.id_jurusan
		and u.nis="' . $id . '"
		and b.status="1"');
	}

	public function getSiswa($nis)
	{
		return $this->db->query('SELECT b.*,j.jurusan from tbl_biodata b 
		left join tbl_mst_jurusan j on j.id_jurusan=b.id_jurusan
		where j.id_jurusan not in(1)
		and status in(0,1)
		and b.nis="' . $nis . '"
		');
	}

	public function getUser()
	{
		return $this->db->select('a.*,b.jurusan')
			->from('tbl_biodata a')
			->join('tbl_mst_jurusan b', 'a.id_jurusan = b.id_jurusan', 'left')
			->where_not_in('a.id_jurusan', [1, 2])
			->where('a.status', '2')
			->get()
			->result();
	}

	public function getUserOk()
	{
		return $this->db->select('a.id_user,a.username, a.nis, b.nama, b.email,c.jurusan')
			->from('tbl_user a')
			->join('tbl_biodata b', 'a.nis = b.nis', 'left')
			->join('tbl_mst_jurusan c', 'b.id_jurusan = c.id_jurusan', 'left')
			->where_not_in('a.id_role', [1, 2])
			->get()
			->result();
	}

	public function getUserById($nis)
	{
		return $this->db->select('a.*,b.jurusan')
			->from('tbl_biodata a')
			->join('tbl_mst_jurusan b', 'a.id_jurusan = b.id_jurusan', 'left')
			->where('a.nis', $nis)
			->get()
			->row();
	}


	public function cek_user($username, $password)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}
}
