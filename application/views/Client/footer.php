	<!--footer-->
	<footer>
		<div class="row">
			<div class="container">
			<hr>
				<div class="col-md-offset-3 col-md-6 text-center">
					
				</div>
			</div>
		</div>
		<div class="row">
			<div class="container-fluid">
			<hr>
				<div class="col-md-8">
					<ul class="footer-inline">
				        <li><a href="#">Copyright © 2017 </a></li>
				        <li><a href="#">About us</a></li>
				        <li><a href="#"> Blog </a></li>
				        <li><a href="#">FAQs</a></li>
				        <li><a href="#"> Contact us </a></li>
				        <li><a href="#">Terms & Conditions</a></li>
				        <li><a href="#">Privacy Policy</a></li>
				     </ul>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</footer>
	<!--footerend-->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>media/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){       
		   var scroll_start = 0;
		   var startchange = $('#carousel-example-generic');
		   var offset = startchange.offset();
		    if (startchange.length){
		   $(document).scroll(function() { 
		      scroll_start = $(this).scrollTop();
		      if(scroll_start > offset.top) {
		          $(".navbar-default").css('background-color', '#fff');
		       } else {
		          $('.navbar-default').css('background-color', 'transparent');
		       }
		   });
		    }
		});
    </script>
  </body>
</html>