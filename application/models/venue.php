<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Venue extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		
	}

	public function update()
	{
		
	}

	public function addnew()
	{
		$data = array(
			'venue' => $this->input->post('venue'), 
			'capacity' => $this->input->post('capacity') 
		);
		$this->db->insert('venues', $data);
	}

	public function listvenues()
	{
		
		$this->db->select('*');
		$this->db->from('venues');
		$query = $this->db->get();
		
		if ($query->num_rows()>0) {
				return $query->result();
			}else{
				return false;
			}
	}
	public function selectvenue($id)
	{
		$this->db->where('id',$id);
		$this->db->select('*');
		$this->db->from('venues');
		//$this->db->join('timetable','venue_id=id');
		$query = $this->db->get();
		
		if ($query->num_rows()>0) {
				return $query->result();
			}else{
				return false;
			}
	}
}