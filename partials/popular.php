<?php $posts = get_posts( array('posts_per_page' => 9, 'tag'=> 'popular', 'orderby' => 'rand', 'order' => 'asc') ); ?>
<?php if(!empty($posts)){ ?>
	<section class="py-5">
		<div class="container">
			<div class="row align-items-end">
				<div class="col-md text-left text-md-center">
					<h2  class="mb-0 text-center">Popular</h2>
				</div>
			</div>
			<div class="col-md text-right text-md-center">
					<a href="/tag/popular/">Explore more &#8594;</a>
				</div>
			<div class="row">
			  <?php foreach ( $posts as $post ){ ?>
					<?php get_template_part( 'partials/post' ); ?>
			  <?php } ?>
			</div>
		</div>
	</section>
<?php } ?>