<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main-content">
  <?php _e( 'Aller au contenu principal', 'laposte' ); ?>
</a>

<header class="lp-nav" role="banner">
  <div class="lp-nav__inner">

    <!-- Logo -->
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="lp-nav__logo" aria-label="<?php bloginfo('name'); ?>">
      <?php if ( has_custom_logo() ) : ?>
        <?php the_custom_logo(); ?>
      <?php else : ?>
        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" aria-hidden="true">
          <rect width="36" height="36" rx="8" fill="#fff" fill-opacity=".2"/>
          <path d="M7 13h22M7 18h22M7 23h14" stroke="#fff" stroke-width="2.5" stroke-linecap="round"/>
        </svg>
        <span class="lp-nav__brand">
          <?php bloginfo( 'name' ); ?>
        </span>
      <?php endif; ?>
    </a>

    <!-- Navigation principale -->
    <?php if ( has_nav_menu( 'primary' ) ) : ?>
    <nav class="lp-nav__links" aria-label="<?php _e('Navigation principale','laposte'); ?>">
      <?php wp_nav_menu( [
        'theme_location' => 'primary',
        'container'      => false,
        'items_wrap'     => '%3$s',
        'walker'         => new Laposte_Nav_Walker(),
        'fallback_cb'    => false,
      ] ); ?>
    </nav>
    <?php else : ?>
    <nav class="lp-nav__links" aria-label="<?php _e('Navigation principale','laposte'); ?>">
      <a href="<?php echo home_url('/courrier'); ?>"><?php _e('Courrier','laposte'); ?></a>
      <a href="<?php echo home_url('/colis'); ?>"><?php _e('Colis','laposte'); ?></a>
      <a href="<?php echo home_url('/services-financiers'); ?>"><?php _e('Services Financiers','laposte'); ?></a>
      <a href="<?php echo home_url('/numerique'); ?>"><?php _e('Numérique','laposte'); ?></a>
      <a href="<?php echo home_url('/agences'); ?>"><?php _e('Agences','laposte'); ?></a>
    </nav>
    <?php endif; ?>

    <!-- Actions -->
    <div class="lp-nav__actions">
      <a href="<?php echo esc_url( home_url('/suivi-colis/') ); ?>" class="lp-btn lp-btn--ghost">
        <?php _e('Suivre un colis','laposte'); ?>
      </a>
      <a href="<?php echo esc_url( home_url('/espace-client/') ); ?>" class="lp-btn lp-btn--primary">
        <?php _e('Mon espace','laposte'); ?>
      </a>
    </div>

    <!-- Burger mobile -->
    <button class="lp-nav__burger" aria-label="<?php _e('Menu','laposte'); ?>" aria-expanded="false" aria-controls="mobile-menu">
      <span></span><span></span>
    </button>

  </div>
</header>

<main id="main-content" role="main">
