<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat_model extends CI_Model
{
	protected $table = 'obat';

	public function get()
	{
		return $this->db->get($this->table);
	}

	public function get_where($where)
	{
		return $this->db->get_where($this->table, $where)->row_array();
	}

	public function insert($data)
	{
		$save = $this->db->insert($this->table, $data);
		if ($save) {
			return true;
		}
	}

	public function update($data, $where)
	{
		$update = $this->db->update($this->table, $data, $where);
		if ($update) {
			return true;
		}
	}

	public function delete($where)
	{
		$this->db->delete($this->table, $where);
	}
}
