<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Home Controller */
class HomeC extends CI_Controller {

	public function test()
	{
		$ary = array('loginEmail' => 0);
		echo $x = json_encode($ary);
	}

	/* Index Page */
	public function index()
	{
		$this->load->view('includes/HeadV');
		$this->load->view('includes/NavV');
		$this->load->view('HomeV');
		$this->load->view('includes/ScriptV');
		$this->load->view('includes/FooterV');
	}
	/* Index Page Ends */

	/* About Us Page */
	public function AboutUsF()
	{
		$this->load->view('includes/HeadV');
		$this->load->view('includes/NavV');
		$this->load->view('AboutUsV');
		$this->load->view('includes/ScriptV');
		$this->load->view('includes/FooterV');
	}
	/* About US Page Ends*/

	/* Login Admin Page */
	public function LoginAdminF()
	{
		$email = trim(strtolower($this->input->post('Email')));
		$password = hash ( "sha256", $this->input->post('Password'));
		if ($this->form_validation->run('aLogin') == TRUE)
		{
			$this->load->model('AdminM');
			$result = $this->AdminM->getAdminLogin();
			if ($result == "BLOCKED") {

				$this->load->view('includes/HeadV');
				$this->load->view('includes/NavV');
				$this->load->view('admin/ContactMainAdminV');
				$this->load->view('includes/ScriptV');
				$this->load->view('includes/FooterV');

			}
			elseif ($result == "TRUE") {
				redirect('adminC','refresh');
			}
			else {
				$data['errorMsg'] = "User Name or Password is Wrong";
				$this->load->view('admin/LoginV',$data);
			}
		}
		else
		{
			$this->load->view('admin/LoginV');
		}
	}
	/* Login Admin Page Ends */

	/* Login Tpo Page */
	public function LoginClgF()
	{
		$this->load->view('includes/HeadV');
		$this->load->view('includes/NavV');
		$email = trim(strtolower($this->input->post('Email')));
		if ($this->form_validation->run('cLogin'))
		{
			$data = array(
				'cEmail' => $email,
				'cPassword' => hash ( "sha256", $this->input->post('Password'))
			);
			// echo hash ( "sha256", $this->input->post('Password'));
			$this->load->model('HomeM');
			$result = $this->HomeM->GetCompany($data);
			if ($result == TRUE) {
				$path = base_url() . "assets/images/student/" . $result[0]->s_student_img;
				$this->session->set_tempdata('sessUser', $result[0]->s_email, 3600);
				$this->session->set_tempdata('sessID', $result[0]->s_ID, 3600);
				$this->session->set_tempdata('sessName', $result[0]->s_student_name, 3600);
				$this->session->set_tempdata('sessImg', $path, 3600);
				$this->session->set_tempdata('sessRole', "Company", 3600);
				$this->load->view('company/DashboardView');
			}
			else {
				$data['errorMsg'] = "User Name or Password is Wrong";
				$this->load->view('LoginTpoV',$data);
			}
		}
		else
		{
			$this->load->view('LoginTpoV');
		}
		$this->load->view('includes/ScriptV');
		$this->load->view('includes/FooterV');
	}
	/* Login Company Page */

	/* Login Student Page */
	public function LoginStudentF()
	{
		$this->load->view('includes/HeadV');
		$this->load->view('includes/NavV');
		if ($this->form_validation->run('Login'))
		{
			$data = array(
				'cEmail' => $this->input->post('Email'),
				'cPassword' => hash ( "sha256", $this->input->post('Password'))
			);
			$this->load->model('CompanyM');
			$result = $this->CompanyM->getCompanyFun($data);
			if ($result == TRUE) {
				$path = base_url() . "assets/images/student/" . $result[0]->s_student_img;
				$this->session->set_tempdata('sessUser', $result[0]->s_email, 3600);
				$this->session->set_tempdata('sessID', $result[0]->s_ID, 3600);
				$this->session->set_tempdata('sessName', $result[0]->s_student_name, 3600);
				$this->session->set_tempdata('sessImg', $path, 3600);
				$this->session->set_tempdata('sessRole', "Company", 3600);
				$this->load->view('company/DashboardView');
			}
			else {
				$data['errorMsg'] = "User Name or Password is Wrong";
				$this->load->view('LoginCompanyV',$data);
			}
		}
		else
		{
			$this->load->view('LoginCompanyV');
		}
		$this->load->view('includes/ScriptV');
		$this->load->view('includes/FooterV');
	}
	/* Login Student Page Ends */



}
/* HomeC */

/* End of file HomeC.php */
/* Location: ./application/controllers/HomeC.php */
?>