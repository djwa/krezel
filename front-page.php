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
	<section class="wrapper container main-content">
		<div class="row">
			<article class="col-md-6 introtext-placeholder">
				<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</article>
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
		</div>
	</section>
	<section class="container quote-content">
		<article class="wrapper row">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<div class="col-md-2">
							<img src="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/images/avatar.png" alt="" />
						</div>
						<div class="col-md-10">
							<blackquete>
								“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sagittis odio nisi, ac consectetur diam tincidunt vel. Duis quam nunc, sodales nec rutrum in, dignissim vel ante. ”
							</blackquete>
							<p>Lorem lipsum</p>
						</div>
					</div>
					<div class="item">
						<div class="col-md-2">
							<img src="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/images/avatar.png" alt="" />
						</div>
						<div class="col-md-10">
							<blackquete>
								“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sagittis odio nisi, ac consectetur diam tincidunt vel. Duis quam nunc, sodales nec rutrum in, dignissim vel ante. ”
							</blackquete>
							<p>Gus Fring</p>
						</div>
					</div>				
					<div class="item">
						<div class="col-md-2">
							<img src="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/images/avatar.png" alt="" />
						</div>
						<div class="col-md-10">
							<blackquete>
								“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sagittis odio nisi, ac consectetur diam tincidunt vel. Duis quam nunc, sodales nec rutrum in, dignissim vel ante. ”
							</blackquete>
							<p>Micheal Ermantraunt</p>
						</div>
					</div>
				</div>
			</div>
		</article>
	</section>
</main>
<?php get_footer(); ?>