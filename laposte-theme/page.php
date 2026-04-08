<?php get_header(); ?>
<div class="lp-page">
  <div class="lp-page__hero">
    <div class="lp-container">
      <?php if ( have_posts() ) : the_post(); ?>
      <h1 class="lp-page__title"><?php the_title(); ?></h1>
      <?php endif; ?>
    </div>
  </div>
  <div class="lp-container lp-page__body">
    <?php the_content(); ?>
    <?php wp_link_pages(); ?>
  </div>
</div>
<?php get_footer(); ?>
