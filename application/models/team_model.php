<?php
	class Team_model extends CI_Model {

		function getMembers($team_id){

			$this->db->select('eid,name');
			$this->db->where(array('teamid'=>$team_id));

			$query = $this->db->get('users');

			return $query->result_array();
		}

		function getClients($team_id){

			$this->db->select('name,cid');
			$this->db->where(array('tid'=>$team_id));

			$query = $this->db->get('client');

			return $query->result_array();
		}

		function getTeams() {
			// $this->db->distinct('teamid');
			// $this->db->where('teamid !=', 0);
			// $query = $this->db->get('users');

			// codeignitor distinct didn't work as expected. it doesnt allow  coloum names

			//array_unique(array_merge($array1,$array2), SORT_REGULAR);
			$query1 = $this->db->query("SELECT DISTINCT teamid FROM `users` WHERE teamid != 0 ORDER BY teamid;");
			$query2 = $this->db->query("SELECT DISTINCT tid as teamid FROM `client` WHERE tid != 0 ORDER BY tid;");

			//TODO: modify this into single query later. Buggy now
			if($query1->num_rows() >= $query2->num_rows())
				return $query1->result_array();
			else
				return $query2->result_array();
		}

		function getNoTeamMembers() {
			$this->db->select('eid,name');
			$this->db->where(array('teamid'=>0));

			$query = $this->db->get('users');

			return $query->result_array();
		}
		function getNoTeamClients(){

			$this->db->select('cid,name');
			$this->db->where(array('tid'=>0));

			$query = $this->db->get('client');

			return $query->result_array();
		}

		function setTeamForMember($eid,$team_id) {
			$this->db->where('eid',$eid);
			$this->db->update('users',array('teamid'=>$team_id));
		}

		function  setTeamForClient($cid,$team_id) {
			$this->db->where('cid',$cid);
			$this->db->update('client',array('tid'=>$team_id));
		}

		function removeMemberFromTeam($eid) {
			$this->setTeamForMember($eid,0);
		}

		function removeClientFromTeam($cid) {
			$this->setTeamForClient($cid,0);
		}
	}
?>