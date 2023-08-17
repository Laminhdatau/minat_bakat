<?php

class MasterDataModel extends CI_Model
{
	public function getRole()
	{
		return $this->db->get('tbl_mst_role')->result();
	}

	public function newRole($data)
	{
		$this->db->insert('tbl_mst_role',$data);

		return true;
	}

	public function deleteRole($id)
	{
		$this->db->where('id_role', $id);
		$this->db->delete('tbl_mst_role');

		return true;
	}

	public function getJurusan()
	{
		return $this->db->where_not_in('id_jurusan',[1,2])->get('tbl_mst_jurusan')->result();
	}

	public function newJurusan($data)
	{
		$this->db->insert('tbl_mst_jurusan',$data);

		return true;
	}

	public function deleteJurusan($id)
	{
		$this->db->where('id_jurusan', $id);
		$this->db->delete('tbl_mst_jurusan');

		return true;
	}

	public function getPelajaran()
	{
		return $this->db->select('a.id_pelajaran,a.pelajaran,b.jurusan')
				->from('tbl_mst_pelajaran a')
				->join('tbl_mst_jurusan b','a.id_jurusan = b.id_jurusan','left')
				->get()
				->result();
	}

	public function newPelajaran($data)
	{
		$this->db->insert('tbl_mst_pelajaran',$data);

		return true;
	}

	public function deletePelajaran($id)
	{
		$this->db->where('id_pelajaran', $id);
		$this->db->delete('tbl_mst_pelajaran');

		return true;
	}
}
