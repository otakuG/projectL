<!DOCTYPE html>
<html>
	<head>
		<title>projectL</title>
		<link href="<?php echo $customCSS_path; ?>" rel="stylesheet" media="screen" />
		<link href="<?php echo $bootstrap_path; ?>" rel="stylesheet" media="screen" />
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript">
		/*
				G:
				找到JavaScript無法運作的原因。
				$.post()裡的路徑我必須是：'/~G/projectL/index.php/mylist/delete'
				因為我的網站不在根目錄下。

				終於看到Tony寫的超酷AJAX效果 QQQQQ
				話說，JavaScript裡的註解，這樣寫標準嗎？
		*/
		$(function(){
			// T:
			// 上面的註解是HTML的
			// JS的註解長這樣			
			/*
				也可以這樣，基本上跟PHP差不多			

				但是用#註解會死掉

				加了下面這個應該就可以解決你我目錄不同的問題了
			*/

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
		});
		</script>
	</head>