<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travels extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();
		$this->output->enable_profiler();
		$this->load->model('Trip');
	}

	public function index()
	{
		$ownTrips = $this->Trip->get_own_trips($this->session->id);
		$joinedTrips = $this->Trip->get_joined_trips($this->session->id);
		$othersTrips = $this->Trip->get_other_trips($this->session->id);
		$this->load->view('travelDashboardView', array("ownTrips" => $ownTrips, "othersTrips" => $othersTrips, "joinedTrips" => $joinedTrips ));
	}

	public function destination($tripId) {
			var_dump($this->Trip->get_destination($tripId));
			$this->load->view('destinationView', array("destination" => $this->Trip->get_destination($tripId), "tripJoiners" => $this->Trip->get_joiners($tripId)));
	}
	public function add() {
		$this->load->view('addPlanView');
	}
	public function join($tripId) {
		$this->Trip->join_trip($tripId, $this->session->id);
		redirect("/travels");
		// echo $tripId;

	}

	public function addTrip() {
		date_default_timezone_set("America/Los_Angeles");
		$result = $this->Trip->validateTrip($this->input->post());	
		$errors = array();
		$start_date = new DateTime($this->input->post('start_date'));
		$end_date = new DateTime($this->input->post('end_date'));
		$current_date = new DateTime();
		if ($start_date > $end_date) {
			$errors['impossibleTimes'] = "You can't leave before your trip has even begun...";
		}
		if ($start_date < $current_date) {
			$errors['earlyStart'] = "Your start date must be in the future";
		}
		if ($end_date < $current_date)  {
			$errors["earlyEnd"] = "Your end date must be in the future";
		}
		if ($result != 'valid') {
			$errors['missingFields'] = $result;
		}
		if (count($errors)) {
			$this->session->set_flashdata("errors", $errors);
			redirect("/travels/newTrip");
		} else {
			$this->Trip->add_trip($this->input->post());
			redirect('/travels');
		}


		// else {
		// 	$this->session->set_flashdata('missingFields', $result);
		// 	redirect("/travels/newTrip");
		// }

	 
		var_dump($date3);
		var_dump($date2);
	}
}