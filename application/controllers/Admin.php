<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['user'] = $this->db->get_where('user')->row_array();
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('template/footer');
  }
}
