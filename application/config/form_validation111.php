<?php
$config = array(
    'Login' => array(
        array(
            'field'     => 'Email',
            'label'     => 'Username',
            'rules'     => 'xss_clean|trim|required|min_length[6]|max_length[255]|valid_email|is_exists[tbl_company.c_email]',
            'errors'    => array(
                'is_exists' => "You are not Register yet!<a href='<?= base_url(); ?>CompanyC/RegCompanyF'> Click Here To Register</a>"
            ),
        ),
        array(
            'field'     => 'Password',
            'label'     => 'Password',
            'rules'     => 'xss_clean|xss_clean|trim|required|min_length[6]|max_length[255]|regex_match["^(?=[a-zA-Z0-9#@$?]{6,64}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9]).*"]',
            'errors'    => array(
                'regex_match' => "You must enter at least one uppercase letter, one lowercase letter, one number, one special character, minimum 4 character and maximum 64 character"
            ),
        )
    ),  
    /* Login Validation Ends */
    'cUnique' => array(
        array(
            'field' => 'Email',
            'label' => 'Username',
            'rules' => 'xss_clean|trim|required|min_length[6]|max_length[255]|valid_email|is_unique[tbl_company.c_email]',
            'errors' => array(
            ),
        )
    ),
    /* cUnique Email Validation Ends */
    'tUnique' => array(
        array(
            'field' => 'Email',
            'label' => 'Username',
            'rules' => 'xss_clean|trim|required|min_length[6]|max_length[255]|valid_email|is_unique[tbl_tpo.t_email]',
            'errors' => array(
            ),
        )
    ),
    /* tUnique Email Validation Ends */
);
?>