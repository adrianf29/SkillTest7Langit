<?php

class M_subclass extends CI_Model {
	private $subclass_id;
	private $subclass_name;

    /*
	| -------------------------------------------------------------------------
	| Setter
	| -------------------------------------------------------------------------
	*/
    public function set_subclass_id($value) {
        $this->subclass_id = $value; }
    public function set_subclass_name($value) {
        $this->subclass_name = $value; }

    /*
	| -------------------------------------------------------------------------
	| Getter
	| -------------------------------------------------------------------------
	*/
    public function get_subclass_id() {
        return $this->subclass_id; }
    public function get_subclass_name() {
        return $this->subclass_name; }

	/*
	| -------------------------------------------------------------------------
	| Show All Subclass
	| -------------------------------------------------------------------------
	*/
	public function show_all_subclass()
	{	
		$this->db->select('*');
		$this->db->from('tbl_subclass');
		return $this->db->get();
	}
}