<?php

class DataAkhirModel extends CI_Model
{
	public function getPelajaranNilai($nis)
	{
		return $this->db->query("SELECT
		GROUP_CONCAT(b.pelajaran SEPARATOR ',') as pelajaran,
		a.nilai
	FROM tbl_nilai a
	LEFT JOIN tbl_mst_pelajaran b ON FIND_IN_SET(b.id_pelajaran, a.id_pelajaran)
	WHERE a.nis = '" . $nis . "'
	GROUP BY a.nilai;")->row();
	}

	public function getJurusan($nis)
	{
		return $this->db->query("
		select * from v_jurusan_nama where nis='" . $nis . "'")->row();
	}
}
