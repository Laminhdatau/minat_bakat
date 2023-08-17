<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_management extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title']	=	"User Management";
		$data['user']	=	$this->UserModel->getUserOk();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('user_management',$data);
		$this->load->view('templates/footer',$data);
	}
}
