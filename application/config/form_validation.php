<?php
$config = array(

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
            'rules'     => 'xss_clean|xss_clean|trim|required|min_length[6]|max_length[255]|regex_match["^(?=[a-zA-Z0-9#@$?]{6,64}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9]).*"]',
            'errors'    => array(
                'regex_match' => "You must enter at least one uppercase letter, one lowercase letter, one number, one special character, minimum 4 character and maximum 64 character"
            ),
        )
    ),
    /* Admin Login Ends */

    /* College Login */
    'cLogin' => array(
        array(
            'field'     => 'Email',
            'label'     => 'Username',
            'rules'     => 'xss_clean|trim|required|min_length[6]|max_length[255]|valid_email|is_exists[tbl_company.a_email]',
            'errors'    => array(
                'is_exists' => "You are not Register yet!<a href='<?= base_url(); ?>HomeC/RegClgF'> Click Here To Register</a>"
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
    )
    /* College Login Ends */
);
?>