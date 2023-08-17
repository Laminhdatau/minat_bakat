<?php

class DataAkhirModel extends CI_Model
{
	public function getPelajaranNilai($nis)
	{
		return $this->db->select('b.pelajaran,a.nilai')
				->from('tbl_nilai a')
				->join('tbl_mst_pelajaran b','a.id_pelajaran = b.id_pelajaran','left')
				->where('a.nis',$nis)
				->get()
				->result();
	}
}
