<?php /* Template Name: Kontakt */ get_header(); ?>
<main id="page-wrap" class="contact-content">
	<section class="wrapper container" id="cards-view">
		<article class="col-xs-12">
			<div class="news-content">
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>		
				<?php the_content(); ?>
			</div>
			<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</article>
		<article class="col-xs-12">
			<?php if ( qtrans_getLanguage() == "pl" ) : ?>
				<?php echo do_shortcode( '[contact-form-7 id="35" title="Formularz pl"]' ) ?>
			<?php endif ?>
			<?php if ( qtrans_getLanguage() == "de" ) : ?>
				<?php echo do_shortcode( '[contact-form-7 id="38" title="Ohne Titel"]' ) ?>
			<?php endif ?>
		</article>
	</section>
</main>
<?php get_footer(); ?>