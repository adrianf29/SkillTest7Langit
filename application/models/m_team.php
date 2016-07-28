<?php

class M_team extends CI_Model {
	private $team_id;
	private $court_id;
	private $country_id;

    /*
	| -------------------------------------------------------------------------
	| Setter
	| -------------------------------------------------------------------------
	*/
	public function set_team_id($value) {
        $this->team_id = $value; }
    public function set_court_id($value) {
        $this->court_id = $value; }
    public function set_country_id($value) {
        $this->country_id = $value; }

    /*
	| -------------------------------------------------------------------------
	| Getter
	| -------------------------------------------------------------------------
	*/
	public function get_team_id() {
        return $this->team_id; }
    public function get_court_id() {
        return $this->court_id; }
    public function get_country_id() {
        return $this->country_id; }

	/*
	| -------------------------------------------------------------------------
	| Add new team
	| -------------------------------------------------------------------------
	*/
	public function add_new_team()
	{	
		$data = array(
	        'country_id' => $this->get_country_id(),
	        'court_id' => $this->get_court_id()
		);
		$this->db->insert('tbl_team', $data);
	}

	/*
	| -------------------------------------------------------------------------
	| Get last team by country id
	| -------------------------------------------------------------------------
	*/
	public function get_last_team_by_court_id()
	{	
		$this->db->select('*');
		$this->db->from('tbl_team');
		$this->db->where('court_id',$this->get_court_id());
		$this->db->order_by('team_id',"desc");
		$this->db->limit(1);
		return $this->db->get();
	}

	/*
	| -------------------------------------------------------------------------
	| Get team by court id
	| -------------------------------------------------------------------------
	*/
	public function get_team_by_court_id()
	{	
		$this->db->select('*');
		$this->db->from('tbl_team');
		$this->db->where('court_id',$this->get_court_id());
		return $this->db->get();
	}

	/*
	| -------------------------------------------------------------------------
	| Get country by court id
	| -------------------------------------------------------------------------
	*/
	public function get_country_by_court_id()
	{	
		$this->db->select('*');
		$this->db->from('tbl_team');
		$this->db->join('tbl_country', 'tbl_team.country_id = tbl_country.country_id','inner');
		$this->db->where('court_id',$this->get_court_id());
		return $this->db->get();
	}
}