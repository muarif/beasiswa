<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Dashboard - Bootstrap Admin Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="<?php echo config_item('assets'); ?>css/normalize.css" rel="stylesheet">
<link href="<?php echo config_item('assets'); ?>css/font.css" rel="stylesheet">
<link href="<?php echo config_item('assets'); ?>js/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo config_item('assets'); ?>css/font-awesome.css" rel="stylesheet">
<link href="<?php echo config_item('assets'); ?>css/style.css" rel="stylesheet">
<link href="<?php echo config_item('assets'); ?>css/pages/dashboard.css" rel="stylesheet">
<link href="<?php echo config_item('assets'); ?>js/ladda/dist/ladda-themeless.css" rel="stylesheet">
<link href="<?php echo config_item('assets'); ?>js/ladda/css/prism.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="navbar navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="navbar-brand" href="<?php echo site_url();?>">
                <img alt="YBMBRI" src="<?php echo base_url('assets/img/logo-ybmbri-small.png');?>">
            </a>
            
        </div>
          	<div class="collapse navbar-collapse">
            <?php
		          if($this->session->userdata('logged_in'))
   		         {
		        ?>
        	      <ul class="nav pull-right">
          		      <li class="dropdown">
                  			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
        	          			<iclass="icon-user"></i> 
        	          			<?php echo $this->session->userdata('username');?> 
        	          			<b class="caret"></b>
        	          		</a>
                        <ul class="dropdown-menu">
	                          <li><a href="<?php echo site_url('auth/logout'); ?>">Logout</a></li>
	                      </ul>
          		      </li>
        	      </ul>
            <?php } ?>
      	    </div>
            <!--/.nav-collapse --> 
    </div>
    <!-- /container-fluid --> 
</div>
<!-- /navbar -->

<?php
	if($this->session->userdata('logged_in'))
    {
?>
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li <?php echo ($this->uri->segment(1) == 'dashboard') ? 'class="active"' : '';?>><a href="<?php echo site_url();?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
        <li <?php echo ($this->uri->segment(1) == 'user') ? 'class="active"' : '';?>><a href="<?php echo site_url('user');?>"><i class="icon-user"></i><span>Users</span> </a> </li>
        <li><a href="guidely.html"><i class="icon-facetime-video"></i><span>App Tour</span> </a></li>
        <li><a href="charts.html"><i class="icon-bar-chart"></i><span>Charts</span> </a> </li>
        <li><a href="shortcodes.html"><i class="icon-code"></i><span>Shortcodes</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Drops</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="icons.html">Icons</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="pricing.html">Pricing Plans</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="signup.html">Signup</a></li>
            <li><a href="error.html">404</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->
<?php } ?>

<!-- For CUSTOM CONTENT ONLY -->

<?php 
	if(isset($content))
	{
		echo $content;
	}
?>

<!-- /FOR CONTENT ONLY -->


<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="<?php echo config_item('assets'); ?>js/jquery.js"></script> 
<script src="<?php echo config_item('assets'); ?>js/excanvas.min.js"></script> 
<script src="<?php echo config_item('assets'); ?>js/chart.min.js" type="text/javascript"></script> 
<script src="<?php echo config_item('assets'); ?>js/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo config_item('assets'); ?>js/ladda/dist/spin.js"></script>
<script src="<?php echo config_item('assets'); ?>js/ladda/dist/ladda.min.js"></script>

<script src="<?php echo config_item('assets'); ?>js/ladda/js/prism.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo config_item('assets'); ?>js/full-calendar/fullcalendar.min.js"></script>
<?php 
    if(isset($script))
    {
        echo $script;
    }
?>
<script src="<?php echo config_item('assets'); ?>js/base.js"></script> 
</body>
</html>
