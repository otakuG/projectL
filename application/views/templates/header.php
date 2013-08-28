<!DOCTYPE html>
<html>
	<head>
		<title>projectL</title>
		<meta charset="UTF-8" />
		<link href="<?php echo $customCSS_path; ?>" rel="stylesheet" media="screen" />
		<link href="<?php echo $bootstrap_path; ?>" rel="stylesheet" media="screen" />
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript">
		
		$(function(){

			var base = "<?php echo base_url();?>";

			$('#button-more').click(
				function(){
					$('#pushInfo').toggle('fast');
			});

			$('.delete_button').click(function(e){

				//防止點下去的預設事件（換頁）
				e.preventDefault();

				//把自己的lid讀出來
				var lid = parseInt($(this).val());

				//AJAX的POST查詢帶delete=lid的變數，當完成時hide該欄位
				$.post(base + 'index.php/mylist/delete',{delete:lid},function(){
					$("#tr_" + lid).hide('fast');
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

				T: Mon, 19 Aug 2013 19:35:30

				type-name的話就蠻好懂了

				button-push
				buttonPush

				都OK
				var push = $('#pushList').val();				
				$.post(base + 'index.php/mylist/push',{pushList:push},function(data){
					$('#list').append("<tr>" + "<td>" + data.LID + "</td>" + "<td>" + data.title + "</td>" + "<td>" + data.time + "</td>" + "<tr/>");
				});
			});
			*/
			$('#submit-push').click(function(e){

				e.preventDefault();
				var pT = $('#text-push').val();
				var pD = $('#pushDescription').val();
				var pU = $('#pushUrl').val();
				
				$.post(base + 'index.php/mylist/push',{pushTitel:pT,pushDescription:pD,pushUrl:pU,ajax:true},function(data){
					var insert = "<tr id=\"tr_" + data.LID +"\"" +  "style=\"display:none\">" + "<td>" + data.LID + "</td>" + "<td>" + data.title + "</td>" + "<td>" + data.description  + "</td>" + "<td>" + data.time + "</td>" + 
					"<td class='td-button'><form method='post' action='mylist/delete'><button class='btn btn-danger delete_button' type='submit' name='delete' value='" + data.LID + "'><i class='icon-remove-sign'></i>刪除</button></form></td><tr/>";
					/*
						$('#list').prepend(insert).hide().fadeIn('slow');
						T: Wed, 21 Aug 2013 21:39:04

						應該要針對你新加入的那段做fadein
					 */
					
					$('#list').prepend(insert);
					$("#tr_" + data.LID).show('fast');
				},"JSON")
				/*
					T: 2013-08-17 21:52:47 
					似乎要加上type的參數要不然就是PHP的HEADER要改
					http://api.jquery.com/jQuery.post/
					再不然就是直接用getJson
					http://api.jquery.com/jQuery.getJSON/

					G: 2013-08-18 02:07:17
					jQuery實做AJAX這方面好像用JSON跟XML交換資訊最方便？
					還是說jQuery有直接讀寫資料庫的辦法？
			
					T: Mon, 19 Aug 2013 19:33:59
					一定要透過PHP之類的SOCKET連上去才能接資料庫
					JSON跟XML比其實差不多，但是JSON在傳輸效率上會快一點，因為不需要CLODE TAG
					EX:
					<root>
					</root> <------

					G: Wed, 21 Aug 2013 14:42:22
					主要遇到三個問題：
					1. 那個insert變數長得好噁心，有沒有更好的作法？(YAY)
					2. fadeIn的特效沒有出現。不太熟悉jQuery串接……
					3. 用AJAX新增的項目，delete_button的AJAX會失效。

					T: Wed, 21 Aug 2013 21:36:43
					1.https://github.com/trix/nano
					2.
					3.http://api.jquery.com/on/ 而且上面新增的TR沒有給ID，所以刪除的時候事件抓不到ID
				*/
			});

		});
		</script>
	</head>