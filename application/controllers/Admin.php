<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Password Email : yxyswnskhlbodopo

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  public function index()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('template/footer');
  }
}
