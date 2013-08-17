<?php
	class MyList extends CI_Controller{

		public function __construct(){
			//G:我不太懂parent::的用法……
			parent::__construct();
			$this->load->model('list_model');
			$this->load->helper('url');
			$this->load->helper('form');
		}

		public function index(){
			
			/*

				//表單處理
				$this->load->library('form_validation');

				$this->form_validation->set_rules('pushList', 'pushList', 'required');

				//判斷pushList是否送出，並insert到資料表。
				if($this->form_validation->run()){
					$result = $this->list_model->set_list();
					//var_dump($result);
				}

			*/

			//讀取list資料
			$data['list'] = $this->list_model->get_list();

			//var_dump($data['list']);

			//載入CSS
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

		public function push(){
			/*
				G:
				我把push也獨立出一個function。
				最後註解掉的，是想說把輸出編譯成JSON讓view裡的$.post去讀，不過那整段程式沒辦法RUN。
			*/
			$pushList = $this->input->post('pushList');

			if($pushList){
				$this->list_model->set_list($pushList);
				redirect('mylist');

				//$data['pushList'] = $this->list_model->update_list();
				//echo json_encode($data['pushList']);
			}
		}
	}
?>