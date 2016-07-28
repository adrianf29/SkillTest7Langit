<?php

class M_type extends CI_Model {
	private $type_id;
	private $type_name;

    /*
	| -------------------------------------------------------------------------
	| Setter
	| -------------------------------------------------------------------------
	*/
    public function set_type_id($value) {
        $this->type_id = $value; }
    public function set_type_name($value) {
        $this->type_name = $value; }

    /*
	| -------------------------------------------------------------------------
	| Getter
	| -------------------------------------------------------------------------
	*/
    public function get_type_id() {
        return $this->type_id; }
    public function get_type_name() {
        return $this->type_name; }

	/*
	| -------------------------------------------------------------------------
	| Show All Type
	| -------------------------------------------------------------------------
	*/
	public function show_all_type()
	{	
		$this->db->select('*');
		$this->db->from('tbl_type');
		return $this->db->get();
	}
}