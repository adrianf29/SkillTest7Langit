<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Match_control extends CI_Controller {

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
		if ($this->uri->segment(2)=="choose_type") {
			$this->load->view('mc_choose_type');
		}elseif ($this->uri->segment(2)=="singles") {
			$data['message'] = '';
			$data['court'] = $this->m_court->show_all_court();
			$data['type'] = $this->m_type->show_all_type();
			$data['subclass'] = $this->m_subclass->show_all_subclass();
			$data['country'] = $this->m_country->show_all_country();
			$data['list'] = $this->db->where('type_id','1')->get('tbl_court')->result();
        	$this->m_class->set_type_id(1);
			$data['class'] = $this->m_class->show_class_by_type_id();
			$this->load->view('mc_singles',$data);
		}elseif ($this->uri->segment(2)=="doubles") {
			$data['message'] = '';
			$data['court'] = $this->m_court->show_all_court();
			$data['type'] = $this->m_type->show_all_type();
			$data['subclass'] = $this->m_subclass->show_all_subclass();
			$data['country'] = $this->m_country->show_all_country();
        	$this->m_class->set_type_id(2);
			$data['list'] = $this->db->where('type_id','2')->get('tbl_court')->result();
			$data['class'] = $this->m_class->show_class_by_type_id();
			$this->load->view('mc_doubles',$data);
		}elseif($this->uri->segment(2)){
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
				$this->load->view('mc_inside',$data);
		}else{
			$this->m_court->set_status("1");
			$data['court'] = $this->m_court->show_all_active_court();
			$this->load->view('mc_index',$data);
		}
		
	}

	public function get_class(){
		$type_id = $this->input->post('type');
        $this->m_class->set_type_id($type_id);
        $class = $this->m_class->show_class_by_type_id();
        echo "<option value='' disabled='disabled' selected>Choose Class</option>";
        foreach ($class->result() as $row) {
            echo "<option value='".$row->class_id."'>".$row->class_name."</option>";
        } 
	}

	public function create_game_singles(){
		$class_id = $this->input->post('class_id');
		$subclass_id = $this->input->post('subclass_id');
		$court_number = $this->input->post('court_number');
		$umpire_name = $this->input->post('umpire_name');
		$shuttle_cock = $this->input->post('shuttlecock');
		$order_of_play = $this->input->post('order_of_play');
		$country_id_1 = $this->input->post('country_id_1');
		$country_id_2 = $this->input->post('country_id_2');
		$club_name1 = $this->input->post('club_name1');
		$club_name2 = $this->input->post('club_name2');
		
		$player_name_single_1 = $this->input->post('player1_name1');
		$player_name_single_2 = $this->input->post('player2_name1');
		
		$this->m_court->set_country_id($country_id_1);
		$this->m_court->set_country_id2($country_id_2);		
		$this->m_court->set_club_name1($club_name1);
		$this->m_court->set_club_name2($club_name2);		
		$this->m_court->set_type_id(1);	
		$this->m_court->set_class_id($class_id);
		$this->m_court->set_subclass_id($subclass_id);
		$this->m_court->set_court_number($court_number);
		$this->m_court->set_umpire_name($umpire_name);
		$this->m_court->set_time("00:00:00");
		$this->m_court->set_shuttle_cock($shuttle_cock);
		$this->m_court->set_status('0');
		$this->m_court->set_order_of_play($order_of_play);
		$this->m_court->set_player_name1($player_name_single_1);
		$this->m_court->set_player_name2($player_name_single_2);
		
		
        $order_of_play_check = $this->m_court->order_of_play_check();
        if (count($order_of_play_check->result())>0) {
        	$this->session->set_flashdata('message', 'Please choose another play');
            redirect(site_url().'match_control/doubles');
			
        }else{
        	$this->m_court->add_new_court();

			$court = $this->m_court->get_last_court_id();
			foreach ($court->result() as $val) {
				$court_id = $val->court_id;
			}

			$country_id_1 = $this->input->post('country_id_1');
			$country_id_2 = $this->input->post('country_id_2');
			$player1_name1 = $this->input->post('player1_name1');
			$player2_name1 = $this->input->post('player2_name1');
			
			$this->m_team->set_country_id($country_id_1);
			$this->m_team->set_court_id($court_id);
			$this->m_team->add_new_team();

			$team = $this->m_team->get_last_team_by_court_id();
			foreach ($team->result() as $val) {
				$team_id = $val->team_id;
			}
			$this->m_player->set_team_id($team_id);
			$this->m_player->set_player_name($player1_name1);
			$this->m_player->add_new_player();

			$this->m_stage->set_team_id($team_id);
			$this->m_stage->set_stage_number(1);
			$this->m_stage->set_score(0);
			$this->m_stage->add_new_stage();

			$this->m_team->set_country_id($country_id_2);
			$this->m_team->set_court_id($court_id);
			$this->m_team->add_new_team();

			$team = $this->m_team->get_last_team_by_court_id();
			foreach ($team->result() as $val) {
				$team_id = $val->team_id;
			}
			$this->m_player->set_team_id($team_id);
			$this->m_player->set_player_name($player2_name1);
			$this->m_player->add_new_player();

			$this->m_stage->set_team_id($team_id);
			$this->m_stage->set_stage_number(1);
			$this->m_stage->set_score(0);
			$this->m_stage->add_new_stage();

			$this->session->set_flashdata('message', 'Game Successfully added');
			redirect(site_url().'match_control/singles');
        }
		
	}

	public function create_game_doubles(){
		$class_id = $this->input->post('class_id');
		$subclass_id = $this->input->post('subclass_id');
		//$court_number = $this->input->post('court_number');
		$umpire_name = $this->input->post('umpire_name');
		$shuttle_cock = $this->input->post('shuttlecock');
		$order_of_play = $this->input->post('order_of_play');
		$country_id_1 = $this->input->post('country_id_1');
		$country_id_2 = $this->input->post('country_id_2');
		$club_name1 = $this->input->post('club_name1');
		$club_name2 = $this->input->post('club_name2');
		$club_name3 = $this->input->post('club_name3');
		$club_name4 = $this->input->post('club_name4');

			$player_name_1 = $this->input->post('player1_name1');
			$player_name_2 = $this->input->post('player2_name1');
			$player_name_3 = $this->input->post('player1_name2');
			$player_name_4 = $this->input->post('player2_name2');
		
		$this->m_court->set_country_id($country_id_1);
		$this->m_court->set_country_id2($country_id_2);		
		$this->m_court->set_club_name_doubles_1($club_name1);
		$this->m_court->set_club_name_doubles_2($club_name2);		
		$this->m_court->set_club_name_doubles_3($club_name3);
		$this->m_court->set_club_name_doubles_4($club_name4);
		
		$this->m_court->set_player_name_1($player_name_1);
		$this->m_court->set_player_name_2($player_name_2);
		$this->m_court->set_player_name_3($player_name_3);
		$this->m_court->set_player_name_4($player_name_4);
		$this->m_court->set_type_id(2);	
		$this->m_court->set_class_id($class_id);
		$this->m_court->set_subclass_id($subclass_id);
		$this->m_court->set_court_number(0);
		$this->m_court->set_umpire_name($umpire_name);
		$this->m_court->set_time("00:00:00");
		$this->m_court->set_shuttle_cock($shuttle_cock);
		$this->m_court->set_status("0");
		$this->m_court->set_order_of_play($order_of_play);

        $order_of_play_check = $this->m_court->order_of_play_check();
        if (count($order_of_play_check->result())>0) {
        	$this->session->set_flashdata('message', 'Please choose another play');
            redirect(site_url().'match_control/doubles');
        }else{
            $this->m_court->add_new_court();

			$court = $this->m_court->get_last_court_id();
			foreach ($court->result() as $val) {
				$court_id = $val->court_id;
			}

			$country_id_1 = $this->input->post('country_id_1');
			$country_id_2 = $this->input->post('country_id_2');
			$player1_name1 = $this->input->post('player1_name1');
			$player2_name1 = $this->input->post('player2_name1');
			$player1_name2 = $this->input->post('player1_name2');
			$player2_name2 = $this->input->post('player2_name2');
			
			$this->m_team->set_country_id($country_id_1);
			$this->m_team->set_court_id($court_id);
			$this->m_team->add_new_team();

			$team = $this->m_team->get_last_team_by_court_id();
			foreach ($team->result() as $val) {
				$team_id = $val->team_id;
			}
			$this->m_player->set_team_id($team_id);
			$this->m_player->set_player_name($player1_name1);
			$this->m_player->add_new_player();
			$this->m_player->set_player_name($player1_name2);
			$this->m_player->add_new_player();
			
			$this->m_stage->set_team_id($team_id);
			$this->m_stage->set_stage_number(1);
			$this->m_stage->set_score(0);
			$this->m_stage->add_new_stage();

			$this->m_team->set_country_id($country_id_2);
			$this->m_team->set_court_id($court_id);
			$this->m_team->add_new_team();

			$team = $this->m_team->get_last_team_by_court_id();
			foreach ($team->result() as $val) {
				$team_id = $val->team_id;
			}
			$this->m_player->set_team_id($team_id);
			$this->m_player->set_player_name($player2_name1);
			$this->m_player->add_new_player();
			$this->m_player->set_player_name($player2_name2);
			$this->m_player->add_new_player();

			$this->m_stage->set_team_id($team_id);
			$this->m_stage->set_stage_number(1);
			$this->m_stage->set_score(0);
			$this->m_stage->add_new_stage();

			$this->session->set_flashdata('message', 'Game Successfully added');
			redirect(site_url().'match_control/doubles');
        }
	}

	public function choose_game(){
		$court_id = $this->input->post("choose_court");
		redirect(site_url().'match_control/'.$court_id);
	}

	public function order_of_play_check(){
		$order_of_play = $this->input->post('order_of_play');
        $this->m_court->set_order_of_play($order_of_play);
        $order_of_play_check = $this->m_court->order_of_play_check();
        if (count($order_of_play_check->result())>0) {
            $isAvailable = false; // or false
        }else{
            $isAvailable = true;
        }

        // Finally, return a JSON
        echo json_encode(array(
            'valid' => $isAvailable,
        ));
	}

	public function score_team_1(){
		$court_number = $this->uri->segment(2);
		$this->m_court->set_court_number($court_number);
		$this->m_court->set_status("1");

		$court_active_check = $this->m_court->court_active_check();
		foreach($court_active_check->result() as $rows) {
           $court_id = $rows->court_id;
        }
        if (count($court_active_check->result())>0) {
			$stage_number = $this->uri->segment(3);
			$this->m_team->set_court_id($court_id);
			$team_id = array();
			$team = $this->m_team->get_team_by_court_id();
			$i = 1;
			foreach($team->result() as $rows) {
	           	$team_id[$i] = $rows->team_id;
		        $i++;
	        }
	        
	        $this->m_stage->set_team_id($team_id[1]);
	        $this->m_stage->set_stage_number($stage_number);
			$score = $this->m_stage->stage_check();
			if (count($score->result())>0) {
				foreach($score->result() as $score1) {
		           echo $score1->score;
		        }
			}else{
				echo "-";
			}
        }else{
        	echo "-";
        }
	}

	public function score_team_2(){
		$court_number = $this->uri->segment(2);
		$this->m_court->set_court_number($court_number);
		$this->m_court->set_status("1");

		$court_active_check = $this->m_court->court_active_check();
		foreach($court_active_check->result() as $rows) {
           $court_id = $rows->court_id;
        }
        if (count($court_active_check->result())>0) {
			$stage_number = $this->uri->segment(3);
			$this->m_team->set_court_id($court_id);
			$team_id = array();
			$team = $this->m_team->get_team_by_court_id();
			$i = 1;
			foreach($team->result() as $rows) {
	           	$team_id[$i] = $rows->team_id;
		        $i++;
	        }
	        
	        $this->m_stage->set_team_id($team_id[2]);
	        $this->m_stage->set_stage_number($stage_number);
			$score = $this->m_stage->stage_check();
			if (count($score->result())>0) {
				foreach($score->result() as $score1) {
		           echo $score1->score;
		        }
			}else{
				echo "-";
			}
	        }else{
        	echo "-";
        }
	}
	
	function confirmapprove($court_id,$status,$court_number){
		$cek_payment = $this->db->where('court_number',$court_number)->order_by('order_of_play','desc')->from('tbl_court')->get()->row();
		$dapat = $cek_payment->order_of_play;
		//SELECT * FROM tbl_court WHERE court_number='3' and status='0' and order_of_play < 4 ORDER BY court_id DESC LIMIT 1;
		$cek_urutan = $this->db->where('court_number',$court_number)->where('status','1')->where('order_of_play <',$dapat)->from('tbl_court')->get()->row();
		$dapat2='';
		if($cek_urutan){
		$dapat2 = $cek_urutan->status;
		}
		
		//print_r($dapat2);die;
		
	   if($dapat2==0 || $dapat2==2){
			
		//print_r($email);die;
        $update = array(
            'status' => $status
            );
        $this->db->where('court_id',$court_id)->update('tbl_court',$update);
		$this->session->set_flashdata('message', 'Play!');
		}
		else{
		$this->session->set_flashdata('message', 'You Must Wait untill previous match done!');
		//$data['message'] = '';
		}
		redirect(site_url().'match_control/singles');
        //redirect('macth_control/singles');
    }
	
	function confirmapprove2($court_id,$status,$court_number){
		$cek_payment = $this->db->where('court_number',$court_number)->order_by('order_of_play','desc')->from('tbl_court')->get()->row();
		$dapat = $cek_payment->order_of_play;
		//SELECT * FROM tbl_court WHERE court_number='3' and status='0' and order_of_play < 4 ORDER BY court_id DESC LIMIT 1;
		$cek_urutan = $this->db->where('court_number',$court_number)->where('status','1')->where('order_of_play <',$dapat)->from('tbl_court')->get()->row();
		$dapat2='';
		if($cek_urutan){
		$dapat2 = $cek_urutan->status;
		}
		
		//print_r($dapat2);die;
		if($dapat2==0 || $dapat2==2){
			
		//print_r($email);die;
        $update = array(
            'status' => $status
            );
        $this->db->where('court_id',$court_id)->update('tbl_court',$update);
		$this->session->set_flashdata('message', 'Play!');
		}
		else{
		$this->session->set_flashdata('message', 'You Must Wait untill previous match done!');
		}
		redirect(site_url().'match_control/doubles');
        //redirect('macth_control/singles');
    }

	function confirmapprove3(){
		$court_id = $this->input->post('court_id');
		$court_number = $this->input->post('court_number');
		$status = $this->input->post('status');
		
		//$cek_payment = $this->db->where('court_number',$court_number)->order_by('order_of_play','desc')->from('tbl_court')->get()->row();
		//$dapat = $cek_payment->order_of_play;
		//SELECT * FROM tbl_court WHERE court_number='3' and status='0' and order_of_play < 4 ORDER BY court_id DESC LIMIT 1;
		//$cek_urutan = $this->db->where('court_number',$court_number)->where('status','1')->where('order_of_play <',$dapat)->from('tbl_court')->get()->row();
		//$dapat2='';
		//if($cek_urutan){
		//$dapat2 = $cek_urutan->status;
		//}
		
		//print_r($dapat2);die;
		//if($dapat2==0 || $dapat2==2){
			
		//print_r($email);die;
        $update = array(
            'status' => $status
            );
        $this->db->where('court_id',$court_id)->update('tbl_court',$update);
		
		$update2 = array(
            'court_number' => $court_number
            );
        $this->db->where('court_id',$court_id)->update('tbl_court',$update2);
		
		$this->session->set_flashdata('message', 'Play!');
		//}
		//else{
		//$this->session->set_flashdata('message', 'You Must Wait untill previous match done!');
		//}
		redirect(site_url().'match_control/doubles');
        //redirect('macth_control/singles');
    }
	public function export()
	{
		$data['singles_game'] = $this->m_court->show_all_singles_game();
		$data['doubles_game'] = $this->m_court->show_all_doubles_game();
		$this->load->view('mc_export',$data);
	}
}
