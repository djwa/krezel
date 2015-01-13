<?php get_header(); ?>
<main id="page-wrap">
	<section class="wrapper container">
		<div class="row">
			<article class="col-md-12">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" class="blog-post">
							<div class="featured-image"><a href="<?php the_permalink() ?>"></a></div>
							<div class="news-content">
								<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>		
								<?php the_content(); ?>
							</div>
							<div class="clear"></div>
						</article>
						<?php
					endwhile;
				else:
					?>
					<p>Sorry, this post does not exist</p>
				<?php endif; ?>
				<?php get_template_part( 'pagination' ); ?>
			</article>
		</div>
	</section>
</main>
<?php get_footer(); ?>