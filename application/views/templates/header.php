<!DOCTYPE html>
<html>
	<head>
		<title>projectL</title>
		<link href="<?php echo $customCSS_path; ?>" rel="stylesheet" media="screen" />
		<link href="<?php echo $bootstrap_path; ?>" rel="stylesheet" media="screen" />
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript">
		
		$(function(){

			var base = "<?php echo base_url();?>";

			$('.delete_button').click(function(e){

				//防止點下去的預設事件（換頁）
				e.preventDefault();

				//把自己的lid讀出來
				var lid = parseInt($(this).val());

				//AJAX的POST查詢帶delete=lid的變數，當完成時hide該欄位
				$.post(base + 'index.php/mylist/delete',{delete:lid},function(){
					$("#tr_" + lid).hide('slow');
				});
			});

			/*
			
			G:
			這是在網路上找到的做法，可以讓.post去讀PHP回傳的JSON，但整段程式沒辦法RUN。orz
			要怎麼樣才能用jQuery取值啊？囧
			
			$('#push_button').click(function(e){

				e.preventDefault();


				
				T: 2013-08-17 21:34:36 
				HTML <input id="input-push" class="input-xxlarge" type="text" placeholder="PUSH一個清單項目吧！" name="pushList">
				發現問題了嗎(TROLL)?
				
				G: 2013-08-18 02:05:27
				靠wwwww
				我應該要來訂一個ID命名規則，像這樣"type-name"或是"type_name"？
				例如：input-push、button-push

				命名這方面，Tony你有什麼想法嗎？


				T: Sun, 18 Aug 2013 13:55:53
				用camelcasing吧XD

				buttonPush
				type + name會比較好懂

				var push = $('#pushList').val();				
				$.post(base + 'index.php/mylist/push',{pushList:push},function(data){
					$('#list').append("<tr>" + "<td>" + data.LID + "</td>" + "<td>" + data.title + "</td>" + "<td>" + data.time + "</td>" + "<tr/>");
				});
			});
			*/
			$('#push_button').click(function(e){

				e.preventDefault();
				var push = $('#input-push').val();
				$.post(base + 'index.php/mylist/push',{pushList:push,ajax:true},function(data){
					$('#list').append("<tr>" + "<td>" + data.LID + "</td>" + "<td>" + data.title + "</td>" + "<td>" + data.time + "</td>" + "<tr/>");
				},"JSON");
				/*
				T: 2013-08-17 21:52:47 
				似乎要加上type的參數要不然就是PHP的HEADER要改
				http://api.jquery.com/jQuery.post/
				再不然就是直接用getJson
				http://api.jquery.com/jQuery.getJSON/

				G: 2013-08-18 02:07:17
				jQuery實做AJAX這方面好像用JSON跟XML交換資訊最方便？
				還是說jQuery有直接讀寫資料庫的辦法？

				T: Sun, 18 Aug 2013 13:56:50
				一定要透過PHP之類的SCRIPT才能連資料庫

				要不然就是等WEB SOCKET出來看看能不能直接連3306 PORT...
				*/
			});

		});
		</script>
	</head>