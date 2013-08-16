<!DOCTYPE html>
<html>
	<head>
		<title>projectL</title>
		<link href="<?php echo $customCSS_path; ?>" rel="stylesheet" media="screen" />
		<link href="<?php echo $bootstrap_path; ?>" rel="stylesheet" media="screen" />
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript">
		<!--
				G:
				找到JavaScript無法運作的原因。
				$.post()裡的路徑我必須是：'/~G/projectL/index.php/mylist/delete'
				因為我的網站不在根目錄下。

				終於看到Tony寫的超酷AJAX效果 QQQQQ
				話說，JavaScript裡的註解，這樣寫標準嗎？
		-->
		$(function(){
			$('.delete_button').click(function(e){
				e.preventDefault();
				var lid = parseInt($(this).val());
				$.post('/index.php/mylist/delete',{delete:lid},function(){
					$("#tr_" + lid).hide('slow');
				});
			});
		});
		</script>
	</head>