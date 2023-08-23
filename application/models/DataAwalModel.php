<?php

class DataAwalModel extends CI_Model
{
	public function getPelajaranPilihan($nis)
	{
		return $this->db->query('SELECT
		b.id_pelajaran,
		b.pelajaran
	FROM
		tbl_pilihan_mapel a
	LEFT JOIN tbl_mst_pelajaran b ON
		find_in_set(b.id_pelajaran,a.id_pelajaran)
	WHERE
		a.nis = "' . $nis . '"')
			->result();
	}
}
