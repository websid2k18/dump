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
        $this->checkIsAdminF();
        $this->load->helper('file');
        if ($this->session->userdata("sessImg") != base_url("assets/images/admin/user.png"))
        {
            echo $this->session->userdata("sessImg");
            $file = basename($this->session->userdata("sessImg"));
            echo "<pre>";
            print_r ($file);
            echo "</pre>";
        }
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

    /* Registration Admin Page */
    public function regAdminF($page='regAdminF')
    {
        $this->checkIsAdminF();
        $this->headers($page);
        $data[''] = array();

        if ($this->form_validation->run('aRegister')) 
        {
            $this->load->model('placementM');
            $result = $this->placementM->setRegAdminM();

            if ($result == TRUE) {
                redirect('placement/listAdminF');
            }
            else {
                $this->load->view('admin/regAdminV');
            }
        }
        else {
            $this->load->view('admin/regAdminV', $data);
        }

        $this->footers();
    }
    /* Registration Admin Page Ends */

    /*===============================================================================================================*/

    /* Registration Company Page */
    public function regComF($page='regComF')
    {
        $this->headers($page);
        $data[''] = array();

        if ($this->form_validation->run('cRegister')) 
        {
            $this->load->model('placementM');
            $result = $this->placementM->setRegComM();

            if ($result == TRUE) {
                $data['method'] = "regComF";
                if($this->session->userdata('sessRole') == 'ADMIN'){
                    redirect('placement/listComF');
                }
                else{
                    $this->load->view('thankYouV', $data);
                }   
            }
            else {
                $this->load->view('company/regComV');
            }
        }
        else {
            $this->load->view('company/regComV', $data);
        }

        $this->footers();
    }
    /* Registration Company Page Ends */

    /*===============================================================================================================*/

    /* Registration TPO Page */
    public function regTpoF($page='regTpoF')
    {
        $this->headers($page);
        $data[''] = array();

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
                $this->load->view('tpo/regTpoV');
            }
        }
        else {
            $this->load->view('tpo/regTpoV', $data);
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

        $this->load->view('company/dashboardComV', $data);

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

        $this->load->view('tpo/dashboardTpoV', $data);

        $this->footers();
    }
    /* Dashboard TPO Page Ends */

    /*===============================================================================================================*/

    /* Dashboard Student Page */

    public function dashboardStdF($page='dashboardStdF')    
    {
        $this->checkIsStdF();
        $this->headers($page);
        $data = array();

        $this->load->view('dashboardStdV', $data);

        $this->footers();
    }
    /* Dashboard Student Page Ends */

    /*===============================================================================================================*/

    /* List Admin Page */
    public function listAdminF($page='listAdminF')
    {
        $this->checkIsAdminF();
        $this->headers($page);
        $data = array();

        $this->load->model('placementM');
        $data['result'] = $this->placementM->getListAdminM();
        
        $this->load->view('admin/listAdminV', $data);

        $this->footers();
    }
    /* List Admin Page Ends */

    /*===============================================================================================================*/

    /* List Company Page */
    public function listComF($page='listComF')
    {
        $this->headers($page);
        $data = array();

        $this->load->model('placementM');
        $data['result'] = $this->placementM->getListComM();
        
        $this->load->view('company/listComV', $data);

        $this->footers();
    }
    /* List Company Page Ends */

    /*===============================================================================================================*/

    /* List TPO Page */
    public function listTpoF($page='listTpoF')
    {
        $this->headers($page);
        $data = array();

        $this->load->model('placementM');
        $data['result'] = $this->placementM->getListTpoM();
        
        $this->load->view('tpo/listTpoV', $data);

        $this->footers();
    }
    /* List TPO Page Ends */

    /*===============================================================================================================*/

    /* List Students Page */
    public function listStdF($page='listStdF')
    {
        $this->checkIsAdminF();

        $this->headers($page);
        $data = array();

        $this->load->model('placementM');
        $data['result'] = $this->placementM->getListStdM();
        
        $this->load->view('company/listComV', $data);

        $this->footers();
    }
    /* List Students Page Ends */

    /*===============================================================================================================*/

    /* Profile Admin Page */
    public function profileAdminF($id = NULL, $page='profileAdminF')
    {
        $this->headers($page);
        $data = array();

        if ($this->session->userdata('sessRole') == 'ADMIN' && $id == NULL) {
            $id = $this->session->userdata('sessID');
        }
        elseif ($this->session->userdata('sessRole') != 'ADMIN' && $id == NULL) {
            redirect('/placement/listAdminF','refresh');
        }

        $this->load->model('placementM');
        $data['result'] = $this->placementM->profileAdminM($id);
        
        $this->load->view('admin/profileAdminV', $data);

        $this->footers();
    }
    /* Profile Admin Page Ends */

    /*===============================================================================================================*/

    /* Profile Company Page */
    public function profileComF($id = NULL, $page='profileComF')
    {
        $this->headers($page);
        $data = array();

        if ($this->session->userdata('sessRole') == 'COMPANY' && $id == NULL) {
            $id = $this->session->userdata('sessID');
        }
        elseif ($this->session->userdata('sessRole') != 'COMPANY' && $id == NULL) {
            redirect('/placement/listComF','refresh');
        }
        
        $this->load->model('placementM');
        $data['result'] = $this->placementM->profileComM($id);

        $this->load->view('company/profileComV', $data);

        $this->footers();
    }
    /* Profile Company Page Ends */

    /*===============================================================================================================*/

    /* Profile TPO Page */
    public function profileTpoF($id = NULL, $page='profileTpoF')
    {

        $this->headers($page);
        $data = array();

        if ($this->session->userdata('sessRole') == 'TPO' && $id == NULL) {
            $id = $this->session->userdata('sessID');
        }
        elseif ($this->session->userdata('sessRole') != 'TPO' && $id == NULL) {
            redirect('/placement/listTpoF','refresh');
        }

        $this->load->model('placementM');
        $data['result'] = $this->placementM->profileTpoM($id);
        
        $this->load->view('tpo/profileTpoV', $data);

        $this->footers();
    }
    /* Profile TPO Page Ends */

    /*===============================================================================================================*/

    /* Profile Student Page */
    public function profileStdF($id = NULL, $page='profileStdF')
    {

        $this->headers($page);
        $data = array();

        $this->load->model('placementM');
        $data['result'] = $this->placementM->profileStdM($id);
        
        $this->load->view('profileStdV', $data);

        $this->footers();
    }
    /* Profile Student Page Ends */

    /*===============================================================================================================*/

    /* Block Unvlock Admin Page */
    public function blockUnblockAdminF($action, $id = NULL, $page='blockUnblockAdminF')
    {
        $this->checkIsAdminF();

        $this->headers($page);
        $data = array();

        if ($this->session->userdata('sessMaster') == 'MasterAdmin' && $id != NULL) {
            $this->load->model('placementM');
            $data['result'] = $this->placementM->editBlockUnblockAdminM($action, $id);
            
            redirect('placement/profileAdminF/' . $id,'refresh');
        }
        else {
            redirect('placement/profileAdminF/' . $id,'refresh');
        }

        $this->footers();
    }
    /* Block Unvlock Admin Page Ends*/

    /*===============================================================================================================*/

    /* Block Unvlock Company Page */
    public function blockUnblockComF($action, $id = NULL, $page='blockUnblockComF')
    {
        $this->checkIsAdminF();

        $this->headers($page);
        $data = array();

        if ($this->session->userdata('sessRole') == 'ADMIN' && $id != NULL) {
            $this->load->model('placementM');
            $data['result'] = $this->placementM->editBlockUnblockComM($action, $id);
            
            redirect('placement/profileComF/' . $id,'refresh');
        }
        else {
            redirect('placement/profileComF/' . $id,'refresh');
        }

        $this->footers();
    }
    /* Block Unvlock Company Page Ends*/

    /*===============================================================================================================*/

    /* Block Unvlock TPO Page */
    public function blockUnblockTpoF($action, $id = NULL, $page='blockUnblockTpoF')
    {
        $this->checkIsAdminF();

        $this->headers($page);
        $data = array();

        if ($this->session->userdata('sessRole') == 'ADMIN' && $id != NULL) {
            $this->load->model('placementM');
            $data['result'] = $this->placementM->editBlockUnblockTpoM($action, $id);
            
            redirect('placement/profileTpoF/' . $id,'refresh');
        }
        else {
            redirect('placement/profileTpoF/' . $id,'refresh');
        }

        $this->footers();
    }
    /* Block Unvlock TPO Page Ends */

    /*===============================================================================================================*/

    /* Edit Profile Admin Page */
    public function editProfileAdminF($page='editProfileAdminF')
    {
        $this->checkIsAdminF();
        $this->headers($page);
        $data = array();
        $id = $this->session->userdata('sessID');
        $result = FALSE;

        $this->load->model('placementM');
        $data['result'] = $this->placementM->profileAdminM($id);

        if ($this->form_validation->run('aProfileEdit')) 
        {
            $result = $this->placementM->editProfileAdminM($id);

            if ($result == TRUE) {
                $data['result'] = $this->placementM->profileAdminM($id);
                redirect('placement/profileAdminF/','refresh');
            }
            else {
                if (!empty($_FILES['aImg']['name']))
                {
                    $this->load->library('image_lib');
                    $data['errorMsg'] = $this->upload->display_errors("Image Must be Less then 2MB <br> Image type must be gif,jpg,png,jpeg <br>");
                    $data['errorMsg'] .= $this->image_lib->display_errors();
                }
                $this->load->view('admin/editProfileAdminV', $data);
            }
        }
        else {
            $this->load->view('admin/editProfileAdminV', $data);
        }

        $this->footers();
    }
    /* Edit Profile Admin Page Ends*/

    /*===============================================================================================================*/

    /* Edit Profile Com Page */
    public function editProfileComF($page='editProfileComF')
    {
        $this->checkIscomF();
        $this->headers($page);
        $data = array();
        $id = $this->session->userdata('sessID');
        $result = FALSE;

        $this->load->model('placementM');
        $data['result'] = $this->placementM->profileComM($id);
        if ($this->form_validation->run('cProfileEdit')) 
        {
            $result = $this->placementM->editProfileComM($id);

            if ($result == TRUE) {
                $data['result'] = $this->placementM->profileComM($id);
                redirect('placement/profileComF/','refresh');
            }
            else {
                if (!empty($_FILES['aImg']['name']))
                {
                    $this->load->library('image_lib');
                    $data['errorMsg'] = $this->upload->display_errors("Image Must be Less then 2MB <br> Image type must be gif,jpg,png,jpeg <br>");
                    $data['errorMsg'] .= $this->image_lib->display_errors();
                }
                $this->load->view('company/editProfileComV', $data);
            }
        }
        else {
            echo "string";echo validation_errors();
            $this->load->view('company/editProfileComV', $data);
        }

        $this->footers();
    }
    /* Edit Profile Com Page Ends*/

}

/* End of file placement.php */
/* Location: ./application/controllers/placement.php */
?>