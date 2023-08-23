<?php

class UserModel extends CI_Model
{
	public function getNilaiSemua($id)
	{

		return $this->db->query("SELECT
		u.id_user,
		b.*,
		GROUP_CONCAT(j.jurusan SEPARATOR ', ') as jurusan,
		GROUP_CONCAT(j.id_jurusan SEPARATOR ', ') as id_jurusan,
		GROUP_CONCAT(p.id_pelajaran SEPARATOR ', ') as id_pelajaran,
		GROUP_CONCAT(p.pelajaran SEPARATOR ', ') as pelajaran,
		n.nilai
	FROM
		tbl_user u
	LEFT JOIN tbl_biodata b ON
		u.nis = b.nis
	LEFT JOIN tbl_pilihan_mapel m ON
		m.nis = b.nis
	LEFT JOIN tbl_mst_pelajaran p ON FIND_IN_SET(p.id_pelajaran, m.id_pelajaran)
	LEFT JOIN tbl_mst_jurusan j ON FIND_IN_SET(j.id_jurusan, p.id_jurusan)
	LEFT JOIN tbl_nilai n ON n.nis = u.nis AND b.nis = n.nis AND u.nis = b.nis AND m.id_pelajaran = n.id_pelajaran
	WHERE
		u.nis = '" . $id . "'
      and b.status='1'
	GROUP BY u.id_user,n.nilai
	  ");
	}

	public function getSiswa($nis)
	{
		return $this->db->query('SELECT * from tbl_biodata b 
		where b.nis="' . $nis . '"
		');
	}

	public function getUser()
	{
		return $this->db->query("SELECT
		b.*,
		GROUP_CONCAT(DISTINCT j.jurusan) as jurusan,
		GROUP_CONCAT(DISTINCT p.pelajaran) as pelajaran,
		GROUP_CONCAT(DISTINCT n.nilai ) as nilai,
		 GROUP_CONCAT(DISTINCT p.id_pelajaran) as id_pelajaran
		FROM
			tbl_biodata b
		LEFT JOIN tbl_mst_jurusan j ON FIND_IN_SET(j.id_jurusan, b.id_jurusan)
		LEFT JOIN tbl_pilihan_mapel pm ON pm.nis = b.nis
		LEFT JOIN tbl_mst_pelajaran p ON FIND_IN_SET(p.id_pelajaran, pm.id_pelajaran)
		,tbl_nilai n 
		WHERE
		n.nis=b.nis 
		and n.nis=pm.nis
		and b.id_jurusan NOT IN (1) AND b.status = '2'
		 GROUP BY b.nis
		")->result();
	}

	public function getUserOk()
	{
		return $this->db->select('sa.id_user,a.username, a.nis, b.nama, b.email,c.jurusan')
			->from('tbl_user a')
			->join('tbl_biodata b', 'a.nis = b.nis', 'left')
			->join('tbl_mst_jurusan c', 'b.id_jurusan = c.id_jurusan', 'left')
			->where_not_in('a.id_role', [1, 2])
			->get()
			->result();
	}

	public function getUserById($nis)
	{
		return $this->db->query("SELECT
		b.*,
		GROUP_CONCAT(DISTINCT j.jurusan) as jurusan,
		-- j.jurusan,
		GROUP_CONCAT(DISTINCT p.pelajaran) as pelajaran,
		-- p.pelajaran,
		GROUP_CONCAT(DISTINCT n.nilai ) as nilai,
		 GROUP_CONCAT(DISTINCT p.id_pelajaran) as id_pelajaran
		FROM
			tbl_biodata b
		LEFT JOIN tbl_mst_jurusan j ON FIND_IN_SET(j.id_jurusan, b.id_jurusan)
		LEFT JOIN tbl_pilihan_mapel pm ON pm.nis = b.nis
		LEFT JOIN tbl_mst_pelajaran p ON FIND_IN_SET(p.id_pelajaran, pm.id_pelajaran)
		,tbl_nilai n 
		WHERE
		n.nis=b.nis 
		and b.nis='" . $nis . "'
		and n.nis=pm.nis
		and b.id_jurusan NOT IN (1) 
		AND b.status = '2'
		 GROUP BY b.nis")->row();
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
