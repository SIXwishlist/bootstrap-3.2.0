<?php
/*
Template Name: Left Side Menu
*/

get_header();
?>
  
	

    <div class="container theme-showcase" role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a href="#" class="btn btn-primary btn-lg" role="button">Learn more &raquo;</a></p>
      </div>

	<div class="row" id="main-container">
		<section class="col-md-8 pull-right" id="main-content">
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
