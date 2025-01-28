<?php /* Template Name: Search */ ?>

<?php get_header(); ?>

<!-- TITLE, DESCRIPTION, AND SEARCH FORM -->
<section class="pt-5">
	<div class="container">
		<h1 class="text-center mb-3"><?php the_title(); ?></h1>
		<?php the_content(); ?>
		<?php get_template_part( 'partials/searchform' ); ?>
	</div>
</section>

<!-- POSTS WITH POPULAR TAG -->
<?php get_template_part( 'partials/popular' ); ?>

<?php get_footer(); ?>