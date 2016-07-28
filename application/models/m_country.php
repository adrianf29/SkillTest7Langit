<?php

class M_country extends CI_Model {
	private $country_id;
	private $country_name;
	private $country_flag;

    /*
	| -------------------------------------------------------------------------
	| Setter
	| -------------------------------------------------------------------------
	*/
    public function set_country_id($value) {
        $this->country_id = $value; }
    public function set_country_name($value) {
        $this->country_name = $value; }
    public function set_country_flag($value) {
        $this->country_flag = $value; }

    /*
	| -------------------------------------------------------------------------
	| Getter
	| -------------------------------------------------------------------------
	*/
    public function get_country_id() {
        return $this->country_id; }
    public function get_country_name() {
        return $this->country_name; }
    public function get_country_flag() {
        return $this->country_flag; }

	/*
	| -------------------------------------------------------------------------
	| Show All Country
	| -------------------------------------------------------------------------
	*/
	public function show_all_country()
	{	
		$this->db->select('*');
		$this->db->from('tbl_country');
		return $this->db->get();
	}
}