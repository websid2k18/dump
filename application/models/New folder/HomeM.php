<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class HomeM extends CI_Model {

	public function GetCompanyLogin()
	{
		$where = array(
			'c_email'   => trim(strtolower($this->input->post('Email'))),
			'c_password'=> hash ( "sha256", $this->input->post('Password'))
		);
		$this->db->select('*');
		$this->db->from('tbl_company');
		$this->db->where($where);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() == 1)
		{
			$row = $query->row();
			if($row->c_status == 0)
				return "BLOCKED";
			
			if($row->c_status == 1)
			{
				$path = base_url() . "assets/images/admin/" . $row->a_profile_img;
				$array = array(
					'sessUser'=> $row->a_email,
					'sessID'  => $row->a_ID,
					'sessName'=> $row->a_name,
					'sessImg' => $path,
					'sessRole'=> "ADMIN",

				);
				
				$this->session->set_userdata( $array );

				$message = 'Your Account was just logged in to from a new Windows device. You\'re getting this email to make sure it was you.';
				$this->load->library('email');

				$this->email->set_newline("\r\n");
				$this->email->from(DEGAULT_EMAIL);
				$this->email->to($this->session->userdata('sessUser'));
				$this->email->subject('New device logged in');
				$this->email->message($message);
				if($this->email->send())
				{
					return "TRUE";
				}
				else
				{
					show_error($this->email->print_debugger());
				}
			}

	        // If the previous process did not validate
	        // then return false.
			return "FALSE";
		}
	}
	/* GetCompany */

	public function SetCompany($data)
	{
		/* Register Company */
	}

}

/* End of file HomeM.php */
/* Location: ./application/models/HomeM.php */
?>