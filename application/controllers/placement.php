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
    public function headers($page = "", $type = "")
    {

        if ($page != "") {
            $data['active'] = $page;
        } else {

            $data['active'] = "home";
        }

        $this->load->view('includes/HeadV',$data);

        if($type == "admin") {
            $this->check_isadmin();
            $this->load->view('includes/NavAdminV', $data);
        }
        elseif ($type == "students") {
            $this->load->view('includes/NavStuV', $data);
        }
        elseif ($type == "company") {
            $this->load->view('includes/NavTpoV', $data);
        }
        elseif ($type == "tpo") {
            $this->load->view('includes/NavComV', $data);
        }
        else {
            $this->load->view('includes/NavV', $data);
        }
    }
    /* Header For all User Ends */

    /*===============================================================================================================*/

    /* Footer For all User */
    public function footers($type = "") {
        if ($type == "admin" || $type == "students" || $type == "company" || $type == "tpo") {
            $data['session']=$this->session->all_userdata();
        }

        $this->load->view('includes/FooterV');

        if ($type == "admin" || $type == "students" || $type == "company" || $type == "tpo") {
            $this->load->view('security_check');
        }
    }
    /* Footer For all User Ends */

    /*===============================================================================================================*/
    /*|
    /*| Page Functions
    /*|
    /*===============================================================================================================*/


    /* Home Page */
    public function index($page = "home") {
        $this->headers();
        $data = "";
        // $this->load->model('placement_news');
        // $data['news_data'] =$this->placement_news->get_news();
        // if ($page == "home") {

        $this->load->view('homeV',$data);
        // } else {
        //     $this->load->view('404');
        // }
        $this->footers();
    }
    /* Home Page Ends */

    /*===============================================================================================================*/

    /* Registration Company Page */
    public function regComF($page='RegCom')
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
    public function regTpoF($page='RegTPO')
    {
        $this->headers($page);
        $data[''] = "";

        if ($this->form_validation->run('tRegister')) 
        {
            $this->load->model('placementM');
            $result = $this->placementM->setRegTpoM();

            if ($result == TRUE) {
                $data['method'] = "regTpoF";
                $this->load->view('thankYouV', $data);
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
    public function regStdF($page='RegStd')
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
    public function logComF($page='LogCom')
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
    public function logTpoF($page='LogTpo')
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
    public function logStdF($page='LogStd')
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
    public function admin_login($page='LogAdmin')
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
    public function aboutUsF($page='AboutUs')
    {
        $this->headers($page);
        $this->load->view('aboutUsV');
        $this->footers();
    }
    /* About Us Page Ends */

    /*===============================================================================================================*/

    /* Contact Us Page */
    public function contactUsF($page='ContactUs')
    {
        $this->headers($page);
        $this->load->view('ContactUsV');
        $this->footers();
    }
    /* Contact Us Page Ends */

    /*===============================================================================================================*/

    /* Dashboard Company Page */
    public function dashboardAdminF($page='DashboardCom')
    {
        echo "string";
        echo "<pre>";
        print_r ($this->session->get_userdata());
        echo "</pre>";
    }
    /* Dashboard Company Page Ends */

    /*===============================================================================================================*/

    /* Dashboard Company Page */
    public function dashboardComF($page='DashboardCom')
    {
        echo "string";
        echo "<pre>";
        print_r ($this->session->get_userdata());
        echo "</pre>";
    }
    /* Dashboard Company Page Ends */

    /*===============================================================================================================*/

    /* Dashboard TPO Page */
    public function dashboardTpoF($page='DashboardTpo')
    {
        echo "string";
        echo "<pre>";
        print_r ($this->session->get_userdata());
        echo "</pre>";
    }
    /* Dashboard TPO Page Ends */

    /*===============================================================================================================*/

    /* Dashboard TPO Page */
    public function dashboardStdF($page='DashboardStd')
    {
        echo "string";
        echo "<pre>";
        print_r ($this->session->get_userdata());
        echo "</pre>";
    }
    /* Dashboard TPO Page Ends */

}

/* End of file placement.php */
/* Location: ./application/controllers/placement.php */
?>