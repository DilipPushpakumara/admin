<?php 

class Model_farms extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get the active farm data */
	public function getActiveFarm()
	{
		$sql = "SELECT * FROM farms WHERE active = ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	/* get the brand data */
	public function getFarmsData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM farms where id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM farms";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('farms', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('farms', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('farms');
			return ($delete == true) ? true : false;
		}
	}

	public function countTotalFarms()
	{
		$sql = "SELECT * FROM farms WHERE active = ?";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}

}