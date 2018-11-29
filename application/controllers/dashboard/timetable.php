<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timetable extends CI_Controller {

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
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}else
		{
		$this->load->view('dashboard/layout/header');
		$this->load->view('dashboard/layout/nav');
		$this->load->view('dashboard/layout/sidebar');
		$this->load->view('dashboard/timetable');
		$this->load->view('dashboard/layout/footer');
	    }

	}
	public function edit()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}else
		{
		$this->load->view('dashboard/layout/header');
		$this->load->view('dashboard/layout/nav');
		$this->load->view('dashboard/layout/sidebar');
		$this->load->view('dashboard/edit_timetable');
		$this->load->view('dashboard/layout/footer');
	    }

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */