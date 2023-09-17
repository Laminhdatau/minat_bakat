<?php

class DataAkhirModel extends CI_Model
{
	public function getPelajaranNilai($nis)
	{
		return $this->db->query("SELECT al.id_pelajaran,al.pelajaran,al.nilai, GROUP_CONCAT(ROUND((al.nilai + al.nilaikeaktifan + al.nilaiterampil) / 3, 2) SEPARATOR ',') AS nrata
		FROM v_allnilai al
	WHERE al.nis = '" . $nis . "'
	GROUP by al.id_pelajaran,al.pelajaran,al.nilai;
	;")->result();
	}

	public function getJurusan($nis)
	{
		return $this->db->query("
		select * from v_jurusan_nama where nis='" . $nis . "'")->row();
	}
}
