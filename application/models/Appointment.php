<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Appointment extends CI_Model
{
	
	public function add_appointment($data){
		$query = "INSERT INTO appointments (
		date,
		time,
		tasks,
		user_id,
		created_at,
		updated_at)
		VALUES (?, ?, ?, ?, NOW(), NOW())";
		$this->db->query($query, array(
			$data['date'],
			$data['time'],
			$data['tasks'],
			$data['user_id'],
			));
	}
	public function get_todays()
	{	
		$query = "SELECT * FROM users
		LEFT JOIN appointments on appointments.user_id = users.id
		WHERE appointments.date = CURDATE()
		GROUP BY users.id" ;
		return $this->db->query($query)->result_array();
	}
	public function get_all()
	{	
		$query = "SELECT * FROM users
		LEFT JOIN appointments on appointments.user_id = users.id" ;
		return $this->db->query($query)->result_array();
	}

	public function remove_appointment($id)
	{
		$this->db->delete('appointments', array('id' => $id));
	}
	public function edit_appointment($id){
		$query = "SELECT * FROM appointments WHERE id = ?";
		return $this->db->query($query, $id)->result_array();
	}
	public function update_appointment($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('appointments', $data); 
		redirect("/appointment/index");
	}

	public function show_item($id)
	{
		$query = "SELECT * FROM appointments WHERE id = ?";
		return $this->db->query($query, $id)->result_array();
	}
}


?>