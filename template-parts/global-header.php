<header class="app_header">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark">
			<a class="navbar-brand" href="<?php url() ?>"><?php bloginfo() ?></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_main">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbar_main">
				<?php get_template_part( 'template-parts/global', 'navigation' ); ?>
				<?php get_search_form(); ?>
			</div>
		</nav>
	</div>
</header>
