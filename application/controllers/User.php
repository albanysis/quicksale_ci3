<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    check_not_login();
    check_admin();
    $this->load->model('user_model');
    $data['title'] = "QS - User";
    $data['row'] = $this->user_model->get();
    $this->template->load('template', 'user/user_data', $data);
  }

  public function add()
  {
    $this->load->model('user_model');
    $username = $this->input->post('username');
    $name = $this->input->post('fullname');
    $password = sha1($this->input->post('password'));
    $address = $this->input->post('address');
    $level = $this->input->post('level');

    $data = [
      'username' => $username,
      'name' => $name,
      'password' => $password,
      'address' => $address,
      'level' => $level
    ];

    $save = $this->user_model->insert($data);
    if ($save == 1) {
      echo "
      <script>
      alert('Data Berhasil Disimpan.');
      window.location='" . site_url('user') . "'
      </script>
      ";
    }
  }

  public function edit()
  {
    $data['title'] = "QS - Tambah User";
    $data['row'] = $this->user_model->get();
    $this->template->load('template', 'user/user_edit', $data);
    $data = array(
      "username"
    );
  }

  public function delete()
  {
    $id = $this->input->post('user_id');
    $this->user_model->delete($id);

    if ($this->db->affected_rows() > 0) {
      echo "
      <script>
      alert('Data Berhasil Dihapus.');
      </script>
      ";
    }
    redirect('user');
  }
}


/* End of file User.php */
/* Location: ./application/controllers/User.php */