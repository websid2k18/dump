<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PlacementM extends CI_Model {

    /*================================================================================================================*/
    /*|
    /*| Common Models
    /*|
    /*================================================================================================================*/

    /* Register Admin */
    public function setRegAdminM()
    {
        // $privilege = array(
        //  'emailVerification' => uniqid(12),
        // );

        if($this->session->userdata('sessRole') == 'ADMIN'){
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

            if ($query){
                return true;
            }
            else{
                return false;
            }
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

        if($this->session->userdata('sessRole') == 'ADMIN'){
            $c_status = '1';
            $c_approved_by_admin_ID = $this->session->userdata('sessID');
        }
        else{
            $c_status = '0';
            $c_approved_by_admin_ID = NULL;
        }

        $data = array(
            'c_email'       => strtolower($this->input->post('cEmail')),
            'c_password'    => hash ( "sha256", $this->input->post('cPassword')),
            'c_name'        => $this->input->post('cName'),
            'c_description' => $this->input->post('cDescription'),
            'c_address'     => $this->input->post('cAddress'),
            'c_contact_no'  => $this->input->post('cMobileNo'),
            'c_website'     => $this->input->post('cWebSite'),
            'c_status'      => $c_status,
            //'c_img'       => $this->input->post('cImg'),
            //'c_hr_img'    => $this->input->post('hImg'),
            'c_hr_name'     => $this->input->post('hName'),
            'c_hr_no'       => $this->input->post('hMobileNo'),
            'c_approved_by_admin_ID' => $c_approved_by_admin_ID,
            // 't_privilege'          => json_encode($privilege)
        );

        $query = $this->db->insert('tbl_company', $data);

        if ($query){
            return true;
        }
        else{
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

        if($this->session->userdata('sessRole') == 'ADMIN'){
            $t_status = '1';
            $t_approved_by_admin_ID = $this->session->userdata('sessID');
        }
        else{
            $t_status = '0';
        }

        $data = array(
            't_email'              => strtolower($this->input->post('tEmail')),
            't_password'           => hash ( "sha256", $this->input->post('tPassword')),
            't_name'               => $this->input->post('tName'),
            //'t_collage_code'     => $data['tCollageCode'],
            't_description'        => $this->input->post('tDescription'),
            't_address'            => $this->input->post('tAddress'),
            't_contact_number'     => $this->input->post('tMobileNo'),
            't_website'            => $this->input->post('tWebSite'),
            't_status'             => $t_status,
            //'t_img'              => $this->input->post('tImg'),
            //'t_tpo_img'          => $this->input->post('tpoImg'),
            't_tpo_name'           => $this->input->post('tpoName'),
            't_tpo_contact_number' => $this->input->post('tpoMobileNo'),
            't_approved_by_admin_ID' => $t_approved_by_admin_ID,
            // 't_privilege'          => json_encode($privilege)
        );

        $query = $this->db->insert('tbl_tpo', $data);

        if ($query){
            return true;
        }
        else{
            return false;
        }
    }
    /* Register TPO Ends */

    /*===============================================================================================================*/

    /* Register Student */
    public function setRegStdM()
    {
        // $privilege = array(
        //  'emailVerification' => uniqid(12),
        // );

        // if($this->session->userdata('sessRole') == 'TPO'){
        //     $s_status = '1';
        //     $s_approved_by_admin_ID = $this->session->userdata('sessID');
        // }
        // else{
        //     $s_status = '0';
        // }

        // $data = array(
        //     's_email'              => strtolower($this->input->post('tEmail')),
        //     's_password'           => hash ( "sha256", $this->input->post('tPassword')),
        //     's_name'               => $this->input->post('tName'),
        //     //'s_collage_code'     => $data['tCollageCode'],
        //     's_description'        => $this->input->post('tDescription'),
        //     's_address'            => $this->input->post('tAddress'),
        //     's_contact_number'     => $this->input->post('tMobileNo'),
        //     's_website'            => $this->input->post('tWebSite'),
        //     's_status'             => $s_status,
        //     //'s_img'              => $this->input->post('tImg'),
        //     //'s_tpo_img'          => $this->input->post('tpoImg'),
        //     's_tpo_name'           => $this->input->post('tpoName'),
        //     's_tpo_contact_number' => $this->input->post('tpoMobileNo'),
        //     's_approved_by_admin_ID' => $t_approved_by_admin_ID,
        //     // 't_privilege'          => json_encode($privilege)
        // );

        // $query = $this->db->insert('tbl_tpo', $data);

        // if ($query){
        //     return true;
        // }
        // else{
        //     return false;
        // }
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

        if($query->num_rows() == 1)
        {
            $row = $query->row();
            if($row->a_status == 0)
                return "BLOCKED";

            if($row->a_status == 1)
            {
                $path = (empty($row->a_profile_img)) ? base_url("assets/images/admin/user.png") : base_url("assets/images/admin/" . $row->a_profile_img);

                $a_privilege = json_decode($row->a_privilege);

                $array = array(
                    'sessUser'=> $row->a_email,
                    'sessID'  => $row->a_ID,
                    'sessName'=> $row->a_name,
                    'sessImg' => $path,
                    'sessRole'=> "ADMIN",
                    'sessPrivilege'=> $a_privilege,
                );

                if($row->a_created_by == '0') {
                    $array = array_merge($array, array('sessMaster' => 'MasterAdmin'));
                }

                $this->session->set_userdata( $array );

                return "TRUE";

            }

            // If the previous process did not validate
            // then return false.
            return "FALSE";
        }
    }
    /* Login Admin Ends*/

    /*===============================================================================================================*/

    /* Login Company */
    public function getLogComM()
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
                $path = (empty($row->t_img)) ? base_url("assets/images/company/user.png") : base_url("assets/images/company/" . $row->t_img);

                $c_privilege = json_decode($row->c_privilege);

                $array = array(
                    'sessUser'=> $row->c_email,
                    'sessID'  => $row->c_ID,
                    'sessName'=> $row->c_name,
                    'sessImg' => $path,
                    'sessRole'=> "COMPANY",
                    'sessPrivilege'=> $c_privilege,
                );

                $this->session->set_userdata( $array );

                return "TRUE";

            }

            // If the previous process did not validate
            // then return false.
            return "FALSE";
        }
    }
    /* Login Company Ends*/

    /*===============================================================================================================*/

    /* Login TPO */
    public function getLogTpoM()
    {
        $where = array(
            't_email'   => trim(strtolower($this->input->post('Email'))),
            't_password'=> hash ( "sha256", $this->input->post('Password'))
        );
        $this->db->select('*');
        $this->db->from('tbl_tpo');
        $this->db->where($where);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
            $row = $query->row();
            if($row->t_status == 0)
                return "BLOCKED";

            if($row->t_status == 1)
            {
                $path = (empty($row->t_img)) ? base_url("assets/images/tpo/user.png") : base_url("assets/images/tpo/" . $row->t_img);
                
                $t_privilege = json_decode($row->t_privilege);

                $array = array(
                    'sessUser'=> $row->t_email,
                    'sessID'  => $row->t_ID,
                    'sessName'=> $row->t_name,
                    'sessImg' => $path,
                    'sessRole'=> "TPO",
                    'sessPrivilege'=> $t_privilege,
                );

                $this->session->set_userdata( $array );

                return "TRUE";

            }

            // If the previous process did not validate
            // then return false.
            return "FALSE";
        }
    }
    /* Login TPO Ends*/

    /*===============================================================================================================*/

    /* Login Students */
    public function getLogStdM()
    {
        // $where = array(
        //     't_email'   => trim(strtolower($this->input->post('Email'))),
        //     't_password'=> hash ( "sha256", $this->input->post('Password'))
        // );
        // $this->db->select('*');
        // $this->db->from('tbl_tpo');
        // $this->db->where($where);
        // $this->db->limit(1);

        // $query = $this->db->get();

        // if($query->num_rows() == 1)
        // {
        //     $row = $query->row();
        //     if($row->t_status == 0)
        //         return "BLOCKED";

        //     if($row->t_status == 1)
        //     {
        //         $path = (empty($row->t_img)) ? base_url("assets/images/tpo/user.png") : base_url("assets/images/tpo/" . $row->t_img);

        //         $t_privilege = json_decode($row->t_privilege);

        //         $array = array(
        //             'sessUser'=> $row->t_email,
        //             'sessID'  => $row->t_ID,
        //             'sessName'=> $row->t_name,
        //             'sessImg' => $path,
        //             'sessRole'=> "TPO",
        //             'sessPrivilege'=> $t_privilege,
        //         );

        //         $this->session->set_userdata( $array );

        //         return "TRUE";

        //     }

        //     // If the previous process did not validate
        //     // then return false.
        //     return "FALSE";
        // }
    }
    /* Login Students Ends*/

    /*===============================================================================================================*/

    /* List Admin */
    public function getListAdminM()
    {
        $where = array(

        );

        $this->db->select('*');
        $this->db->from('tbl_Admin');
        $this->db->where($where);
        $this->db->order_by('tbl_Admin.a_ID', 'DESC');

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        return "FALSE";
    }
    /* List Admin Ends*/

    /*===============================================================================================================*/

    /* List Company */
    public function getListComM()
    {
        $where = array(

        );

        $this->db->select('*');
        $this->db->from('tbl_Company');
        $this->db->where($where);
        $this->db->order_by('tbl_Company.c_ID', 'DESC');

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        return "FALSE";
    }
    /* List Company Ends*/

    /*===============================================================================================================*/

    /* List TPO */
    public function getListTpoM()
    {
        $where = array(

        );

        $this->db->select('*');
        $this->db->from('tbl_tpo');
        $this->db->where($where);
        $this->db->order_by('tbl_tpo.t_ID', 'DESC');

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        return "FALSE";
    }
    /* List TPO Ends*/

    /*===============================================================================================================*/

    /* List Student */
    public function getListStdM()
    {
        // $where = array(

        // );

        // $this->db->select('*');
        // $this->db->from('tbl_students');
        // $this->db->where($where);

        // $query = $this->db->get();

        // if($query->num_rows() > 0)
        // {
        //     return $query->result();
        // }
        // return "FALSE";
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
        if($query->num_rows() > 0)
        {
            $res = $query->result();
            $x = $res[0]->a_created_by;
            if ( $x != 0 )
            {
                $where = array(
                    'a_ID' => $x,
                );

                $this->db->select('a_ID as cre_ID, a_name as cre_name, a_profile_img as cre_img');
                $this->db->from('tbl_admin');
                $this->db->where($where);

                if($query->num_rows() > 0)
                {
                    $query = $this->db->get();
                }
                
                $res1 = $query->result();
                $result = array_merge($res, $res1);

                return $result;
            }

            return $res;
        }

        return "FALSE";
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

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        return "FALSE";
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

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        return "FALSE";
    }
    /* Profile TPO Model Ends*/

    /*===============================================================================================================*/

    /* Profile Company Model */
    public function profileStdM($id)
    {
        // $where = array(
        //     'c_ID' => $id,
        // );

        // $this->db->select('tbl_company.*, tbl_admin.a_ID, tbl_admin.a_name, tbl_admin.a_profile_img');
        // $this->db->from('tbl_company');
        // $this->db->where($where);
        // $this->db->join('tbl_admin', 'tbl_admin.a_ID = tbl_company.c_approved_by_admin_ID', 'left');

        // $query = $this->db->get();

        // if($query->num_rows() > 0)
        // {
        //     return $query->result();
        // }
        // return "FALSE";
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
                'a_status' => '0'
            );
        }
        if($action == 'unblock')
        {
            $data = array(
                'a_created_by' => $this->session->userdata('sessID'),
                'a_status' => '1'
            );
        }

        $this->db->set($data);
        $this->db->where($where);
        $this->db->update('tbl_admin');

        if($this->db->affected_rows() >=0)
        {
            return "TRUE";
        }

        return "FALSE";
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
                'c_status' => '0'
            );
        }
        if($action == 'unblock' || $action == 'Approve')
        {
            $data = array(
                'c_approved_by_admin_ID' => $this->session->userdata('sessID'),
                'c_status' => '1'
            );
        }

        $this->db->set($data);
        $this->db->where($where);
        $this->db->update('tbl_Company');

        if($this->db->affected_rows() >=0)
        {
            return "TRUE";
        }

        return "FALSE";
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
                't_status' => '0'
            );
        }
        if($action == 'unblock' || $action == 'Approve')
        {
            $data = array(
                't_approved_by_admin_ID' => $this->session->userdata('sessID'),
                't_status' => '1'
            );
        }

        $this->db->set($data);
        $this->db->where($where);
        $this->db->update('tbl_tpo');

        if($this->db->affected_rows() >=0)
        {
            return "TRUE";
        }

        return "FALSE";
    }
    /* Block Unvlock TPO Model Ends */

    /*===============================================================================================================*/

    /* Block Unvlock Student Model */
    public function editBlockUnblockStdM($action, $id)
    {
        // $where = array(
        //     't_ID' => $id,
        // );
        // if($action == 'block')
        // {
        //     $data = array(
        //         't_approved_by_admin_ID' => $this->session->userdata('sessID'),
        //         't_status' => '0'
        //     );
        // }
        // if($action == 'unblock' || $action == 'Approve')
        // {
        //     $data = array(
        //         't_approved_by_admin_ID' => $this->session->userdata('sessID'),
        //         't_status' => '1'
        //     );
        // }

        // $this->db->set($data);
        // $this->db->where($where);
        // $this->db->update('tbl_tpo');

        // if($this->db->affected_rows() >=0)
        // {
        //     return "TRUE";
        // }

        // return "FALSE";
    }
    /* Block Unvlock Student Model Ends */

    /*===============================================================================================================*/

    /* Edit Profile Admin Model */
    public function editProfileAdminM($action, $id)
    {
        $where = array(
            'a_ID' => $id,
        );
        if($action == 'block')
        {
            $data = array(
                'a_created_by' => $this->session->userdata('sessID'),
                'a_status' => '0'
            );
        }
        if($action == 'unblock')
        {
            $data = array(
                'a_created_by' => $this->session->userdata('sessID'),
                'a_status' => '1'
            );
        }

        $this->db->set($data);
        $this->db->where($where);
        $this->db->update('tbl_admin');

        if($this->db->affected_rows() >=0)
        {
            return "TRUE";
        }

        return "FALSE";
    }
    /* Edit Profile Admin Model Ends */

    /*===============================================================================================================*/
}

/* End of file placementM.php */
/* Location: ./application/models/placementM.php */
?>