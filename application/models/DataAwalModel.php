<?php

class DataAwalModel extends CI_Model
{
	public function getPelajaranPilihan($nis)
	{
		return $this->db->select('b.pelajaran')
			->from('tbl_pilihan_mapel a')
			->join('tbl_mst_pelajaran b', 'a.id_pelajaran = b.id_pelajaran', 'left')
			->where('a.nis', $nis)
			->get()
			->result();
	}
}
