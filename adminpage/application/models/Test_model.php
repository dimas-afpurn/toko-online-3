<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Test_model extends CI_Model
{


	function get_table($table)
	{
		$query	= $this->db->get($table);

		//if ($this->db->_error_message()) header('Location: ../');
		return $query->result_array();
	}
}	