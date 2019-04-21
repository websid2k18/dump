<?php
$config = array(

    /*===============================================================================================================*/

    /* Admin Login Starts */
    'aLogin' => array(
        array(
            'field'     => 'Email',
            'label'     => 'Username',
            'rules'     => 'xss_clean|trim|required|min_length[6]|max_length[255]|valid_email|is_exists[tbl_admin.a_email]',
            'errors'    => array(
                'is_exists' => "You are not Register yet!"
            ),
        ),
        array(
            'field'     => 'Password',
            'label'     => 'Password',
            'rules'     => 'xss_clean|trim|required|min_length[6]|max_length[255]|regex_match["^(?=[a-zA-Z0-9#@$?]{6,64}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9]).*"]',
            'errors'    => array(
                'regex_match' => "You must enter at least one uppercase letter, one lowercase letter, one number, one special character, minimum 4 character and maximum 64 character"
            ),
        )
    ),
    /* Admin Login Ends */

    /*===============================================================================================================*/

    /* Company Login */
    'cLogin' => array(
        array(
            'field'     => 'Email',
            'label'     => 'Username',
            'rules'     => 'xss_clean|trim|required|min_length[6]|max_length[255]|valid_email|is_exists[tbl_company.c_email]',
            'errors'    => array(
                'is_exists' => "You are not Register yet!"
            ),
        ),
        array(
            'field'     => 'Password',
            'label'     => 'Password',
            'rules'     => 'xss_clean|trim|required|min_length[6]|max_length[255]|regex_match["^(?=[a-zA-Z0-9#@$?]{6,64}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9]).*"]',
            'errors'    => array(
                'regex_match' => "You must enter at least one uppercase letter, one lowercase letter, one number, one special character, minimum 4 character and maximum 64 character"
            ),
        )
    ),
    /* Company Login Ends */

    /*===============================================================================================================*/

    /* Company Login */
    'tLogin' => array(
        array(
            'field'     => 'Email',
            'label'     => 'Username',
            'rules'     => 'xss_clean|trim|required|min_length[6]|max_length[255]|valid_email|is_exists[tbl_tpo.t_email]',
            'errors'    => array(
                'is_exists' => "You are not Register yet!"
            ),
        ),
        array(
            'field'     => 'Password',
            'label'     => 'Password',
            'rules'     => 'xss_clean|trim|required|min_length[6]|max_length[255]|regex_match["^(?=[a-zA-Z0-9#@$?]{6,64}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9]).*"]',
            'errors'    => array(
                'regex_match' => "You must enter at least one uppercase letter, one lowercase letter, one number, one special character, minimum 4 character and maximum 64 character"
            ),
        )
    ),
    /* Company Login Ends */

    /*===============================================================================================================*/

    /* Company Login */
    'sLogin' => array(
        array(
            'field'     => 'Email',
            'label'     => 'Username',
            'rules'     => 'xss_clean|trim|required|min_length[6]|max_length[255]|valid_email|is_exists[tbl_student.s_email]',
            'errors'    => array(
                'is_exists' => "You are not Register yet!"
            ),
        ),
        array(
            'field'     => 'Password',
            'label'     => 'Password',
            'rules'     => 'xss_clean|trim|required|min_length[6]|max_length[255]|regex_match["^(?=[a-zA-Z0-9#@$?]{6,64}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9]).*"]',
            'errors'    => array(
                'regex_match' => "You must enter at least one uppercase letter, one lowercase letter, one number, one special character, minimum 4 character and maximum 64 character"
            ),
        )
    ),
    /* Company Login Ends */

    /*===============================================================================================================*/

    /* Admin Registration */

    'aRegister' => array(
        array(
            'field' => 'aEmail',
            'label' => 'Username',
            'rules' => 'xss_clean|trim|required|min_length[6]|max_length[255]|valid_email|is_unique[tbl_admin.a_email]',
            'errors' => array(
            ),
        ),
        array(
            'field' => 'aPassword',
            'label' => 'Password',
            'rules' => 'xss_clean|trim|required|min_length[6]|max_length[255]|regex_match["^(?=[a-zA-Z0-9#@$?]{6,64}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9]).*"]',
            'errors' => array(
                'regex_match' => "You must enter at least one uppercase letter, one lowercase letter, one number, one special character, minimum 4 character and maximum 64 character"
            ),
        ),
        array(
            'field' => 'aPasswordConfirm',
            'label' => 'Confirm Password',
            'rules' => 'xss_clean|trim|required|min_length[6]|max_length[255]|matches[aPassword]',
            'errors' => array(
                'regex_match' => "You must enter at least one uppercase letter, one lowercase letter, one number, one special character, minimum 4 character and maximum 64 character"
            ),
        ),
        array(
            'field' => 'aMobileNo',
            'label' => 'Password',
            'rules' => 'xss_clean|trim|required|min_length[10]|max_length[10]|regex_match["^\+?[0-9-]+$"]',
            'errors' => array(
                'regex_match' => "You must enter total 10 number no other character"
            ),
        )
    ),
    /* Admin Validation Ends */

    /*===============================================================================================================*/

    /* Tpo Registration */

    'tRegister' => array(
        array(
            'field' => 'tEmail',
            'label' => 'Username',
            'rules' => 'xss_clean|trim|required|min_length[6]|max_length[255]|valid_email|is_unique[tbl_tpo.t_email]',
            'errors' => array(
            ),
        ),
        array(
            'field' => 'tPassword',
            'label' => 'Password',
            'rules' => 'xss_clean|trim|required|min_length[6]|max_length[255]|regex_match["^(?=[a-zA-Z0-9#@$?]{6,64}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9]).*"]',
            'errors' => array(
                'regex_match' => "You must enter at least one uppercase letter, one lowercase letter, one number, one special character, minimum 4 character and maximum 64 character"
            ),
        ),
        array(
            'field' => 'tPasswordConfirm',
            'label' => 'Confirm Password',
            'rules' => 'xss_clean|trim|required|min_length[6]|max_length[255]|matches[tPassword]',
            'errors' => array(
                'regex_match' => "You must enter at least one uppercase letter, one lowercase letter, one number, one special character, minimum 4 character and maximum 64 character"
            ),
        ),
        array(
            'field' => 'tMobileNo',
            'label' => 'Password',
            'rules' => 'xss_clean|trim|required|min_length[10]|max_length[10]|regex_match["^\+?[0-9-]+$"]',
            'errors' => array(
                'regex_match' => "You must enter total 10 number no other character"
            ),
        )
    ),
    /* Tpo Validation Ends */

    /*===============================================================================================================*/
    
    /* Company Registration */
    'cRegister' => array(
        array(
            'field' => 'cEmail',
            'label' => 'Username',
            'rules' => 'xss_clean|trim|required|min_length[6]|max_length[255]|valid_email|is_unique[tbl_company.c_email]',
            'errors' => array(
            ),
        ),
        array(
            'field' => 'cPassword',
            'label' => 'Password',
            'rules' => 'xss_clean|trim|required|min_length[6]|max_length[255]|regex_match["^(?=[a-zA-Z0-9#@$?]{6,64}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9]).*"]',
            'errors' => array(
                'regex_match' => "You must enter at least one uppercase letter, one lowercase letter, one number, one special character, minimum 4 character and maximum 64 character"
            ),
        ),
        array(
            'field' => 'cPasswordConfirm',
            'label' => 'Confirm Password',
            'rules' => 'xss_clean|trim|required|min_length[6]|max_length[255]|matches[cPassword]',
            'errors' => array(
                'regex_match' => "You must enter at least one uppercase letter, one lowercase letter, one number, one special character, minimum 4 character and maximum 64 character"
            ),
        ),
        array(
            'field' => 'cMobileNo',
            'label' => 'Mobile No',
            'rules' => 'xss_clean|trim|required|min_length[10]|max_length[10]|regex_match["^\+?[0-9-]+$"]',
            'errors' => array(
                'regex_match' => "You must enter total 10 number no other character"
            ),
        )
    ),
    /* Company Validation Ends */    

    /*===============================================================================================================*/    

    /* student Registration */
    'sRegister' => array(
        array(
            'field' => 'sEmail',
            'label' => 'Username',
            'rules' => 'xss_clean|trim|required|min_length[6]|max_length[255]|valid_email|is_unique[tbl_student.s_email]',
            'errors' => array(
            ),
        ),
        array(
            'field' => 'sPassword',
            'label' => 'Password',
            'rules' => 'xss_clean|trim|required|min_length[6]|max_length[255]|regex_match["^(?=[a-zA-Z0-9#@$?]{6,64}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9]).*"]',
            'errors' => array(
                'regex_match' => "You must enter at least one uppercase letter, one lowercase letter, one number, one special character, minimum 4 character and maximum 64 character"
            ),
        ),
        array(
            'field' => 'sPasswordConfirm',
            'label' => 'Confirm Password',
            'rules' => 'xss_clean|trim|required|min_length[6]|max_length[255]|matches[sPassword]',
            'errors' => array(
                'regex_match' => "You must enter at least one uppercase letter, one lowercase letter, one number, one special character, minimum 4 character and maximum 64 character"
            ),
        ),
        array(
            'field' => 'sMobileNo',
            'label' => 'Mobile No',
            'rules' => 'xss_clean|trim|required|min_length[10]|max_length[10]|regex_match["^\+?[0-9-]+$"]',
            'errors' => array(
                'regex_match' => "You must enter total 10 number no other character"
            ),
        ),
        array(
            'field' => 'sEnrollNo',
            'label' => 'Enrollment No',
            'rules' => 'xss_clean|trim|required|min_length[12]|max_length[12]|regex_match["^\+?[0-9-]+$"]',
            'errors' => array(
                'regex_match' => "You must enter total 10 number no other character"
            ),
        ),
        array(
            'field' => 'sTpoNameId',
            'label' => 'Enrollment No',
            'rules' => 'xss_clean|trim|required',
            'errors' => array(
                'regex_match' => "You must enter total 10 number no other character"
            ),
        ),
        array(
            'field' => 'sDept',
            'label' => 'Enrollment No',
            'rules' => 'xss_clean|trim|required',
            'errors' => array(
                'regex_match' => "You must enter total 10 number no other character"
            ),
        )
    ),
    /* student Validation Ends */    

    /*===============================================================================================================*/

    /* Admin edir profile Registration */
    'aProfileEdit' => array(
        array(
            'field' => 'aMobileNo',
            'label' => 'Password',
            'rules' => 'xss_clean|trim|required|min_length[10]|max_length[10]|regex_match["^\+?[0-9-]+$"]',
            'errors' => array(
                'regex_match' => "You must enter total 10 number no other character"
            ),
        ),
        // array(
        //     'field' => 'aImg',
        //     'label' => 'Profile Image',
        //     'rules' => 'xss_clean|trim|file_check["gif|jpg|png|jpeg",]',
        //     'errors' => array(
        //         'regex_match' => "You must enter total 10 number no other character"
        //     ),
        // )
    ),
    /* Admin edir profile Validation Ends */

    /*===============================================================================================================*/

    /* Admin edir profile Registration */
    'cProfileEdit' => array(

        array(
            'field' => 'cMobileNo',
            'label' => 'Contact No',
            'rules' => 'xss_clean|trim|required|min_length[10]|max_length[10]|regex_match["^\+?[0-9-]+$"]',
            'errors' => array(
                'regex_match' => "You must enter total 10 number no other character"
            ),
        ),
        array(
            'field' => 'cWebsite',
            'label' => 'Contact No',
            'rules' => 'xss_clean|trim|valid_url',
            'errors' => array(
                'regex_match' => "You must enter total 10 number no other character"
            ),
        ),
        array(
            'field' => 'hMobileNo',
            'label' => 'Mobile No',
            'rules' => 'xss_clean|trim|required|min_length[10]|max_length[10]|regex_match["^\+?[0-9-]+$"]',
            'errors' => array(
                'regex_match' => "You must enter total 10 number no other character"
            ),
        )
    ),
    /* Admin edir profile Validation Ends */

    /*===============================================================================================================*/

    /* Admin edir profile Registration */
    'tProfileEdit' => array(

        array(
            'field' => 'tMobileNo',
            'label' => 'Contact No',
            'rules' => 'xss_clean|trim|required|min_length[10]|max_length[10]|regex_match["^\+?[0-9-]+$"]',
            'errors' => array(
                'regex_match' => "You must enter total 10 number no other character"
            ),
        ),
        array(
            'field' => 'tWebsite',
            'label' => 'Contact No',
            'rules' => 'xss_clean|trim|valid_url',
            'errors' => array(
                'regex_match' => "You must enter total 10 number no other character"
            ),
        ),
        array(
            'field' => 'tpoMobileNo',
            'label' => 'Mobile No',
            'rules' => 'xss_clean|trim|required|min_length[10]|max_length[10]|regex_match["^\+?[0-9-]+$"]',
            'errors' => array(
                'regex_match' => "You must enter total 10 number no other character"
            ),
        )
    ),
    /* Admin edir profile Validation Ends */

    /*===============================================================================================================*/
); 
?>