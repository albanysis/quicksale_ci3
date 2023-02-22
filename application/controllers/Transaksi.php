<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['title'] = "QS - Transaksi";
    $this->template->load('template', 'transaksi/transaksi_data', $data);
  }
}


/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */