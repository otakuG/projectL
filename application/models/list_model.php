<?php
	class List_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function get_list(){
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

		public function login($username){
			/*
				G: Mon, 19 Aug 2013 06:20:15
				資料庫多了一個user的Table。

				注意回傳是row_array()，所以在controllers使用的時候不用加index。
				result_array()回傳的資料即使只有一筆，也是二維陣列，所以才會出現上次沒有index的錯誤。
			*/

			/*
				T: Mon, 19 Aug 2013 19:23:33
				一個model應該對樣一個table，user的東西最好再另開一個model來實作

				對於這種只查一比的我偏好在model就把二維陣列的問題處理好讓外面直接用
			*/
			$query = $this->db->get_where('user', array('username' => $username));
			return $query->row_array();
		}
	}
?>