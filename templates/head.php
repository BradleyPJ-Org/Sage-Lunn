<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>

  <style>
    .navbar.navbar-default{background-image:url('<?php echo get_option('Nav_background_image'); ?>');
                           background-color:<?php echo get_option('Nav_background_color'); ?> :}
    .banner{background-image:url('<?php echo get_option('banner_background_image'); ?>');}
    body{background-image:url('<?php echo get_option('body_background_image'); ?>');}

  </style>

</head>
