<?php

class M_court extends CI_Model {
	private $court_id;
	private $class_id;
	private $subclass_id;
	private $court_number;
	private $umpire_name;
	private $time;
	private $shuttle_cock;
	private $status;
	private $order_of_play;
	private $type_id;
	private $team_id;
	private $player_name1;
	private $player_name2;
	private $player_name_1;
	private $player_name_2;
	private $player_name_3;
	private $player_name_4;
	private $country_id;
	private $country_id2;
	private $club_name1;
	private $club_name2;
	private $club_name_doubles_1;
	private $club_name_doubles_2;
	private $club_name_doubles_3;
	private $club_name_doubles_4;
	

    /*
	| -------------------------------------------------------------------------
	| Setter
	| -------------------------------------------------------------------------
	*/
	public function set_court_id($value) {
        $this->court_id = $value; }
    public function set_class_id($value) {
        $this->class_id = $value; }
    public function set_subclass_id($value) {
        $this->subclass_id = $value; }
    public function set_court_number($value) {
        $this->court_number = $value; }
    public function set_umpire_name($value) {
        $this->umpire_name = $value; }
    public function set_time($value) {
        $this->time = $value; }
    public function set_shuttle_cock($value) {
        $this->shuttle_cock = $value; }
    public function set_status($value) {
        $this->status = $value; }
    public function set_order_of_play($value) {
        $this->order_of_play = $value; }
	public function set_type_id($value) {
        $this->type_id= $value; }
	public function set_player_name1($value) {
        $this->player_name1= $value; }
	public function set_player_name2($value) {
        $this->player_name2 = $value; }
	public function set_player_name_1($value) {
        $this->player_name_1 = $value; }
	public function set_player_name_2($value) {
        $this->player_name_2 = $value; }
	public function set_player_name_3($value) {
        $this->player_name_3= $value; }
	public function set_player_name_4($value) {
        $this->player_name_4 = $value; }
	public function set_country_id($value) {
        $this->country_id = $value; }
	public function set_country_id2($value) {
        $this->country_id2= $value; }
	public function set_club_name1($value) {
        $this->club_name1 = $value; }
	public function set_club_name2($value) {
        $this->club_name2= $value; }
	public function set_club_name_doubles_1($value) {
        $this->club_name_doubles_1 = $value; }
	public function set_club_name_doubles_2($value) {
        $this->club_name_doubles_2= $value; }
		public function set_club_name_doubles_3($value) {
        $this->club_name_doubles_3 = $value; }
	public function set_club_name_doubles_4($value) {
        $this->club_name_doubles_4= $value; }
    
	/*
	| -------------------------------------------------------------------------
	| Getter
	| -------------------------------------------------------------------------
	*/
	public function get_court_id() {
        return $this->court_id; }
    public function get_class_id() {
        return $this->class_id; }
    public function get_subclass_id() {
        return $this->subclass_id; }
    public function get_court_number() {
        return $this->court_number; }
    public function get_umpire_name() {
        return $this->umpire_name; }
    public function get_time() {
        return $this->time; }
    public function get_shuttle_cock() {
        return $this->shuttle_cock; }
    public function get_status() {
        return $this->status; }
    public function get_order_of_play() {
        return $this->order_of_play; }
	public function get_type_id() {
        return $this->type_id; }
	public function get_player_name1() {
        return $this->player_name1; }
	public function get_player_name2() {
        return $this->player_name2; }
	public function get_player_name_1() {
        return $this->player_name_1; }
	public function get_player_name_2() {
        return $this->player_name_2; }
	public function get_player_name_3() {
        return $this->player_name_3; }
	public function get_player_name_4() {
        return $this->player_name_4; }
	public function get_country_id() {
        return $this->country_id;}
	public function get_country_id2() {
        return $this->country_id2; }
	public function get_club_name1() {
        return $this->club_name1;}
	public function get_club_name2() {
        return $this->club_name2; }
	public function get_club_name_doubles_1() {
        return $this->club_name_doubles_1;}
	public function get_club_name_doubles_2() {
        return $this->club_name_doubles_2; }
	public function get_club_name_doubles_3() {
        return $this->club_name_doubles_3;}
	public function get_club_name_doubles_4() {
        return $this->club_name_doubles_4; }
	/*
	| -------------------------------------------------------------------------
	| Check order of play
	| -------------------------------------------------------------------------
	*/
	public function order_of_play_check()
	{	
		$this->db->select('*');
		$this->db->from('tbl_court');
		$this->db->where('order_of_play',$this->get_order_of_play());
		$this->db->where('court_number',$this->get_court_number());
		return $this->db->get();
	}

	/*
	| -------------------------------------------------------------------------
	| Check court active
	| -------------------------------------------------------------------------
	*/
	public function court_active_check()
	{	
		$this->db->select('*');
		$this->db->from('tbl_court');
		$this->db->where('status',$this->get_status());
		$this->db->where('court_number',$this->get_court_number());
		return $this->db->get();
	}

	/*
	| -------------------------------------------------------------------------
	| Add new court
	| -------------------------------------------------------------------------
	*/
	public function add_new_court()
	{	
		$data = array(
	        'class_id' => $this->get_class_id(),
	        'subclass_id' => $this->get_subclass_id(),
	        'court_number' => $this->get_court_number(),
	        'umpire_name' => $this->get_umpire_name(),
	        'time' => $this->get_time(),
	        'status' => $this->get_status(),
	        'order_of_play' => $this->get_order_of_play(),
	        'shuttle_cock' => $this->get_shuttle_cock(),
			'type_id' => $this->get_type_id(),
			'player_single_1' => $this->get_player_name1(),
			'player_single_2' => $this->get_player_name2(),
			'player_name_1' => $this->get_player_name_1(),
			'player_name_2' => $this->get_player_name_2(),
			'player_name_3' => $this->get_player_name_3(),
			'player_name_4' => $this->get_player_name_4(),
			'country_id1' => $this->get_country_id(),
			'country_id2' => $this->get_country_id2(),
			'club_name1' => $this->get_club_name1(),
			'club_name2' => $this->get_club_name2(),
			'club_name_doubles_1' => $this->get_club_name_doubles_1(),
			'club_name_doubles_2' => $this->get_club_name_doubles_2(),
			'club_name_doubles_3' => $this->get_club_name_doubles_3(),
			'club_name_doubles_4' => $this->get_club_name_doubles_4()
		);
		$this->db->insert('tbl_court', $data);
	}

	/*
	| -------------------------------------------------------------------------
	| Get last court id
	| -------------------------------------------------------------------------
	*/
	public function get_last_court_id()
	{	
		$this->db->select('*');
		$this->db->from('tbl_court');
		$this->db->order_by('court_id',"desc");
		$this->db->limit(1);
		return $this->db->get();
	}

	/*
	| -------------------------------------------------------------------------
	| Show All Court
	| -------------------------------------------------------------------------
	*/
	public function show_all_court()
	{	
		$this->db->select('*');
		$this->db->from('tbl_court');
		$this->db->order_by('court_number');
		return $this->db->get();
	}

	/*
	| -------------------------------------------------------------------------
	| Show All Active Court
	| -------------------------------------------------------------------------
	*/
	public function show_all_active_court()
	{	
		$this->db->select('*');
		$this->db->from('tbl_court');
		$this->db->where('status',$this->get_status());
		$this->db->order_by('court_number');
		return $this->db->get();
	}

	/*
	| -------------------------------------------------------------------------
	| Show Game
	| -------------------------------------------------------------------------
	*/
	public function show_game_by_court_id()
	{	
		$this->db->select('*');
		$this->db->from('tbl_court');
		$this->db->join('tbl_class', 'tbl_court.class_id = tbl_class.class_id','inner');
		$this->db->join('tbl_subclass', 'tbl_court.subclass_id = tbl_subclass.subclass_id','inner');
		$this->db->join('tbl_type', 'tbl_type.type_id = tbl_class.type_id','inner');
		$this->db->where('court_id',$this->get_court_id());
		return $this->db->get();
	}

	/*
	| -------------------------------------------------------------------------
	| Update Status
	| -------------------------------------------------------------------------
	*/
	public function update_status()
	{	
		$data = array(
	        'status' => $this->get_status()
		);
		$this->db->where('court_id',$this->get_court_id());
		$this->db->update('tbl_court', $data);
	}

	/*
	| -------------------------------------------------------------------------
	| Add shuttlecock
	| -------------------------------------------------------------------------
	*/
	public function add_shuttlecock()
	{	
		$data = array(
	        'shuttle_cock' => $this->get_shuttle_cock()
		);
		$this->db->where('court_id',$this->get_court_id());
		$this->db->update('tbl_court', $data);
	}

	/*
	| -------------------------------------------------------------------------
	| Add time
	| -------------------------------------------------------------------------
	*/
	public function add_time()
	{	
		$data = array(
	        'time' => $this->get_time()
		);
		$this->db->where('court_id',$this->get_court_id());
		$this->db->update('tbl_court', $data);
	}


	/*
	| -------------------------------------------------------------------------
	| Show All Singles Game
	| -------------------------------------------------------------------------
	*/
	public function show_all_singles_game()
	{	
		$this->db->select('*');
		$this->db->from('tbl_court');
		$this->db->join('tbl_class', 'tbl_court.class_id = tbl_class.class_id','inner');
		$this->db->join('tbl_subclass', 'tbl_court.subclass_id = tbl_subclass.subclass_id','inner');
		$this->db->join('tbl_type', 'tbl_type.type_id = tbl_class.type_id','inner');
		$this->db->where('type_name','Singles');
		return $this->db->get();
	}


	/*
	| -------------------------------------------------------------------------
	| Show All Doubles Game
	| -------------------------------------------------------------------------
	*/
	public function show_all_doubles_game()
	{	
		$this->db->select('*');
		$this->db->from('tbl_court');
		$this->db->join('tbl_class', 'tbl_court.class_id = tbl_class.class_id','inner');
		$this->db->join('tbl_subclass', 'tbl_court.subclass_id = tbl_subclass.subclass_id','inner');
		$this->db->join('tbl_type', 'tbl_type.type_id = tbl_class.type_id','inner');
		$this->db->where('type_name','Doubles');
		return $this->db->get();
	}
}