<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminM extends CI_Model {

	public function GetAdminLogin()
	{
		$where = array(
			'a_email'   => trim(strtolower($this->input->post('Email'))),
			'a_password'=> hash ( "sha256", $this->input->post('Password'))
		);
		$this->db->select('a_ID, a_name, a_email, a_profile_img, a_status, a_privilege');
		$this->db->from('tbl_admin');
		$this->db->where($where);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() == 1)
		{
			$row = $query->row();
			if($row->a_status == 0)
				return "BLOCKED";
			
			if($row->a_status == 1)
			{
				$path = base_url() . "assets/images/admin/" . $row->a_profile_img;
				$a_privilege = json_decode($row->a_privilege);

				$array = array(
					'sessUser'=> $row->a_email,
					'sessID'  => $row->a_ID,
					'sessName'=> $row->a_name,
					'sessImg' => $path,
					'sessRole'=> "ADMIN",
					'sessPrivilege'=> $a_privilege,
				);

				$this->session->set_userdata( $array );

				if ($a_privilege->loginEmail == 1) {

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

				else {
					return "TRUE";
				}

			}

	        // If the previous process did not validate
	        // then return false.
			return "FALSE";
		}
	}
	/* getLogin */
}
/* AdminM */

/* End of file AdminM.php */
/* Location: ./application/models/AdminM.php */