<?php
	class User_model extends CI_Model{

		public function login($username){
			/*
				G: Mon, 19 Aug 2013 18:20:15
				資料庫多了一個user的Table。

				注意回傳是row_array()，所以在controllers使用的時候不用加index。
				result_array()回傳的資料即使只有一筆，也是二維陣列，所以才會出現上次沒有index的錯誤。
			*/

			/*
				T: Mon, 19 Aug 2013 19:23:33
				一個model應該對樣一個table，user的東西最好再另開一個model來實作

				對於這種只查一比的我偏好在model就把二維陣列的問題處理好讓外面直接用
			*/

			/*
				G:Mon, 19 Aug 2013  23:29:32
				把user也獨立出一個model，順便也把註解也複製過來。
			*/
			$query = $this->db->get_where('user', array('username' => $username));
			return $query->row_array();
		}
	}