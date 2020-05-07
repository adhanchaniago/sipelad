<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
	public function count($table, $where = [])
	{
		return $this->db->count_all($table);
	}

	public function select_sum($table, $where, $field = '')
	{
		$this->db->select_sum($field);
		$this->db->where($where);
		$query = $this->db->get($table);
		return $query ? $query->row_array() : '0';
	}
}
