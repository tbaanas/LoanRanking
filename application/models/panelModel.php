<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class PanelModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getAll()
	{
		$this->db->select('*');
		$this->db->from('users');

		return $this->db->get()->result();

	}


	public function getOne($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id', $id);

		return $this->db->get()->result();
	}

	public function update($id, $username, $password, $email, $check, $isAdmin)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $username);

	$isExist= $this->db->get()->row();
	if($isExist!=null){
		return 'exists';

	}



		$active = 0;
		$isAdmin2 = 0;


		if ($check == 'on') {
			$active = 1;
		}
		if ($isAdmin == 'on') {

			$isAdmin2 = 1;
		}
		if ($password != null) {
			$this->db->set('password', password_hash($password, PASSWORD_DEFAULT));

		}

		$this->db->set('username', $username);
		$this->db->set('email', $email);
		$this->db->set('active', $active);
		$this->db->set('admin', $isAdmin2);


		$this->db->where('id', $id);
		$this->db->update('users');
		return 'ok';

	}

	public function delete($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('users');
		return 'ok';
	}

	public function active($id)
	{

		$this->db->set('active', 1);
		$this->db->where('id', $id);
		$this->db->update('users');
		return 'ok';
	}

	public function disable($id)
	{
		$this->db->set('active', 0);
		$this->db->where('id', $id);
		$this->db->update('users');
		return 'ok';
	}

	/**
	 * @param $fileName
	 * @param $campName
	 * @param $desc
	 * @param $link
	 * @param $active
	 * @param $bik
	 * @param $rate
	 * @param $commission
	 * @param int $views
	 */
	public function add($fileName,$campName,$desc,$link,$active,$bik,$rate,$commission,$views){

		if($active=='on'){
			$active=1;
		}else $active=0;
		if($bik=='on'){
			$bik=1;
		}else $bik=0;


		$data = array(
			'name' => $campName,
			'desc' => $desc,
			'link' => $link,
			'fileName'=>$fileName,
			'active'=>$active,
			'bik'=>$bik,
			'rate'=>$rate,
			'commission'=>$commission,
			'views'=>$views

		);
		$this->db->insert('campaign', $data);
	}

	/**
	 * @param $id
	 * @param $fileName
	 * @param $campName
	 * @param $desc
	 * @param $link
	 * @param $active
	 * @param $bik
	 * @param $rate
	 * @param $commission
	 * @param int $views
	 */
	public function editCamp($id,$fileName,$campName,$desc,$link,$active,$bik,$rate,$commission,$views){

		if($active=='on'){
			$active=1;
		}else $active=0;
		if($bik=='on'){
			$bik=1;
		}else $bik=0;


		$this->db->set('name', $campName);
		$this->db->set('desc', $desc);
		$this->db->set('link', $link);
		$this->db->set('fileName', $fileName);
		$this->db->set('active', $active);
		$this->db->set('bik', $bik);
		$this->db->set('rate', $rate);
		$this->db->set('commission', $commission);
		$this->db->set('views', $views);


		$this->db->where('id', $id);
		$this->db->update('campaign');



	}

}
