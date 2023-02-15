<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function index()
  {
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    if ($this->form_validation->run() == false) {
      $data['title'] =  'QuickSale - Login';
      $this->load->view('login', $data);
    } else {
      // Jika validasinya lolos
      $this->_login();
    }
  }

  private function _login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $user = $this->db->get_where('user', ['email' => $email])->row_array();
    // var_dump($user);
    // die;

    //Usernya ada
    if ($user) {
      // Jika usernya active
      if ($user['is_active'] == 1) {
        // Cek passwordnya
        if (password_verify($password, $user['password'])) {
          $data = [
            'email' => $user['email'],
            'role_id' => $user['role_id'],
          ];
          $this->session->set_userdata($data);
          redirect('kasir');
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger">Wrong password!</div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger">This email has not been activated</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Email not registered</div>');
      redirect('auth');
    }
  }

  public function register()
  {

    // Membuat peraturan pada setiap class di html
    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => 'This email has already!'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[retypepass]', [
      'matches' => 'Password dont match!',
      'min_length' => 'Password too short!'
    ]);
    $this->form_validation->set_rules('retypepass', 'Retype Password', 'required|trim|matches[password]');

    // Jika form kosong
    if ($this->form_validation->run() == false) {
      $data['title'] =  'QuickSale - Register';
      $this->load->view('register', $data);
    } else {
      // Jika data terisi
      $data = [
        'name' => htmlspecialchars($this->input->post('name', true)), // TRUE bertujuan untuk menghindari xxs
        'email' => htmlspecialchars($this->input->post('email', true)), // htmlspecialchars untuk mengsanitasi input kita 
        'image' => 'image.png',
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT), // password_hash untuk mengenkripsi password
        'role_id' => 2,
        'is_active' => 1,
        'date_created' => time()
      ];
      // Memasukan data kedalam database
      $this->db->insert('user', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success">Success create your account</div>');
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');
    $this->session->set_flashdata('message', '<div class="alert alert-success">You have been logged out!</div>');
    redirect('auth');
  }
}
