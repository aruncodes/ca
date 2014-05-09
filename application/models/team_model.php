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
			$query1 = $this->db->query("SELECT DISTINCT teamid FROM `users` WHERE teamid != 0 ORDER BY teamid;");
			$query2 = $this->db->query("SELECT DISTINCT tid as teamid FROM `client` WHERE tid != 0 ORDER BY tid;");

			$result = array();
			foreach ($query1->result_array() as $row) {
				array_push($result, $row['teamid']);
			}
			foreach ($query2->result_array() as $row) {
				if(!in_array($row['teamid'],$result))
					array_push($result, $row['teamid']);
			}

			return $result;
		}

		function getTeamID($eid) {
			$this->db->select('teamid');
			$this->db->where(array('eid'=>$eid));

			$query = $this->db->get('users');

			return $query->result_array()[0]['teamid'];
		}

		function getFirstTeamID() {
			
			return min($this->getTeams());
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