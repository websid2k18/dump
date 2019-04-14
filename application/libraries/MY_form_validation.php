<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

	public function is_exists($str, $field)
	{
		return $this->is_unique($str, $field) === FALSE;
	}

	// public function file_check($str, $max_size, $allowed_types, $field){

	// }
} 