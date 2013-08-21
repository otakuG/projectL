<?php
	class MyList extends CI_Controller{

		public function __construct(){
			//G:我不太懂parent::的用法……
			parent::__construct();

			/*
			T：parent是呼叫父類別的建構子，應該是個靜態方法我不太確定
			所謂的靜態（STATIC）就是這個物件不用實體化(new)就可以使用的變數或方法
			http://php.net/manual/en/keyword.parent.php
			*/
			$this->load->model('list_model');
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

			//讀取session資料（清單的標題）
			$listTitle = $this->session->userdata('username');
			if(empty($listTitle)){
				$data['listTitle'] = "pushList";
			}else{
				$data['listTitle'] = $listTitle . "'s pushList";
			}
			/*
				G: Wed, 21 Aug 2013 11:30:10
				原本是在view（views/mylist.php）裡面讀session資料，
				但透過controller給view資料會不會比較好？
			*/
			
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

				T:可以用CI給的redirect				
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
			$pushList = $this->input->post('pushList');

			if($pushList){
				/* T: 2013-08-17 21:28:50 
				$this->list_model->set_list($pushList);
				redirect('mylist');
				*/

				//$data['pushList'] = $this->list_model->update_list();
				//echo json_encode($data['pushList']);


				/*
					T: 2013-08-17 21:26:40 
					上面是你原本寫的順序嗎？如果是的話問題很明顯
					redirect之後就換頁了所以後面的東西都跑不到AJAX也就撈佈道東西
					如果要REDIRECT又要AJAX就用最簡單的方法POST的時候多塞一個變數ajax=true來實作吧

					G: 2013-08-18 01:57:45
					原本只有AJAX在處理，redirect()是之後加的，不然在你修正前沒辦法正常運作。
				*/

				if($this->list_model->set_list($pushList)){
					if($this->input->post('ajax')=='true'){
						$new_item = $this->list_model->update_list();
						$new_item = $new_item[0];						
						echo json_encode($new_item);
					}else{
						redirect('mylist');
					}
				}else{
					echo 'error';
				}
			}
		}
	}
?>