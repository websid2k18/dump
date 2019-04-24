<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DynamicM extends CI_Model {

	public function fatch_dept()
	{
		$this->db->where('country_id', $country_id);
		$this->db->order_by('state_name', 'ASC');
		$query  = $this->db->get('state');
		$output = '<option value="0">Select State</option>';
		foreach($query->result() as $row)
		{
			$output .= '<option value="'.$row->state_id.'">'.$row->state_name.'</option>';
		}
		return $output;
	}	

}

/* End of file dynamicM.php */
/* Location: ./application/models/dynamicM.php */