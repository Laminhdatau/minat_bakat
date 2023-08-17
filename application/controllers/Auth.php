<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        redirect('auth/login');
    }

    public function login()
    {
        $this->load->view('auth/login');
    }


    public function proses()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $cekEmail = $this->db->where('username', $username)->from('tbl_user')->get()->row();

        if ($cekEmail) {
            if ($cekEmail->password === $password) {
                $getDataUser = $this->db->where('nis', $cekEmail->nis)->get('tbl_biodata')->row();
                $userAgent = $_SERVER['HTTP_USER_AGENT'];

                if ($cekEmail->id_role === '3') {
                    if (stripos($userAgent, 'Mobile') !== false || stripos($userAgent, 'Android') !== false || stripos($userAgent, 'iOS') !== false) {
                        $data_session = array(
                            'username' => $cekEmail->username,
                            'nama' => $getDataUser->nama,
                            'nis' => $cekEmail->nis,
                            'id_role' => $cekEmail->id_role
                        );

                        $this->session->set_userdata($data_session);
                        redirect('dashboard');
                    } else {
                        $this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Gunakan Aplikasi Untuk Login.');
                        redirect('auth/login');
                    }
                } else {
                    if (!stripos($userAgent, 'Mobile') && !stripos($userAgent, 'Android') && !stripos($userAgent, 'iOS')) {
                        $data_session = array(
                            'username' => $cekEmail->username,
                            'nama' => $getDataUser->nama,
                            'nis' => $cekEmail->nis,
                            'id_role' => $cekEmail->id_role
                        );

                        $this->session->set_userdata($data_session);
                        redirect('dashboard');
                    } else {
                        $this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Gunakan Laptop Untuk Login.');
                        redirect('auth/login');
                    }
                }
            } else {
                $this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Password Yang Anda Masukkan Tidak Sesuai.');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Username Tidak Ditemukan.');
            redirect('auth/login');
        }
    }







    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_role');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('nis');
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
