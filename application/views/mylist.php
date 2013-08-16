	<body>
		<div class="navbar">
			<div class="navbar-inner">
				<a class="brand" href="#">projectL</a>
				<ul class="nav">
					<li><a href="#">My List</a></li>
				</ul>
				<form class="navbar-form pull-right">
					<input type="text" class="input-medium" placeholder="Username">
					<input type="password" class="input-medium" placeholder="Password">
					<button type="submit" class="btn">登入</button>
				</form>
			</div>
		</div>
		<div class="container">
			<div class="hero-unit">
				<h1>敗家清單</h1>
				<p>物慾無極限，敗家促進經濟！</p>
			</div>
			<?php $attributs = array('class' => 'form-inline text-center'); echo form_open('mylist', $attributs); ?>
				<input id="input-push" class="input-xxlarge" name="pushList" type="text" placeholder="PUSH一個清單項目吧！">
				<button id="push_button" type="submit" class="btn btn-primary">PUSH</button>
			</form>
			<table class="table table-hover table-condensed">
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
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>