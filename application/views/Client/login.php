<div class="spacer"></div>
<div id="startchange"></div>
<div class="page-header">
		<h1>Login</h1>
</div>
<div class="container" style="padding-top: 60px;">
	<div class="col-md-offset-4 col-md-4">
		<?php $attributes = array("name" => "loginform");
            echo form_open("login/index", $attributes);?>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
		  </div>
		  <button class="theme-btn-lg col-md-12"> LOGIN</button>
		<?php echo form_close(); ?>
	</div>
</div>
<div class="container">
	
		<div style="padding-top: 40px;">
			<h5 style="text-align: center;"><a href="#">LOST YOUR PASSWORD?</a></h5>

		</div>
		<div class="col-md-offset-5 col-md-2" style="background-color: #000;height: 2px;"></div>
</div>
<div class="container" style="padding-bottom: 20px;">
	<div>
		<h4 class="col-md-offset-4 col-md-4"><b>Social Login</h4>
	</div>
	<div class="text-center col-md-offset-4 col-md-4"  style="display:inline-block;" >
		<div class="col-md-6">
		 <a href=""><img class="img-responsive center-block" src="<?php echo base_url();?>/media/image/facebook.png" style="position: relative;overflow: hidden; width: 150px; height: 50px;"></a>
		 </div>
		 <div class="col-md-6">
		 <a href=""><img class="img-responsive center-block" src="<?php echo base_url();?>/media/image/twitter1.png" style="position: relative;overflow: hidden; width: 150px; height: 50px;"></a>
		 </div>
	   </div>
</div>