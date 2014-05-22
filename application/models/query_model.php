<?php
	class Query_model extends CI_Model {
		function selectAll($tablename)
		{
			$query = $this->db->get($tablename);
			$result['numRows'] = $query->num_rows();
			$result['rows'] = Array();
			foreach ($query->result_array() as $row) {
				array_push($result['rows'], $row);
			}
			return $result;
		}
	}
?>