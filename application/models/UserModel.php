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
		n.nilai,a.nilai_keaktifan,t.nilai_keterampilan
	FROM
		tbl_user u
	LEFT JOIN tbl_biodata b ON
		u.nis = b.nis
	LEFT JOIN tbl_pilihan_mapel m ON
		m.nis = b.nis
	LEFT JOIN tbl_mst_pelajaran p ON FIND_IN_SET(p.id_pelajaran, m.id_pelajaran)
	LEFT JOIN tbl_mst_jurusan j ON FIND_IN_SET(j.id_jurusan, p.id_jurusan)
	LEFT JOIN tbl_nilai n ON n.nis = u.nis 
    LEFT JOIN tbl_nilai_keaktifan a ON a.nis = u.nis 
     LEFT JOIN tbl_nilai_keterampilan t ON t.nis = u.nis 
    AND b.nis = n.nis 
	AND u.nis = b.nis 
	AND b.nis=a.nis 
	AND n.nis=a.nis 
	AND m.id_pelajaran = n.id_pelajaran
	 WHERE
		 u.nis = '" . $id . "' and
      b.status='1'
	GROUP BY u.id_user,n.nilai,a.nilai_keaktifan,t.nilai_keterampilan;");
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
		p.nis,
		p.nama,
		GROUP_CONCAT(p.id_pelajaran SEPARATOR ',') AS id_pelajaran,
		GROUP_CONCAT(p.pelajaran SEPARATOR ',') AS pelajaran,
		GROUP_CONCAT(n.nilai SEPARATOR ',') AS nilai,
		GROUP_CONCAT(na.nilaikeaktifan SEPARATOR ',') AS nilaiaktif,
		GROUP_CONCAT(nt.nilaiterampil SEPARATOR ',') AS nilaitampil,
		GROUP_CONCAT(ROUND((n.nilai + na.nilaikeaktifan + nt.nilaiterampil) / 3, 2) SEPARATOR ',') AS nilai_rata_rata
	FROM 
		v_pelajaran p
	JOIN 
		v_nilai n ON p.nis = n.nis AND n.id_pelajaran = p.id_pelajaran
	JOIN 
		v_nilai_aktif na ON na.nis = n.nis AND na.id_pelajaran = p.id_pelajaran
	JOIN 
		v_nilai_tampil nt ON na.nis = nt.nis AND nt.id_pelajaran = p.id_pelajaran
		where p.nis='" . $nis . "'
	GROUP BY 
		p.nis, p.nama;")->row();
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
