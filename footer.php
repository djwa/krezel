<footer>
	<div class="top-footer">
		<div class="wrapper container">
			<div class="row">
				<div class="col-md-4">
					<a href="mailto:biuro@krezelltd.com.pl" title="email" class="email">biuro@krezelltd.com.pl</a>
				</div>
				<div class="col-md-4">
					<a href="tel:+48915645105" title="tel" class="phone">+48 (91) 564 51 05</a>
				</div>
				<div class="col-md-4">
					<a href="http://twitter.com" target="_blank" title="Twitter" class="social twitter"></a>
					<a href="http://facebook.com" target="_blank" title="Facebook" class="social facebook"></a>
				</div>
			</div>
		</div>
	</div>
	<div class="bottom-footer">
		<div class="wrapper container">
			<div class="row">
				<div class="col-xs-12">
					<p>© Copyright Krężel Sp. z o.o.</p>
				</div>
			</div>
		</div>
	</div>
	<?php wp_footer(); ?>  
</footer>
<script src="<?php echo get_bloginfo( 'template_directory' ) . '/assets/js/jquery.dlmenu.js'; ?>"></script>
<script>
    $('#dl-menu').dlmenu({
        animationClasses: {classin: 'dl-animate-in-5', classout: 'dl-animate-out-5'}
    });
</script>
</body>
</html>