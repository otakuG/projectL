<?php
	class List_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		//從資料庫取得整個清單，最新的項目顯示在最上面。
		public function get_list(){
			$this->db->order_by('LID', 'desc');
			$query = $this->db->get('list');
			return $query->result_array();
		}

		//用來取最新push的清單項目
		public function update_list(){
			$this->db->order_by('LID', 'desc');
			$query = $this->db->get('list', 1);
			return $query->result_array();
		}

		public function set_list($pushList){
			$this->load->helper('date');
			$dateFormat = "%Y-%m-%d %h:%i:%s";

			$data = array(
				'title' => $pushList,
				'time' => mdate($dateFormat, time())
			);

			return $this->db->insert('list', $data);
		}

		public function delete_list($LID){
			return $this->db->delete('list', array('LID' => $LID));
		}
	}
?>