<div class="spacer"></div>
<div id="startchange"></div>
<div class="container single-product">
	<div class="col-md-7 center-block">
		<img id="zoom_01" src="http://thehippogriff.com/wp-content/uploads/2016/11/abstractColours-2-424x600.jpg" data-zoom-image="http://thehippogriff.com/wp-content/uploads/2016/11/abstractColours-2.jpg" class="img-responsive center-block" style="margin-top: -50px;" />
	</div>
	<div class="col-md-5">
		<h1 style="text-transform: capitalize;"><?php echo $title; ?> </h1>
		 
		<div class="row">
			<div class="col-md-6">
				
			</div>
			<div class="col-md-6">
				
			</div>
		</div>
		<h5><?php $Descr=entity_decode($Descr,$charset = NULL); echo auto_typography(html_escape($Descr)); ?></h5>
		<div><span><b>&#8377; <?php echo $cost;?></b></span></div>
			<div class="row col-md-6">
				<!--<div class="text-center quantity col-md-6">
					<button class="decrease">
							<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
					</button>
					<input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric">
					<button class="increase">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
					</button>
				</div>-->
				<select class="form-control">
				  <option>1</option>
				  <option>2</option>
				  <option>3</option>
				  <option>4</option>
				  <option>5</option>
				  <option>6</option>
				  <option>7</option>
				  <option>8</option>
				  <option>9</option>
				  <option>10</option>
				</select>
			</div>
			<br><br>
			<div class="row">
				<div class="col-md-12 col-xs-12" style="padding-bottom: 20px;">
					 	<?php if(!empty($this->user->check_cart($this->session->userdata('uid'),$id))) {?>
					 		<a type="button" class="theme-btn-lg col-md-12 col-xs-12" href="<?php echo base_url("index.php/cart"); ?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Go To Cart</a>
			            <?php }else{?>
			            	<?php if(!empty($this->session->userdata('uid'))){?>
			                <div class="" id="addcartbtn" ><button  class="theme-btn-lg col-md-12 col-xs-12" onclick="javascript:cartadd(<?php echo $id;?>);"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span><span class="btn-text"> Add to cart</span></button ></div>
			                <?php }else{?>
			                <div class="" id="addcartbtn" ><button  class="theme-btn-lg col-md-12 col-xs-12" onclick="javascript:cartadd1(<?php echo $id;?>);"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span><span class="btn-text"> Add to cart</span></button ></div>
			                <?php }?>
			                <div class="" id="gocartbtn"><a  class="theme-btn-lg col-md-12 col-xs-12 " href="<?php echo base_url("index.php/cart"); ?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Go To Cart</a >
			              </div>
			           <?php }?>
	       		</div>
				<div class="col-md-6 col-xs-12">
			            <?php if($this->session->userdata('uid')){?>
			           	<?php if(!empty($this->user->check_wish($this->session->userdata('uid'),$id))) {?>
			           	<button onclick="javascript:wishlist(<?php echo $id;?>);" class="theme-btn col-md-12 col-xs-12 wishadd" id="wish"><span id="wishtext">Added to Wishlist</span></button>
			            <?php }else{?>
			            <button onclick="javascript:wishlist1(<?php echo $id;?>);" class="theme-btn col-md-12 col-xs-12" id="wish"><span id="wishtext">Add to Wishlist</span></button>
			          	<?php } }else {?>
			          	<button class="theme-btn col-md-12 col-xs-12" href="#"  data-toggle="modal" data-target="#myModal" id="wishtext">Add to Wishlist</button>
			          	<?php }?>
		        </div>
	    	</div>
	</div>
</div>
<div class="container product-details">
	 <ul class="info-swap text-center" role="">
	    <li><a href="#comment" aria-controls="coment" role="tab" data-toggle="tab">Comment (<?php echo $review;?>)</a></li>
	    <li class="active"><a href="#info" aria-controls="info" role="tab" data-toggle="tab">Promoter</a></li>
	  </ul>
	  <hr>
	  <!-- Tab panes -->
	  <div class="tab-content">
	    <div role="tabpanel" class="tab-pane active" id="info">
	    	 <p class=""> </p>
	    </div>
	    <div role="tabpanel" class="tab-pane" id="comment">
	    	<h4>Review for <?php echo $title;?></h4>
            <?php
             foreach (array_slice($query1, 0, 3) as $row) {?>
            <div class="">
              <div class="">
                <p>Posted by <b style="text-transform: capitalize;"><?php echo $row->uname; ?></b></p>
                <p>&#34;<?php echo $row->review; ?>&#34;</p>
              </div>
            </div>
            <?php  }?>
			<a type="button" class="" data-toggle="modal" data-target="#myModal" style="font-size: 16px;text-decoration: underline;">
			 Read more
			</a>
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Comment</h4>
			      </div>
			      <div class="modal-body">
			        
						   		<?php
				             		foreach ($query1 as $row) {?>
				            		<div class="">
				              		<div class="">
				                		<p>Posted by <b style="text-transform: capitalize;"><?php echo $row->uname; ?></b></p>
				                		<p>&#34;<?php echo $row->review; ?>&#34;</p>
				              		</div>
				            		</div>
				           		 <?php  }?>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn theme-btn" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>
	    	<?php if(!empty($this->session->userdata('uid'))){
                 $attributes = array("name" => "review");
                echo form_open("profile/review", $attributes);?>
	    	<div class="col-md-8">
	    		  <div class="form-group hide">
                    <input type="text" class="form-control" name="productid" value="<?php echo $id;?>">
                  </div>
                  <div class="form-group hide">
                    <input type="text" class="form-control" name="uname" value="<?php echo $this->session->userdata('fname'); ?> <?php echo $this->session->userdata('lname'); ?>">
                  </div>
	    		<div class="col-xs-12 col-md-10">
				    <input type="text" name="review" class="theme-form" id="exampleInputEmail1" placeholder="Comment">
				</div>
				<button type="submit" class="theme-btn btn col-xs-12 col-md-2" >Submit</button>
				<?php echo form_close(); }else{ ?>
				<h5>Login to Review</h5>
                <button href="#"  data-toggle="modal" data-target="#login" class="theme-btn-lg col-md-2 col-xs-12" >Login</button><?php }?>
			</div>
	    </div>
	  </div>
</div>