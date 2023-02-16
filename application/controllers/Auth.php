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
          if ($user['role_id'] == 1) {
            redirect('admin');
          } else {
            redirect('kasir');
          }
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
      $email = $this->input->post('email', true);
      $data = [
        'name' => htmlspecialchars($this->input->post('name', true)), // TRUE bertujuan untuk menghindari xxs
        'email' => htmlspecialchars($email), // htmlspecialchars untuk mengsanitasi input kita 
        'image' => 'image.png',
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT), // password_hash untuk mengenkripsi password
        'role_id' => 2, // kitika daftar otomatis rolenya kasir (2)
        'is_active' => 0,
        'date_created' => time()
      ];

      // Siapkan Token Random
      // base64_encode untuk menerjemahkan karakter dari random_bytes agar bisa dibaca oleh mysql
      $token = base64_encode(random_bytes(32)); // random_bytes untuk membuat random token
      $user_token = [
        'email' => $email,
        'token' => $token,
        'date_created' => time()
      ];


      // Memasukan data kedalam database
      $this->db->insert('user', $data);
      $this->db->insert('user_token', $user_token);

      $this->_sendEmail($token, 'verify');

      $this->session->set_flashdata('message', '<div class="alert alert-success">Success create your account. Please activate your account!</div>');
      redirect('auth');
    }
  }

  private function _sendEmail($token, $type)
  {
    $config = [
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_user' => 'tp4291525@gmail.com',
      'smtp_pass' => 'yxyswnskhlbodopo',
      'smtp_port' => 465,
      'mailtype' => 'html',
      'charset' => 'utf-8',
      'newline' => "\r\n",
    ];

    $this->load->library('email', $config);
    $this->email->initialize($config);
    $this->email->from('tp4291525@gmail.com', 'Quick Sale');
    $this->email->to('pibimarkett@gmail.com'); // $this->input->post('email') jika ingin mengirim email kepada user

    if ($type == 'verify') {
      $this->email->subject('Account Verification');
      $this->email->message('
      <h1>WELCOME!</h1> <br>
      Thank you for registering via the Quick Sale website. Congratulations on joining our business.</h3 <br>
      To join, please verify: <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . $token . '">Activate</a>');
    }


    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
      die;
    }
  }

  public function verify()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {
      // Jika Berhasil
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

      var_dump($token);
      echo ('<br>');
      var_dump($user_token);
      die;

      if ($user_token) {
        // Jika Berhasil
        if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
          // Jika Berhasil
          $this->db->set('is_active', 1);
          $this->db->where('email', $email);
          $this->db->update('user');
          $this->db->delete('user_token', ['email' => $email]);

          $this->session->set_flashdata('message', '<div class="alert alert-success">' . $email . ' has been activated! Please login</div>');
          redirect('auth');
        } else {
          // Jika Gagal
          $this->db->delete('user', ['email' => $email]);
          $this->db->delete('user_token', ['email' => $email]);
          $this->session->set_flashdata('message', '<div class="alert alert-danger">Account activation failed! Token expired.</div>');
          redirect('auth');
        }
      } else {
        // Jika Gagal
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Account activation failed! Wrong Token.</div>');
        redirect('auth');
      }
    } else {
      // Jika Gagal
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Account activation failed! Wrong Email.</div>');
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
