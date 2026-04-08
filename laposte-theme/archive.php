<?php get_header(); ?>
<div class="lp-archive">
  <div class="lp-archive__hero">
    <div class="lp-container">
      <span class="lp-eyebrow lp-eyebrow--light"><?php _e('Actualités','laposte'); ?></span>
      <h1 class="lp-archive__title">
        <?php the_archive_title(); ?>
      </h1>
    </div>
  </div>
  <div class="lp-container lp-archive__body">
    <div class="lp-news__grid">
      <?php if ( have_posts() ) : $i=0; while ( have_posts() ) : the_post(); $delay=$i*80; $i++; ?>
      <article class="lp-news__card" style="--delay:<?php echo $delay;?>ms">
        <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink();?>" class="lp-news__img-wrap">
          <?php the_post_thumbnail('laposte-news',['loading'=>'lazy']); ?>
        </a>
        <?php endif; ?>
        <div class="lp-news__body">
          <time class="lp-news__date" datetime="<?php echo get_the_date('Y-m-d');?>"><?php echo get_the_date('j F Y');?></time>
          <h2 class="lp-news__title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
          <p class="lp-news__excerpt"><?php echo wp_trim_words(get_the_excerpt(),20);?></p>
        </div>
      </article>
      <?php endwhile; else: ?>
      <p><?php _e('Aucune actualité disponible.','laposte');?></p>
      <?php endif; ?>
    </div>
    <div class="lp-pagination"><?php the_posts_pagination(['prev_text'=>'← '.__('Précédent','laposte'),'next_text'=>__('Suivant','laposte').' →']); ?></div>
  </div>
</div>
<?php get_footer(); ?>
