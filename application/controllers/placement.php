<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Placement extends CI_Controller {

    /*================================================================================================================*/
    /*|
    /*| Common Functions
    /*|
    /*================================================================================================================*/

    public function test($page='')
    {
        $this->headers($page);

        $data['method'] = "regStuF";

        $this->load->view('thankYouV', $data);

        $this->footers();
    }

    /*===============================================================================================================*/

    /* Header For all User */
    public function headers($page = "")
    {

        if ($page != "") {
            $data['active'] = $page;
        } else {

            $data['active'] = "index";
        }

        // echo $this->session->userdata('sessRole');
        $this->load->view('includes/HeadV',$data);
        if($this->session->userdata('sessRole')){
            $type = $this->session->userdata('sessRole');
        }
        else{
            $type = "";
        }

        if($type == "ADMIN") {
            $this->checkIsAdminF();
            $this->load->view('includes/NavAdminV', $data);
        }
        elseif ($type == "COMPANY") {
            $this->checkIsComF();
            $this->load->view('includes/NavComV', $data);
        }
        elseif ($type == "TPO") {
            $this->checkIsTpoF();
            $this->load->view('includes/NavTpoV', $data);
        }
        elseif ($type == "STUDENT") {
            $this->checkIsStdF();
            $this->load->view('includes/NavStdV', $data);
        }
        else {
            $this->load->view('includes/NavV', $data);
        }
    }
    /* Header For all User Ends */

    /*===============================================================================================================*/

    /* Footer For all User */
    public function footers() {

        if($this->session->userdata('sessRole')){
            $type = $this->session->userdata('sessRole');
        }
        else{
            $type = "";
        }

        if ($type == "ADMIN" || $type == "STUDENT" || $type == "COMPANY" || $type == "TPO") {
            $data['session']=$this->session->all_userdata();
        }

        $this->load->view('includes/FooterV');

        if ($type == "ADMIN" || $type == "STUDENT" || $type == "COMPANY" || $type == "TPO") {
            // $this->load->view('security_check');
        }
    }
    /* Footer For all User Ends */

    /*===============================================================================================================*/

    /* Check is Admin For all User */
    public function checkIsAdminF() {

        if( $this->session->userdata('sessRole') == 'ADMIN' && $this->session->userdata('sessRole') ) {
            return TRUE;
        }
        else{
            $this->logOutF();
        }
    }
    /* Check is Admin For all User Ends */

    /*===============================================================================================================*/

    /* Check is Admin For all User */
    public function checkIsComF() {

        if( $this->session->userdata('sessRole') == 'COMPANY' && $this->session->userdata('sessRole') ) {
            return TRUE;
        }
        else{
            $this->logOutF();
        }
    }
    /* Check is Admin For all User Ends */

    /*===============================================================================================================*/

    /* Check is Admin For all User */
    public function checkIsTpoF() {

        if( $this->session->userdata('sessRole') == 'TPO' && $this->session->userdata('sessRole') ) {
            return TRUE;
        }
        else{
            $this->logOutF();
        }
    }
    /* Check is Admin For all User Ends */

    /*===============================================================================================================*/

    /* Check is Admin For all User */
    public function checkIsStdF() {

        if( $this->session->userdata('sessRole') == 'STUDENT' && $this->session->userdata('sessRole') ) {
            return TRUE;
        }
        else{
            $this->logOutF();
        }
    }
    /* Check is Admin For all User Ends */

    /*===============================================================================================================*/

    /* Log Out For all User */
    public function logOutF() {

        $type = $this->session->userdata('sessRole');
        
        $this->session->sess_destroy();

        if($type == "ADMIN") {
            $type = '';
            redirect('placement/');
        }
        elseif ($type == "COMPANY") {
            $type = '';
            redirect('placement/logComF');
        }
        elseif ($type == "TPO") {
            $type = '';
            redirect('placement/logTpoF');
        }
        elseif ($type == "STUDENT") {
            $type = '';
            redirect('placement/logStdF');
        }
        else {
            $type = '';
            redirect('placement/');
        }

    }
    /* Log Out For all User Ends */


    /*===============================================================================================================*/
    /*|
    /*| Page Functions
    /*|
    /*===============================================================================================================*/


    /* Home Page */
    public function index($page = "index") {
        $this->headers();
        $data = "";

        if($this->session->userdata('sessRole')){
            $type = $this->session->userdata('sessRole');
        }
        else{
            $type = "";
        }

        if($type == "ADMIN") {
            redirect('/placement/dashboardAdminF','refresh');
        }
        elseif ($type == "STUDENT") {
            redirect('/placement/dashboardStdF','refresh');
        }
        elseif ($type == "COMPANY") {
            redirect('/placement/dashboardComF','refresh');
        }
        elseif ($type == "TPO") {
            redirect('/placement/dashboardTpoF','refresh');
        }
        else {
            $this->load->view('homeV', $data);
        }

        $this->footers();
    }
    /* Home Page Ends */

    /*===============================================================================================================*/

    /* Registration Company Page */
    public function regComF($page='regComF')
    {
        $this->headers($page);
        $data[''] = "";

        if ($this->form_validation->run('cRegister')) 
        {
            $this->load->model('placementM');
            $result = $this->placementM->setRegComM();

            if ($result == TRUE) {
                $data['method'] = "regComF";
                $this->load->view('thankYouV', $data);
            }
            else {
                $this->load->view('regComV');
            }
        }
        else {
            $this->load->view('regComV', $data);
        }

        $this->footers();
    }
    /* Registration Company Page Ends */

    /*===============================================================================================================*/

    /* Registration TPO Page */
    public function regTpoF($page='regTpoF')
    {
        $this->headers($page);
        $data[''] = "";

        if ($this->form_validation->run('tRegister')) 
        {
            $this->load->model('placementM');
            $result = $this->placementM->setRegTpoM();

            if ($result == TRUE) {
                $data['method'] = "regTpoF";
                if($this->session->userdata('sessRole') == 'ADMIN'){
                    redirect('placement/listTpoF');
                }
                else{
                    $this->load->view('thankYouV', $data);
                }
            }
            else {
                $this->load->view('regTpoV');
            }
        }
        else {
            $this->load->view('regTpoV', $data);
        }

        $this->footers();
    }
    /* Registration TPO Page Ends */

    /*===============================================================================================================*/

    /* Registration Std Page */
    public function regStdF($page='regStdF')
    {
        // $this->headers($page);
        // $data[''] = "";

        // if ($this->form_validation->run('sRegister'))
        // {
        //     $this->load->model('placementM');
        //     $result = $this->placementM->setRegStdM();

        //     if ($result == TRUE) {
        //         $data['method'] = "regStdF";
        //         $this->load->view('thankYouV', $data);
        //     }
        //     else {
        //         $this->load->view('regStdV');
        //     }
        // }
        // else {
        //     $this->load->view('regStdV', $data);
        // }

        // $this->footers();
    }
    /* Registration Std Page Ends */

    /*===============================================================================================================*/

    /* Login Company Page */
    public function logComF($page='logComF')
    {
        $this->headers($page);
        $data['method'] = "logComF";

        if ($this->form_validation->run('cLogin') == TRUE)
        {
            $this->load->model('placementM');
            $result = $this->placementM->getLogComM();
            if ($result == "BLOCKED") {
                $this->load->view('contactToV', $data);
            }
            elseif ($result == "TRUE") {
                redirect('/placement/dashboardComF','refresh');
            }
            else {
                $data['errorMsg'] = "User Name or Password is Wrong";
                $this->load->view('LoginV', $data);
            }
        }
        else
        {
            $this->load->view('LoginV', $data);
        }

        $this->footers();
    }
    /* Login Company Page Ends */

    /*===============================================================================================================*/

    /* Login TPO Page */
    public function logTpoF($page='logTpoF')
    {
        $this->headers($page);
        $data['method'] = "logTpoF";

        if ($this->form_validation->run('tLogin') == TRUE)
        {
            $this->load->model('placementM');
            $result = $this->placementM->getLogTpoM();
            if ($result == "BLOCKED") {
                $this->load->view('contactToV', $data);
            }
            elseif ($result == "TRUE") {
                redirect('/placement/dashboardTpoF','refresh');
            }
            else {
                $data['errorMsg'] = "User Name or Password is Wrong";
                $this->load->view('LoginV', $data);
            }
        }
        else
        {
            $this->load->view('LoginV', $data);
        }

        $this->footers();
    }
    /* Login TPO Page Ends */

    /*===============================================================================================================*/

    /* Login Student Page */
    public function logStdF($page='logStdF')
    {
        $this->headers($page);
        $data['method'] = "logStdF";

        // if ($this->form_validation->run('tLogin') == TRUE)
        // {
        //     $this->load->model('placementM');
        //     $result = $this->placementM->getLogStdM();
        //     if ($result == "BLOCKED") {
        //         $this->load->view('contactToV', $data);
        //     }
        //     elseif ($result == "TRUE") {
        //         redirect('/placement/dashboardStdF','refresh');
        //     }
        //     else {
        //         $data['errorMsg'] = "User Name or Password is Wrong";
        //         $this->load->view('LoginV', $data);
        //     }
        // }
        // else
        // {
        //     echo "s";
        $this->load->view('LoginV', $data);
        // }

        $this->footers();
    }
    /* Login Student Page Ends */

    /*===============================================================================================================*/

    /* Login Admin Page */
    public function admin_login($page='admin_login')
    {
        $data['method'] = "admin_login";

        if ($this->form_validation->run('aLogin') == TRUE)
        {
            $this->load->model('placementM');
            $result = $this->placementM->getLogAdminM();
            if ($result == "BLOCKED") {
                $this->load->view('contactToV', $data);
            }
            elseif ($result == "TRUE") {
                redirect('/placement/dashboardAdminF','refresh');
            }
            else {
                $data['errorMsg'] = "User Name or Password is Wrong";
                $this->load->view('admin/LoginAdminV', $data);
            }
        }
        else
        {
            $this->load->view('admin/LoginAdminV', $data);
        }
    }
    /* Login Admin Page Ends */

    /*===============================================================================================================*/


    /* About Us Page */
    public function aboutUsF($page='aboutUsF')
    {
        $this->headers($page);
        $this->load->view('aboutUsV');
        $this->footers();
    }
    /* About Us Page Ends */

    /*===============================================================================================================*/

    /* Contact Us Page */
    public function contactUsF($page='contactUsF')
    {
        $this->headers($page);
        $this->load->view('ContactUsV');
        $this->footers();
    }
    /* Contact Us Page Ends */

    /*===============================================================================================================*/

    /* Dashboard Admin Page */
    public function dashboardAdminF($page='dashboardAdminF')
    {
        $this->checkIsAdminF();
        $this->headers($page);
        $data = array();

        $this->load->view('admin/dashboardAdminV', $data);

        $this->footers();
    }
    /* Dashboard Admin Page Ends */

    /*===============================================================================================================*/

    /* Dashboard Company Page */
    public function dashboardComF($page='dashboardComF')
    {
        $this->checkIsComF();
        $this->headers($page);
        $data = array();

        $this->load->view('admin/dashboardComV', $data);

        $this->footers();
    }
    /* Dashboard Company Page Ends */

    /*===============================================================================================================*/

    /* Dashboard TPO Page */
    public function dashboardTpoF($page='dashboardTpoF')
    {
        $this->checkIsTpoF();
        $this->headers($page);
        $data = array();

        $this->load->view('admin/dashboardTpoV', $data);

        $this->footers();
    }
    /* Dashboard TPO Page Ends */

    /*===============================================================================================================*/

    /* Dashboard TPO Page */

    public function dashboardStdF($page='dashboardStdF')
    {
        $this->checkIsStdF();
        $this->headers($page);
        $data = array();

        $this->load->view('admin/dashboardStdV', $data);

        $this->footers();
    }
    /* Dashboard TPO Page Ends */

    /*===============================================================================================================*/

    /* Dashboard Admin Page */
    public function listTpoF($page='listTpoF')
    {
        $this->checkIsAdminF();
        $this->headers($page);
        $data = array();

        $this->load->model('placementM');
        $data['result'] = $this->placementM->getListTpoM();
        
        $this->load->view('listTpoV', $data);

        $this->footers();
    }
    /* Dashboard Admin Page Ends */

    /*===============================================================================================================*/

}

/* End of file placement.php */
/* Location: ./application/controllers/placement.php */
?>