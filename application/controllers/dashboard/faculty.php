<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faculty extends CI_Controller {

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
		$this->load->view('dashboard/faculty');
		$this->load->view('dashboard/layout/footer');
	    }

	}
	public function view($id)
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		else
		{
		$data['faculty'] =  $this->db->query("SELECT * FROM faculty WHERE id='$id'")->row(); 
		$this->load->view('dashboard/layout/header');
		$this->load->view('dashboard/layout/nav');
		$this->load->view('dashboard/layout/sidebar');
		$this->load->view('dashboard/view_faculty', $data);
		$this->load->view('dashboard/layout/footer');
	    }

	}
	public function edit($id)
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		else
		{
		$data['faculty'] =  $this->db->query("SELECT * FROM faculty WHERE id='$id'")->result(); 
		$this->load->view('dashboard/layout/header');
		$this->load->view('dashboard/layout/nav');
		$this->load->view('dashboard/layout/sidebar');
		$this->load->view('dashboard/edit_faculty', $data);
		$this->load->view('dashboard/layout/footer');
	    }

	}
	public function add()
	{
		$data = array(
				'id' => $this->input->post('id'), 
				'faculty' => $this->input->post('faculty'),
				'institution_id' => $this->input->post('institution_id'), 
			);
		$this->db->insert('faculty', $data);
		redirect('dashboard/faculty');
	}
	public function add_dept()
	{
		$data = array(
				'department' => $this->input->post('department'),
				'faculty_id' => $this->input->post('faculty_id'),
				'institution_id' => $this->input->post('institution_id'), 
			);
		$faculty_id = $this->input->post('faculty_id');

		$this->db->insert('departments', $data);
		redirect('dashboard/faculty/view/'.$faculty_id);
	}
	public function update()
		{
			$data = array(
				'id' => $this->input->post('id'), 
				'faculty' => $this->input->post('faculty'), 
			
			);
			$this->db->where('id', $data['id']);
			$this->db->update('faculty', $data);
			redirect('dashboard/faculty');

		}

	public function delete($id)
	{
		$this->db->query("DELETE FROM faculty WHERE id='$id'");
		redirect('dashboard/faculty');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */