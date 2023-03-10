<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['title'] = "QS - Dashboard";
    check_not_login();
    check_admin();
    $this->template->load('template', 'dashboard', $data);
  }
}


/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */