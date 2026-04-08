<?php get_header(); ?>
<div class="lp-container" style="padding-block: 4rem;">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('lp-post'); ?>>
      <h2 class="lp-post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <div class="lp-post__excerpt"><?php the_excerpt(); ?></div>
    </article>
  <?php endwhile; else : ?>
    <p><?php _e('Aucun contenu disponible.','laposte'); ?></p>
  <?php endif; ?>
</div>
<?php get_footer(); ?>
