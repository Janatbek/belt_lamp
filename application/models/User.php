<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_model {

	public function register($userInfo){
		$query = "INSERT INTO users (
		email,
		name,
		password,
		dob,
		created_at,
		updated_at)
		VALUES (?, ?, ?, ?, NOW(), NOW())";
		$this->db->query($query, array(
			$userInfo['email'],
			$userInfo['name'],
			$userInfo['password'],
			$userInfo['dob'],
			));
		return $this->db->insert_id();
	}
	public function get_appointments($id) {
		$query = "SELECT 
		users.name name, 
		wishes.name item, 
		wishes.added_at date_added,
		wishes.id id,
		wishes.adder_id adder
		FROM users 
		LEFT JOIN wishes on wishes.joiner_id = users.id GROUP BY users.id;";
		return $this->db->query($query, $id)->result_array();
	}
	public function login($userInfo){
		$query = "SELECT id, name FROM users
							WHERE email = ?
							AND password = ?";
		return $this->db->query($query, array(
			$userInfo['email'],
			$userInfo['password']))->row_array();
	}

}