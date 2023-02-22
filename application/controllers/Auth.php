<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Auth extends CI_Controller
{
	public function index()
	{
		$data['title'] = "QS - Login";
		check_already_login();
		$this->load->view('login', $data);
	}

	public function proses()
	{
		$post = $this->input->post(null, true);
		if (isset($post['login'])) {
			$this->load->model('user_model');
			$query = $this->user_model->login($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$params = array(
					'userid' => $row->user_id,
					'level' => $row->level
				);
				if ($params['level'] == 1) {
					$this->session->set_userdata($params);
					echo "<script>
				alert('Selamat Login Berhasil');
				window.location='" . site_url('dashboard') . "'
				</script>";
				} else {
					$this->session->set_userdata($params);
					echo "<script>
				alert('Selamat Login Berhasil');
				window.location='" . site_url('transaksi') . "'
				</script>";
				}
			} else {
				echo "<script>
				alert('Maaf Login Gagal');
				window.location='" . site_url('auth') . "'
				</script>";
			}
		}
	}

	public function logout()
	{
		$params = array('userid', 'level');
		$this->session->unset_userdata($params);
		redirect('auth');
	}
}
