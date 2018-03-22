<?php // footer.php ?>

			<script>
				var ajax = new XMLHttpRequest();
				ajax.open('GET', '/wp-content/themes/sam/dist/images/icons.svg', true);
				ajax.send();
				ajax.onload = function(e) {
					var div = document.createElement('div');
					div.style.display = 'none';
					div.style.visibility = 'hidden';
					div.innerHTML = ajax.responseText;
					document.body.insertBefore(div, document.body.childNodes[0]);
				}
			</script>

			<footer class="site-footer">

				<a href="/" class="site-footer__logo">
			  	  <img src="/wp-content/themes/sam/public/images/logo.svg" />
			    </a>

				<div class="site-footer__colophon">

					<p class="site-footer__social">

						<a href="https://www.facebook.com/SomersetAdvancedMotorcyclists/" title="Follow us on Facebook">
							<svg viewBox="0 0 9 16"><use xlink:href="#icon-facebook"></svg>
						</a>

						<a href="https://www.instagram.com/somersetadvancedmotorcyclists/" title="Follow us on Instagram">
							<svg viewBox="0 0 50 51"><use xlink:href="#icon-instagram"></svg>
						</a>

						<a href="https://twitter.com/samtweeps" title="Follow us on Twitter">
							<svg viewBox="0 0 12 11"><use xlink:href="#icon-twitter"></svg>
						</a>

					</p>

					<p>View our <a href="/privacy-policy">privacy policy</a></p>
					<p>Copyright <?php echo date('Y'); ?> Somerset Advanced Motorcyclists</p>
					<p>Supported by <a href="https://theideabureau.co">The Idea Bureau</a></p>

				</div>

			</footer>

		</div> <!-- / .wrapper -->

		<?php wp_footer(); ?>

	</body>

</html>
