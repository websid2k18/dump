<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Placement extends CI_Controller {

    /*==============================================================================================================*/
    /*|
    /*| Common Functions
    /*|
    /*==============================================================================================================*/

    public function test($value='')
    {
        $this->load->view('home_body_placement',$data);
    }

    /*==============================================================================================================*/

    /* Header For all User */
    public function headers($page = "", $type = "") {

        if ($page != "") {
            $data['active'] = $page;
        } else {

            $data['active'] = "home";
        }

        $this->load->view('includes/placement_header',$data);

        if($type == "admin") {
            $this->check_isadmin();
            $this->load->view('includes/placement_admin_nav', $data);
        }
        elseif ($type == "students") {
            $this->load->view('includes/placement_students_nav', $data);
        }
        elseif ($type == "company") {
            $this->load->view('includes/placement_company_nav', $data);
        }
        elseif ($type == "tpo") {
            $this->load->view('includes/placement_company_nav', $data);
        }
        else {
            $this->load->view('includes/placement_nav', $data);
        }
    }
    /* Header For all User Ends */

    /*==============================================================================================================*/

    /* Footer For all User */
    public function footers($type = "") {
        if ($type == "admin" || $type == "students" || $type == "company" || $type == "tpo") {
            $data['session']=$this->session->all_userdata();
        }

        $this->load->view('includes/placement_footer');

        if ($type == "admin" || $type == "students" || $type == "company" || $type == "tpo") {
            $this->load->view('security_check');
        }
    }
    /* Footer For all User Ends */

    /*==============================================================================================================*/
    /*|
    /*| Page Functions
    /*|
    /*==============================================================================================================*/


    /* Home Page */
    public function index($page = "home") {
        $this->headers();
        $data = "";
        // $this->load->model('placement_news');
        // $data['news_data'] =$this->placement_news->get_news();
        // if ($page == "home") {

        $this->load->view('home_body_placement',$data);
        // } else {
        //     $this->load->view('404');
        // }
        $this->footers();
    }
    /* Home Page Ends */

    /*==============================================================================================================*/


}

/* End of file placement.php */
/* Location: ./application/controllers/placement.php */
?>