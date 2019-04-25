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
        echo hash ( "sha256", "Admin@123");
    }

    /*===============================================================================================================*/

    /* Header For all User */
    public function headers($page = "")
    {
        $data = array();
        if ($page != "") {
            $data['active'] = $page;
        }
        else {
            $data['active'] = "index";
        }
        $data['con'] = $this;

        $this->load->view('includes/HeadV',$data);

        if ($this->checkIsStdF()) {
            $this->load->view('includes/NavStdV', $data);
        }
        elseif ($this->checkIsTpoF()) {
            $this->load->view('includes/NavTpoV', $data);
        }
        elseif ($this->checkIsComF()) {
            $this->load->view('includes/NavComV', $data);
        }
        elseif ($this->checkIsAdminF()) {
            $this->load->view('includes/NavAdminV', $data);
        }
        else {
            $this->load->view('includes/NavV', $data);
        }
    }
    /* Header For all User Ends */

    /*===============================================================================================================*/

    public function fetch_department()
    {
        if ($this->input->post('sTpoName')) {
            $sTpoName = $this->input->post('sTpoName');
        }
        elseif ($this->checkIsTpoF()) {
            $sTpoName = $this->session->userdata('sessID');
        }
        else {
            $sTpoName = '0';
        }

        if ($sTpoName) {
            $where = array(
                't_ID' => $sTpoName,
            );
            $this->load->model('placementM');

            $this->db->select('tbl_tpo.t_departments');
            $this->db->from('tbl_tpo');
            $this->db->where($where);

            $query = $this->db->get();
            $data = $query->result();

            $data[1] = $this->placementM->getListdepM($data[0]->t_departments,"IN");

            if ($query->num_rows() > 0) {
                $output = '<option value="">Select Department</option>';
                foreach ($data[1] as $key => $value) {
                    $output .= '<option value="' . $value->d_ID. '"' . set_select("sTpoName", $value->d_ID) . ">" . $value->d_name . '</option>';
                }
                echo $output;
            }
            return "FALSE";
        }
    }

    /*===============================================================================================================*/

    /* Footer For all User */
    public function footers() 
    {
        if ($this->session->userdata('sessRole')) {
            $type = $this->session->userdata('sessRole');
        }
        else {
            $type = "";
        }

        if ($type == "ADMIN" || $type == "STUDENT" || $type == "COMPANY" || $type == "TPO") {
            $data['session'] = $this->session->all_userdata();
        }

        $this->load->view('includes/FooterV');

        if ($type == "ADMIN" || $type == "STUDENT" || $type == "COMPANY" || $type == "TPO") {
            // $this->load->view('security_check');
        }
    }
    /* Footer For all User Ends */

    /*===============================================================================================================*/

    /* Check is Admin For all User */
    public function checkIsAdminF() 
    {
        if ( $this->session->userdata('sessRole') == 'ADMIN' && $this->session->userdata('sessID') ) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    /* Check is Admin For all User Ends */

    /*===============================================================================================================*/

    /* Check is Admin For all User */
    public function checkIsComF() 
    {
        if ( $this->session->userdata('sessRole') == 'COMPANY' && $this->session->userdata('sessID') ) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    /* Check is Admin For all User Ends */

    /*===============================================================================================================*/

    /* Check is Admin For all User */
    public function checkIsTpoF() 
    {
        if ( $this->session->userdata('sessRole') == 'TPO' && $this->session->userdata('sessID') ) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    /* Check is Admin For all User Ends */

    /*===============================================================================================================*/

    /* Check is Admin For all User */
    public function checkIsStdF() 
    {
        if ( $this->session->userdata('sessRole') == 'STUDENT' && $this->session->userdata('sessID') ) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    /* Check is Admin For all User Ends */

    /*===============================================================================================================*/

    /* Check is Admin For all User */
    public function checkIsUser() 
    {
        if ($this->session->userdata('sessID') ) {
            return TRUE;
        }
        else {
            $this->logOutF();
        }
    }
    /* Check is Admin For all User Ends */

    /*===============================================================================================================*/

    /* Log Out For all User */
    public function logOutF() 
    {
        $type = $this->session->userdata('sessRole');

        $this->session->sess_destroy();

        if ($type == "ADMIN") {
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
    public function index($page = "index") 
    {
        $this->headers();
        $data = "";

        if ($this->checkIsStdF()) {
            redirect('/placement/dashboardStdF','refresh');
        }
        elseif ($this->checkIsTpoF()) {
            redirect('/placement/dashboardTpoF','refresh');
        }
        elseif ($this->checkIsComF()) {
            redirect('/placement/dashboardComF','refresh');
        }
        elseif ($this->checkIsAdminF()) {
            redirect('/placement/dashboardAdminF','refresh');
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
        if ($this->checkIsAdminF()) {
            $this->headers($page);
            $data[''] = array();

            if ($this->form_validation->run('aRegister')) {
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
        else {
            $this->logOutF();
        }
    }
    /* Registration Admin Page Ends */

    /*===============================================================================================================*/

    /* Registration Company Page */
    public function regComF($page='regComF')
    {
        $this->headers($page);
        $data[''] = array();

        if ($this->form_validation->run('cRegister')) {
            $this->load->model('placementM');
            $result = $this->placementM->setRegComM();

            if ($result == TRUE) {
                $data['method'] = "regComF";
                if ($this->session->userdata('sessRole') == 'ADMIN') {
                    redirect('placement/listComF');
                }
                else {
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

        if ($this->form_validation->run('tRegister')) {
            $this->load->model('placementM');
            $result = $this->placementM->setRegTpoM();

            if ($result == TRUE) {
                $data['method'] = "regTpoF";
                if ($this->session->userdata('sessRole') == 'ADMIN') {
                    redirect('placement/listTpoF');
                }
                else {
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
        $this->headers($page);

        $this->load->model('placementM');
        $data['result'] = $this->placementM->getListTpoM( NULL, "t_ID, t_name, t_departments");

        if ($this->form_validation->run('sRegister')) 
        {
            $this->load->model('placementM');
            $result = $this->placementM->setRegStdM();

            if ($result == TRUE) {
                $data['method'] = "regStdF";
                if($this->session->userdata('sessRole') == 'TPO'){
                    redirect('placement/listStdF');
                }
                else{
                    $data['method'] = "regStdF";
                    $this->load->view('thankYouV', $data);
                }
            }
            else {
                $this->load->view('Std/regStdV', $data);
            }
        }
        else {
            $this->load->view('std/regStdV', $data);
        }

        $this->footers();
    }
    /* Registration Std Page Ends */

    /*===============================================================================================================*/

    /* Login Admin Page */
    public function admin_login($page='admin_login')
    {
        $data['method'] = "admin_login";

        if ($this->form_validation->run('aLogin') == TRUE) {
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
        else {
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

        if ($this->form_validation->run('cLogin') == TRUE) {
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
        else {
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

        if ($this->form_validation->run('tLogin') == TRUE) {
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
        else {
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

        if ($this->form_validation->run('sLogin') == TRUE) {
            $this->load->model('placementM');
            $result = $this->placementM->getLogStdM();
            if ($result == "BLOCKED") {
                $this->load->view('contactToV', $data);
            }
            elseif ($result == "TRUE") {
                redirect('/placement/dashboardStdF','refresh');
            }
            else {
                $data['errorMsg'] = "User Name or Password is Wrong";
                $this->load->view('LoginV', $data);
            }
        }
        else {
            $this->load->view('LoginV', $data);
        }

        $this->footers();
    }
    /* Login Student Page Ends */

    /*===============================================================================================================*/

    /* Dashboard Admin Page */
    public function dashboardAdminF($page='dashboardAdminF')
    {
        if ($this->checkIsAdminF()) {
            $this->headers($page);
            $data = array();

            $this->load->view('admin/dashboardAdminV', $data);

            $this->footers();
        }
        else {
            $this->logOutF();
        }
    }
    /* Dashboard Admin Page Ends */

    /*===============================================================================================================*/

    /* Dashboard Company Page */
    public function dashboardComF($page='dashboardComF')
    {
        if ($this->checkIsComF()) {
            $this->headers($page);
            $data = array();

            $this->load->view('company/dashboardComV', $data);

            $this->footers();
        }
        else {
            $this->logOutF();
        }
    }
    /* Dashboard Company Page Ends */

    /*===============================================================================================================*/

    /* Dashboard TPO Page */
    public function dashboardTpoF($page='dashboardTpoF')
    {
        if ($this->checkIsTpoF()) {
            $this->headers($page);
            $data = array();

            $this->load->view('tpo/dashboardTpoV', $data);

            $this->footers();
        }
        else {
            $this->logOutF();
        }
    }
    /* Dashboard TPO Page Ends */

    /*===============================================================================================================*/

    /* Dashboard Student Page */
    public function dashboardStdF($page='dashboardStdF')    
    {
        if ($this->checkIsStdF()) {
            $this->headers($page);
            $data = array();

            $this->load->view('std/dashboardStdV', $data);

            $this->footers();
        }
        else {
            $this->logOutF();
        }
    }
    /* Dashboard Student Page Ends */

    /*===============================================================================================================*/

    /* List Admin Page */
    public function listAdminF($page='listAdminF')
    {
        if ($this->checkIsAdminF()) {
            $this->headers($page);
            $data = array();

            if ($this->input->post('Email')) {
                echo "string";
            }
            $this->load->model('placementM');
            $data['result'] = $this->placementM->getListAdminM();

            $this->load->view('admin/listAdminV', $data);

            $this->footers();
        }
        else {
            $this->logOutF();
        }
    }
    /* List Admin Page Ends */

    /*===============================================================================================================*/

    /* List Company Page */
    public function listComF($page='listComF')
    {
        $this->checkIsUser();
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
        $this->checkIsUser();
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
    public function listStdF($status = NULL, $college = NULL, $dept = NULL, $page='listStdF')
    {
        $this->checkIsUser();
        $this->headers($page);
        $data = array();
        $this->load->model('placementM');

        $data['resultListTpo'] = $this->placementM->getListTpoM( NULL, "t_ID, t_name, t_departments");

        $where = array( );

        $select = array('*');
        if ($this->checkIsComF()) {
            if ($status != NULL || $college != NULL || $dept != NULL) {
                if ($status  == 'unblock') { $where['s_status'] = '1'; }
                if ($college != NULL)      { $where['s_college'] = $college; }
                if ($dept    != NULL)      { $where['s_department'] = $dept; }
            }
            else {
                if ($this->input->post('sTpoName') || $this->input->post('sDept')) {
                    $where = array(
                        's_status'     => '1',
                        's_college'    => $this->input->post('sTpoName'),
                    );
                    if ($this->input->post('sDept') != 'all') {
                        $where['s_department'] = $this->input->post('sDept');
                    }
                }
            }
        }
        if ($this->checkIsTpoF()) {
            if ($status != NULL || $college != NULL || $dept != NULL) {
                if ($status  == 'unblock') { $where['s_status'] = '1'; }
                if ($status  == 'block')   { $where['s_status'] = '0'; }
                if ($status  == 'new')     { $where['s_status'] = '0'; $where['s_created_by'] = '0'; }
                if ($college != NULL)      { $where['s_college'] = $college; }
                if ($dept    != NULL)      { $where['s_department'] = $dept; }
            }
            else {
                if ($this->input->post('status') || $this->input->post('sDept')) {
                    $where['s_college'] = $this->session->userdata('sessID');
                    if ($this->input->post('sDept') != 'all') {
                        $where['s_department'] = $this->input->post('sDept');
                    }
                    if ($this->input->post('status') == 'unblock') { $where['s_status'] = '1'; }
                    if ($this->input->post('status') == 'block')   { $where['s_status'] = '0'; }
                    if ($this->input->post('status') == 'new')     { $where['s_status'] = '0'; $where['s_created_by'] = NULL; }
                    if ($this->input->post('status') == 'all')     { $where['s_status in (0,1)'] = NULL; }
                }
            }
        }

        $data['resultListStd'] = $this->placementM->getListStdM($where, $select);

        $this->load->view('std/listStdV', $data);

        $this->footers();
    }
    /* List Students Page Ends */

    /*===============================================================================================================*/

    /* Profile Admin Page */
    public function profileAdminF($id = NULL, $page='profileAdminF')
    {
        $this->checkIsUser();
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
        $this->checkIsUser();
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
        $this->checkIsUser();
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
        $this->checkIsUser();
        $this->headers($page);
        $data = array();

        if ($this->checkIsStdF() && $id == NULL) {
            $id = $this->session->userdata('sessID');
        }
        elseif ($this->checkIsStdF() == FALSE && $id == NULL) {
            redirect('/placement/listStdF','refresh');
        }

        $this->load->model('placementM');
        $data['result'] = $this->placementM->profileStdM($id);

        $this->load->view('std/profileStdV', $data);

        $this->footers();
    }
    /* Profile Student Page Ends */

    /*===============================================================================================================*/

    /* Block Unvlock Admin Page */
    public function blockUnblockAdminF($action, $id = NULL, $page='blockUnblockAdminF')
    {
        if ($this->checkIsAdminF()) {
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
        else {
            $this->logOutF();
        }
    }
    /* Block Unvlock Admin Page Ends*/

    /*===============================================================================================================*/

    /* Block Unvlock Company Page */
    public function blockUnblockComF($action, $id = NULL, $page='blockUnblockComF')
    {

        if ($this->checkIsAdminF()) {
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
        else {
            $this->logOutF();
        }
    }
    /* Block Unvlock Company Page Ends*/

    /*===============================================================================================================*/

    /* Block Unvlock TPO Page */
    public function blockUnblockTpoF($action, $id = NULL, $page='blockUnblockTpoF')
    {
        if ($this->checkIsAdminF()) {
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
        else {
            $this->logOutF();
        }
    }
    /* Block Unvlock TPO Page Ends */

    /*===============================================================================================================*/

    /* Edit Profile Admin Page */
    public function editProfileAdminF($page='editProfileAdminF')
    {
        if ($this->checkIsAdminF()) {
            $this->headers($page);
            $data = array();
            $id = $this->session->userdata('sessID');
            $result = FALSE;

            $this->load->model('placementM');
            $data['result'] = $this->placementM->profileAdminM($id);

            if ($this->form_validation->run('aProfileEdit')) {
                $result = $this->placementM->editProfileAdminM($id);

                if ($result == TRUE) {
                    $data['result'] = $this->placementM->profileAdminM($id);
                    redirect('placement/profileAdminF/','refresh');
                }
                else {
                    if (!empty($_FILES['aImg']['name'])) {
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
        else {
            $this->logOutF();
        }
    }
    /* Edit Profile Admin Page Ends*/

    /*===============================================================================================================*/

    /* Edit Profile Com Page */
    public function editProfileComF($page='editProfileComF')
    {
        if ($this->checkIscomF()) {
            $this->headers($page);
            $data = array();
            $id = $this->session->userdata('sessID');
            $result = FALSE;

            $this->load->model('placementM');
            $data['result'] = $this->placementM->profileComM($id);
            if ($this->form_validation->run('cProfileEdit')) {
                $result = $this->placementM->editProfileComM($id);

                if ($result == TRUE) {
                    $data['result'] = $this->placementM->profileComM($id);
                    redirect('placement/profileComF/','refresh');
                }
                else {
                    if (!empty($_FILES['cImg']['name']) || !empty($_FILES['hImg']['name']) )
                    {
                        $this->load->library('image_lib');
                        $this->load->library('upload', $config);
                        $data['errorMsg'] = $this->upload->display_errors("Image Must be Less then 2MB <br> Image type must be gif,jpg,png,jpeg <br>");
                        $data['errorMsg'] .= $this->image_lib->display_errors();
                    }
                    $this->load->view('company/editProfileComV', $data);
                }
            }
            else {
            // echo validation_errors();
                $this->load->view('company/editProfileComV', $data);
            }
            $this->footers();
        }
        else {
            $this->logOutF();
        }
    }
    /* Edit Profile Com Page Ends*/

    /*===============================================================================================================*/

    /* Edit Profile TPO Page */
    public function editProfileTpoF($page='editProfileTpoF')
    {
        if ($this->checkIsTpoF()) {
            $this->headers($page);
            $data = array();
            $id = $this->session->userdata('sessID');
            $result = FALSE;

            $this->load->model('placementM');
            $data['result'] = $this->placementM->profileTpoM($id);
            $data['dept'] = $this->placementM->getListdepM($data['result'][0]->t_departments, 'NOT_IN');

            if ($this->form_validation->run('tProfileEdit')) {
                $result = $this->placementM->editProfileTpoM($id);

                if ($result == TRUE) {
                    $data['result'] = $this->placementM->profileTpoM($id);
                    redirect('placement/profileTpoF/','refresh');
                }
                else {
                    if (!empty($_FILES['tImg']['name']) || !empty($_FILES['tpoImg']['name'])) {
                        $this->load->library('image_lib');
                        $this->load->library('upload');
                        $data['errorMsg'] = $this->upload->display_errors("Image Must be Less then 2MB <br> Image type must be gif,jpg,png,jpeg <br>");
                        $data['errorMsg'] .= $this->image_lib->display_errors();
                    }
                    $this->load->view('tpo/editProfileTpoV', $data);
                }
            }
            else {
            // echo validation_errors();
                $this->load->view('tpo/editProfileTpoV', $data);
            }

            $this->footers();
        }
        else {
            $this->logOutF();
        }
    }
    /* Edit Profile TPO Page Ends*/

    /*===============================================================================================================*/

    /* Edit Profile Std Page */
    public function editProfileStdF($page='editProfileStdF')
    {
        if ($this->checkIsStdF()) {
            $this->headers($page);
            $data = array();
            $id = $this->session->userdata('sessID');
            $result = FALSE;
            $this->load->model('placementM');
            $data['result'] = $this->placementM->profileStdM($id);

            if ($this->form_validation->run('sProfileEdit')) {
                $result = $this->placementM->editProfileStdM($id);
                if ($result == TRUE) {
                    $data['result'] = $this->placementM->profileStdM($id);
                    redirect('placement/profileStdF/','refresh');
                }
                else {
                    if (!empty($_FILES['sImg']['name']))
                    {
                        $this->load->library('image_lib');
                        /* for image upload */
                        $config['upload_path']      = 'assets/images/student/';
                        $config['allowed_types']    = 'jpg|png|jpeg';
                        $config['file_name']        = 's_img_' . $id;
                        $config['file_ext_tolower'] = TRUE;
                        $config['overwrite']        = TRUE;
                        $config['max_size']         = 2048;

                        $this->load->library('upload',$config);
                        $data['errorMsg'] = $this->upload->display_errors("Image Must be Less then 2MB <br> Image type must be gif,jpg,png,jpeg <br>");
                        $data['errorMsg'] .= $this->image_lib->display_errors();
                    }
                    if (!empty($_FILES['sResume']['name']))
                    {
                        $this->load->library('image_lib');
                        /* for image upload */
                        $config['upload_path']      = 'assets/resume/';
                        $config['allowed_types']    = 'pdf|doc|docx|odt';
                        $config['file_name']        = 't_res_' . $id;
                        $config['file_ext_tolower'] = TRUE;
                        $config['overwrite']        = TRUE;
                        $config['max_size']         = 102400;

                        $this->load->library('upload',$config);
                        $data['errorMsg'] = $this->upload->display_errors("File Must be Less then 10MB <br> File type must be pdf,doc,docx,odt <br>");
                    }
                    $this->load->view('std/editProfileStdV', $data);
                }
            }
            else {
                echo "string";
                echo validation_errors();
                $this->load->view('std/editProfileStdV', $data);
            }
            $this->footers();
        }
        else {
            $this->logOutF();
        }
    }
    /* Edit Profile Std Page Ends*/

}

/* End of file placement.php */
/* Location: ./application/controllers/placement.php */
?>