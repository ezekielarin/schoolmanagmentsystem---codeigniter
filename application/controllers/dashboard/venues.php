<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Venues extends CI_Controller {

   public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth', 'form_validation'));
		$this->load->helper(array('url', 'language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
		$this->load->model('venue');
	}

	
	public function index()
	{
		$data['allvenues'] = $this->venue->listvenues();
		$this->load->view('dashboard/layout/header');
		$this->load->view('dashboard/layout/nav');
		$this->load->view('dashboard/layout/sidebar');
		$this->load->view('dashboard/venues', $data);
		$this->load->view('dashboard/layout/footer');

	}
	public function view($id)
	{
		$data['venue'] = $this->db->query("SELECT * FROM venues WHERE id='$id'")->row();
		$this->load->view('dashboard/layout/header');
		$this->load->view('dashboard/layout/nav');
		$this->load->view('dashboard/layout/sidebar');
		$this->load->view('dashboard/view_venue', $data);
		$this->load->view('dashboard/layout/footer');

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
			);
			$this->db->where('id', $data['id']);
			$this->db->update('venues', $data);
			redirect('dashboard/venues');

		}

	public function delete($id)
	{
		$this->db->query("DELETE FROM venues WHERE id=$id");
		redirect('dashboard/venues');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */