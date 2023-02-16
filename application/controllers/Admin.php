<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Password Email : yxyswnskhlbodopo

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('supplier_model');
  }

  public function index()
  {
    $title['title'] = 'QS - Dashboard';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('template/header', $title);
    $this->load->view('template/sidebar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('template/footer');
  }

  public function supplier()
  {
    $title['title'] = 'QS - Supplier';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $tabel['data'] = $this->supplier_model->get_data()->result();
    $this->load->view('template/header', $title);
    $this->load->view('template/sidebar', $data);
    $this->load->view('supplier/supplier_view', $tabel);
    $this->load->view('template/footer');
  }
}
