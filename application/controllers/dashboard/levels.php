<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Levels extends CI_Controller {

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
		$this->load->view('dashboard/levels');
		$this->load->view('dashboard/layout/footer');

	    }
	}
	public function edit($id)
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}else
		{
		$data['level'] = $this->db->query("SELECT * FROM levels WHERE id='$id'")->row();
		$this->load->view('dashboard/layout/header');
		$this->load->view('dashboard/layout/nav');
		$this->load->view('dashboard/layout/sidebar');
		$this->load->view('dashboard/edit_level', $data);
		$this->load->view('dashboard/layout/footer');
     	}

	}

	public function addnew()
	{
		$data = array(
			'level' => $this->input->post('level'),
			'institution_id' => $this->input->post('institution_id'), 
			'faculty_id' => $this->input->post('faculty_id'),
		);
		$this->db->insert('levels', $data);
		redirect('dashboard/levels');

	}
	public function update()
		{
			$data = array(
				'id' => $this->input->post('id'), 
				'level' => $this->input->post('level'), 
				 
			);
			$this->db->where('id', $data['id']);
			$this->db->update('levels', $data);
			redirect('dashboard/levels');

		}

	public function delete($id)
	{
		$this->db->query("DELETE FROM levels WHERE id=$id");
		redirect('dashboard/levels');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */