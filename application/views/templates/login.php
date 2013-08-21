<!-- COMMENT BEGIN
<?php
	/*
		G: Mon, 19 Aug 2013 06:20:15 
		登入這段的code可讀性超差的 囧
		是不是要獨立出來比較好？還是有更好的方法？
	*/

	$username = $this->input->cookie('username');
	if($username):

	$attributs = array('class' => 'navbar-form pull-right'); 
	echo form_open('mylist/logout', $attributs); 
?>
	<button type="submit" class="btn">登出</button>
</form>
<?php else: $attributs = array('class' => 'navbar-form pull-right'); echo form_open('mylist/login', $attributs); ?>
	<input name="username" type="text" class="input-medium" placeholder="Username">
	<input name="password" type="password" class="input-medium" placeholder="Password">
	<button type="submit" class="btn">登入</button>
</form>
<?php endif; ?>
COMMENT END-->


<?php
	/*
		T: Mon, 19 Aug 2013 19:20:18
		這樣有比較好嗎(YAY)?						

		通常登入登出會放在另一個CONTROLLER
		一個CONTROLLER只對一個物件做處理

		另外form如果沒用到TOKEN的話，可以直接用HTML寫出來，多用它的HELPER我覺得很搞肛XD

		接下來如果你要做多語系的話會更刺激....XD

		話說LOGOUT為什麼要表單？

		G: Mon, 19 Aug 2013 23:40:57
		我把這段獨立出來。

		太習慣有button或input就包一個form了 囧

		G: Tue, 20 Aug 2013 00:55:50
		之前的問題是在form的指向錯了 orz
	*/

	//$username = $this->input->cookie('username');
	$login_form_attributs = array('class' => 'navbar-form pull-right'); 

	$username = $this->session->userdata('username');
?>
<?php if($username):?>
	<a class="btn" href="<?php echo site_url("user/logout");?>">登出</a>
<?php else: ?>
<?php echo form_open('user/login', $login_form_attributs);?>
	<input name="username" type="text" class="input-medium" placeholder="Username">
	<input name="password" type="password" class="input-medium" placeholder="Password">
	<button type="submit" class="btn">登入</button>
</form>
<?php endif; ?>