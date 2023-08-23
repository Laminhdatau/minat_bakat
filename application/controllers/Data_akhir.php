<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_akhir extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title']	=	"Data Akhir";
		$data['user']	=	$this->UserModel->getUser();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('data_akhir',$data);
		$this->load->view('templates/footer',$data);
	}

	public function getById($nis)
	{
		$data = $this->UserModel->getUserById($nis);

		$result = array(
			'data' => $data
		);
		echo json_encode($result);
	}

	public function getDataTable($nis)
	{
		$data = $this->DataAkhirModel->getPelajaranNilai($nis);

		echo json_encode($data);
	}
}
