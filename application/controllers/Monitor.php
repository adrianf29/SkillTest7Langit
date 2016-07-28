<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor extends CI_Controller {

	public function __construct() {
        parent::__construct();
    	$this->load->model('m_type');
    	$this->load->model('m_class');
    	$this->load->model('m_subclass');
    	$this->load->model('m_country');
    	$this->load->model('m_court');
    	$this->load->model('m_team');
    	$this->load->model('m_player');
    	$this->load->model('m_stage');
    }

	public function index()
	{
		if ($this->uri->segment(2)) {
			$court_number = $this->uri->segment(2);
			$this->m_court->set_court_number($court_number);
			$this->m_court->set_status("1");

			$court_active_check = $this->m_court->court_active_check();
			foreach($court_active_check->result() as $rows) {
	           $court_id = $rows->court_id;
	        }

			if (count($court_active_check->result())>0) {
				$this->m_court->set_court_id($court_id);
				$this->m_team->set_court_id($court_id);
				$team_id = array();
				$team = $this->m_team->get_team_by_court_id();
				$i=1;
				foreach($team->result() as $rows) {
		           $team_id[$i] = $rows->team_id;
		           $i++;
		        }

		        $this->m_player->set_team_id($team_id[1]);

				$data['team1'] =  $this->m_player->get_player_by_team_id();
				$this->m_player->set_team_id($team_id[2]);
				$data['team2'] =  $this->m_player->get_player_by_team_id();
			}
			$data['court'] = $this->m_court->show_game_by_court_id();
			
			$data['country'] = $this->m_team->get_country_by_court_id();

			$this->load->view('mo_inside',$data);
		}else{
			$this->m_court->set_status("1");
			$data['court'] = $this->m_court->show_all_active_court();
			$this->load->view('mo_index',$data);
		}
		
	}

	public function choose_game(){
		$court_id = $this->input->post("choose_court");
		redirect(site_url().'monitor/'.$court_id);
	}

	public function status(){
		$court_number = $this->uri->segment(2);
		$this->m_court->set_court_number($court_number);
		$this->m_court->set_status("1");

		$court_active_check = $this->m_court->court_active_check();
		if (count($court_active_check->result())>0) {
			echo 1;
		}else{
			echo 0;
		}
	}

	public function reload(){
		$reload = $this->input->post('reload');
		$this->session->unset_userdata('reload');
		$this->session->set_userdata('reload',$reload);
	}
}
