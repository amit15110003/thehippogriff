<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>THE HIPPOGRIFF</title>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url();?>media/js/jquery.elevatezoom.js"></script>
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>media/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>media/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>media/css/bootstrap-dropdownhover.css" rel="stylesheet">
    <link href="<?php echo base_url();?>media/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>media/css/style1.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>media/css/prism.css">
  <script src="<?php echo base_url();?>media/js/jquery.toc.js"></script>
  <script src="<?php echo base_url();?>media/js/prism.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>media/css/asRange.css">
  <script src="<?php echo base_url();?>media/js/jquery-asRange.js"></script>
<link rel="icon" href="images/favicon.html" type="image/x-icon">
<style type="text/css">
  .wishadd{
    background-color: #000;
    border-color: #000;
  }
  .wishremove{
    color: #888 !important;
  }
</style>
  </head>
  <body>
  <!--header-->
  <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" style="padding-left: 10px;">
      <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" >
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href=""  class="navbar-toggle navbar-mobile pull-right">
        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
      </a>
      <a href="" class="navbar-toggle navbar-mobile pull-right">
        <?php echo $result = substr($this->session->userdata('fname'), 0, 5); ?> <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
      </a>
      <a href="<?php echo base_url("index.php/cart"); ?>" class="navbar-toggle navbar-mobile pull-right">
        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span><span class="badge" id="cartcounter">
          <?php 
            if(!empty($this->session->userdata('uid')))
            {
                $detail1=$this->user->countproduct($this->session->userdata('uid'));
                    if(!empty($detail1))
                      { 
                        echo $detail1; 
                      }
                  else{
                    echo"0";
                    }
            }
            elseif(!empty($this->cart->contents()))
            {
              $i=0;
              $cart = $this->cart->contents();
              foreach($cart as $items)
              {
                $i++;
              }
               echo $i;
            }
            else{echo"0";} ?>
        </span>
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       <li class="dropdown">
          <a class=" dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
           SHOP BY CATEGORY
          </a>
          <ul class="dropdown-menu">
            <?php 
                $details=$this->user->showcategory();
                foreach ($details as $row ) {?>
            <li>
                <a href="<?php echo base_url("index.php/product/category/$row->category"); ?>"><?php echo $row->category;?></a>
            </li>
            <?php }?>
          </ul>
        </li>
       <li class="dropdown">
          <a class="dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
           SHOP BY ARTIST
          </a>
          <ul class="dropdown-menu">
            <li class="hz">
                <a href="#">Item A1 left</a>
                <a href="#">Item A1 right</a>
                <a href="#">Item A1 right</a>
                <a href="#">Item A1 right</a>
                <a href="#">Item A1 right</a>
                <a href="#">Item A1 right</a>
              </li>
              <li class="hz">
                <a href="#">Item A2 left</a>
                <a href="#">Item A2 right</a>
              </li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a></li>
        <?php if ($this->session->userdata('fname')){ ?>
        <li class="dropdown">
          <a class=" dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
           <?php echo $result = substr($this->session->userdata('fname'), 0, 5); ?> <span class="glyphicon glyphicon-user" aria-hidden="true">  </span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url("index.php/profile"); ?>">Profile</a></li>
            <li><a href="#" class="list-group-item"> Orders</a></li>
            <li><a href="#" class="list-group-item"> Wishlist</a></li>
            <li><a href="<?php echo base_url("index.php/profile/address"); ?>" class="list-group-item">Addresses</a></li>
            <li><a href="<?php echo base_url("index.php/profile/account_details"); ?>" class="list-group-item">Account details</a></li>
            <li><a href="<?php echo base_url("index.php/home/logout"); ?>" class="list-group-item">Logout</a></li>
          </ul>
        </li>
        <?php } else{?>
        <li><a href="<?php echo base_url("index.php/login"); ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"> </span></a></li>
        <?php }?>
        <li>
          <a href="<?php echo base_url("index.php/cart"); ?>">
              <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
              <span class="badge" id="cartcounter1">
              <?php 
            if(!empty($this->session->userdata('uid')))
            {
                $detail1=$this->user->countproduct($this->session->userdata('uid'));
                    if(!empty($detail1))
                      { 
                        echo $detail1; 
                      }
                  else{
                    echo"0";
                    }
            }
            elseif(!empty($this->cart->contents()))
            {
              $i=0;
              $cart = $this->cart->contents();
              foreach($cart as $items)
              {
                $i++;
              }
               echo $i;
            }
            else{echo"0";} ?>
              </span>
            </a>
          </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

  <!--endheader-->

    