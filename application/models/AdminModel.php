<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
	}

	function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $username);
		$user = $this->db->get()->row();
		if ($user->id != null) {
			if (password_verify($password, $user->password)) {


				$array = array(
					'username' => $user->username,
					'user_logged' => TRUE
				);

				$this->session->set_userdata($array);

				return 'ok';
			}
		}

		return 'notExist';

	}

	function register($username, $password, $email, $check, $isAdmin)
	{
		$active = 0;
		$isAdmin2 = 0;
		$this->db->select('id');
		$this->db->where('username', $username);
		$result = $this->db->get('users')->num_rows();

		if ($result > 0) {
			return 'exists';
		}
		if ($check == 'on') {
			$active = 1;
		}
		if ($isAdmin == 'on') {

			$isAdmin2 = 1;
		}
		$data = array(
			'username' => $username,
			'password' => password_hash($password, PASSWORD_DEFAULT),
			'email' => $email,
			'active' => $active,
			'admin' => $isAdmin2
		);
		$this->db->insert('users', $data);
		$this->session->set_flashdata('success', 'Konto zostało utworzone, Zaloguj się');
		return 'ok';
	}
}
