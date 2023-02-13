<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    private $_table = "user";

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');
    }

    public function index()
    {
        $this->load->view('login');
    }

    // public function login()
    // {
    //     $data['title'] = "Quick Sale - Login";
    //     $this->form_validation->set_rules('username', 'Username', 'trim|required');
    //     $this->form_validation->set_rules('password', 'Password', 'trim|required');
    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('login', $data);
    //     } else {
    //         $this->_login();
    //     }
    // }

    // private function _login()
    // {
    //     $username = $this->input->post('username');
    //     $password = sha1($this->input->post('password'));
    //     $user = $this->db->get_where('user', ['username' => $username])->row_array();

    //     if ($user) {
    //         //user ada
    //         if (password_verify($password, $user['password'])) {
    //             $data = [
    //                 'username' => $user['username'],
    //                 'level' => $user['level']
    //             ];
    //             $this->session->set_userdata($data);
    //             redirect('kasir');
    //         } else {
    //             $this->session->set_flashdata(
    //                 'message',
    //                 'Invalid password'
    //             );
    //             redirect('auth/login');
    //         }
    //     } else {
    //         $this->session->set_flashdata(
    //             'message',
    //             'Invalid username or password'
    //         );
    //         redirect('auth/login');
    //     }
    // }

    public function login()
    {
        $data['title'] = "Quick Sale - Login";

        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'required');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == false) {
            $this->load->view('login', $data);
        } else {
            $username = $this->security->xss_clean($this->input->post('username'));
            $password = $this->security->xss_clean($this->input->post('password'));

            $user = $this->user_m->login($username, $password);

            if ($user) {
                $userdata = array(
                    'user_id' => $user->user_id,
                    'level' => $user->level,
                    'authenticated' => TRUE
                );

                $this->db->update(
                    'user',
                    array('last_login' => date('Y-m-d H:i:s')),
                    array('user_id' => $user->user_id)
                );

                $this->session->set_userdata($userdata);

                if ($this->session->userdata('level') == 1) {
                    redirect('admin');
                } else {
                    redirect('kasir');
                }
            } else {
                $this->session->set_flashdata('message', 'Invalid username or password');
                redirect('auth/login');
            }
        }
    }

    // public function prosess()
    // {
    //     $post = $this->input->post(null, true);
    //     if (isset($post['login'])) {
    //         // $this->load->model('user_m');
    //         $query = $this->user_m->login($post);
    //         if ($query->num_rows() > 0) {
    //             $row = $query->row();
    //             $params = array(
    //                 "user_id" => $row->user_id,
    //                 "level" => $row->level
    //             );
    //             $this->session->set_userdata($params);
    //             echo "<script>
    //             alert('Selamat, Login berhasil');
    //             window.location='" . site_url('dashboard') . "';
    //             </script>";
    //         } else {
    //             echo "<script>
    //             alert('Login Gagal');
    //             window.location='" . site_url('auth/login') . "';
    //             </script>";
    //         }
    //     }
    // }

    public function Logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
