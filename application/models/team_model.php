<?php
	class Team_model extends CI_Model {

		function getMembers($team_id){

			$this->db->select('eid,name');
			$this->db->where(array('teamid'=>$team_id));

			$query = $this->db->get('users');

			return $query->result_array();
		}

		function getClients($team_id){

			$this->db->select('name,cid,cmpname');
			$this->db->where(array('tid'=>$team_id));
			$this->db->group_by(array('status_cat1', 'in_cid')); 
			
			$query = $this->db->get('client');

			return $query->result_array();
		}

		function getTeams() {
			$query1 = $this->db->query("SELECT DISTINCT teamid FROM `users` WHERE teamid != '-' ORDER BY teamid;");
			$query2 = $this->db->query("SELECT DISTINCT tid as teamid FROM `client` WHERE tid != '-' ORDER BY tid;");

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
			$teams = $this->getTeams();
			if(count($teams) == 0)
				return NULL;
			return min($teams);
		}

		function getNoTeamMembers() {
			$this->db->select('eid,name');
			$this->db->where(array('teamid'=>"-",'uname !='=>'admin'));

			$query = $this->db->get('users');

			return $query->result_array();
		}
		function getNoTeamClients(){

			$this->db->select('cid,name,cmpname');
			$this->db->where(array('tid'=>"-"));

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
			$this->setTeamForMember($eid,"-");
		}

		function removeClientFromTeam($cid) {
			$this->setTeamForClient($cid,"-");
		}
	}
?>