<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo get_template_directory_uri() . "/favicon.ico" ?>" />

   <title><?php wp_title( '|', true, 'right' ); ?></title>
    <!-- Bootstrap core CSS -->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

   
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php wp_head();?>
  </head>
  <!-- Fixed navbar -->
  <body role="document" <?php body_class(); ?>>
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php bloginfo('site_title');?></a>
        </div><!-- /.navbar-header -->
       <?php  
		wp_nav_menu( array(
						
						'container_class'	=>	'navbar-collapse collapse',
						'theme_location'	=>	'primary',
						'menu_class'		=>	'nav navbar-nav',
						'depth'				=>	3,
						'fallback_cb'		=>	false,
						'walker'			=>	new The_Bootstrap_Nav_Walker,
					) ); ?>
		
      </div><!-- /.container -->
    </div><!-- /.navbar navbar-inverse navbar-faxed-top -->