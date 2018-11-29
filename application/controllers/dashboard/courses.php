<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends CI_Controller {

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
		}
		else
		{
		$this->load->view('dashboard/layout/header');
		$this->load->view('dashboard/layout/nav');
		$this->load->view('dashboard/layout/sidebar');
		$this->load->view('dashboard/courses');
		$this->load->view('dashboard/layout/footer');

	    }
	}

	public function level($level)
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		else
		{
		$data['level'] = $level;
		$this->load->view('dashboard/layout/header');
		$this->load->view('dashboard/layout/nav');
		$this->load->view('dashboard/layout/sidebar');
		$this->load->view('dashboard/level_courses', $data);
		$this->load->view('dashboard/layout/footer');

	   }
	}

	function addcourse()
	{
		$data = array(
			'institution_id' => $this->input->post('institution_id') , 
			'faculty_id' => $this->input->post('faculty_id') , 
			'code' => $this->input->post('code') , 
			'title' => $this->input->post('title') , 
			'credit_unit' => $this->input->post('credit_unit') , 
			'level' => $this->input->post('level') , 
		);
		$level = $this->input->post('level');
		$this->db->insert('courses', $data);

		redirect('dashboard/courses/level/'.$level);

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */