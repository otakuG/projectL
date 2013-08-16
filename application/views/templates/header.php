<!DOCTYPE html>
<html>
	<head>
		<title>projectL</title>
		<link href="<?php echo $customCSS_path; ?>" rel="stylesheet" media="screen" />
		<link href="<?php echo $bootstrap_path; ?>" rel="stylesheet" media="screen" />
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript">
		<!--G:這段我執行起來會讓刪除無法作用。-->
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