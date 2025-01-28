<?php /* Template Name: Archive */ ?>

<?php get_header(); ?>    

<!-- TITLE -->
<section class="py-5">
	<div class="container container-800">
		<h1 class="text-center"><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</div>
</section>

<!-- PARENT CATEGORIES AND POSTS --> 
<section class="pb-5">
	<div class="container container-800 min-height">
		<?php $cat = get_the_category();
		$args = array('orderby' => 'id', 'parent' => $cat[0]->category_parent );
		$cats = get_categories($args);
		foreach ($cats as $cat){ $cat_id= $cat->term_id; ?>
			<h2><a href="/category/<?php echo $cat->slug; ?>/" class="body-text"><?php echo $cat->name; ?></a></h2>
			<ul class="no-underline">
				<?php $posts = get_posts("cat=$cat_id&posts_per_page=20"); ?>
				<?php foreach($posts as $post){ ?>
					<li><strong><a href="<?php the_permalink();?>"><?php the_title(); ?></a></strong></li>
				<?php } ?>
			</ul>
		<?php } ?>
	</div>
</section>

<?php get_footer(); ?>