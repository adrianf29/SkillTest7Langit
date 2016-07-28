<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Umpire extends CI_Controller {

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
	           $type_id = $rows->type_id;
	        }
	        if (count($court_active_check->result())>0) {
				$this->m_team->set_court_id($court_id);
				$team_id = array();
				$team = $this->m_team->get_team_by_court_id();
				$i=1;
				foreach($team->result() as $rows) {
		           $team_id[$i] = $rows->team_id;
		           $i++;
		        }
				$this->m_court->set_court_id($court_id);
		        $this->m_player->set_team_id($team_id[1]);
		        $this->m_stage->set_team_id($team_id[1]);
				$data['team1'] =  $this->m_player->get_player_by_team_id();
				$data['score_team1'] =  $this->m_stage->get_stage_by_team_id();
				$this->m_player->set_team_id($team_id[2]);
		        $this->m_stage->set_team_id($team_id[2]);
				$data['team2'] =  $this->m_player->get_player_by_team_id();
				$data['score_team2'] =  $this->m_stage->get_stage_by_team_id();
				if ($type_id==2) {
					if ($this->session->userdata('reverse_team_1')==NULL) {
						$this->session->set_userdata('reverse_team_1','no');
					}

					if ($this->session->userdata('reverse_team_2')==NULL) {
						$this->session->set_userdata('reverse_team_2','no');
					}
				}
			}
			if ($this->session->userdata('serve')==NULL) {
				$this->session->set_userdata('serve','genap_player1');
			}
			$data['court'] = $this->m_court->show_game_by_court_id();
			$data['country'] = $this->m_team->get_country_by_court_id();
			$this->load->view('um_inside',$data);
		}else{
			$this->m_court->set_status("1");
			$data['court'] = $this->m_court->show_all_active_court();
			$this->load->view('um_index',$data);
		}
		
	}

	public function player1_name1(){
		$court_number = $this->uri->segment(2);
		$this->m_court->set_court_number($court_number);
		$this->m_court->set_status("1");

		$court_active_check = $this->m_court->court_active_check();
		foreach($court_active_check->result() as $rows) {
           $court_id = $rows->court_id;
        }

		$this->m_team->set_court_id($court_id);
		$team_id = array();
		$team = $this->m_team->get_team_by_court_id();
		$i=1;
		foreach($team->result() as $rows) {
           $team_id[$i] = $rows->team_id;
           $i++;
        }
        $this->m_player->set_team_id($team_id[1]);
        $player_name = array();
		$player = $this->m_player->get_player_by_team_id();
		$i=1;
		foreach($player->result() as $rows) {
           $player_name[$i] = $rows->player_name;
           $i++;
        }
        echo $player_name[1];
	}

	public function player1_name2(){
		$court_number = $this->uri->segment(2);
		$this->m_court->set_court_number($court_number);
		$this->m_court->set_status("1");

		$court_active_check = $this->m_court->court_active_check();
		foreach($court_active_check->result() as $rows) {
           $court_id = $rows->court_id;
        }

		$this->m_team->set_court_id($court_id);
		$team_id = array();
		$team = $this->m_team->get_team_by_court_id();
		$i=1;
		foreach($team->result() as $rows) {
           $team_id[$i] = $rows->team_id;
           $i++;
        }
        $this->m_player->set_team_id($team_id[1]);
        $player_name = array();
		$player = $this->m_player->get_player_by_team_id();
		$i=1;
		foreach($player->result() as $rows) {
           $player_name[$i] = $rows->player_name;
           $i++;
        }
        if (count($player->result())>1) {
        	echo $player_name[2];
        }
	}

	public function player2_name1(){
		$court_number = $this->uri->segment(2);
		$this->m_court->set_court_number($court_number);
		$this->m_court->set_status("1");

		$court_active_check = $this->m_court->court_active_check();
		foreach($court_active_check->result() as $rows) {
           $court_id = $rows->court_id;
        }

		$this->m_team->set_court_id($court_id);
		$team_id = array();
		$team = $this->m_team->get_team_by_court_id();
		$i=1;
		foreach($team->result() as $rows) {
           $team_id[$i] = $rows->team_id;
           $i++;
        }
        $this->m_player->set_team_id($team_id[2]);
        $player_name = array();
		$player = $this->m_player->get_player_by_team_id();
		$i=1;
		foreach($player->result() as $rows) {
           $player_name[$i] = $rows->player_name;
           $i++;
        }
        echo $player_name[1];
	}

	public function player2_name2(){
		$court_number = $this->uri->segment(2);
		$this->m_court->set_court_number($court_number);
		$this->m_court->set_status("1");

		$court_active_check = $this->m_court->court_active_check();
		foreach($court_active_check->result() as $rows) {
           $court_id = $rows->court_id;
        }

		$this->m_team->set_court_id($court_id);
		$team_id = array();
		$team = $this->m_team->get_team_by_court_id();
		$i=1;
		foreach($team->result() as $rows) {
           $team_id[$i] = $rows->team_id;
           $i++;
        }
        $this->m_player->set_team_id($team_id[2]);
        $player_name = array();
		$player = $this->m_player->get_player_by_team_id();
		$i=1;
		foreach($player->result() as $rows) {
           $player_name[$i] = $rows->player_name;
           $i++;
        }
        if (count($player->result())>1) {
        	echo $player_name[2];
        }
	}

	public function choose_game(){
		$court_id = $this->input->post("choose_court");
		redirect(site_url().'umpire/'.$court_id);
	}

	public function play_game(){
		$this->session->set_userdata('play_game','yes');
	}

	public function game_over(){
		$court_number = $this->uri->segment(2);
		$this->m_court->set_court_number($court_number);
		$this->m_court->set_status("1");
		$court_active_check = $this->m_court->court_active_check();
		foreach($court_active_check->result() as $rows) {
           $court_id = $rows->court_id;
        }
		$this->m_court->set_court_id($court_id);
		$this->m_court->set_status("2");
		$this->m_court->update_status();

		$this->session->unset_userdata('play_game');
		$this->session->unset_userdata('reverse');
		$this->session->unset_userdata('reverse_confirm');
		$this->session->unset_userdata('serve');
		$this->session->unset_userdata('reverse_team_1');
		$this->session->unset_userdata('reverse_team_2');
		$this->session->unset_userdata('rubber');
		redirect(site_url().'umpire/'.$this->uri->segment(2));
	}

	public function reverse(){
		if ($this->input->post('reverse')=='yes') {
			$this->session->unset_userdata('reverse');
			$this->session->set_userdata('reverse','yes');
			$this->session->unset_userdata('serve');
			$this->session->set_userdata('serve','genap_player2');
			redirect(site_url().'umpire/'.$this->uri->segment(2));
		}else{
			$this->session->unset_userdata('reverse');
			$this->session->set_userdata('reverse','no');
			$this->session->unset_userdata('serve');
			$this->session->set_userdata('serve','genap_player1');
			redirect(site_url().'umpire/'.$this->uri->segment(2));
		}
	}

	public function stage_reverse(){
		if ($this->session->userdata('reverse')=='yes') {
			$this->session->unset_userdata('reverse');
			$this->session->set_userdata('reverse','no');
		}else{
			$this->session->unset_userdata('reverse');
			$this->session->set_userdata('reverse','yes');
		}
	}

	public function reverse_team_1(){
		if ($this->session->userdata('reverse_team_1')=='yes') {
			$this->session->unset_userdata('reverse_team_1');
			$this->session->set_userdata('reverse_team_1','no');
			redirect(site_url().'umpire/'.$this->uri->segment(2));
		}else{
			$this->session->unset_userdata('reverse_team_1');
			$this->session->set_userdata('reverse_team_1','yes');
			redirect(site_url().'umpire/'.$this->uri->segment(2));
		}
	}

	public function reverse_team_2(){
		if ($this->session->userdata('reverse_team_2')=='yes') {
			$this->session->unset_userdata('reverse_team_2');
			$this->session->set_userdata('reverse_team_2','no');
			redirect(site_url().'umpire/'.$this->uri->segment(2));
		}else{
			$this->session->unset_userdata('reverse_team_2');
			$this->session->set_userdata('reverse_team_2','yes');
			redirect(site_url().'umpire/'.$this->uri->segment(2));
		}
	}

	public function reverse_stage_team_1(){
		if ($this->session->userdata('reverse_team_1')=='yes') {
			$this->session->unset_userdata('reverse_team_1');
			$this->session->set_userdata('reverse_team_1','no');
		}else{
			$this->session->unset_userdata('reverse_team_1');
			$this->session->set_userdata('reverse_team_1','yes');
		}
	}

	public function reverse_stage_team_2(){
		if ($this->session->userdata('reverse_team_2')=='yes') {
			$this->session->unset_userdata('reverse_team_2');
			$this->session->set_userdata('reverse_team_2','no');
		}else{
			$this->session->unset_userdata('reverse_team_2');
			$this->session->set_userdata('reverse_team_2','yes');
		}
	}

	public function reverse_rubber_single(){
		$this->session->unset_userdata('rubber');
		$this->session->set_userdata('rubber','yes');
	}

	public function reverse_confirm(){
		$this->session->set_userdata('reverse_confirm','yes');
		redirect(site_url().'umpire/'.$this->uri->segment(2));
	}

	public function serve1(){
		if ($this->input->post('serve')=='team1') {
			$this->session->unset_userdata('serve');
			$this->session->set_userdata('serve','team1');
			redirect(site_url().'umpire/'.$this->uri->segment(2));
		}else{
			$this->session->unset_userdata('serve');
			$this->session->set_userdata('serve','team2');
			redirect(site_url().'umpire/'.$this->uri->segment(2));
		}
	}

	public function serve(){
		$serve = $this->input->post('serve');
		$this->session->unset_userdata('serve');
		$this->session->set_userdata('serve',$serve);
	}

	public function serve_genap_player_1(){
		$this->session->unset_userdata('serve');
		$this->session->set_userdata('serve','genap_player1');
	}

	public function serve_genap_player_2(){
		$this->session->unset_userdata('serve');
		$this->session->set_userdata('serve','genap_player2');
	}

	public function serve_ganjil_player_1(){
		$this->session->unset_userdata('serve');
		$this->session->set_userdata('serve','ganjil_player1');
	}

	public function serve_ganjil_player_2(){
		$this->session->unset_userdata('serve');
		$this->session->set_userdata('serve','ganjil_player2');
	}

	public function serve_continue(){
		if ($this->input->post('serve')=='team1') {
			$this->session->unset_userdata('serve');
			$this->session->set_userdata('serve','team1');
		}else{
			$this->session->unset_userdata('serve');
			$this->session->set_userdata('serve','team2');
		}
	}

	public function add_score_1(){
		$court_number = $this->uri->segment(2);
		$stage_number = $this->uri->segment(3);
		$this->m_court->set_court_number($court_number);
		$this->m_court->set_status("1");

		$court_active_check = $this->m_court->court_active_check();
		foreach($court_active_check->result() as $rows) {
           $court_id = $rows->court_id;
        }
		$score = $this->input->post('score');
		$this->m_team->set_court_id($court_id);
		$team_id = array();
		$team = $this->m_team->get_team_by_court_id();
		$i=1;
		foreach($team->result() as $rows) {
           $team_id[$i] = $rows->team_id;
           $i++;
        }
        $this->m_stage->set_team_id($team_id[1]);
        $this->m_stage->set_stage_number($stage_number);
        $this->m_stage->set_score($score);
		$this->m_stage->add_score_by_team_id();
	}

	public function add_score_2(){
		$court_number = $this->uri->segment(2);
		$stage_number = $this->uri->segment(3);
		$this->m_court->set_court_number($court_number);
		$this->m_court->set_status("1");

		$court_active_check = $this->m_court->court_active_check();
		foreach($court_active_check->result() as $rows) {
           $court_id = $rows->court_id;
        }
		$score = $this->input->post('score');
		$this->m_team->set_court_id($court_id);
		$team_id = array();
		$team = $this->m_team->get_team_by_court_id();
		$i=1;
		foreach($team->result() as $rows) {
           $team_id[$i] = $rows->team_id;
           $i++;
        }
        $this->m_stage->set_team_id($team_id[2]);
        $this->m_stage->set_stage_number($stage_number);
        $this->m_stage->set_score($score);
		$this->m_stage->add_score_by_team_id();
	}

	public function add_shuttlecock(){
		$court_number = $this->uri->segment(2);
		$this->m_court->set_court_number($court_number);
		$this->m_court->set_status("1");

		$court_active_check = $this->m_court->court_active_check();
		foreach($court_active_check->result() as $rows) {
           $court_id = $rows->court_id;
        }
		$shuttlecock = $this->input->post('shuttlecock');
		$this->m_court->set_court_id($court_id);
		$this->m_court->set_shuttle_cock($shuttlecock);
		$this->m_court->add_shuttlecock();
	}

	public function add_time(){
		$court_number = $this->uri->segment(2);
		$this->m_court->set_court_number($court_number);
		$this->m_court->set_status("1");

		$court_active_check = $this->m_court->court_active_check();
		foreach($court_active_check->result() as $rows) {
           $court_id = $rows->court_id;
        }
		$time = $this->input->post('seconds');
		$this->m_court->set_court_id($court_id);
		$this->m_court->set_time($time);
		$this->m_court->add_time();
	}

	public function add_new_stage(){
		$court_number = $this->uri->segment(2);
		$this->m_court->set_court_number($court_number);
		$this->m_court->set_status("1");

		$court_active_check = $this->m_court->court_active_check();
		foreach($court_active_check->result() as $rows) {
           $court_id = $rows->court_id;
        }
		$this->m_team->set_court_id($court_id);
		$team = $this->m_team->get_team_by_court_id();
		foreach($team->result() as $rows) {
           	$team_id = $rows->team_id;
			
           	$this->m_stage->set_team_id($team_id);
			$stage = $this->m_stage->get_stage_by_team_id();
			foreach($stage->result() as $row) {
	           $stage_number = $row->stage_number;
	        }
			$this->m_stage->set_stage_number($stage_number+1);
			$this->m_stage->set_score(0);
			$this->m_stage->add_new_stage();
        }
	}	

	public function stage_check(){
		$court_number = $this->uri->segment(2);
		$this->m_court->set_court_number($court_number);
		$this->m_court->set_status("1");

		$court_active_check = $this->m_court->court_active_check();
		foreach($court_active_check->result() as $rows) {
           $court_id = $rows->court_id;
        }
		$this->m_team->set_court_id($court_id);
		$score_stage_1 = array();
		$score_stage_2 = array();
		$team = $this->m_team->get_team_by_court_id();
		$i = 1;
		foreach($team->result() as $rows) {
           	$team_id = $rows->team_id;
	        $this->m_stage->set_team_id($team_id);
	        $this->m_stage->set_stage_number(1);
			$score = $this->m_stage->stage_check();
			foreach($score->result() as $score1) {
	           $score_stage_1[$i] = $score1->score;
	        }

	        $this->m_stage->set_stage_number(2);
			$score = $this->m_stage->stage_check();
			foreach($score->result() as $score2) {
	           $score_stage_2[$i] = $score2->score;
	        }
	        $i++;
        }

        if (($score_stage_1[1] > $score_stage_1[2])&&($score_stage_2[1] > $score_stage_2[2])) {
        	echo "finish";
        }elseif (($score_stage_1[1] < $score_stage_1[2])&&($score_stage_2[1] < $score_stage_2[2])) {
        	echo "finish";
        }else{
        	echo "continue";
        }
	}

	public function umpire_name(){
		$court_number = $this->uri->segment(2);
		$this->m_court->set_court_number($court_number);
		$this->m_court->set_status("1");

		$court_active_check = $this->m_court->court_active_check();
		foreach($court_active_check->result() as $rows) {
           $court_id = $rows->court_id;
        }
		$this->m_court->set_court_id($court_id);
		$game = $this->m_court->show_game_by_court_id();
		foreach($game->result() as $rows) {
           echo $rows->umpire_name;
        }
	}

	public function type_name(){
		$court_number = $this->uri->segment(2);
		$this->m_court->set_court_number($court_number);
		$this->m_court->set_status("1");

		$court_active_check = $this->m_court->court_active_check();
		foreach($court_active_check->result() as $rows) {
           $court_id = $rows->court_id;
        }
		$this->m_court->set_court_id($court_id);
		$game = $this->m_court->show_game_by_court_id();
		foreach($game->result() as $rows) {
           echo $rows->type_name;
        }
	}

	public function class_name(){
		$court_number = $this->uri->segment(2);
		$this->m_court->set_court_number($court_number);
		$this->m_court->set_status("1");

		$court_active_check = $this->m_court->court_active_check();
		foreach($court_active_check->result() as $rows) {
           $court_id = $rows->court_id;
        }
		$this->m_court->set_court_id($court_id);
		$game = $this->m_court->show_game_by_court_id();
		foreach($game->result() as $rows) {
           echo $rows->class_name;
        }
	}

	public function subclass_name(){
		$court_number = $this->uri->segment(2);
		$this->m_court->set_court_number($court_number);
		$this->m_court->set_status("1");

		$court_active_check = $this->m_court->court_active_check();
		foreach($court_active_check->result() as $rows) {
           $court_id = $rows->court_id;
        }
		$this->m_court->set_court_id($court_id);
		$game = $this->m_court->show_game_by_court_id();
		foreach($game->result() as $rows) {
           echo $rows->subclass_name;
        }
	}

	public function time(){
		$court_number = $this->uri->segment(2);
		$this->m_court->set_court_number($court_number);
		$this->m_court->set_status("1");

		$court_active_check = $this->m_court->court_active_check();
		foreach($court_active_check->result() as $rows) {
           $court_id = $rows->court_id;
        }
        if (count($court_active_check->result())>0) {
			$this->m_court->set_court_id($court_id);
			$game = $this->m_court->show_game_by_court_id();
			foreach($game->result() as $rows) {
	       		$str_time = $rows->time;
	        }

			$str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $str_time);

			sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);

			$minute = $hours * 60 + $minutes;
			echo $minute." '";
        }else{
        	echo "-";
        }
	}

	public function time_process(){
		$court_number = $this->uri->segment(2);
		$this->m_court->set_court_number($court_number);
		$this->m_court->set_status("1");

		$court_active_check = $this->m_court->court_active_check();
		foreach($court_active_check->result() as $rows) {
           $court_id = $rows->court_id;
        }
		$this->m_court->set_court_id($court_id);
		$game = $this->m_court->show_game_by_court_id();
		foreach($game->result() as $rows) {
       		echo $rows->time;
        }
	}

	public function score_1(){
		$court_number = $this->uri->segment(2);
		$this->m_court->set_court_number($court_number);
		$this->m_court->set_status("1");

		$court_active_check = $this->m_court->court_active_check();
		foreach($court_active_check->result() as $rows) {
           $court_id = $rows->court_id;
        }

        if (count($court_active_check->result())>0) {
			$this->m_team->set_court_id($court_id);
			$team_id = array();
			$team = $this->m_team->get_team_by_court_id();
			$i=1;
			foreach($team->result() as $rows) {
	           $team_id[$i] = $rows->team_id;
	           $i++;
	        }
	        $this->m_stage->set_team_id($team_id[1]);
			$score1 = $this->m_stage->get_stage_by_team_id();
			foreach($score1->result() as $row) {
	           echo $row->score;
	        }
        }else{
        	echo "-";
        }
	}

	public function score_2(){
		$court_number = $this->uri->segment(2);
		$this->m_court->set_court_number($court_number);
		$this->m_court->set_status("1");

		$court_active_check = $this->m_court->court_active_check();
		foreach($court_active_check->result() as $rows) {
           $court_id = $rows->court_id;
        }

        if (count($court_active_check->result())>0) {
			$this->m_team->set_court_id($court_id);
			$team_id = array();
			$team = $this->m_team->get_team_by_court_id();
			$i=1;
			foreach($team->result() as $rows) {
	           $team_id[$i] = $rows->team_id;
	           $i++;
	        }
	        $this->m_stage->set_team_id($team_id[2]);
			$score2 = $this->m_stage->get_stage_by_team_id();
			foreach($score2->result() as $row) {
	           echo $row->score;
	        }
        }else{
        	echo "-";
        }
	}

	public function shuttlecock(){
		$court_number = $this->uri->segment(2);
		$this->m_court->set_court_number($court_number);
		$this->m_court->set_status("1");

		$court_active_check = $this->m_court->court_active_check();
		foreach($court_active_check->result() as $rows) {
           $court_id = $rows->court_id;
        }
		$this->m_court->set_court_id($court_id);
		$game = $this->m_court->show_game_by_court_id();
		foreach($game->result() as $rows) {
           echo $rows->shuttle_cock;
        }
	}

	public function stage_number(){
		$court_number = $this->uri->segment(2);
		$this->m_court->set_court_number($court_number);
		$this->m_court->set_status("1");

		$court_active_check = $this->m_court->court_active_check();
		foreach($court_active_check->result() as $rows) {
           $court_id = $rows->court_id;
        }
		$this->m_team->set_court_id($court_id);
		$team_id = array();
		$team = $this->m_team->get_team_by_court_id();
		$i=1;
		foreach($team->result() as $rows) {
           $team_id[$i] = $rows->team_id;
           $i++;
        }
        $this->m_stage->set_team_id($team_id[2]);
		$stage_number = $this->m_stage->get_stage_by_team_id();
		foreach($stage_number->result() as $row) {
           echo $row->stage_number;
        }
	}
}
