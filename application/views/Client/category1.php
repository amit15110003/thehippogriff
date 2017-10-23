<div class="container-fluid">
  <?php foreach ($query as $row) {?>
         <div class="col-md-3 col-xs-6 product">
            <div class="">
               <div class="" >
                  <a href="<?php echo base_url("index.php/product/details/$row->category/$row->title"); ?>"><img src="http://thehippogriff.com/wp-content/uploads/2016/11/abstractColours-2-424x600.jpg" class="img-responsive">
                  </a>
               </div>
               <div class="text-center">
                  <h5><?php echo $row->title; ?></h5>
                  <h5>₹<?php echo $row->cost;?></h5>
               </div>
            </div>
            <div class="overlay">
            <button type="button" class="button1 theme-btn-circle"><i class="glyphicon glyphicon-shopping-cart"></i></button>
            <button type="button" class="button2 theme-btn-circle"><i class="glyphicon glyphicon-heart"></i></button>
            </div>
         </div>
         <?php }?>
</div>