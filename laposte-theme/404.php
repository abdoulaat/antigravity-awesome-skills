<?php get_header(); ?>
<section class="lp-404">
  <div class="lp-container">
    <div class="lp-404__inner">
      <span class="lp-404__code">404</span>
      <h1 class="lp-404__title"><?php _e('Page introuvable','laposte'); ?></h1>
      <p class="lp-404__desc"><?php _e('La page que vous cherchez n\'existe pas ou a été déplacée.','laposte'); ?></p>
      <div class="lp-404__actions">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="lp-btn lp-btn--primary lp-btn--lg">
          <?php _e('Retour à l\'accueil','laposte'); ?>
        </a>
        <a href="<?php echo esc_url(home_url('/agences/')); ?>" class="lp-btn lp-btn--outline">
          <?php _e('Trouver une agence','laposte'); ?>
        </a>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
