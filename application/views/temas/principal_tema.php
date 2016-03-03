<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->   
    <head>
        <meta charset="utf-8"/>
        <title>Dmx</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url();?>assets/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();?>assets/css/layout_principal.css" rel="stylesheet" type="text/css"/>
        <link id="style_color" href="<?php echo base_url();?>assets/css/light.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();?>assets/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="favicon.ico"/>

        <script src="<?php echo base_url();?>assets/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url();?>assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url();?>assets/scripts/metronic.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/scripts/layout_principal.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/scripts/jquery.dataTables.js" type="text/javascript"></script>        
        <script src="<?php echo base_url();?>assets/scripts/dataTables.bootstrap.js" type="text/javascript"></script>
    </head>
  
<body class="page-header-fixed page-sidebar-closed-hide-logo">
<!-- barra superior -->
<div class="page-header navbar navbar-fixed-top"> 
  <div class="page-header-inner">   
    <div class="page-logo">
      <a href="index.html">
      <!-- <img src="../../assets/admin/layout4/img/logo-light.png" alt="logo" class="logo-default"/> -->
      <img src="" alt="logo" class="logo-default"/>
      </a>
      <div class="menu-toggler sidebar-toggler">        
      </div>
    </div>  
    <!-- menu responsive -->
    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
    </a>    
    <div class="page-top">      
      <form class="search-form" action="extra_search.html" method="GET">
        <div class="input-group">
          <input type="text" class="form-control input-sm" placeholder="Search..." name="query">
          <span class="input-group-btn">
          <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
          </span>
        </div>
      </form>
      
      <div class="top-menu">
        <ul class="nav navbar-nav pull-right">
          <li class="separator hide">
          </li>                  
          <li class="separator hide">
          </li>        
          <li class="separator hide">
          </li>
          <li class="dropdown dropdown-user dropdown-dark">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <span class="username username-hide-on-mobile">
            <?php echo $this->session->userdata('email');  ?> </span>            
            
            <img alt="" class="img-circle" src="<?php  echo (isset($user_profile['id']) and $user_profile['id'] !="") ? "https://graph.facebook.com/".$user_profile['id']."/picture?type=large" : "../../assets/img/avatar.png" ; ?>"/>
            </a>
            <ul class="dropdown-menu dropdown-menu-default">
              <li>
                <a href="<?php echo site_url("user_settings") ?>">
                <i class="icon-user"></i> My Profile </a>
              </li>             
              <li class="divider">
              </li>           
              <li>
                <a href="<?php echo site_url('login/logout');?>">
                <i class="icon-key"></i> Log Out </a>
              </li>
            </ul>
          </li>         
        </ul>
      </div>      
    </div>    
  </div>
</div>
<!-- fin barra superior -->
<div class="clearfix">
</div>


<div class="page-container">
  <!-- Menu  -->
  <div class="page-sidebar-wrapper">    
    <div class="page-sidebar navbar-collapse collapse">     
      <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
        <li class="start ">
          <a href="<?php echo base_url() ?>">
          <i class="icon-home"></i>
          <span class="title">Dashboard</span>
          </a>
        </li>
        
        <li class="active open">
          <a href="javascript:;">
          <i class="icon-rocket"></i>
          <span class="title">Admin</span>
          <span class="arrow open"></span>
          </a>
          <ul class="sub-menu">           
            <li class="active">
              <a href="<?php echo site_url("usuarios/index2"); ?>">
              Admin</a>
            </li>           
          </ul>
        </li>       
        
        <li>
          <a href="javascript:;">
          <i class="icon-user"></i>
          <span class="title">Usuarios</span>
          <span class="arrow "></span>
          </a>
          <ul class="sub-menu">
            <li>
              <a href="<?php echo site_url("usuarios/index") ?>">
              Usuarios</a>
            </li>           
          </ul>
        </li>
    
      </ul>     
    </div>
  </div>
  <!-- fin menu -->
  
  
  <div class="page-content-wrapper">
    <div class="page-content">

    <?php echo $content ?>
      
    </div>
  </div>


  
</div>

<!-- footer -->
<div class="page-footer">
  <div class="page-footer-inner">
    Rendered in <strong>{elapsed_time}
     <?php  echo date("Y"); ?> &copy; 
  </div>
  <div class="scroll-to-top">
    <i class="icon-arrow-up"></i>
  </div>
</div>

<!-- fin footer -->

<!--[if lt IE 9]>
<script src="../../assets/plugins/respond.min.js"></script>
<script src="../../assets/plugins/excanvas.min.js"></script> 
<![endif]-->

<script>
      jQuery(document).ready(function() {    
         Metronic.init(); 
        Layout.init(); 
      });
   </script>

</body>

</html>