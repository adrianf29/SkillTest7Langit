<?php

class M_player extends CI_Model {
	private $player_id;
	private $team_id;
	private $player_name;

    /*
	| -------------------------------------------------------------------------
	| Setter
	| -------------------------------------------------------------------------
	*/
	public function set_player_id($value) {
        $this->player_id = $value; }
	public function set_team_id($value) {
        $this->team_id = $value; }
    public function set_player_name($value) {
        $this->player_name = $value; }

    /*
	| -------------------------------------------------------------------------
	| Getter
	| -------------------------------------------------------------------------
	*/
	public function get_player_id() {
        return $this->player_id; }
	public function get_team_id() {
        return $this->team_id; }
    public function get_player_name() {
        return $this->player_name; }

	/*
	| -------------------------------------------------------------------------
	| Add new player
	| -------------------------------------------------------------------------
	*/
	public function add_new_player()
	{	
		$data = array(
	        'team_id' => $this->get_team_id(),
	        'player_name' => $this->get_player_name()
		);
		$this->db->insert('tbl_player', $data);
	}

	/*
	| -------------------------------------------------------------------------
	| Get player by team id
	| -------------------------------------------------------------------------
	*/
	public function get_player_by_team_id()
	{	
		$this->db->select('*');
		$this->db->from('tbl_player');
		$this->db->join('tbl_team', 'tbl_team.team_id = tbl_player.team_id','inner');
		$this->db->join('tbl_country', 'tbl_country.country_id = tbl_team.country_id','inner');
		$this->db->where('tbl_player.team_id',$this->get_team_id());
		return $this->db->get();
	}
}