<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Kasir extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    // echo $data['user']['name'];
    // $data['user'] = $this->db->get_where('user')->row_array();
    // print_r($data);
    // var_dump($data);
    // die;
    $this->load->view('template/header');
    $this->load->view('template/sidebar', $data);
    $this->load->view('kasir/index', $data);
    $this->load->view('template/footer');
  }
}
