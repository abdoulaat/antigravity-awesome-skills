<?php
/**
 * Template Name: Page d'Accueil
 * Template Post Type: page
 */
get_header(); ?>

<!-- ═══ HERO ═══════════════════════════════════════════════════ -->
<section class="lp-hero" aria-labelledby="hero-heading">
  <div class="lp-hero__content">
    <div class="lp-hero__left">
      <span class="lp-eyebrow">
        <span class="lp-track-widget__dot"></span>
        <?php _e( 'Depuis 1892 · Réseau national', 'laposte' ); ?>
      </span>
      <h1 id="hero-heading" class="lp-hero__title">
        <?php echo nl2br( esc_html( get_option( 'laposte_hero_title', "Votre courrier,\npartout au Sénégal\net dans le monde." ) ) ); ?>
      </h1>
      <p class="lp-hero__desc">
        <?php echo esc_html( get_option( 'laposte_hero_desc', "Services postaux, transferts d'argent et solutions numériques pour 17 millions de Sénégalais — en ville comme en brousse." ) ); ?>
      </p>
      <div class="lp-hero__ctas">
        <a href="<?php echo esc_url( home_url( '/envoyer-un-colis/' ) ); ?>" class="lp-btn lp-btn--primary lp-btn--lg">
          <?php _e( 'Envoyer un colis', 'laposte' ); ?>
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
            <circle cx="8" cy="8" r="7" fill="rgba(255,255,255,0.15)"/>
            <path d="M5.5 8h5M8 5.5l2.5 2.5-2.5 2.5" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </a>
        <a href="<?php echo esc_url( home_url( '/suivi-colis/' ) ); ?>" class="lp-btn lp-btn--outline-white">
          <?php _e( 'Suivre mon envoi', 'laposte' ); ?>
        </a>
      </div>
      <div class="lp-hero__stats">
        <div class="lp-hero__stat">
          <strong><?php laposte_get_opt( 'laposte_nb_agences', '647' ); ?></strong>
          <span><?php _e( 'agences', 'laposte' ); ?></span>
        </div>
        <div class="lp-hero__stat-divider" aria-hidden="true"></div>
        <div class="lp-hero__stat">
          <strong><?php laposte_get_opt( 'laposte_nb_clients', '3,2M' ); ?></strong>
          <span><?php _e( 'clients actifs', 'laposte' ); ?></span>
        </div>
        <div class="lp-hero__stat-divider" aria-hidden="true"></div>
        <div class="lp-hero__stat">
          <strong>14</strong>
          <span><?php _e( 'régions couvertes', 'laposte' ); ?></span>
        </div>
      </div>
    </div>

    <div class="lp-hero__right">
      <!-- Widget suivi rapide -->
      <div class="lp-track-widget" role="search" aria-label="<?php _e( 'Suivi rapide', 'laposte' ); ?>">
        <p class="lp-track-widget__label"><?php _e( 'Suivi rapide', 'laposte' ); ?></p>
        <div class="lp-track-widget__input-row">
          <label for="track-hero" class="screen-reader-text"><?php _e( 'Numéro de suivi', 'laposte' ); ?></label>
          <input type="text" id="track-hero" placeholder="<?php esc_attr_e( 'Ex: SN 487 291 653 SN', 'laposte' ); ?>"
                 class="lp-track-widget__input" autocomplete="off"/>
          <button class="lp-track-widget__btn" aria-label="<?php esc_attr_e( 'Rechercher', 'laposte' ); ?>">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true">
              <circle cx="8" cy="8" r="5.5" stroke="currentColor" stroke-width="1.5"/>
              <path d="M12.5 12.5l3 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
            </svg>
          </button>
        </div>
        <p class="lp-track-widget__hint"><?php _e( 'Trouvez votre numéro sur votre reçu de dépôt', 'laposte' ); ?></p>
        <div class="lp-track-widget__today">
          <span class="lp-track-widget__dot" aria-hidden="true"></span>
          <span>
            <strong><?php echo esc_html( get_option( 'laposte_livraisons_jour', '2 847' ) ); ?></strong>
            <?php _e( 'colis livrés aujourd\'hui', 'laposte' ); ?>
          </span>
        </div>
      </div>
      <!-- Image hero -->
      <div class="lp-hero__img-block">
        <?php
        $hero_img_id = get_option( 'laposte_hero_image_id' );
        if ( $hero_img_id ) :
            echo wp_get_attachment_image( $hero_img_id, 'laposte-hero', false, [
                'alt'     => __( 'Agents La Poste Sénégal', 'laposte' ),
                'loading' => 'eager',
            ] );
        else : ?>
        <img src="<?php echo LAPOSTE_URI; ?>/assets/images/hero-placeholder.jpg"
             alt="<?php esc_attr_e( 'Agents La Poste Sénégal au service des clients', 'laposte' ); ?>"
             loading="eager" width="640" height="480"/>
        <?php endif; ?>
        <div class="lp-hero__img-badge">
          <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
            <circle cx="7" cy="7" r="6" stroke="#1780B8" stroke-width="1.5"/>
            <path d="M4.5 7l2 2L9.5 5" stroke="#1780B8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <?php _e( 'Service certifié ISO 9001', 'laposte' ); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SERVICES BENTO ════════════════════════════════════════ -->
<section class="lp-services lp-reveal" aria-labelledby="services-heading">
  <div class="lp-container">
    <div class="lp-section-header">
      <span class="lp-eyebrow"><?php _e( 'Nos services', 'laposte' ); ?></span>
      <h2 id="services-heading"><?php _e( 'Ce que nous faisons<br>pour vous, chaque jour.', 'laposte' ); ?></h2>
    </div>
    <div class="lp-bento">

      <article class="lp-bento__card lp-bento__card--main lp-reveal-child" style="--delay:0ms">
        <div class="lp-bento__card-inner">
          <div class="lp-bento__icon">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" aria-hidden="true">
              <path d="M4 8h20v14a2 2 0 01-2 2H6a2 2 0 01-2-2V8z" stroke="currentColor" stroke-width="1.5"/>
              <path d="M4 8l10 8 10-8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
              <path d="M2 6h24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
            </svg>
          </div>
          <h3><?php _e( 'Courrier & Colis', 'laposte' ); ?></h3>
          <p><?php _e( 'Envoi national et international avec suivi en temps réel. Express 24h disponible vers les grandes villes.', 'laposte' ); ?></p>
          <a href="<?php echo esc_url( home_url( '/courrier-colis/' ) ); ?>" class="lp-bento__link">
            <?php _e( 'Calculer un tarif', 'laposte' ); ?>
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
              <path d="M3 7h8M8 4l3 3-3 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
        </div>
      </article>

      <article class="lp-bento__card lp-bento__card--accent lp-reveal-child" style="--delay:80ms">
        <div class="lp-bento__card-inner">
          <div class="lp-bento__icon">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" aria-hidden="true">
              <rect x="3" y="7" width="22" height="16" rx="2" stroke="currentColor" stroke-width="1.5"/>
              <path d="M3 12h22" stroke="currentColor" stroke-width="1.5"/>
              <path d="M8 17h4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
            </svg>
          </div>
          <h3><?php _e( 'Services Financiers', 'laposte' ); ?></h3>
          <p><?php _e( 'Compte CCP, mandats, épargne et transferts Western Union dans toutes nos agences.', 'laposte' ); ?></p>
          <a href="<?php echo esc_url( home_url( '/services-financiers/' ) ); ?>" class="lp-bento__link"><?php _e( 'Ouvrir un compte', 'laposte' ); ?></a>
        </div>
      </article>

      <article class="lp-bento__card lp-reveal-child" style="--delay:160ms">
        <div class="lp-bento__card-inner">
          <div class="lp-bento__icon">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" aria-hidden="true">
              <rect x="5" y="4" width="18" height="20" rx="2" stroke="currentColor" stroke-width="1.5"/>
              <path d="M10 9h8M10 13h8M10 17h5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
            </svg>
          </div>
          <h3><?php _e( 'Numérique & e-Gov', 'laposte' ); ?></h3>
          <p><?php _e( 'Identité numérique, déclarations en ligne et services administratifs dématérialisés.', 'laposte' ); ?></p>
          <a href="<?php echo esc_url( home_url( '/numerique/' ) ); ?>" class="lp-bento__link"><?php _e( 'Découvrir', 'laposte' ); ?></a>
        </div>
      </article>

      <article class="lp-bento__card lp-bento__card--dark lp-reveal-child" style="--delay:240ms">
        <div class="lp-bento__card-inner">
          <div class="lp-bento__icon">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" aria-hidden="true">
              <rect x="5" y="5" width="18" height="18" rx="1" stroke="currentColor" stroke-width="1.5" stroke-dasharray="3 2"/>
              <path d="M10 14l3 3 5-5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h3><?php _e( 'Philatélie', 'laposte' ); ?></h3>
          <p><?php _e( 'Collection de timbres sénégalais, éditions limitées et carnets patrimoniaux.', 'laposte' ); ?></p>
          <a href="<?php echo esc_url( home_url( '/philatelie/' ) ); ?>" class="lp-bento__link"><?php _e( 'Voir la boutique', 'laposte' ); ?></a>
        </div>
      </article>

      <article class="lp-bento__card lp-bento__card--wide lp-reveal-child" style="--delay:320ms">
        <div class="lp-bento__card-inner lp-bento__card-inner--row">
          <div>
            <span class="lp-eyebrow"><?php _e( 'Entreprises', 'laposte' ); ?></span>
            <h3><?php _e( 'Express Professionnel', 'laposte' ); ?></h3>
            <p><?php _e( 'Solutions sur mesure pour les PME et grandes entreprises : routage, archivage, distribution last-mile.', 'laposte' ); ?></p>
            <a href="<?php echo esc_url( home_url( '/entreprises/' ) ); ?>" class="lp-btn lp-btn--primary lp-btn--sm" style="margin-top:1rem">
              <?php _e( 'Demander un devis', 'laposte' ); ?>
            </a>
          </div>
          <?php
          $pro_img = get_option('laposte_service_pro_image_id');
          if ( $pro_img ) :
              echo wp_get_attachment_image($pro_img, 'laposte-service', false, ['loading'=>'lazy']);
          else : ?>
          <img src="<?php echo LAPOSTE_URI; ?>/assets/images/express-pro.jpg"
               alt="<?php esc_attr_e('Livreur express La Poste Sénégal','laposte'); ?>"
               loading="lazy" width="400" height="300"/>
          <?php endif; ?>
        </div>
      </article>

    </div>
  </div>
</section>

<!-- ═══ SUIVI TEMPS RÉEL ══════════════════════════════════════ -->
<section class="lp-track-section lp-reveal" aria-labelledby="track-heading">
  <div class="lp-container">
    <div class="lp-track-section__inner">
      <div class="lp-track-section__left">
        <span class="lp-eyebrow lp-eyebrow--light"><?php _e( 'Où est mon colis ?', 'laposte' ); ?></span>
        <h2 id="track-heading" class="lp-track-section__title">
          <?php _e( 'Suivi en temps réel,<br>à chaque étape.', 'laposte' ); ?>
        </h2>
        <ul class="lp-track-steps" aria-label="<?php esc_attr_e('Étapes de suivi','laposte'); ?>">
          <li class="lp-track-steps__step lp-track-steps__step--done">
            <span class="lp-track-steps__dot"></span><?php _e('Pris en charge à Dakar — Plateau','laposte'); ?>
          </li>
          <li class="lp-track-steps__step lp-track-steps__step--done">
            <span class="lp-track-steps__dot"></span><?php _e('En transit — Centre de tri de Thiès','laposte'); ?>
          </li>
          <li class="lp-track-steps__step lp-track-steps__step--active">
            <span class="lp-track-steps__dot"></span><?php _e('En cours de livraison — Ziguinchor','laposte'); ?>
          </li>
          <li class="lp-track-steps__step">
            <span class="lp-track-steps__dot"></span><?php _e('Livraison au destinataire','laposte'); ?>
          </li>
        </ul>
      </div>
      <div class="lp-track-section__right">
        <form class="lp-track-form" action="<?php echo esc_url( home_url('/suivi-colis/') ); ?>" method="GET"
              role="search" aria-label="<?php esc_attr_e('Suivi de colis','laposte'); ?>">
          <h3 class="lp-track-form__title"><?php _e('Entrez votre numéro de suivi','laposte'); ?></h3>
          <div class="lp-track-form__group">
            <label for="track-main"><?php _e('Numéro de suivi','laposte'); ?></label>
            <input type="text" id="track-main" name="numero"
                   placeholder="<?php esc_attr_e('SN 000 000 000 SN','laposte'); ?>"
                   autocomplete="off" required/>
            <p class="lp-track-form__helper"><?php _e('Disponible sur votre reçu ou email de confirmation','laposte'); ?></p>
          </div>
          <?php wp_nonce_field( 'laposte_tracking', 'laposte_nonce' ); ?>
          <button type="submit" class="lp-btn lp-btn--primary lp-btn--full">
            <?php _e('Suivre mon envoi','laposte'); ?>
          </button>
          <a href="<?php echo esc_url( home_url('/faq-suivi/') ); ?>" class="lp-track-form__faq">
            <?php _e('Je ne trouve pas mon numéro','laposte'); ?>
          </a>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- ═══ CHIFFRES CLÉS ════════════════════════════════════════ -->
<section class="lp-stats lp-reveal" aria-labelledby="stats-heading">
  <div class="lp-container">
    <h2 id="stats-heading" class="screen-reader-text"><?php _e('La Poste Sénégal en chiffres','laposte'); ?></h2>
    <div class="lp-stats__grid">
      <div class="lp-stats__item lp-reveal-child" style="--delay:0ms">
        <strong class="lp-stats__number"><?php echo esc_html(get_option('laposte_nb_agences','647')); ?></strong>
        <span class="lp-stats__label"><?php _e('agences et points relais','laposte'); ?></span>
      </div>
      <div class="lp-stats__item lp-reveal-child" style="--delay:100ms">
        <strong class="lp-stats__number"><?php echo esc_html(get_option('laposte_nb_clients','3,2M')); ?></strong>
        <span class="lp-stats__label"><?php _e('comptes CCP actifs','laposte'); ?></span>
      </div>
      <div class="lp-stats__item lp-reveal-child" style="--delay:200ms">
        <strong class="lp-stats__number">98,4%</strong>
        <span class="lp-stats__label"><?php _e('taux de livraison J+3 en zone urbaine','laposte'); ?></span>
      </div>
      <div class="lp-stats__item lp-reveal-child" style="--delay:300ms">
        <strong class="lp-stats__number">132 ans</strong>
        <span class="lp-stats__label"><?php _e('au service des Sénégalais','laposte'); ?></span>
      </div>
    </div>
  </div>
</section>

<!-- ═══ ACTUALITÉS ════════════════════════════════════════════ -->
<section class="lp-news lp-reveal" aria-labelledby="news-heading">
  <div class="lp-container">
    <div class="lp-section-header">
      <span class="lp-eyebrow"><?php _e('Actualités','laposte'); ?></span>
      <h2 id="news-heading"><?php _e('Ce qui se passe<br>à La Poste.','laposte'); ?></h2>
      <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="lp-section-header__link">
        <?php _e('Toutes les actualités','laposte'); ?>
      </a>
    </div>
    <div class="lp-news__grid">
      <?php
      $news = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => 4,
        'post_status'    => 'publish',
        'ignore_sticky_posts' => true,
      ]);
      $i = 0;
      if ( $news->have_posts() ) :
        while ( $news->have_posts() ) : $news->the_post();
          $delay = $i * 80; $i++;
      ?>
      <article class="lp-news__card lp-reveal-child" style="--delay:<?php echo $delay; ?>ms">
        <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" class="lp-news__img-wrap" tabindex="-1" aria-hidden="true">
          <?php the_post_thumbnail('laposte-news', ['loading'=>'lazy']); ?>
        </a>
        <?php endif; ?>
        <div class="lp-news__body">
          <time class="lp-news__date" datetime="<?php echo get_the_date('Y-m-d'); ?>">
            <?php echo get_the_date('j F Y'); ?>
          </time>
          <h3 class="lp-news__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <p class="lp-news__excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
        </div>
      </article>
      <?php endwhile; wp_reset_postdata();
      else : ?>
      <p class="lp-no-posts"><?php _e('Aucune actualité pour le moment.','laposte'); ?></p>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ═══ TROUVER UNE AGENCE ════════════════════════════════════ -->
<section class="lp-agencies lp-reveal" aria-labelledby="agencies-heading">
  <div class="lp-container">
    <div class="lp-agencies__inner">
      <div class="lp-agencies__left">
        <span class="lp-eyebrow"><?php _e('Réseau national','laposte'); ?></span>
        <h2 id="agencies-heading"><?php _e('Une agence près<br>de chez vous.','laposte'); ?></h2>
        <p class="lp-agencies__desc">
          <?php printf( __('%s points de contact couvrant les 14 régions du Sénégal.','laposte'), get_option('laposte_nb_agences','647') ); ?>
        </p>
        <form class="lp-agencies__search" action="<?php echo esc_url(home_url('/agences/')); ?>" method="GET"
              role="search" aria-label="<?php esc_attr_e('Rechercher une agence','laposte'); ?>">
          <label for="agency-q"><?php _e('Ville ou quartier','laposte'); ?></label>
          <div class="lp-agencies__search-row">
            <input type="text" id="agency-q" name="q"
                   placeholder="<?php esc_attr_e('Ex: Dakar Plateau, Thiès, Ziguinchor...','laposte'); ?>"/>
            <button type="submit" class="lp-btn lp-btn--primary"><?php _e('Trouver','laposte'); ?></button>
          </div>
        </form>
        <div class="lp-agencies__regions">
          <span><?php _e('Couverture :','laposte'); ?></span>
          <?php
          $regions = ['Dakar','Thiès','Saint-Louis','Ziguinchor','Kaolack','Tambacounda','Kolda','Matam','+6 régions'];
          foreach ($regions as $r) echo '<span class="lp-tag">'.esc_html($r).'</span>';
          ?>
        </div>
      </div>
      <div class="lp-agencies__right">
        <div class="lp-agencies__map-placeholder" role="img" aria-label="<?php esc_attr_e('Carte du réseau La Poste Sénégal','laposte'); ?>">
          <?php
          $map_id = get_option('laposte_map_image_id');
          if ($map_id) echo wp_get_attachment_image($map_id,'laposte-hero',false,['loading'=>'lazy']);
          else : ?>
          <img src="<?php echo LAPOSTE_URI; ?>/assets/images/map-senegal.jpg"
               alt="<?php esc_attr_e('Carte du Sénégal montrant les agences La Poste','laposte'); ?>"
               loading="lazy" width="700" height="520"/>
          <?php endif; ?>
          <div class="lp-agencies__map-overlay">
            <a href="<?php echo esc_url(home_url('/agences/')); ?>" class="lp-btn lp-btn--primary">
              <?php _e('Voir toutes les agences','laposte'); ?>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ PARTENAIRES MARQUEE ══════════════════════════════════ -->
<section class="lp-partners" aria-label="<?php esc_attr_e('Nos partenaires','laposte'); ?>">
  <div class="lp-partners__label"><?php _e('Ils nous font confiance','laposte'); ?></div>
  <div class="lp-marquee" aria-hidden="true">
    <div class="lp-marquee__track">
      <?php
      $partners = ['Western Union','MoneyGram','Orange Money','Wave','Ecobank','BCEAO','DHL','Aramex','UPU','Poste Mondiale'];
      $all = array_merge($partners, $partners);
      foreach ($all as $p) echo '<span class="lp-marquee__item">'.esc_html($p).'</span>';
      ?>
    </div>
  </div>
</section>

<!-- ═══ CTA FINAL ════════════════════════════════════════════ -->
<section class="lp-cta lp-reveal" aria-labelledby="cta-heading">
  <div class="lp-container">
    <div class="lp-cta__inner">
      <div class="lp-cta__content">
        <span class="lp-eyebrow lp-eyebrow--light"><?php _e('Espace client','laposte'); ?></span>
        <h2 id="cta-heading" class="lp-cta__title"><?php _e('Gérez vos envois<br>depuis chez vous.','laposte'); ?></h2>
        <p class="lp-cta__desc">
          <?php _e("Créez votre espace client gratuit pour suivre vos colis, gérer vos paiements et recevoir des notifications en temps réel.",'laposte'); ?>
        </p>
      </div>
      <div class="lp-cta__actions">
        <a href="<?php echo esc_url(home_url('/inscription/')); ?>" class="lp-btn lp-btn--white lp-btn--lg">
          <?php _e('Créer un compte gratuit','laposte'); ?>
        </a>
        <a href="<?php echo esc_url(home_url('/espace-client/')); ?>" class="lp-btn lp-btn--outline-white">
          <?php _e('Se connecter','laposte'); ?>
        </a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
