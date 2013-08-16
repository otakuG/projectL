<?php
	class List_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function get_list(){
			$query = $this->db->get('list');
			return $query->result_array();
		}

		public function set_list(){
			$this->load->helper('date');
			$datestring = "%Y-%m-%d %h:%i:%s";

			$data = array(
				'title' => $this->input->post('pushList'),
				'time' => mdate($datestring, time())
			);

			return $this->db->insert('list', $data);
		}

		public function delete_list($LID){
			return $this->db->delete('list', array('LID' => $LID));
		}
	}
?>