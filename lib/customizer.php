<?php

namespace Roots\Sage\Customizer;

use Roots\Sage\Assets;

/**
 * Add postMessage support
 */
function customize_register($wp_customize) {
  $wp_customize->get_setting('blogname')->transport = 'postMessage';

  //Header Settings Arrays
  $section[] = array('slug'=>'Nav_styles','title' => 'Navigation Styles' ,'description' => 'Edit the Navigation Styles.','priority' => 55, 'panel' => NULL);

  $standard_control[] = array('slug'=>'Nav_background_image','default' => 'http://subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/paper.png','label' => 'Enter Navigation Background Image ','type' => 'text', 'section' => 'Nav_styles', 'controller_type' => 'upload');
  $standard_control[] = array('slug'=>'Nav_background_color','default' => '#fff','label' => 'Enter Navigation Background Color ','type' => 'text', 'section' => 'Nav_styles', 'controller_type' => 'color');

  // Body Settings Arrays
  $section[] = array('slug'=>'body_style','title' => 'Body Styles' ,'description' => 'Edit the Body Styles.','priority' => 55, 'panel' => NULL);

  $standard_control[] = array('slug'=>'body_background_image','default' => 'http://subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/paper_3.png','label' => 'Enter Body Background Image ','type' => 'text', 'section' => 'body_style', 'controller_type' => 'upload');

  //Logo Arrays
  $standard_control[] = array('slug'=>'site_logo','default' => NULL,'label' => 'Enter Logo ','type' => 'text', 'section' => 'logo_image', 'controller_type' => 'upload');
  $section[] = array('slug'=>'logo_image','title' => 'Logo Upload' ,'description' => 'Edit the Logo.','priority' => 55, 'panel' => NULL);

  //Banner Array
  $section[] = array('slug'=>'banner_style','title' => 'Banner Styles' ,'description' => 'Edit the Banner Styles.','priority' => 55, 'panel' => NULL);

  $standard_control[] = array('slug'=>'banner_background_image','default' => 'http://subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/paper.png','label' => 'Enter Banner Background Image ','type' => 'text', 'section' => 'banner_style', 'controller_type' => 'upload');
  $standard_control[] = array('slug'=>'banner_overlay','default' => 'Banner Area','label' => 'Enter Overlay Text ','type' => 'text', 'section' => 'banner_style');

  //Content Arrays
  
  //Social Links
  $section[] = array('slug'=>'social_ink','title' => 'Social Link' ,'description' => 'Edit the Social Link.','priority' => 55, 'panel' => NULL);

  $standard_control[] = array('slug'=>'facebook_link','default' => NULL,'label' => 'Enter Facebook Link ','type' => 'text', 'section' => 'social_ink');
  $standard_control[] = array('slug'=>'twitter_link','default' => NULL,'label' => 'Enter Twitter Link ','type' => 'text', 'section' => 'social_ink');
  $standard_control[] = array('slug'=>'linkedin_link','default' => NULL,'label' => 'Enter Linkedin Link ','type' => 'text', 'section' => 'social_ink');


  //LOOPS
  foreach( $section as $section ) {
    $wp_customize->add_section(
      $section['slug'],
        array(
        'title' => $section['title'],
        'description' => $section['description'],
        'priority' => $section['priority'],
        'panel'  => $section['panel'],
      )
    );
  }

  foreach( $standard_control as $standard_control ) {
    $wp_customize->add_setting($standard_control['slug'],
      array('default' => $standard_control['default'],'type' => 'option','capability' =>'edit_theme_options'
      )
    );
    if( $standard_control['controller_type'] === "upload"){
      $wp_customize->add_control(new \WP_Customize_Upload_Control($wp_customize, $standard_control['slug'],
        ['label'=> __( $standard_control['label'], 'sage' ),'section' => $standard_control['section'],'description' => $standard_control['description']] )
      );
    }elseif($standard_control['controller_type'] === "hidden"){
      $wp_customize->add_control(
          new \WP_Customize_Control($wp_customize,$standard_control['slug'],
            array('label' => $standard_control['label'],'settings' => $standard_control['slug'],'type' => $standard_control['type'])
          )
      );
    }elseif($standard_control['controller_type'] === "color"){
      $wp_customize->add_control(
        new \WP_Customize_Color_Control($wp_customize,$standard_control['slug'],
          array('label' => $standard_control['label'],'section' => $standard_control['section'],'settings' => $standard_control['slug'],'type' => $standard_control['type'])
        )
      );
    }else{
      $wp_customize->add_control(
          new \WP_Customize_Control($wp_customize,$standard_control['slug'],
            array('label' => $standard_control['label'],'section' => $standard_control['section'],'settings' => $standard_control['slug'],'type' => $standard_control['type'])
          )
      );
    }
  }



}
add_action('customize_register', __NAMESPACE__ . '\\customize_register');

/**
 * Customizer JS
 */
function customize_preview_js() {
  wp_enqueue_script('sage/customizer', Assets\asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
}
add_action('customize_preview_init', __NAMESPACE__ . '\\customize_preview_js');
