<div class="spacer"></div>
<div id="startchange"></div>
<div class="page-header ">
		<h1>My Cart</h1>	
</div>
<div class="container">
    <div class="row">
        <div class="col-md-offset-1 col-xs-12 col-md-10">
            <?php 
                if ($cart = $this->cart->contents()){
                    foreach ($cart as $item ) {
              $details=$this->user->get_product_by_id($item['id']);
             ?>
            <div class="col-xs-12 col-md-12  cart-layout cart_item" id="cart_<?php echo $item['id'];?>">
                <div class="col-md-1 col-xs-6 cart-line text-center">
                    <h5><a href="" onclick="javascript:remove_cart(<?php echo $item['id'];?>);">x</a></h5>
                </div>
                <div class="col-md-2 col-xs-12">
                    <img src="http://thehippogriff.com/wp-content/uploads/2016/11/abstractColours-2-424x600.jpg" class="img-responsive center-block" style="height: 120px;">
                </div>
                <div class="col-md-2 col-xs-12 cart-line">
                    <h5><a href="" style="color: #000;"><?php  echo $details[0]->title;?> </a></h5>
                </div>
                <div class="col-md-3 col-xs-12 cart-line">
                    <div class="text-center quantity">
                        <button class="decrease">
                                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                        </button>
                        <input  step="1" min="1" max="" name="quantity" value="<?php echo $item['qty'];?>" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric" id="itemno_<?php echo $item['id'];?>" onchange="javascript:item(<?php echo $item['id'];?>);" >
                        <button class="increase">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
                <div class="col-md-2 col-xs-6 cart-line text-center">
                    <h5>&#8377;  <span id="itemcost_<?php echo $item['id'];?>"><?php echo  $details[0]->cost;?></span></h5>
                </div>
                <div class="col-md-2 col-xs-6 cart-line text-center">
                    <h5>&#8377; <span id="cost_<?php echo $item['id'];?>"><?php echo  $details[0]->cost*$item['qty'];?></span></h5>
                </div>
            </div><?php }}?>
              <?php  $cart_check = $this->cart->contents();
            
            // If cart is empty, this will show below message.
             if(empty($cart_check)) {
             echo 'To add products to your shopping cart click on "Add to Cart" Button'; 
             }  ?> </div>
            
                <table id="table" border="0" cellpadding="5px" cellspacing="1px">
                  <?php
                  // All values of cart store in "$cart". 
                  if ($cart = $this->cart->contents()): ?>
                    <?php
                     // Create form and send all values in "shopping/update_cart" function.
                    echo form_open('shopping/update_cart');
                    $grand_total = 0;
                    $i = 1;

                    foreach ($cart as $item):
                        //   echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                        //  Will produce the following output.
                        // <input type="hidden" name="cart[1][id]" value="1" />
                        
                        echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                        echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                        echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                        echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                        echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                        ?>
                        <tr>
                           
                     <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td><b>Order Total: $<?php 
                        
                        //Grand Total.
                        echo number_format($grand_total, 2); ?></b></td>
                        
                        <?php // "clear cart" button call javascript confirmation message ?>
                        <td colspan="5" align="right"><input type="button" class ='fg-button teal' value="Clear Cart" onclick="clear_cart()">
                            
                            <?php //submit button. ?>
                            <input type="submit" class ='fg-button teal' value="Update Cart">
                            <?php echo form_close(); ?>
                            
                            <!-- "Place order button" on click send "billing" controller  -->
                            <input type="button" class ='fg-button teal' value="Place Order" onclick="window.location = 'shopping/billing_view'"></td>
                    </tr>
            <?php endif; ?>
            </table>
            <?php foreach ($query as $row ) {
              $details=$this->user->get_product_by_id($row->productid);
             ?>
            <div class="col-xs-12 col-md-12  cart-layout cart_item" id="cart_<?php echo $row->id;?>">
                <div class="col-md-1 col-xs-6 cart-line text-center">
                    <h5><a href="" onclick="javascript:remove_cart(<?php echo $row->id;?>);">x</a></h5>
                </div>
                <div class="col-md-2 col-xs-12">
                    <img src="http://thehippogriff.com/wp-content/uploads/2016/11/abstractColours-2-424x600.jpg" class="img-responsive center-block" style="height: 120px;">
                </div>
                <div class="col-md-2 col-xs-12 cart-line">
                    <h5><a href="" style="color: #000;"><?php  echo $details[0]->title;?> </a></h5>
                </div>
                <div class="col-md-3 col-xs-12 cart-line">
                    <div class="text-center quantity">
                        <button class="decrease">
                                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                        </button>
                        <input  step="1" min="1" max="" name="quantity" value="<?php echo $row->item;?>" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric" id="itemno_<?php echo $row->id;?>" onchange="javascript:item(<?php echo $row->id;?>);" >
                        <button class="increase">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
                <div class="col-md-2 col-xs-6 cart-line text-center">
                    <h5>&#8377;  <span id="itemcost_<?php echo $row->id;?>"><?php echo  $details[0]->cost;?></span></h5>
                </div>
                <div class="col-md-2 col-xs-6 cart-line text-center">
                    <h5>&#8377; <span id="cost_<?php echo $row->id;?>"><?php echo  $details[0]->cost*$row->item;?></span></h5>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
        <hr>
        <div class="col-md-offset-8 col-md-4" style="padding-top: 4%;">
            <table class="table table-hover ">
                <tbody>
                    <tr>
                        
                        
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>&#8377;
                  <span id="totalcost" >
                    <?php $i=0;
                    if(!empty($this->cart->contents()))
                    { foreach ($cart as $item )
                        {
                            $details=$this->user->get_product_by_id($item['id']);
                            $i=$i+($details[0]->cost*$item['qty']);
                        }
                    }
                    elseif(!empty($this->session->userdata('uid'))){
                   foreach ($query as $row ) {
                  $details=$this->user->get_product_by_id($row->productid);
                   $i=$i+($details[0]->cost*$row->item);}}
                   echo $i;?></span></strong></h5></td>
                    </tr>
                    <tr>
                        
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>0</strong></h5></td>
                    </tr>
                    <tr>
                        
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>&#8377;
                  <span id="totalcost1" ><?php $i=0;
                  if(!empty($this->cart->contents()))
                    { foreach ($cart as $item )
                        {
                            $details=$this->user->get_product_by_id($item['id']);
                            $i=$i+($details[0]->cost*$item['qty']);
                        }
                    }
                    elseif(!empty($this->session->userdata('uid'))){
                   foreach ($query as $row ) {
                  $details=$this->user->get_product_by_id($row->productid);
                   $i=$i+($details[0]->cost*$row->item);}}
                   echo $i;?></span></strong></h3></td>
                    </tr>
                </tbody>
            </table>
            <button class="theme-btn-lg col-xs-12 col-md-12" > PROCEED TO CHECKOUT</button>
        </div>
        </div>
    </div>
</div>
