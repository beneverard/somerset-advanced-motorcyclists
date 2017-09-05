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
					<p>Copyright <?php echo date('Y'); ?> Somerset Advanced Motorcyclists</p>
					<p>Supported by <a href="https://theideabureau.co">The Idea Bureau</a></p>
				</div>

			</footer>

		</div> <!-- / .wrapper -->

		<?php wp_footer(); ?>

	</body>

</html>
