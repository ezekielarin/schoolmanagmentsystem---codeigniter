<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hostels extends CI_Controller {

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
		$this->load->view('dashboard/hostels/welcome');
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
		$data['level'] = $this->db->query("SELECT * FROM levels WHERE id='$id'")->result();
		$this->load->view('dashboard/layout/header');
		$this->load->view('dashboard/layout/nav');
		$this->load->view('dashboard/layout/sidebar');
		$this->load->view('dashboard/edit_level', $data);
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
			
		$data['hostel'] = $this->db->query("SELECT * FROM hostels WHERE id='$id'")->result();
		$data['rooms'] = $this->db->query("SELECT * FROM accomodation WHERE hostel_id='$id'")->result();
		$data['hostel_name'] = $this->db->query("SELECT * FROM hostels WHERE id='$id'")->row();
		$this->load->view('dashboard/layout/header');
		$this->load->view('dashboard/layout/nav');
		$this->load->view('dashboard/layout/sidebar');
		$this->load->view('dashboard/hostels/view_hostel', $data);
		$this->load->view('dashboard/layout/footer');

	    }
	}

     public function rooms()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		else
		{
		$data['hostel'] = $this->db->query("SELECT * FROM hostels WHERE id='$id'")->result();
		$data['rooms'] = $this->db->query("SELECT * FROM accomodation WHERE hostel_id='$id'")->result();
		$data['hostel_name'] = $this->db->query("SELECT * FROM hostels WHERE id='$id'")->row();
		$this->load->view('dashboard/layout/header');
		$this->load->view('dashboard/layout/nav');
		$this->load->view('dashboard/layout/sidebar');
		$this->load->view('dashboard/hostels/view_hostel', $data);
		$this->load->view('dashboard/layout/footer');
		 }

	}
	public function addnew()
	{
		$data = array(
			'hostel' => $this->input->post('hostel'), 
			'room' => $this->input->post('room'), 
			'capacity' => $this->input->post('capacity'),
			'institution_id' => $this->input->post('institution_id'), 
		);
		$this->db->insert('hostels', $data);
		redirect('dashboard/hostels');

	}
	public function addroom()
	{
		$data = array(
			'hostel' => $this->input->post('hostel'), 
			'room' => $this->input->post('room'), 
			'capacity' => $this->input->post('capacity'), 
			'institution_id' => $this->input->post('institution_id'), 
		);
		$this->db->insert('hostels', $data);
		redirect('dashboard/hostels');

	}
	public function update()
		{
			$data = array(
			'id' => $this->input->post('id'), 
			'hostel' => $this->input->post('hostel'), 
			'room' => $this->input->post('room'), 
			'capacity' => $this->input->post('capacity'), 
		);
			$this->db->where('id', $data['id']);
			$this->db->update('hostels', $data);
			redirect('dashboard/hostels');

		}

	public function delete($id)
	{
		$this->db->query("DELETE FROM hostels WHERE id=$id");
		redirect('dashboard/hostels');
	}

}
