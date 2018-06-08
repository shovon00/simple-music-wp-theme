
<footer>
	<div class="wrap-footer zerogrid">
		<div class="row block09">

			<?php dynamic_sidebar( 'footer-widget' ); ?>
			
		</div>
		
		<div class="row copyright">
			<p>Copyright © 2013 - Designed by <a href="https://www.zerotheme.com">ZEROTHEME</a></p>
		</div>
	</div>
</footer>
	
	
	<script>
		jQuery(function () {
			jQuery("#slider").responsiveSlides({
			auto: true,
			pager: false,
			nav: true,
			speed: 500,
			maxwidth: 962,
			namespace: "centered-btns"
		  });
		});
	</script>

<?php wp_footer(); ?>
</body>
</html>