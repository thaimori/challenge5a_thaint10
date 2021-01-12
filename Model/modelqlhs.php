<?php

class User
{
	public $user_id;
	public $username;
	public $password;
	public $permission;
	
	public function __construct($_user_id, $_username, $_password, $_permission)
	{
		$this->user_id = $_user_id;
		$this->username = $_username;
		$this->password = $_password;
		$this->permission = $_permission;
	}
}

class Baitap
{
	public $baitap_id;
	public $tenbaitap;
	public $user_id;
	public $filename;
	
	public function __construct($_baitap_id, $_tenbaitap, $_user_id, $_filename)
	{
		$this->baitap_id = $_baitap_id;
		$this->tenbaitap = $_tenbaitap;
		$this->user_id = $_user_id;
		$this->filename = $_filename;
	}
}

?>