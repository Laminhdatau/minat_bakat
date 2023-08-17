<?php

class UserModel extends CI_Model
{
	public function getUser()
	{
		return $this->db->select('a.*,b.jurusan')
				->from('tbl_biodata a')
				->join('tbl_mst_jurusan b','a.id_jurusan = b.id_jurusan','left')
				->where_not_in('a.id_jurusan',[	1, 2 ])
				->get()
				->result();
	}

	public function getUserOk()
	{
		return $this->db->select('a.id_user,a.username, a.nis, b.nama, b.email,c.jurusan')
				->from('tbl_user a')
				->join('tbl_biodata b','a.nis = b.nis','left')
				->join('tbl_mst_jurusan c','b.id_jurusan = c.id_jurusan','left')
				->where_not_in('a.id_role', [ 1, 2 ])
				->get()
				->result();
	}

	public function getUserById($nis)
	{
		return $this->db->select('a.*,b.jurusan')
				->from('tbl_biodata a')
				->join('tbl_mst_jurusan b','a.id_jurusan = b.id_jurusan','left')
				->where('a.nis',$nis)
				->get()
				->row();
	}


	public function cek_user($username, $password) {
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
