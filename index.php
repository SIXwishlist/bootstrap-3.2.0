<?php
get_header();
?>
  
	

    <div class="container theme-showcase" role="main">

     
	<div class="row" id="main-container">
		<section class="col-md-8" id="main-content">
			<?php
				if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				get_template_part( '/partials/content', get_post_format() );
			}
			//the_bootstrap_content_nav( 'nav-below' );
			}
			else {
			get_template_part( '/partials/content', 'not-found' );
		}
		?>

		</section>
		<?php get_sidebar();?>
	</div><!-- /. row #main-container -->
	<?php get_footer();?>
	</div> <!-- / .container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  </body>
</html>
