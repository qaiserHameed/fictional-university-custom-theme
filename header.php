<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
    <!-- <title>Document</title> -->
</head>
<body <?php  body_class(); ?>>
<script type="module" src="<?php echo get_template_directory_uri(); ?>/dist/bundle.js"></script>
    
<header class="site-header">
      <div class="container">
        <h1 class="school-logo-text float-left">
          <a href="<?php echo site_url('') ?>"><strong>Fictional</strong> University</a>
        </h1>
        <a href="<?php echo esc_url(site_url('/search')) ?>" class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a>
        <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
        <div class="site-header__menu group">
          <nav class="main-navigation">
            <ul>
              <li><a href="<?php echo  site_url('/about-us') ?>">About Us</a></li>
              <li <?php if(get_post_type() == 'program') echo 'class="current-menu-item"' ?>><a href="<?php echo get_post_type_archive_link('program') ?>">Programs</a></li>
              <li><a href="<?php echo  site_url('/events') ?>">Events</a></li>
              <li><a href="<?php echo  site_url('/campuses') ?>">Campuses</a></li>
              <li><a href="<?php echo  site_url('/blog') ?>">Blog</a></li>
            </ul>
          </nav>
          <div class="site-header__util">
             <?php if(is_user_logged_in()){ ?>
              <a href="<?php echo esc_url(site_url('/my-notes')); ?>" class="btn btn--small btn--orange float-left push-right">My Notes</a>
               <a href="<?php echo wp_logout_url() ?>" class="btn btn--small btn--dark-orange float-left btn--with-photo">
                <span class="site-header__avatar"><?php echo get_avatar(get_current_user_id(),60) ?></span>
                <span class="btn__text">Log Out</span></a>
              <?php }else{ ?>
              <a href="<?php echo wp_login_url() ?>" class="btn btn--small btn--orange float-left push-right">Login</a>
              <a href="<?php echo wp_registration_url() ?>" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
             <?php }
              ?>
            
            <a href="<?php echo esc_url(site_url('/search')) ?>" class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
    </header>