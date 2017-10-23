	<!--footer-->
	<footer>
		<div class="row">
			<hr>
			
			<div class="container">
				<div class="col-md-4">
					
				</div>
				<div class="col-md-4">
					
				</div>
				<div class="col-md-4 text-center">
					<div class="">
					<h3 class="theme-color text-center">Follow us</h3>
						<div class="follow-icon text-center">
					          <a href="" class="follow-icon-img"><img class="img-responsive  center-block" src="<?php echo base_url();?>/media/image/FB-01"></a>
					    </div>
						<div class=" follow-icon text-center">
					         <a href="" class="follow-icon-img"> <img class="img-responsive  center-block" src="<?php echo base_url();?>/media/image/Insta-01" ></a>
					    </div>
						<div class="follow-icon text-center" >
					          <a href="" class="follow-icon-img"><img class="img-responsive  center-block" src="<?php echo base_url();?>/media/image/Mail-01" ></a>
					    </div>
						<div class="follow-icon text-center" >
					          <a href="" class="follow-icon-img"><img class="img-responsive  center-block" src="<?php echo base_url();?>/media/image/twitter" ></a>
					    </div>
						<div class="follow-icon text-center" >
					          <a href="" class="follow-icon-img"><img class="img-responsive  center-block" src="<?php echo base_url();?>/media/image/Youtube-01" ></a>
					    </div>
					</div>
					<br>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="container-fluid">
			<hr>
				<div class="col-md-8">
					<ul class="footer-inline">
				        <li><a href="">Copyright © 2017 </a></li>
				        <li><a href="<?php echo base_url("index.php/home/about"); ?>">About us</a></li>
				        <li><a href="#"> Blog </a></li>
				        <li><a href="<?php echo base_url("index.php/home/faqs"); ?>">FAQs</a></li>
				        <li><a href="<?php echo base_url("index.php/home/contact"); ?>"> Contact us </a></li>
				        <li><a href="<?php echo base_url("index.php/home/terms_and_condition"); ?>">Terms & Conditions</a></li>
				        <li><a href="<?php echo base_url("index.php/home/privacy_policy"); ?>">Privacy Policy</a></li>
				     </ul>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</footer>
	<!--footerend-->

	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>media/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>media/js/bootstrap-dropdownhover.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){       
		   var scroll_start = 0;
		   var startchange = $('#startchange');
		   var offset = startchange.offset();
		    if (startchange.length){
		   $(document).scroll(function() { 
		      scroll_start = $(this).scrollTop();
		      if(scroll_start > offset.top) {
		          $('.navbar-default').css({"background-color":"#fff","color":"#000 !important"});
		       } else {
		          $('.navbar-default').css('background-color', 'transparent');
		       }
		   });
		    }
		});
    </script>
    <script>
	   $("#zoom_01").elevateZoom(); 
	</script>
	<script type="text/javascript">
		var $item = $('.carousel .item'); 
		var $wHeight = $(window).height();
		$item.eq(0).addClass('active');
		$item.height($wHeight); 
		$item.addClass('full-screen');

		$('.carousel img').each(function() {
		  var $src = $(this).attr('src');
		  var $color = $(this).attr('data-color');
		  $(this).parent().css({
		    'background-image' : 'url(' + $src + ')',
		    'background-color' : $color
		  });
		  $(this).remove();
		});

		$(window).on('resize', function (){
		  $wHeight = $(window).height();
		  $item.height($wHeight);
		});

		$('.carousel').carousel({
		  interval: 6000,
		  pause: "false"
		});
	</script>
	<script>
         function searchFilter() {
             var keywords = $('#keywords').val();
             var sortBy = $('#sortBy').val();
             $.ajax({
                 type: 'POST',
                 url: '<?php echo base_url(); ?>index.php/product/viewsort/'+keywords,
                 data:'&keywords='+keywords+'&sortBy='+sortBy,
                 beforeSend: function () {
                     $('.loading').show();
                 },
                 success: function (html) {
                     $('#postList').html(html);
                     $('.loading').fadeOut("slow");
                 }
             });
         }
      </script>
      <script type="text/javascript">
	    $("#gocartbtn").hide();
	  </script>
      <script type="text/javascript">
      function cartadd(id)
      { 
        var x = document.getElementById("cartcounter").innerHTML;
        $.ajax({  
                     type: "POST",
                      url: "<?php echo site_url('cart/cartadd');?>",
                      data:"id="+id,
                      success: function (response) {
                        document.getElementById("cartcounter").innerHTML = ++x;
                        document.getElementById("cartcounter1").innerHTML = x;
                    $("#addcartbtn").hide();
                    $("#gocartbtn").show();
                    }
                  });
      }
      </script>
      <script type="text/javascript">
      function cartadd1(id)
      { 
        var x = document.getElementById("cartcounter").innerHTML;
        $.ajax({  
                     type: "POST",
                      url: "<?php echo site_url('cart/cartadd1');?>",
                      data:"id="+id,
                      success: function (response) {
                        document.getElementById("cartcounter").innerHTML = ++x;
                        document.getElementById("cartcounter1").innerHTML = x;
                    $("#addcartbtn").hide();
                    $("#gocartbtn").show();
                    }
                  });
      }
      </script>
      <script type="text/javascript">
      function wishlist(id)
      {
            var x=document.getElementById("wishtext").innerHTML;
              $.ajax({
                      type: "POST",
                      url: "<?php echo site_url('cart/wishlist');?>",
                      data:"id="+id,
                    success: function (response) {
                      $("#wish").toggleClass("wishremove");
                      if(x=='Add to Wishlist'){
                      document.getElementById("wishtext").innerHTML ='Added to Wishlist';}
                      else{
                        document.getElementById("wishtext").innerHTML ='Add to Wishlist';
                      }
                    }
                  });
      }
      </script>
      <script type="text/javascript">
      function wishlist1(id)
      {var x=document.getElementById("wishtext").innerHTML;
            $.ajax({
                      type: "POST",
                      url: "<?php echo site_url('cart/wishlist');?>",
                      data:"id="+id,
                    success: function (response) {
                      $("#wish").toggleClass("wishadd");
                      if(x=='Add to Wishlist'){
                      document.getElementById("wishtext").innerHTML ='Added to Wishlist';}
                      else{
                        document.getElementById("wishtext").innerHTML ='Add to Wishlist';
                      }
                    }
                  });
      }
      </script>
      <script type="text/javascript">
    function remove_cart(postid)
    {
      var x = document.getElementById("cartcounter").innerHTML;
      var l=document.getElementById("cost_"+postid).innerHTML;
      var t=document.getElementById("totalcost").innerHTML;
      var s=t-l;
            $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('cart/remove_cart');?>",
                    data:"postid="+postid,
                    success: function (response) {
                        document.getElementById("cartcounter").innerHTML = --x;
                        document.getElementById("totalcost").innerHTML=s;
                     $("#cart_"+postid).hide();
                    }
                });
    }
  </script>
  <script type="text/javascript">
    function item(id)
    {
           var i=document.getElementById("itemno_"+id).value;
           var c=document.getElementById("itemcost_"+id).innerHTML;
           var t=document.getElementById("totalcost").innerHTML;
           var l=document.getElementById("cost_"+id).innerHTML;
           var r= i*c;
           var s=t-l;
           var k=s+r;
           var item = $("#itemno_"+id).val();
            $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('cart/itemadd');?>",
                    data: {id: id, item: item},
                    success: function (response) {
                    document.getElementById("cost_"+id).innerHTML=r;
                    document.getElementById("totalcost").innerHTML=k;
                    document.getElementById("totalcost1").innerHTML=k;
                    }
                });
    }
  </script>
  </body>
</html>