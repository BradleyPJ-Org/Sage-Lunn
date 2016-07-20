<footer>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="col-sm-4">
          <div class="footer_title">
            <h3>Site Map</h3>
          </div>
          <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'footer_item']);
          endif;
          ?>
        </div>
        <div class="col-sm-4">
          <div class="footer_title">
            <h3>Social Media</h3>
          </div>
          <div class="footer_item">
            <div class="social">
              <a href="<?php echo get_option('facebook_link'); ?>"><i class="fa fa-facebook-square" aria-hidden="true"></a></i>
              <a href="<?php echo get_option('twitter_link'); ?>"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
              <a href="<?php echo get_option('linkedin_link'); ?>"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
