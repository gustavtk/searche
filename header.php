<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" />
    <?php wp_head(); ?>	
	
</head>

<body <?php body_class(); ?>>

<!-- HEADER -->

       

<header class="header primary-bg no-underline py-3">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">  
          
            <!-- LOGO -->
            <div class="col-md-2 text-md-center py-2">
                <a href="/">
                    <img src="<?php echo carbonate_logo(); ?>" alt="<?php echo get_bloginfo('name'); ?>" class="logo" width="160" height="36" />
                </a>
            </div>
            
            <!-- NAVIGATION -->
            <div class="col-md text-md-center py-2 nav-text">
                <?php wp_nav_menu(array('theme_location' => 'carbonate-header-nav')); ?>
            </div>
        
        </div>
    </div>

</header>