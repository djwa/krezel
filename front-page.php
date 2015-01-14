<?php /* Template Name: Landing Page */ get_header(); ?>
<main id="page-wrap" class="home-content">
	<div class="home-bg">
		<div class="wrapper container">
			<div class="holz"><p>Holz<span>&</span>Haus</p></div>
		</div>
		<section class="wrapper container" id="cards-view">
			<figure class="col-xs-12 col-sm-6 col-md-3">
				<div class="card">
					<h1>Ausrüstung Strände</h1>
					<img src="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/images/beach.png" alt=""/>
					<p><strong>Lorem </strong>ipsum dolor sit amet, consectetur adipiscing elit. Nulla blandit lacus eget pellentesque rutrum. Class aptent.</p>
				</div>
			</figure>
			<figure class="col-xs-12 col-sm-6 col-md-3">
				<div class="card">
					<h1>Weihnachtseinkäufe</h1>
					<img src="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/images/cabins.png" alt=""/>
					<p>Lorem <span>ipsum</span> dolor sit amet, <a href="#" title="">consectetur</a> adipiscing elit. Nulla blandit lacus eget pellentesque rutrum.</p>
				</div>
			</figure>
			<figure class="col-xs-12 col-sm-6 col-md-3">
				<div class="card">
					<h1>Cottages</h1>
					<img src="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/images/houses.png" alt=""/>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla blandit lacus eget pellentesque rutrum. Class aptent taciti sociosqu ad litora.</p>
				</div>
			</figure>
			<figure class="col-xs-12 col-sm-6 col-md-3">
				<div class="card">
					<h1>Möbel-Terrassen</h1>
					<img src="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/images/bar.png" alt=""/>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla blandit lacus eget pellentesque rutrum. Class aptent taciti sociosqu ad litora.</p>
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