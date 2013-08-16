<?php
	class MyList extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('list_model');
		}

		public function index(){
			/*
				G:
				感覺這index寫得怪怪的……
				我好像得了一個method寫太多東西就會覺得奇怪的病。
				為什麼判斷delete在表單處理後面，delete就要按兩次才刪得到？
				2013-08-16

				T:
				delete應該寫在另一個FUNC
			*/

			//表單處理
			$this->load->helper('form');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('pushList', 'pushList', 'required');

			//判斷pushList是否送出，並insert到資料表。
			if($this->form_validation->run()){
				$result = $this->list_model->set_list();
				//var_dump($result);
			}

			//讀取list資料
			$data['list'] = $this->list_model->get_list();

			//var_dump($data['list']);

			//載入CSS
			$this->load->helper('url');
			$data['customCSS_path'] = base_url('public/css/custom.css');
			$data['bootstrap_path'] = base_url('public/css/bootstrap.css');

			//載入版面 
			//T: Footer header弄到VIEW裡面我覺得比較彈性。參考看看
			//$this->load->view('templates/header', $data);
			$this->load->view('mylist', $data);
		}

		public function delete(){
			/*
				G:有什麼方法可以進delete後又跳回index？

				T:可以用CIE給的redirect				
				http://ellislab.com/codeigniter/user-guide/helpers/url_helper.html
			*/
		
			$LID = $this->input->post('delete');

			if($LID){
				$this->list_model->delete_list($LID);
				echo 'ok';
			}else{
				echo 'ko';
			}
		}
	}
?>