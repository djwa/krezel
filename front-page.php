<?php /* Template Name: Landing Page */ get_header(); ?>
<main id="page-wrap" class="home-content">
	<section class="wrapper container">
		<div class="row">
			<figure class="col-md-3">
				<p><strong>Lorem </strong>ipsum dolor sit amet, consectetur adipiscing elit. Nulla blandit lacus eget pellentesque rutrum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean vel elementum massa. Aenean vehicula in ante ac fermentum. Proin pellentesque sollicitudin tellus, et imperdiet nulla pharetra id. Nunc erat dolor, sodales gravida magna eu, fringilla cursus erat. Nunc tempor aliquet leo quis auctor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed porttitor, dui vel suscipit laoreet, ante velit consequat neque, a dictum sem augue vel nisl. Nam ante justo, varius nec ipsum in, porttitor vehicula dui. Aenean in nisl ipsum. </p>
			</figure>
			<figure class="col-md-3">
				<p>Lorem <span>ipsum</span> dolor sit amet, <a href="#" title="">consectetur</a> adipiscing elit. Nulla blandit lacus eget pellentesque rutrum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean vel elementum massa. Aenean vehicula in ante ac fermentum. Proin pellentesque sollicitudin tellus, et imperdiet nulla pharetra id. Nunc erat dolor, sodales gravida magna eu, fringilla cursus erat. Nunc tempor aliquet leo quis auctor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed porttitor, dui vel suscipit laoreet, ante velit consequat neque, a dictum sem augue vel nisl. Nam ante justo, varius nec ipsum in, porttitor vehicula dui. Aenean in nisl ipsum. </p>
			</figure>
			<figure class="col-md-3">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla blandit lacus eget pellentesque rutrum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean vel elementum massa. Aenean vehicula in ante ac fermentum. Proin pellentesque sollicitudin tellus, et imperdiet nulla pharetra id. Nunc erat dolor, sodales gravida magna eu, fringilla cursus erat. Nunc tempor aliquet leo quis auctor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed porttitor, dui vel suscipit laoreet, ante velit consequat neque, a dictum sem augue vel nisl. Nam ante justo, varius nec ipsum in, porttitor vehicula dui. Aenean in nisl ipsum. </p>
			</figure>
			<figure class="col-md-3">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla blandit lacus eget pellentesque rutrum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean vel elementum massa. Aenean vehicula in ante ac fermentum. Proin pellentesque sollicitudin tellus, et imperdiet nulla pharetra id. Nunc erat dolor, sodales gravida magna eu, fringilla cursus erat. Nunc tempor aliquet leo quis auctor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed porttitor, dui vel suscipit laoreet, ante velit consequat neque, a dictum sem augue vel nisl. Nam ante justo, varius nec ipsum in, porttitor vehicula dui. Aenean in nisl ipsum. </p>
			</figure>
		</div>
	</section>
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