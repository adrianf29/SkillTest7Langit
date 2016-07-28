<?php

class M_stage extends CI_Model {
	private $stage_id;
	private $stage_number;
	private $team_id;
	private $score;

    /*
	| -------------------------------------------------------------------------
	| Setter
	| -------------------------------------------------------------------------
	*/
	
	public function set_stage_id($value) {
        $this->stage_id = $value; }
	public function set_stage_number($value) {
        $this->stage_number = $value; }
	public function set_team_id($value) {
        $this->team_id = $value; }
    public function set_score($value) {
        $this->score = $value; }

    /*
	| -------------------------------------------------------------------------
	| Getter
	| -------------------------------------------------------------------------
	*/
	public function get_stage_id() {
        return $this->stage_id; }
	public function get_stage_number() {
        return $this->stage_number; }
	public function get_team_id() {
        return $this->team_id; }
    public function get_score() {
        return $this->score; }

	/*
	| -------------------------------------------------------------------------
	| Get stage by team id
	| -------------------------------------------------------------------------
	*/
	public function get_stage_by_team_id()
	{	
		$this->db->select('*');
		$this->db->from('tbl_stage');
		$this->db->where('team_id',$this->get_team_id());
		$this->db->order_by('stage_number',"desc");
		$this->db->limit(1);
		return $this->db->get();
	}

	/*
	| -------------------------------------------------------------------------
	| Get stage by team id and stage number
	| -------------------------------------------------------------------------
	*/
	public function stage_check()
	{	
		$this->db->select('*');
		$this->db->from('tbl_stage');
		$this->db->where('team_id',$this->get_team_id());
		$this->db->where('stage_number',$this->get_stage_number());
		return $this->db->get();
	}

	/*
	| -------------------------------------------------------------------------
	| Add score by team_id
	| -------------------------------------------------------------------------
	*/
	public function add_score_by_team_id()
	{	
		$data = array('score' => $this->get_score());
		$this->db->where('team_id', $this->get_team_id());
		$this->db->where('stage_number', $this->get_stage_number());
		$this->db->update('tbl_stage', $data);
	}

	/*
	| -------------------------------------------------------------------------
	| Add new stage
	| -------------------------------------------------------------------------
	*/
	public function add_new_stage()
	{	
		$data = array(
	        'team_id' => $this->get_team_id(),
	        'stage_number' => $this->get_stage_number(),
	        'score' => $this->get_score()
		);
		$this->db->insert('tbl_stage', $data);
	}
}