<?php /* Template Name: Landing Page */ get_header(); ?>
<main id="page-wrap" class="home-content">
	<div class="home-bg">
		<div class="wrapper container">
			<div class="holz"><p>Holz<span>&</span>Haus</p></div>
		</div>
		<section class="wrapper container" id="cards-view">
			<div id="carousel-1" class="carousel slide" data-ride="carousel-1">
				<div class="slide-container" role="listbox">
					<figure class="col-xs-12 col-sm-6 col-md-3 item active">
						<div class="card">
							<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'box1' ) )  ?>
						</div>
					</figure>
					<figure class="col-xs-12 col-sm-6 col-md-3 item">
						<div class="card">
							<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'box2' ) )  ?>
						</div>
					</figure>
					<figure class="col-xs-12 col-sm-6 col-md-3 item">
						<div class="card">
							<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'box3' ) )  ?>
						</div>
					</figure>
					<figure class="col-xs-12 col-sm-6 col-md-3 item">
						<div class="card">
							<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'box4' ) )  ?>
						</div>
					</figure>
				</div>
				<a class="left carousel-control" href="#carousel-1" role="button" data-slide="prev">
				</a>
				<a class="right carousel-control" href="#carousel-1" role="button" data-slide="next">
				</a>
			</div>
		</section>
	</div>
	<section class="wrapper container main-content">
		<div class="row">
			<article class="col-md-6 chart-placeholder">
				<?php if ( qtrans_getLanguage() == "pl" ) : ?>
					<?php echo do_shortcode( '[visualizer id="63"]' ) ?>
				<?php endif ?>
				<?php if ( qtrans_getLanguage() == "en" ) : ?>
					<?php echo do_shortcode( '[visualizer id="63"]' ) ?>
				<?php endif ?>
				<?php if ( qtrans_getLanguage() == "de" ) : ?>
					<?php echo do_shortcode( '[visualizer id="63"]' ) ?>
				<?php endif ?>
			</article>
			<article class="col-md-6 introtext-placeholder">
				<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</article>
		</div>
		<a href="<?php echo get_permalink( 21 ); ?>" class="cta-button">
						<?php if ( qtrans_getLanguage() == "pl" ) : ?>
					<?php echo do_shortcode( 'skontaktuj się' ) ?>
				<?php endif ?>
				<?php if ( qtrans_getLanguage() == "en" ) : ?>
					<?php echo do_shortcode( 'get in touch' ) ?>
				<?php endif ?>
				<?php if ( qtrans_getLanguage() == "de" ) : ?>
					<?php echo do_shortcode( 'kontakt' ) ?>
				<?php endif ?>
		</a>
	</section>
	<section class="container quote-content">
		<article class="wrapper row">
			<div id="carousel-2" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<?php
					$the_sidebars = wp_get_sidebars_widgets();
					$count_sidebards = count( $the_sidebars['quotes'] );
					for ( $i = 0; $i < $count_sidebards; ++$i ) {
						echo '<li data-target="#carousel-2" data-slide-to="' . $i . '"></li>';
					}
					?>
				</ol>
				<div class="carousel-inner" role="listbox">
					<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'quotes' ) )  ?>
				</div>
			</div>
			</div>
		</article>
	</section>
</main>
<?php get_footer(); ?>