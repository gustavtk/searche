<?php /* The template for displaying 404 pages (Not Found) */ ?>

<?php get_header(); ?>

<div class="container py-5 min-height">
  <h1 class="text-center">You Just Found The 404 Page</h1>
  <p class="text-center">Don't worry, just click the back button or check out our popular posts below.</p>
  <!-- POPULAR -->
  <?php get_template_part( 'partials/popular' ); ?>
</div>

<?php get_footer(); ?>