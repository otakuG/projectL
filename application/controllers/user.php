<?php
	class User extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->model('user_model');
			$this->load->helper(array('cookie', 'url'));
		}

		public function login(){
			/*
				G: Mon, 19 Aug 2013 18:20:15
				先寫Cookie的，Session的還沒寫。
				原本以為set_cookie會return TRUE或FALSE，因為這樣卡了很久……

				G: Mon, 19 Aug 2013 23:45:21
				把login獨立成一個controller。我在想這個controller到底要叫user？還是login？
				一般會把login跟user相關的操作放在一起嗎？還是兩者分開？
			*/
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$loginData = $this->user_model->login($username);

			if($loginData['password'] == $password){

				$cookie = array(
					'name' => 'username',
					'value' => $username,
					'expire' => '600'
				);

				$this->input->set_cookie($cookie);
				redirect('mylist');
			}else{
				echo 'error';
			}
		}

		public function logout(){
			delete_cookie('username');
			redirect('mylist');
		}
	}
?>