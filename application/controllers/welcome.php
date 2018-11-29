<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	 public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'language'));
	}
	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('welcome_message');
		$this->load->view('layout/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */