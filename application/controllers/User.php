<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
  }

  public function index()
  {
    check_not_login();
    check_admin();
    $data['row'] = $this->user_model->get();
    $this->template->load('template', 'user/user_data', $data);
  }

  public function add()
  {
    $user = new stdClass();
    $user->user_id = null;
    $user->username = null;
    $user->name = null;
    $user->address = null;
    $user->level = null;
    $data = array(
      'page' => 'add',
      'row' => $user
    );
    $this->template->load('template', 'user/user_form', $data);
  }

  public function  edit($id)
  {
    $query = $this->user_model->get($id);
    if ($query->num_rows() > 0) {
      $user = $query->row();
      $data = array(
        'page' => 'edit',
        'row' => $user
      );
      $this->template->load('template', 'user/user_form', $data);
    } else {
      echo "
      <script>
      alert('Data Tidak Ditemukan.');
      window.location='" . site_url('user') . "'
      </script>
      ";
    }
  }

  public function proses()
  {
    $post = $this->input->post(null, true);
    if (isset($_POST['add'])) {
      $this->user_model->add($post);
    } else if (isset($_POST['edit'])) {
      $this->user_model->edit($post);
    }

    if ($this->db->affected_rows() > 0) {
      echo "
      <script>
      alert('Data Berhasil Disimpan.');
      window.location='" . site_url('user') . "'
      </script>
      ";
    }
  }

  public function delete($id)
  {
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