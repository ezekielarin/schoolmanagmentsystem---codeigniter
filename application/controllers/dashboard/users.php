<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

   public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth', 'form_validation'));
		$this->load->helper(array('url', 'language','form'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
		$this->load->model('venue');
	}

	
	public function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		else if (!$this->ion_auth->is_admin()) 
		{
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
		$data['allvenues'] = $this->venue->listvenues();
		$this->load->view('dashboard/layout/header');
		$this->load->view('dashboard/layout/nav');
		$this->load->view('dashboard/layout/sidebar');
		$this->load->view('dashboard/users', $data);
		$this->load->view('dashboard/layout/footer');

	   }
	}
	public function view($id)
	{
		$data['venue'] = $this->venue->selectvenue($id);
		$this->load->view('dashboard/layout/header');
		$this->load->view('dashboard/layout/nav');
		$this->load->view('dashboard/layout/sidebar');
		$this->load->view('dashboard/view_venue', $data);
		$this->load->view('dashboard/layout/footer');

	}
	public function newuser()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}else
		{
		$this->data['title'] = $this->lang->line('create_user_heading');
		$tables = $this->config->item('tables', 'ion_auth');
		$identity_column = $this->config->item('identity', 'ion_auth');
		$this->data['identity_column'] = $identity_column;

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'trim|required');
		if ($identity_column !== 'email')
		{
			$this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'trim|required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email');
		}
		else
		{
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');
		}
		$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
		$this->form_validation->set_rules('institution', $this->lang->line('create_user_validation_institution_label'), 'trim');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

		if ($this->form_validation->run() === TRUE)
		{
			$email = strtolower($this->input->post('email'));
			$identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
			$password = $this->input->post('password');

			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'institution' => $this->input->post('institution'),
				'institution_id' => $this->input->post('institution_id'),
				'phone' => $this->input->post('phone'),
			);
		}
		if ($this->form_validation->run() === TRUE && $this->ion_auth->register($identity, $password, $email, $additional_data))
		{
			// check to see if we are creating the user
			// redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth", 'refresh');
		}
		else
		{
			// display the create user form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            $this->data['institution_id'] = array(
				'name' => 'institution_id',
				'id' => 'institution_id',
				'type' => 'hidden',
				//'value' => $this->form_validation->set_value('institution_id'),
			);
			$this->data['first_name'] = array(
				'name' => 'first_name',
				'id' => 'first_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('first_name'),
			);
			$this->data['last_name'] = array(
				'name' => 'last_name',
				'id' => 'last_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('last_name'),
			);
			$this->data['identity'] = array(
				'name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['email'] = array(
				'name' => 'email',
				'id' => 'email',
				'type' => 'text',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['institution'] = array(
				'name' => 'institution',
				'id' => 'institution',
				'type' => 'hidden',
			    //'value' => $this->form_validation->set_value('institution'),
			);
			$this->data['phone'] = array(
				'name' => 'phone',
				'id' => 'phone',
				'type' => 'text',
				'value' => $this->form_validation->set_value('phone'),
			);
			$this->data['password'] = array(
				'name' => 'password',
				'id' => 'password',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password'),
			);
			$this->data['password_confirm'] = array(
				'name' => 'password_confirm',
				'id' => 'password_confirm',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password_confirm'),
			);

		
		
		$this->load->view('dashboard/layout/header');
		$this->load->view('dashboard/layout/nav');
		$this->load->view('dashboard/layout/sidebar');
		$this->load->view('dashboard/add_user', $this->data);
		$this->load->view('dashboard/layout/footer');
	    }
	  }
	}

	public function edit($id)
	{
		$data['venue'] = $this->db->query("SELECT * FROM venues WHERE id='$id'")->result();
		$this->load->view('dashboard/layout/header');
		$this->load->view('dashboard/layout/nav');
		$this->load->view('dashboard/layout/sidebar');
		$this->load->view('dashboard/edit_venue', $data);
		$this->load->view('dashboard/layout/footer');
	}

	public function add()
	{
		$this->venue->addnew();
		redirect('dashboard/venues');
	}
	public function update()
		{
			$data = array(
				'id' => $this->input->post('id'), 
				'venue' => $this->input->post('venue'), 
				'capacity' => $this->input->post('capacity'), 
				'institution_id' => $this->input->post('institution_id'),
			);
			$this->db->where('id', $data['id']);
			$this->db->update('venues', $data);
			redirect('dashboard/venues');

		}

	public function delete($id)
	{
		$this->db->query("DELETE FROM venues WHERE id='$id'");
		redirect('dashboard/venues');
	}

}

