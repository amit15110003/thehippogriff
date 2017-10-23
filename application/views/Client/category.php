<div class="spacer"></div>
<div id="startchange"></div>
<div class="container-fluid category-header">
	<h1 class="text-center"><?php echo $categoryval;?></h1>
</div>
<div class="container category-subheader">
	<p>Our laptop sleeves are a visual treat and comfortable in the hands of the everyday commuter. They showcase trendy artwork that are printed on both sides of the sleeve and a cushioned exterior that is water-proof and fall-proof, Buy laptop sleeves online in Delhi. Get your device the skin it deserves!</p>
</div>
<hr>
<div class="container">
	<div class="col-md-3 col-xs-8">
		<input type="hidden" id="keywords" value="<?php echo $categoryval; ?>" onkeyup="searchFilter()"/>
		<select class="theme-select" data-placeholder="Select an option" id="sortBy" onchange="searchFilter()">
            <option value="">Default sorting</option>
            <option value="popular">Sort by popularity</option>
            <option value="new">Sort by newness</option>
            <option value="low">Sort by price: low to high</option>
            <option value="high">Sort by price: high to low</option>
        </select>
	</div>
	<div class="col-md-8"></div>
	<div class="col-md-1 col-xs-4">
	</div>
</div>
<div class="container-fluid">
	<div class="col-md-12">
		<div class="post-list" id="postList">
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
				<a class="button1 theme-btn-circle" href="<?php echo base_url("index.php/product/details/$row->category/$row->title"); ?>"><i class="glyphicon glyphicon-shopping-cart"></i></a>
				<button type="button" class="button2 theme-btn-circle"><i class="glyphicon glyphicon-heart"></i></button>
			</div>
			<?php }?>
		</div>
	</div>
</div>