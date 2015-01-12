<footer>
	<div class="wrapper">
		<div class="row">
			<div class="column-6"></div>
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