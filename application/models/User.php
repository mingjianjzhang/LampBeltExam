<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {


	public function register($userInfo) {
		$query = "INSERT INTO users (name, username, password, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";
		$values = array($userInfo['name'], $userInfo['username'], $userInfo['password']);
		return $this->db->query($query, $values);
	}

	public function validateReg($userInfo) {
		$this->form_validation->set_rules('name', "Name", "trim|required|min_length[3]");
		$this->form_validation->set_rules('username', "Username", "trim|required|min_length[3]");
		$this->form_validation->set_rules('password', "Password", "trim|required|min_length[6]|matches[confirm_password]");
		$this->form_validation->set_rules('confirm_password', "Confirm Password", "trim|required");
		if($this->form_validation->run()) {
			return "valid";
		} else {
			return validation_errors();
		}
	}

	public function validateLogin($userInfo) {
		$this->form_validation->set_rules("username", "Username", "trim|required|min_length[3]");
		$this->form_validation->set_rules("password", "Password", "trim|required|min_length[6]");
		if($this->form_validation->run()) {
			return "valid";
		} else {
			return validation_errors();
		}
	}

	public function get_user($username) {
		return $this->db->query("SELECT id, name, password FROM users WHERE username = '$username'")->row_array();
	}




}