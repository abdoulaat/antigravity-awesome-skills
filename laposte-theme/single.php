<?php get_header(); ?>
<div class="lp-single">
  <?php if ( have_posts() ) : the_post(); ?>
  <div class="lp-single__hero">
    <div class="lp-container">
      <div class="lp-single__meta">
        <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('j F Y'); ?></time>
        <?php the_category(' · '); ?>
      </div>
      <h1 class="lp-single__title"><?php the_title(); ?></h1>
    </div>
    <?php if ( has_post_thumbnail() ) : ?>
    <div class="lp-single__cover">
      <?php the_post_thumbnail('laposte-hero', ['loading'=>'eager']); ?>
    </div>
    <?php endif; ?>
  </div>
  <div class="lp-container lp-single__body">
    <div class="lp-single__content"><?php the_content(); ?></div>
    <nav class="lp-single__nav" aria-label="<?php esc_attr_e('Article précédent / suivant','laposte'); ?>">
      <?php previous_post_link('<div class="lp-single__prev">%link</div>'); ?>
      <?php next_post_link('<div class="lp-single__next">%link</div>'); ?>
    </nav>
    <?php comments_template(); ?>
  </div>
  <?php endif; ?>
</div>
<?php get_footer(); ?>
