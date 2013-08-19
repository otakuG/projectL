<?php $this->load->view('templates/header'); ?>
	<body>
		<div class="navbar">
			<div class="navbar-inner">
				<a class="brand" href="#">projectL</a>
				<ul class="nav">
					<li><a href="#">My List</a></li>
				</ul>
				<div class="pull-right">
					<?php
						/*
							G: Mon, 19 Aug 2013 06:20:15 
							登入這段的code可讀性超差的 囧
							是不是要獨立出來比較好？還是有更好的方法？
						*/

						$username = $this->input->cookie('username');
						if($username):
					?>
					<span>
						<?php echo 'Hello, ' . $username; ?>
					</span>
					<?php $attributs = array('class' => 'navbar-form pull-right'); echo form_open('mylist/logout', $attributs); ?>
						<button type="submit" class="btn">登出</button>
					</form>
					<?php else: $attributs = array('class' => 'navbar-form pull-right'); echo form_open('mylist/login', $attributs); ?>
						<input name="username" type="text" class="input-medium" placeholder="Username">
						<input name="password" type="password" class="input-medium" placeholder="Password">
						<button type="submit" class="btn">登入</button>
					</form>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="hero-unit">
				<h1>敗家清單</h1>
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
		<script src="http://code.jquery.com/jquery.js"></script>
		<!-- 一直跳出來錯誤好煩(YAY) -->
		<!--<script src="js/bootstrap.min.js"></script>-->
	</body>
</html>