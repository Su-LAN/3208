<?php

class Captcha_models extends CI_Model
{
	function insert($data)
	{
		$this->db->insert('sample_data', $data);
	}
}
