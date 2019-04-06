<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PlacementM extends CI_Model {

    /*================================================================================================================*/
    /*|
    /*| Common Models
    /*|
    /*================================================================================================================*/

    /* Register Company */
    public function setRegComM()
    {
        // $privilege = array(
        //  'emailVerification' => uniqid(12),
        // );

        if($this->session->userdata('sessRole') == 'ADMIN'){
            $c_status = '1';
        }
        else{
            $c_status = '0';
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
            'c_hr_no'       => $this->input->post('hMobileNo')
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

    /* List TPO */
    public function getListTpoM()
    {
        $where = array(

        );

        $this->db->select('*');
        $this->db->from('tbl_tpo');
        $this->db->where($where);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        return "FALSE";
    }

    /* List TPO Ends*/

    /*===============================================================================================================*/

    /* Login Company */
    public function getListComM()
    {
        $where = array(

        );

        $this->db->select('*');
        $this->db->from('tbl_Company');
        $this->db->where($where);

        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        return "FALSE";
    }

    /* Login Company Ends*/

    /*===============================================================================================================*/
}

/* End of file placementM.php */
/* Location: ./application/models/placementM.php */
?>