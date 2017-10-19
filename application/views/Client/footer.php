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
             var price1 = document.getElementById("range-2").innerHTML;
             var price2 = document.getElementById("range-3").innerHTML;
             $.ajax({
                 type: 'POST',
                 url: '<?php echo base_url(); ?>index.php/product/viewsort/'+keywords,
                 data:'&keywords='+keywords+'&sortBy='+sortBy+'&price1='+price1+'&price2='+price2,
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
  </body>
</html>