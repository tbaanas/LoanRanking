<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User
{
	private $id;
	private $username;
	private $password;
	private $email;
	private $active;
	private $admin;

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}


	/**
	 * @return mixed
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * @param mixed $username
	 */
	public function setUsername($username)
	{
		$this->username = $username;
	}

	/**
	 * @return mixed
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * @param mixed $password
	 */
	public function setPassword($password)
	{
		$this->password = $password;
	}

	/**
	 * @return mixed
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @param mixed $email
	 */
	public function setEmail($email)
	{
		$this->email = $email;
	}

	/**
	 * @return mixed
	 */
	public function getActive()
	{
		return $this->active;
	}

	/**
	 * @param mixed $active
	 */
	public function setActive($active)
	{
		$this->active = $active;
	}

	/**
	 * @return mixed
	 */
	public function getAdmin()
	{
		return $this->admin;
	}

	/**
	 * @param mixed $admin
	 */
	public function setAdmin($admin)
	{
		$this->admin = $admin;
	}






}
