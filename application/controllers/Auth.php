<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');
    }

    public function login()
    {
        $this->load->view('login');
    }

    public function prosess()
    {
        $post = $this->input->post(null, true);
        if (isset($post['login'])) {
            // $this->load->model('user_m');
            $query = $this->user_m->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    "user_id" => $row->user_id,
                    "level" => $row->level
                );
                $this->session->set_userdata($params);
                echo "<script>
                alert('Selamat, Login berhasil');
                window.location='" . site_url('dashboard') . "';
                </script>";
            } else {
                echo "<script>
                alert('Login Gagal');
                window.location='" . site_url('auth/login') . "';
                </script>";
            }
        }
    }
}
