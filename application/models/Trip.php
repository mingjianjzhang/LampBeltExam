<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trip extends CI_Model {

	public function validateTrip($tripInfo) {

		$this->form_validation->set_rules('destination', "Destination", "trim|required");
		$this->form_validation->set_rules('description', "Description", "trim|required");
		$this->form_validation->set_rules('start_date', "Travel Date From", "trim|required");
		$this->form_validation->set_rules('end_date', "Travel Date To", "trim|required");
		if ($this->form_validation->run()) {
			return "valid";
		} else {
			return validation_errors();
		}

	}

	public function add_trip($tripInfo) {
		$query = "INSERT INTO trips (destination, description, creator_id, start_date, end_date) VALUES (?, ?, ?, STR_TO_DATE(?, '%Y-%m-%d'), STR_TO_DATE(?, '%Y-%m-%d'))";
		$values = array($tripInfo['destination'], $tripInfo['description'], intval($tripInfo['creator_id']), date('Y-m-d', strtotime($tripInfo['start_date'])), date('Y-m-d', strtotime($tripInfo['end_date'])));
		return $this->db->query($query, $values);
	}


	public function get_own_trips($userId) {
		$query = "SELECT id, destination, description, start_date, end_date FROM trips WHERE creator_id = $userId";
		return $this->db->query($query)->result_array();
	}

	public function join_trip($tripId, $userId) {
		$query = "INSERT INTO trip_joiners (trip_id, joiner_id) VALUES(?, ?)";
		$values = array(intval($tripId), intval($userId));
		return $this->db->query($query, $values);
	}

	public function get_other_trips($userId) {
		$query = "SELECT trips.id AS trip_id, trips.destination, trips.start_date, trips.end_date, users.name FROM trips JOIN users on trips.creator_id = users.id where trips.id NOT IN (select distinct trips.id from trips JOIN trip_joiners ON trip_joiners.trip_id = trips.id WHERE creator_id = $userId OR joiner_id = $userId) AND creator_id != $userId";

		return $this->db->query($query)->result_array();
	}

	public function get_destination($tripId) {
		$query = "SELECT destination, description, DATE_FORMAT(start_date, '%b %d %Y') as start_date, DATE_FORMAT(end_date, '%b %d %Y') as end_date, name FROM trips JOIN users ON users.id = trips.creator_id WHERE trips.id = $tripId";
		return $this->db->query($query)->row_array();
	}

	public function get_joiners($tripId) {
		$query = "select j.name FROM trip_joiners JOIN trips t ON trip_joiners.trip_id = t.id JOIN users j ON trip_joiners.joiner_id = j.id JOIN users c ON t.creator_id = c.id where t.id = $tripId";
		return $this->db->query($query)->result_array();
	}

	public function get_joined_trips($userId) {
		$query = "select trips. id, trips.destination, trips.start_date, trips.end_date, trips.description from trip_joiners JOIN trips ON trip_joiners.trip_id = trips.id WHERE trip_joiners.joiner_id = $userId";
		return $this->db->query($query)->result_array();
	}
}