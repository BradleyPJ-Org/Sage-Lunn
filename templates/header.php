

  <nav class="navbar navbar-default">
    <div class="container">

      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>">
          <img class= "img-responsive"alt="<?php bloginfo('name'); ?>" src="<?php echo get_option('site_logo'); ?>">
        </a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'navbar-nav navbar-right']);
          endif;
          ?>
      </div>
    </div>
  </nav>


  <section id="banner">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="banner">
            <div class="container">
              <div class="overlay">
                <h1><?php echo get_option('banner_overlay'); ?></h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
