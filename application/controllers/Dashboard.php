<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// if (!$this->session->userdata('username')) {
		// 	redirect('auth/login');
		// }
	}

	public function index()
	{
		// check_not_login();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('dashboard');
		$this->load->view('template/footer');
	}
}
