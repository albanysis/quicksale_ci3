<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    check_not_login();
    $this->load->model('user_model');
    $data['title'] = "QS - User";
    $data['row'] = $this->user_model->get();
    $this->template->load('template', 'user/user_data', $data);
  }

  public function add()
  {
    $this->template->load('template', 'user/user_data');
  }
}


/* End of file User.php */
/* Location: ./application/controllers/User.php */