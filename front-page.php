<?php /* Template Name: Landing Page */ get_header(); ?>
<main id="page-wrap" class="home-content">
	<div class="home-bg">
		<div class="wrapper container">
			<div class="holz"><p>Holz<span>&</span>Haus</p></div>
		</div>
		<section class="wrapper container" id="cards-view">
			<figure class="col-xs-12 col-sm-6 col-md-3">
				<div class="card">
					<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'box1' ) )  ?>
				</div>
			</figure>
			<figure class="col-xs-12 col-sm-6 col-md-3">
				<div class="card">
					<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'box2' ) )  ?>
				</div>
			</figure>
			<figure class="col-xs-12 col-sm-6 col-md-3">
				<div class="card">
					<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'box3' ) )  ?>
				</div>
			</figure>
			<figure class="col-xs-12 col-sm-6 col-md-3">
				<div class="card">
					<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'box4' ) )  ?>
				</div>
			</figure>
		</section>
	</div>
	<section class="wrapper container">
		<div class="row">
			<article class="col-md-12">
				<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</article>
		</div>
	</section>
</main>
<?php get_footer(); ?>