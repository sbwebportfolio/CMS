<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller
{
	public function index()
	{
		$this->ion_auth->logout();
		redirect('/ControlPanel/Login');
	}
}