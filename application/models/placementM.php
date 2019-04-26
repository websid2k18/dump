<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PlacementM extends CI_Model {

    /*================================================================================================================*/
    /*|
    /*| Common Models
    /*|
    /*================================================================================================================*/

    /* Check is Admin For all User */
    public function checkIsAdminF() {
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
    public function checkIsComF() {
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
    public function checkIsTpoF() {
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
    public function checkIsStdF() {

        if ( $this->session->userdata('sessRole') == 'STUDENT' && $this->session->userdata('sessID') ) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    /* Check is Admin For all User Ends */

    /*===============================================================================================================*/

    /* Log Out For all User */
    public function logOutF() {
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

    /*================================================================================================================*/
    /*|
    /*| Models
    /*|
    /*================================================================================================================*/

    /* Register Admin */
    public function setRegAdminM()
    {
        // $privilege = array(
        //  'emailVerification' => uniqid(12),
        // );

        if ($this->checkIsAdminF()) {
            $a_status = '1';
            $a_created_by = $this->session->userdata('sessID');

            $data = array(
                'a_email'         => strtolower($this->input->post('aEmail')),
                'a_password'      => hash ( "sha256", $this->input->post('aPassword')),
                'a_name'          => $this->input->post('aName'),
                'a_address'       => $this->input->post('aAddress'),
                'a_contact_no'    => $this->input->post('aMobileNo'),
                'a_status'        => $a_status,
                /*'a_profile_img' => $this->input->post('aImg'),*/
                'a_created_by'    => $a_created_by,
                /*'a_privilege'   => json_encode($privilege)*/
            );

            $query = $this->db->insert('tbl_admin', $data);

            if ($query) {
                return true;
            }
            else {
                return false;
            }
        }
        else {
            $this->logout();
        }
    }
    /* Register TPO Ends */

    /*===============================================================================================================*/

    /* Register Company */
    public function setRegComM()
    {
        // $privilege = array(
        //  'emailVerification' => uniqid(12),
        // );

        if ($this->checkIsAdminF()) {
            $c_status = '1';
            $c_approved_by_admin_ID = $this->session->userdata('sessID');
        }
        else {
            $c_status = '0';
            $c_approved_by_admin_ID = NULL;
        }

        $data = array(
            'c_email'                => strtolower($this->input->post('cEmail')),
            'c_password'             => hash ( "sha256", $this->input->post('cPassword')),
            'c_name'                 => $this->input->post('cName'),
            'c_description'          => $this->input->post('cDescription'),
            'c_address'              => $this->input->post('cAddress'),
            'c_contact_no'           => $this->input->post('cMobileNo'),
            'c_website'              => $this->input->post('cWebSite'),
            'c_status'               => $c_status,
            //'c_img'                => $this->input->post('cImg'),
            //'c_hr_img'             => $this->input->post('hImg'),
            'c_hr_name'              => $this->input->post('hName'),
            'c_hr_no'                => $this->input->post('hMobileNo'),
            'c_approved_by_admin_ID' => $c_approved_by_admin_ID,
            // 't_privilege'         => json_encode($privilege)
        );

        $query = $this->db->insert('tbl_company', $data);

        if ($query) {
            return true;
        }
        else {
            return false;
        }
    }
    /* Register Company Ends */
    
    /*===============================================================================================================*/

    /* Register TPO */
    public function setRegTpoM()
    {
        // $privilege = array(
        //  'emailVerification' => uniqid(12),
        // );

        if($this->session->userdata('sessRole') == 'ADMIN') {
            $t_status = '1';
            $t_approved_by_admin_ID = $this->session->userdata('sessID');
        }
        else {
            $t_status = '0';
            $t_approved_by_admin_ID = NULL;
        }

        $data = array(
            't_email'                => strtolower($this->input->post('tEmail')),
            't_password'             => hash ( "sha256", $this->input->post('tPassword')),
            't_name'                 => $this->input->post('tName'),
            //'t_collage_code'       => $data['tCollageCode'],
            't_description'          => $this->input->post('tDescription'),
            't_address'              => $this->input->post('tAddress'),
            't_contact_number'       => $this->input->post('tMobileNo'),
            't_website'              => $this->input->post('tWebSite'),
            't_status'               => $t_status,
            //'t_img'                => $this->input->post('tImg'),
            //'t_tpo_img'            => $this->input->post('tpoImg'),
            't_tpo_name'             => $this->input->post('tpoName'),
            't_tpo_contact_number'   => $this->input->post('tpoMobileNo'),
            't_approved_by_admin_ID' => $t_approved_by_admin_ID,
            // 't_privilege'         => json_encode($privilege)
        );

        $query = $this->db->insert('tbl_tpo', $data);

        if ($query) {
            return true;
        }
        else {
            return false;
        }
    }
    /* Register TPO Ends */

    /*===============================================================================================================*/

    /* Register Student */
    public function setRegStdM()
    {
        if ($this->session->userdata('sessRole') == 'TPO') {
            $s_status     = '1';
            $s_created_by = $this->session->userdata('sessID');
        }
        else {
            $s_status = '0';
            $s_created_by = NULL;
        }

        $data = array(
            's_email'                => strtolower($this->input->post('sEmail')),
            's_enroll_no'            => $this->input->post('sEnrollNo'),
            's_password'             => hash ( "sha256", $this->input->post('sPassword')),
            's_name'                 => $this->input->post('sName'),
            's_college'              => $this->input->post('sTpoName'),
            's_department'           => $this->input->post('sDept'),
            's_created_by'           => $s_created_by,
            's_status'               => $s_status,
            // 's_permanent_address' => $this->input->post('sPermanentAddress'),
            // 's_present_address'   => $this->input->post('sPresentAddress'),
            // 's_city'              => $this->input->post('sCity'),
            // 's_pincode'           => $this->input->post('sPincode'),
            // 's_dob'               => $this->input->post('sDOB'),
            // 's_gender'            => $this->input->post('sGender'),
            // 's_spi'               => $this->input->post('sSPI'),
            // 's_cpi'               => $this->input->post('sCPI'),
            // 's_img_path'          => $this->input->post('s_img_path'),
            // 's_extra_cource'      => $this->input->post('s_extra_cource'),
        );

        $query = $this->db->insert('tbl_student', $data);

        if ($query) {
            return true;
        }
        else {
            return false;
        }
    }
    /* Register Student Ends */

    /*===============================================================================================================*/

    /* Login Admin */
    public function getLogAdminM()
    {
        $where = array(
            'a_email'   => trim(strtolower($this->input->post('Email'))),
            'a_password'=> hash ( "sha256", $this->input->post('Password'))
        );

        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where($where);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {

            $row = $query->row();
            if ($row->a_status == 0)
                return "BLOCKED";

            if ($row->a_status == 1) {
                $path = (empty($row->a_profile_img)) ? base_url("assets/images/admin/user.png") : base_url("assets/images/admin/" . $row->a_profile_img);

                $a_privilege = json_decode($row->a_privilege);

                $array = array(
                    'sessUser'      => $row->a_email,
                    'sessID'        => $row->a_ID,
                    'sessName'      => $row->a_name,
                    'sessImg'       => $path,
                    'sessRole'      => "ADMIN",
                    'sessPrivilege' => $a_privilege,
                );

                if ($row->a_created_by == '0') {
                    $array = array_merge($array, array('sessMaster' => 'MasterAdmin'));
                }
                else {
                    $array = array_merge($array, array('sessMaster' => 'SlaveAdmin'));
                }

                $this->session->set_userdata( $array );
                return "TRUE";
            }

            // If the previous process did not validate
            // then return false.
            return FALSE;
        }
    }
    /* Login Admin Ends*/

    /*===============================================================================================================*/

    /* Login Company */
    public function getLogComM()
    {
        $where = array(
            'c_email'    => trim(strtolower($this->input->post('Email'))),
            'c_password' => hash ( "sha256", $this->input->post('Password'))
        );

        $this->db->select('*');
        $this->db->from('tbl_company');
        $this->db->where($where);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $row = $query->row();
            if ($row->c_status == 0)
                return "BLOCKED";

            if ($row->c_status == 1) {
                $path = (empty($row->c_img)) ? base_url("assets/images/company/user.png") : base_url("assets/images/company/" . $row->c_img);
                $path1 = (empty($row->c_hr_img)) ? base_url("assets/images/company/user.png") : base_url("assets/images/company/" . $row->c_hr_img);

                $c_privilege = json_decode($row->c_privilege);

                $array = array(
                    'sessUser'      => $row->c_email,
                    'sessID'        => $row->c_ID,
                    'sessName'      => $row->c_name,
                    'sessImg'       => $path,
                    'sessHrName'    => $row->c_hr_name,
                    'sessHrImg'     => $path1,
                    'sessRole'      => "COMPANY",
                    'sessPrivilege' => $c_privilege,
                );

                $this->session->set_userdata( $array );
                return "TRUE";
            }

            // If the previous process did not validate
            // then return false.
            return FALSE;
        }
    }
    /* Login Company Ends*/

    /*===============================================================================================================*/

    /* Login TPO */
    public function getLogTpoM()
    {
        $where = array(
            't_email'    => trim(strtolower($this->input->post('Email'))),
            't_password' => hash ( "sha256", $this->input->post('Password'))
        );
        $this->db->select('*');
        $this->db->from('tbl_tpo');
        $this->db->where($where);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $row = $query->row();
            if ($row->t_status == 0)
                return "BLOCKED";

            if ($row->t_status == 1) {
                $path = (empty($row->t_img)) ? base_url("assets/images/tpo/user.png") : base_url("assets/images/tpo/" . $row->t_img);
                $path1 = (empty($row->t_tpo_img)) ? base_url("assets/images/tpo/user.png") : base_url("assets/images/tpo/" . $row->t_tpo_img);
                
                $t_privilege = json_decode($row->t_privilege);

                $array = array(
                    'sessUser'      => $row->t_email,
                    'sessID'        => $row->t_ID,
                    'sessName'      => $row->t_name,
                    'sessImg'       => $path,
                    'sessTpoName'   => $row->t_tpo_name,
                    'sessTpoImg'    => $path1,
                    'sessRole'      => "TPO",
                    'sessPrivilege' => $t_privilege,
                );

                $this->session->set_userdata( $array );
                return "TRUE";
            }
            // If the previous process did not validate
            // then return false.
            return FALSE;
        }
    }
    /* Login TPO Ends*/

    /*===============================================================================================================*/

    /* Login Students */
    public function getLogStdM()
    {
        $where = array(
            's_email'    => trim(strtolower($this->input->post('Email'))),
            's_password' => hash ( "sha256", $this->input->post('Password'))
        );
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where($where);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1){
            $row = $query->row();
            if ($row->s_status == 0)
                return "BLOCKED";

            if ($row->s_status == 1) {
                $path = (empty($row->s_img)) ? base_url("assets/images/student/user.png") : base_url("assets/images/student/" . $row->s_img);

                $array = array(
                    'sessUser'      => $row->s_email,
                    'sessID'        => $row->s_ID,
                    'sessName'      => $row->s_name,
                    'sessImg'       => $path,
                    'sessRole'      => "STUDENT",
                );

                $this->session->set_userdata( $array );
                return "TRUE";
            }
            // If the previous process did not validate
            // then return false.
            return FALSE;
        }
    }
    /* Login Students Ends*/

    /*===============================================================================================================*/

    /* List Admin */
    public function getListAdminM()
    {
        $this->db->select('*');
        $this->db->from('tbl_Admin');
        $this->db->order_by('tbl_Admin.a_ID', 'DESC');

        if ($this->input->post('status') == 'Blocked') {
            $where = array(
                'a_status' => "0",
            );
            $this->db->where($where);
        }
        elseif ($this->input->post('status') == 'Unblocked') {
            $where = array(
                'a_status' => "1",
            );
            $this->db->where($where);
        }

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return FALSE;
    }
    /* List Admin Ends*/

    /*===============================================================================================================*/

    /* List Company */
    public function getListComM()
    {
        $this->db->from('tbl_Company');
        $this->db->order_by('tbl_Company.c_ID', 'DESC');

        if ($this->checkIsAdminF()) {
            $this->db->select('*');
            if ($this->input->post('status') == 'New') {
                $where = array(
                    'c_status' => "0",
                    'c_approved_by_admin_ID' => NULL,
                );
                $this->db->where($where);
            }
            if ($this->input->post('status') == 'Blocked') {
                $where = array(
                    'c_status' => "0",
                );
                $this->db->where($where);
            }
            elseif ($this->input->post('status') == 'Unblocked') {
                $where = array(
                    'c_status' => "1",
                );
                $this->db->where($where);
            }
        }
        elseif ($this->checkIsTpoF() || $this->checkIsComF()) {
            $this->db->select('*');
            $where = array(
                'c_status' => "1",
            );
            $this->db->where($where);
        }
        else {
            $this->db->select('c_name, c_img, c_website');
            $this->db->limit(5);
            $where = array('c_status' => "1");
        }

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return FALSE;
    }
    /* List Company Ends*/

    /*===============================================================================================================*/

    /* List TPO */
    public function getListTpoM($where = array(), $select = '*')
    {
        $where = array( );
        
        $this->db->from('tbl_tpo');
        $this->db->order_by('tbl_tpo.t_ID', 'DESC');

        if ($this->checkIsAdminF()) {
            $this->db->select($select);
            if ($this->input->post('status') == 'New') {
                $where = array(
                    't_status' => "0",
                    't_approved_by_admin_ID' => NULL,
                );
                $this->db->where($where);
            }
            if ($this->input->post('status') == 'Blocked') {
                $where = array(
                    't_status' => "0",
                );
                $this->db->where($where);
            }
            elseif ($this->input->post('status') == 'Unblocked') {
                $where = array(
                    't_status' => "1",
                );
                $this->db->where($where);
            }
        }
        elseif ($this->checkIsTpoF() || $this->checkIsComF()) {
            $this->db->select($select);
            $where = array(
                't_status' => "1",
            );
            $this->db->where($where);
        }
        else {
            $this->db->select('t_name, t_img, t_website');
            $this->db->limit(5);
            $where = array('c_status' => "1");
        }

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return FALSE;
    }
    /* List TPO Ends*/

    /*===============================================================================================================*/

    /* List department */
    public function getListdepM($where = array(), $type = 'IN')
    {
        $this->db->select('d_ID, d_name');
        $this->db->from('tbl_department');

        if(!empty($where) && $type == "IN"){
            $where = explode("|", $where);
            $this->db->where_in('d_ID', $where);
        }
        if(!empty($where) && $type == "NOT_IN"){
            $where = explode("|", $where);
            $this->db->where_not_in('d_ID', $where);
        }

        $this->db->order_by('tbl_department.d_ID');

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        return FALSE;
    }
    /* List department Ends*/

    /*===============================================================================================================*/


    /* List Student */
    public function getListStdM($where = array(), $select = '')
    {
        $this->db->select($select);
        $this->db->from('tbl_student');
        $this->db->order_by('tbl_student.S_ID', 'DESC');
        $this->db->where($where);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return FALSE;
    }
    /* List Student Ends*/

    /*===============================================================================================================*/

    /* Profile Admin Model */
    public function profileAdminM($id)
    {
        $where = array(
            'a_ID' => $id,
        );

        $result = $res = $query1 = $res1 = array();

        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where($where);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $res = $query->result();
            $x = $res[0]->a_created_by;
            if ( $x != 0 ) {
                $where = array(
                    'a_ID' => $x,
                );

                $this->db->select('a_ID as cre_ID, a_name as cre_name, a_profile_img as cre_img');
                $this->db->from('tbl_admin');
                $this->db->where($where);

                if ($query->num_rows() > 0) {
                    $query = $this->db->get();
                }
                
                $res1 = $query->result();
                $result = array_merge($res, $res1);

                return $result;
            }

            return $res;
        }

        return FALSE;
    }
    /* Profile Admin Model Ends*/

    /*===============================================================================================================*/

    /* Profile Company Model */
    public function profileComM($id)
    {
        $where = array(
            'c_ID' => $id,
        );

        $this->db->select('tbl_company.*, tbl_admin.a_ID, tbl_admin.a_name, tbl_admin.a_profile_img');
        $this->db->from('tbl_company');
        $this->db->where($where);
        $this->db->join('tbl_admin', 'tbl_admin.a_ID = tbl_company.c_approved_by_admin_ID', 'left');

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->result();
        }
        return FALSE;
    }
    /* Profile Company Model Ends*/

    /*===============================================================================================================*/

    /* Profile TPO Model */
    public function profileTpoM($id)
    {
        $where = array(
            't_ID' => $id,
        );

        $this->db->select('tbl_tpo.*, tbl_admin.a_ID, tbl_admin.a_name, tbl_admin.a_profile_img');
        $this->db->from('tbl_tpo');
        $this->db->where($where);
        $this->db->join('tbl_admin', 'tbl_admin.a_ID = tbl_tpo.t_approved_by_admin_ID', 'left');

        $query = $this->db->get();
        $data = $query->result();

        $data[1] = $this->getListdepM($data[0]->t_departments,"IN");

        if($query->num_rows() > 0)
        {
            return $data;
        }
        return FALSE;
    }
    /* Profile TPO Model Ends*/

    /*===============================================================================================================*/

    /* Profile Company Model */
    public function profileStdM($id)
    {
        $where = array(
            's_ID' => $id,
        );

        $this->db->select('tbl_student.*, tbl_tpo.t_ID, tbl_tpo.t_name, tbl_tpo.t_img, tbl_tpo.t_email');
        $this->db->from('tbl_student');
        $this->db->where($where);
        $this->db->join('tbl_tpo', 'tbl_tpo.t_ID = tbl_student.s_created_by', 'left');

        $query = $this->db->get();
        $data = $query->result();

        $data[1] = $this->getListdepM($data[0]->s_department,"IN");

        if($query->num_rows() > 0)
        {
            return $data;
        }
        return FALSE;
    }
    /* Profile Company Model Ends*/

    /*===============================================================================================================*/

    /* Block Unvlock Company Model */
    public function editBlockUnblockAdminM($action, $id)
    {
        $where = array(
            'a_ID' => $id,
        );
        if($action == 'block')
        {
            $data = array(
                'a_created_by' => $this->session->userdata('sessID'),
                'a_status'     => '0'
            );
        }
        if($action == 'unblock')
        {
            $data = array(
                'a_created_by' => $this->session->userdata('sessID'),
                'a_status'     => '1'
            );
        }

        $this->db->set($data);
        $this->db->where($where);
        $this->db->update('tbl_admin');

        if($this->db->affected_rows() >=0)
        {
            return "TRUE";
        }

        return FALSE;
    }
    /* Block Unvlock Company Model Ends */

    /*===============================================================================================================*/

    /* Block Unvlock Company Model */
    public function editBlockUnblockComM($action, $id)
    {
        $where = array(
            'c_ID' => $id,
        );
        if($action == 'block')
        {
            $data = array(
                'c_approved_by_admin_ID' => $this->session->userdata('sessID'),
                'c_status'               => '0'
            );
        }
        if($action == 'unblock' || $action == 'Approve')
        {
            $data = array(
                'c_approved_by_admin_ID' => $this->session->userdata('sessID'),
                'c_status'               => '1'
            );
        }

        $this->db->set($data);
        $this->db->where($where);
        $this->db->update('tbl_Company');

        if($this->db->affected_rows() >=0)
        {
            return "TRUE";
        }

        return FALSE;
    }
    /* Block Unvlock Company Model Ends */

    /*===============================================================================================================*/

    /* Block Unvlock TPO Model */
    public function editBlockUnblockTpoM($action, $id)
    {
        $where = array(
            't_ID' => $id,
        );
        if($action == 'block')
        {
            $data = array(
                't_approved_by_admin_ID' => $this->session->userdata('sessID'),
                't_status'               => '0'
            );
        }
        if($action == 'unblock' || $action == 'Approve')
        {
            $data = array(
                't_approved_by_admin_ID' => $this->session->userdata('sessID'),
                't_status'               => '1'
            );
        }

        $this->db->set($data);
        $this->db->where($where);
        $this->db->update('tbl_tpo');

        if($this->db->affected_rows() >=0)
        {
            return "TRUE";
        }

        return FALSE;
    }
    /* Block Unvlock TPO Model Ends */

    /*===============================================================================================================*/

    /* Block Unvlock student Model */
    public function editBlockUnblockStdM($action, $id)
    {
        $where = array(
            's_ID' => $id,
        );
        if($action == 'block')
        {
            $data = array(
                's_created_by' => $this->session->userdata('sessID'),
                's_status'     => '0'
            );
        }
        if($action == 'unblock' || $action == 'Approve')
        {
            $data = array(
                's_created_by' => $this->session->userdata('sessID'),
                's_status'               => '1'
            );
        }

        $this->db->set($data);
        $this->db->where($where);
        $this->db->update('tbl_student');

        if($this->db->affected_rows() >=0)
        {
            return "TRUE";
        }

        return FALSE;
    }
    /* Block Unvlock student Model Ends */

    /*===============================================================================================================*/

    /* Edit Profile Admin Model */
    public function editProfileAdminM($id)
    {

        if($this->checkIsAdminF()){
            $where = array(
                'a_ID' => $id,
            );
            $data = array(
                'a_name'       => $this->input->post('aName'),
                'a_address'    => $this->input->post('aAddress'),
                'a_contact_no' => $this->input->post('aMobileNo'),
            );

            if (!empty($_FILES['aImg']['name']))
            {

                /* File Selected */
                /* for image upload */
                $config['upload_path']      = 'assets/images/admin/';
                $config['allowed_types']    = 'jpg|png|jpeg';
                $config['file_name']        = 'a_img_' . $id;
                $config['file_ext_tolower'] = TRUE;
                $config['overwrite']        = TRUE;
                $config['max_size']         = 2048;

                $this->load->helper('file');
                if ($this->session->userdata("sessImg") != base_url("assets/images/admin/user.png"))
                {
                    $file = basename($this->session->userdata("sessImg"));
                    unlink(FCPATH . 'assets/images/admin/' . $file);
                }
                $this->load->library('upload', $config);

                if($this->upload->do_upload('aImg'))
                {
                    $uploadData = $this->upload->data();
                    $data['a_profile_img'] = $uploadData["orig_name"];
                }
                else {
                    return FALSE;
                }
            }

            $this->db->set($data);
            $this->db->where($where);
            $this->db->update('tbl_admin');

            if($this->db->affected_rows() >=0)
            {
                $path = (empty($_FILES['aImg']['name'])) ? $this->session->userdata("sessImg") : base_url("assets/images/admin/" . $uploadData['orig_name']);
                $array = array(
                    'sessName'=> $data['a_name'],
                    'sessImg' => $path,
                );
                $this->session->set_userdata( $array );
                return TRUE;
            }
            return False;
        }
        else {
            /* You are not Admin*/
            return FALSE;
        }
    }
    /* Edit Profile Admin Model Ends */

    /*===============================================================================================================*/

    /* Edit Profile Company Model */
    public function editProfileComM($id)
    {

        if($this->checkIsComF()){
            $where = array(
                'c_ID' => $id,
            );
            $data = array(
                'c_name'        => $this->input->post('cName'),
                'c_description' => $this->input->post('cDescription'),
                'c_address'     => $this->input->post('cAddress'),
                'c_contact_no'  => $this->input->post('cMobileNo'),
                'c_website'     => $this->input->post('cWebSite'),
                'c_hr_name'     => $this->input->post('hName'),
                'c_hr_no'       => $this->input->post('hMobileNo'),
            );

            if (!empty($_FILES['cImg']['name']))
            {

                /* File Selected */
                /* for image upload */
                $config['upload_path']      = 'assets/images/company/';
                $config['allowed_types']    = 'jpg|png|jpeg';
                $config['file_name']        = 'c_img_' . $id;
                $config['file_ext_tolower'] = TRUE;
                $config['overwrite']        = TRUE;
                $config['max_size']         = 2048;

                $this->load->helper('file');
                if ($this->session->userdata("sessImg") != base_url("assets/images/company/user.png"))
                {
                    $file = basename($this->session->userdata("sessImg"));
                    unlink(FCPATH . 'assets/images/company/' . $file);
                }

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('cImg'))
                {
                    $uploadData = $this->upload->data();
                    $data['c_img'] = $uploadData["orig_name"];
                }
                else {
                    return FALSE;
                }
            }

            if (!empty($_FILES['hImg']['name']))
            {

                /* File Selected */
                /* for image upload */
                $config['upload_path']      = 'assets/images/company/';
                $config['allowed_types']    = 'jpg|png|jpeg';
                $config['file_name']        = 'c_hr_img_' . $id;
                $config['file_ext_tolower'] = TRUE;
                $config['overwrite']        = TRUE;
                $config['max_size']         = 2048;

                $this->load->helper('file');
                if ($this->session->userdata("sessHrImg") != base_url("assets/images/company/user.png"))
                {
                    $file = basename($this->session->userdata("sessHrImg"));
                    unlink(FCPATH . 'assets/images/company/' . $file);
                }

                $this->upload->initialize($config);

                if($this->upload->do_upload('hImg'))
                {
                    $uploadData = $this->upload->data();
                    $data['c_hr_img'] = $uploadData["orig_name"];
                }
                else {
                    return FALSE;
                }
            }

            $this->db->set($data);
            $this->db->where($where);
            $this->db->update('tbl_company');

            if($this->db->affected_rows() >=0)
            {
                $path = (empty($_FILES['cImg']['name'])) ? $this->session->userdata("sessImg") : base_url("assets/images/company/" . $data['c_img']);
                $path1 = (empty($_FILES['hImg']['name'])) ? $this->session->userdata("sessHrImg") : base_url("assets/images/company/" . $data['c_hr_img']);
                $array = array(
                    'sessName'   => $data['c_name'],
                    'sessImg'    => $path,
                    'sessHrName' => $data['c_hr_name'],
                    'sessHrImg'  => $path1,
                );
                $this->session->set_userdata( $array );
                return TRUE;
            }
            return False;
        }
        else {
            /* You are not Company*/
            return FALSE;
        }
    }
    /* Edit Profile Company Model Ends */

    /*===============================================================================================================*/

    /* Edit Profile TPO Model */
    public function editProfileTpoM($id)
    {
        if($this->checkIsTpoF()){
            $where = array(
                't_ID' => $id,
            );
            $t_departments = implode("|", $this->input->post('tDepartment'));
            $data = array(
                't_name'        => $this->input->post('tName'),
                't_description' => $this->input->post('tDescription'),
                't_address'     => $this->input->post('tAddress'),
                't_contact_number'  => $this->input->post('tMobileNo'),
                't_website'     => $this->input->post('tWebSite'),
                't_tpo_name'     => $this->input->post('tpoName'),
                't_tpo_contact_number'       => $this->input->post('tpoMobileNo'),
                't_departments' => $t_departments
            );
            if (!empty($_FILES['tImg']['name']))
            {

                /* File Selected */
                /* for image upload */
                $config['upload_path']      = 'assets/images/tpo/';
                $config['allowed_types']    = 'jpg|png|jpeg';
                $config['file_name']        = 't_img_' . $id;
                $config['file_ext_tolower'] = TRUE;
                $config['overwrite']        = TRUE;
                $config['max_size']         = 2048;

                $this->load->helper('file');
                if ($this->session->userdata("sessImg") != base_url("assets/images/tpo/user.png"))
                {
                    $file = basename($this->session->userdata("sessImg"));
                    unlink(FCPATH . 'assets/images/tpo/' . $file);
                }

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('tImg'))
                {
                    $uploadData = $this->upload->data();
                    $data['t_img'] = $uploadData["orig_name"];
                }
                else {
                    return FALSE;
                }
            }

            if (!empty($_FILES['tpoImg']['name']))
            {

                /* File Selected */
                /* for image upload */
                $config['upload_path']      = 'assets/images/tpo/';
                $config['allowed_types']    = 'jpg|png|jpeg';
                $config['file_name']        = 't_tpo_img_' . $id;
                $config['file_ext_tolower'] = TRUE;
                $config['overwrite']        = TRUE;
                $config['max_size']         = 2048;

                $this->load->helper('file');
                if ($this->session->userdata("sessTpoImg") != base_url("assets/images/tpo/user.png"))
                {
                    $file = basename($this->session->userdata("sessTpoImg"));
                    unlink(FCPATH . 'assets/images/tpo/' . $file);
                }

                $this->upload->initialize($config);

                if($this->upload->do_upload('tpoImg'))
                {
                    $uploadData = $this->upload->data();
                    $data['t_tpo_img'] = $uploadData["orig_name"];
                }
                else {
                    return FALSE;
                }
            }

            $this->db->set($data);
            $this->db->where($where);
            $this->db->update('tbl_tpo');

            if($this->db->affected_rows() >=0)
            {
                $path = (empty($_FILES['tImg']['name'])) ? $this->session->userdata("sessImg") : base_url("assets/images/tpo/" . $data['t_img']);
                $path1 = (empty($_FILES['tpoImg']['name'])) ? $this->session->userdata("sessImg") : base_url("assets/images/tpo/" . $data['t_tpo_img']);
                $array = array(
                    'sessName'   => $data['t_name'],
                    'sessImg'    => $path,
                    'sessTpoName' => $data['t_tpo_name'],
                    'sessTpoImg'  => $path1,
                );
                $this->session->set_userdata( $array );
                return TRUE;
            }
            return False;
        }
        else {
            /* You are not TPO*/
            return FALSE;
        }
    }
    /* Edit Profile TPO Model Ends */

    /*===============================================================================================================*/

    /* Edit Profile Student Model */
    public function editProfileStdM($id)
    {
        if($this->checkIsStdF()){
            $where = array(
                's_ID' => $id,
            );
            $data = array(  
                's_name'        => $this->input->post('sName'),
                's_description' => $this->input->post('sDescription'),
                's_address'     => $this->input->post('sAddress'),
                's_enroll_no'  => $this->input->post('sEnrollNo'),
                's_contact_no'  => $this->input->post('sMobileNo'),
            );
            if (!empty($_FILES['sImg']['name']))
            {
                /* File Selected */
                /* for image upload */
                $config['upload_path']      = 'assets/images/student/';
                $config['allowed_types']    = 'jpg|png|jpeg';
                $config['file_name']        = 's_img_' . $id;
                $config['file_ext_tolower'] = TRUE;
                $config['overwrite']        = TRUE;
                $config['max_size']         = 2048;

                $this->load->helper('file');
                if ($this->session->userdata("sessImg") != base_url("assets/images/student/user.png"))
                {
                    $file = basename($this->session->userdata("sessImg"));
                    unlink(FCPATH . 'assets/images/student/' . $file);
                }

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('sImg'))
                {
                    $uploadData = $this->upload->data();
                    $data['s_img_path'] = $uploadData["orig_name"];
                }
                else {
                    return FALSE;
                }
            }

            if (!empty($_FILES['sResume']['name']))
            {

                /* File Selected */
                /* for image upload */
                $config['upload_path']      = 'assets/resume/';
                $config['allowed_types']    = 'pdf|doc|docx|odt';
                $config['file_name']        = 't_res_' . $id;
                $config['file_ext_tolower'] = TRUE;
                $config['overwrite']        = TRUE;
                $config['max_size']         = 102400;

                $this->load->helper('file');

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('sResume'))
                {
                    $uploadData = $this->upload->data();
                    $data['s_resume'] = $uploadData["orig_name"];
                }
                else {
                    return FALSE;
                }
            }

            $this->db->set($data);
            $this->db->where($where);
            $this->db->update('tbl_student');

            if($this->db->affected_rows() >=0)
            {
                $path = (empty($_FILES['sImg']['name'])) ? $this->session->userdata("sessImg") : base_url("assets/images/student/" . $data['s_img_path']);
                $array = array(
                    'sessName'   => $data['s_name'],
                    'sessImg'    => $path,
                );
                $this->session->set_userdata( $array );
                return TRUE;
            }
            return False;
        }
        else {
            /* You are not TPO*/
            return FALSE;
        }
    }
    /* Edit Profile Student Model Ends */

    /*===============================================================================================================*/

    /* List Company */
    public function getListPlcM()
    {
        $this->db->from('tbl_placement');
        $this->db->order_by('tbl_placement.p_ID', 'DESC');

        if ($this->checkIsAdminF()) {
            $this->db->select('*');
            if ($this->input->post('status') == 'New') {
                $where = array(
                    'p_status' => "0",
                    'c_approved_by_admin_ID' => NULL,
                );
                $this->db->where($where);
            }
            if ($this->input->post('status') == 'open') {
                $where = array(
                    'p_status' => "0",
                );
                $this->db->where($where);
            }
            elseif ($this->input->post('status') == 'finished') {
                $where = array(
                    'p_status' => "1",
                );
                $this->db->where($where);
            }
        }
        elseif ($this->checkIsTpoF() || $this->checkIsComF()) {
            $this->db->select('*');
            $where = array(
                'c_status' => "1",
            );
            $this->db->where($where);
        }
        else {
            $this->db->select('c_name, c_img, c_website');
            $this->db->limit(5);
            $where = array('c_status' => "1");
        }

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return FALSE;
    }
    /* List Company Ends*/

    /*===============================================================================================================*/

}

/* End of file placementM.php */
/* Location: ./application/models/placementM.php */
?>