<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dynamic extends CI_Controller {

	public function index()
	{
		
	}

	public function fetch_department($tID)
	{
		if($this->input->post('tID')) {
			$tID = $this->input->post('tID');
		}

		if($tID)
		{
			$where = array(
				't_ID' => $tID,
			);
			$this->load->model('placementM');

			$this->db->select('tbl_tpo.t_departments');
			$this->db->from('tbl_tpo');
			$this->db->where($where);

			$query = $this->db->get();
			$data = $query->result();

			$data[1] = $this->placementM->getListdepM($data[0]->t_departments,"IN");

			if($query->num_rows() > 0)
			{
				$output = '<option value="">Select Department</option>';
				foreach($data[1] as $key => $value)
				{
					$output .= '<option value="' . $value->d_ID. '"' . set_select("sTpoName", $value->d_ID) . ">" . $value->d_name . '</option>';
				}
				echo $output;
			}
			return "FALSE";
		}
	}

}

/* End of file dynamic.php */
/* Location: ./application/controllers/dynamic.php */