<?php $this->load->view('templates/header'); ?>
	<body>
		<div class="navbar">
			<div class="navbar-inner">
				<a class="brand" href="#">projectL</a>
				<ul class="nav">
					<li><a href="#">My List</a></li>
				</ul>
				<div class="pull-right">
					<?php $this->load->view('templates/login'); ?>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="hero-unit">
				<h1><?php if(isset($_COOKIE['username'])) echo $_COOKIE['username'] . "'s "; ?>pushList</h1>
				<p>物慾無極限，敗家促經濟！</p>
			</div>
			<?php $attributs = array('class' => 'form-inline text-center'); echo form_open('mylist/push', $attributs); ?>
				<input id="input-push" class="input-xxlarge" name="pushList" type="text" placeholder="PUSH一個清單項目吧！">
				<button id="push_button" type="submit" class="btn btn-primary">PUSH</button>
			</form>
			<table id="list" class="table table-hover table-condensed">
				<?php foreach($list as $list_item): ?>
				<tr id="tr_<?php echo $list_item['LID']; ?>">
					<td><?php echo $list_item['LID']; ?></td>
					<td><?php echo $list_item['title']; ?></td>
					<td><?php echo $list_item['time']; ?></td>
					<td class="td-button">
						<?php echo form_open('mylist/delete');?>
								<button class="btn btn-danger delete_button" type="submit" name="delete" value="<?php echo $list_item['LID']; ?>"><i class="icon-remove-sign"></i>刪除</button>
						</form>
	
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
		<!-- 
		T: Mon, 19 Aug 2013 19:36:22
		重複載入了 		
		<script src="http://code.jquery.com/jquery.js"></script> 
		-->

		<!-- 一直跳出來錯誤好煩(YAY) -->
		<!--<script src="js/bootstrap.min.js"></script>-->
	</body>
</html>