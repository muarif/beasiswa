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
<link href="<?php echo config_item('assets'); ?>js/datepicker/css/datepicker.css" rel="stylesheet">
<link href="<?php echo config_item('assets'); ?>css/font-awesome.css" rel="stylesheet">
<link href="<?php echo config_item('assets'); ?>css/style.css" rel="stylesheet">
<link href="<?php echo config_item('assets'); ?>css/print.css" rel="stylesheet">
<link href="<?php echo config_item('assets'); ?>css/awesome-bootstrap-checkbox.css" rel="stylesheet">
<link href="<?php echo config_item('assets'); ?>css/pages/dashboard.css" rel="stylesheet">
<link href="<?php echo config_item('assets'); ?>js/switch/dist/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet">
<link href="<?php echo config_item('assets'); ?>js/rwd/dist/css/rwd-table.css" rel="stylesheet">
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
        <?php if($this->session->userdata('id_level')==1){ ?><li <?php echo ($this->uri->segment(1) == 'user') ? 'class="active"' : '';?>><a href="<?php echo site_url('user');?>"><i class="icon-user"></i><span>Users</span> </a> </li><?php } ?>
        <li <?php echo ($this->uri->segment(1) == 'kandidat') ? 'class="active"' : '';?>><a href="<?php echo site_url('kandidat');?>"><i class="icon-group"></i><span>Kandidat</span> </a> </li>
        <?php if($this->session->userdata('id_level')!=3){ ?><li <?php echo ($this->uri->segment(1) == 'beasiswa') ? 'class="active"' : '';?>><a href="<?php echo site_url('beasiswa');?>"><i class="glyphicon glyphicon-usd"></i><span>Beasiswa</span> </a></li><?php } ?>
        <?php if($this->session->userdata('id_level')==1){ ?><li <?php echo ($this->uri->segment(1) == 'kanwil') ? 'class="active"' : '';?>><a href="<?php echo site_url('kanwil');?>"><i class="glyphicon glyphicon-map-marker"></i><span>Kanwil</span> </a> </li><?php } ?>
        <?php if($this->session->userdata('id_level')==1){ ?><li <?php echo ($this->uri->segment(1) == 'provinsi') ? 'class="active"' : '';?>><a href="<?php echo site_url('provinsi');?>"><i class="glyphicon glyphicon-globe"></i><span>Provinsi</span> </a> </li><?php } ?>
        <?php if($this->session->userdata('id_level')==1){ ?><li <?php echo ($this->uri->segment(1) == 'tingkatan') ? 'class="active"' : '';?>><a href="<?php echo site_url('tingkatan');?>"><i class="glyphicon glyphicon-education"></i><span>Tingkatan</span> </a> </li><?php } ?>
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
<script src="<?php echo config_item('assets'); ?>js/datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo config_item('assets'); ?>js/ladda/dist/spin.js"></script>
<script src="<?php echo config_item('assets'); ?>js/ladda/dist/ladda.min.js"></script>
<script src="<?php echo config_item('assets'); ?>js/rwd/dist/js/rwd-table.min.js"></script>

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
