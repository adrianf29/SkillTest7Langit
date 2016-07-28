<?php

class M_class extends CI_Model {
	private $class_id;
	private $type_id;
	private $class_name;

    /*
	| -------------------------------------------------------------------------
	| Setter
	| -------------------------------------------------------------------------
	*/
	public function set_class_id($value) {
        $this->class_id = $value; }
    public function set_type_id($value) {
        $this->type_id = $value; }
    public function set_class_name($value) {
        $this->class_name = $value; }

    /*
	| -------------------------------------------------------------------------
	| Getter
	| -------------------------------------------------------------------------
	*/
	public function get_class_id() {
        return $this->class_id; }
    public function get_type_id() {
        return $this->type_id; }
    public function get_class_name() {
        return $this->class_name; }

	/*
	| -------------------------------------------------------------------------
	| Show Class by Type ID
	| -------------------------------------------------------------------------
	*/
	public function show_class_by_type_id()
	{	
		$this->db->select('*');
		$this->db->from('tbl_class');
		$this->db->where('type_id',$this->get_type_id());
		return $this->db->get();
	}
}