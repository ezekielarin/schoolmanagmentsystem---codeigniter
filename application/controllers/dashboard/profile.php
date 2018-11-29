<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

   public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth', 'form_validation'));
		$this->load->helper(array('url', 'language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}

	
	
	public function index()
	{
		$data['user'] = $this->ion_auth->user()->row();

		$this->load->view('dashboard/layout/header');
		$this->load->view('dashboard/layout/nav');
		$this->load->view('dashboard/layout/sidebar');
		$this->load->view('dashboard/profile', $data);
		$this->load->view('dashboard/layout/footer');

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */