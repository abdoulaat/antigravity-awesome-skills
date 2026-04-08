</main><!-- #main-content -->

<footer class="lp-footer" role="contentinfo">
  <div class="lp-container">

    <div class="lp-footer__grid">

      <!-- Colonne logo + description -->
      <div class="lp-footer__brand">
        <a href="<?php echo esc_url( home_url('/') ); ?>" class="lp-footer__logo" aria-label="<?php bloginfo('name'); ?>">
          <?php if ( has_custom_logo() ) : the_custom_logo(); else : ?>
          <svg width="40" height="40" viewBox="0 0 40 40" fill="none" aria-hidden="true">
            <rect width="40" height="40" rx="9" fill="#1780B8"/>
            <path d="M8 15h24M8 20h24M8 25h16" stroke="#fff" stroke-width="2.5" stroke-linecap="round"/>
          </svg>
          <?php endif; ?>
          <span class="lp-footer__brand-name"><?php bloginfo('name'); ?></span>
        </a>
        <p class="lp-footer__desc">
          <?php echo esc_html( get_option('laposte_footer_desc', __('Au service des Sénégalais depuis 1892. Courrier, colis, finances et numérique.','laposte')) ); ?>
        </p>
        <div class="lp-footer__social">
          <a href="https://facebook.com/lapostesn" target="_blank" rel="noopener" aria-label="Facebook">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
          </a>
          <a href="https://twitter.com/lapostesn" target="_blank" rel="noopener" aria-label="Twitter / X">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
          </a>
          <a href="https://linkedin.com/company/la-poste-senegal" target="_blank" rel="noopener" aria-label="LinkedIn">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
          </a>
        </div>
      </div>

      <div class="lp-footer__col">
        <h4 class="lp-footer__col-title"><?php _e('Services','laposte'); ?></h4>
        <ul>
          <li><a href="<?php echo home_url('/courrier'); ?>"><?php _e('Courrier national','laposte'); ?></a></li>
          <li><a href="<?php echo home_url('/colis'); ?>"><?php _e('Envoi de colis','laposte'); ?></a></li>
          <li><a href="<?php echo home_url('/express'); ?>"><?php _e('Courrier express','laposte'); ?></a></li>
          <li><a href="<?php echo home_url('/international'); ?>"><?php _e('International','laposte'); ?></a></li>
          <li><a href="<?php echo home_url('/entreprises'); ?>"><?php _e('Solutions entreprises','laposte'); ?></a></li>
        </ul>
      </div>

      <div class="lp-footer__col">
        <h4 class="lp-footer__col-title"><?php _e('Services Financiers','laposte'); ?></h4>
        <ul>
          <li><a href="<?php echo home_url('/ccp'); ?>"><?php _e('Compte CCP','laposte'); ?></a></li>
          <li><a href="<?php echo home_url('/mandats'); ?>"><?php _e('Mandats postaux','laposte'); ?></a></li>
          <li><a href="<?php echo home_url('/western-union'); ?>"><?php _e('Western Union','laposte'); ?></a></li>
          <li><a href="<?php echo home_url('/epargne'); ?>"><?php _e('Épargne','laposte'); ?></a></li>
        </ul>
      </div>

      <div class="lp-footer__col">
        <h4 class="lp-footer__col-title"><?php _e('Aide & Contact','laposte'); ?></h4>
        <ul>
          <li><a href="<?php echo home_url('/suivi-colis'); ?>"><?php _e('Suivre un colis','laposte'); ?></a></li>
          <li><a href="<?php echo home_url('/agences'); ?>"><?php _e('Trouver une agence','laposte'); ?></a></li>
          <li><a href="<?php echo home_url('/faq'); ?>"><?php _e('FAQ','laposte'); ?></a></li>
          <li><a href="<?php echo home_url('/contact'); ?>"><?php _e('Nous contacter','laposte'); ?></a></li>
          <li><a href="<?php echo home_url('/reclamations'); ?>"><?php _e('Réclamations','laposte'); ?></a></li>
        </ul>
      </div>

    </div>

    <div class="lp-footer__bottom">
      <p class="lp-footer__copyright">
        &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.
        <?php _e('Tous droits réservés.','laposte'); ?>
      </p>
      <nav class="lp-footer__legal" aria-label="<?php _e('Liens légaux','laposte'); ?>">
        <?php if ( has_nav_menu('footer') ) :
          wp_nav_menu(['theme_location'=>'footer','container'=>false,'items_wrap'=>'%3$s','fallback_cb'=>false]);
        else : ?>
        <a href="<?php echo home_url('/mentions-legales'); ?>"><?php _e('Mentions légales','laposte'); ?></a>
        <a href="<?php echo home_url('/politique-confidentialite'); ?>"><?php _e('Confidentialité','laposte'); ?></a>
        <a href="<?php echo home_url('/cgu'); ?>"><?php _e('CGU','laposte'); ?></a>
        <a href="<?php echo home_url('/accessibilite'); ?>"><?php _e('Accessibilité','laposte'); ?></a>
        <?php endif; ?>
      </nav>
    </div>

  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
