<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="">    
    <meta name="description" content="">    
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <meta name="application-name" content="">
    <meta name="apple-mobile-web-app-title" content="">
    <meta name="theme-color" content="">
    <meta name="msapplication-navbutton-color" content="">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="msapplication-starturl" content="<?php echo site_url (''); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--==== Apple Touch Icons ====-->
    <link rel="icon" sizes="128x128" href="<?php echo base_url(THEME_PATH . 'assets/img/touch/app-icon128.png'); ?>">
    <link rel="apple-touch-icon" sizes="128x128" href="<?php echo base_url(THEME_PATH . 'assets/img/touch/app-icon128.png'); ?>">
    <link rel="icon" sizes="192x192" href="<?php echo base_url(THEME_PATH . 'assets/img/touch/app-icon192.png'); ?>">
    <link rel="apple-touch-icon" sizes="192x192" href="<?php echo base_url(THEME_PATH . 'assets/img/touch/app-icon192.png'); ?>">
    <link rel="icon" sizes="256x256" href="<?php echo base_url(THEME_PATH . 'assets/img/touch/app-icon256.png'); ?>">
    <link rel="apple-touch-icon" sizes="256x256" href="<?php echo base_url(THEME_PATH . 'assets/img/touch/app-icon256.png'); ?>">
    <link rel="icon" sizes="384x384" href="<?php echo base_url(THEME_PATH . 'assets/img/touch/app-icon384.png'); ?>">
    <link rel="apple-touch-icon" sizes="384x384" href="<?php echo base_url(THEME_PATH . 'assets/img/touch/app-icon384.png'); ?>">
    <link rel="icon" sizes="512x512" href="<?php echo base_url(THEME_PATH . 'assets/img/touch/app-icon512.png'); ?>">
    <link rel="apple-touch-icon" sizes="512x512" href="<?php echo base_url(THEME_PATH . 'assets/img/touch/app-icon512.png'); ?>">

    <!--==== Fav-icon ====-->
    <link rel="icon" href="<?php echo base_url(THEME_PATH . 'assets/img/fav-icon.png'); ?>" type="image/png" sizes="512x512">
    
    <!--==== Manifest JSON ====-->
    <link rel="manifest" href="<?php echo base_url ('manifest.json'); ?>">

    <title><?php if (isset($page_title)) echo $page_title . ': '; echo $this->session->userdata ('site_title'); ?>zxzx</title>

    <!--==== Core CSS ====-->
    <link rel="stylesheet" href="<?php echo base_url(THEME_PATH . 'assets/font/iconsmind-s/css/iconsminds.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url(THEME_PATH . 'assets/font/simple-line-icons/css/simple-line-icons.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url(THEME_PATH . 'assets/css/vendor/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url(THEME_PATH . 'assets/css/vendor/bootstrap.rtl.only.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url(THEME_PATH . 'assets/css/vendor/bootstrap-float-label.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url(THEME_PATH . 'assets/css/vendor/component-custom-switch.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url(THEME_PATH . 'assets/css/vendor/perfect-scrollbar.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url(THEME_PATH . 'assets/css/scrollbar.light.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url(THEME_CSS); ?>" />
    <link rel="stylesheet" href="<?php echo base_url(THEME_PATH . 'assets/css/main.css'); ?>" />
    <!-- Toastr CSS -->
    <link type="text/css" href="<?php echo base_url(THEME_PATH . 'assets/css/toastr.min.css'); ?>" rel="stylesheet">

    <!-- Custom JS (Dynamically included) -->
    <?php
    if (isset ($script_header) && !empty ($script_header)) {
        foreach ($script_header as $script) {
            echo '<script src="'.base_url(THEME_PATH . $script).'" type="text/javascript"></script>';
        }
    }
    ?>
    <?php
    if (isset ($script_css) && !empty ($script_css)) {
        foreach ($script_css as $css) {
		    echo '<link rel="stylesheet" href="'.base_url(THEME_PATH . $css).'" />';
        }
    }
    ?>

</head>

<body id="app-container" class="show-spinner <?php if (isset ($hide_sidemenu)) echo 'menu-hidden'; else { echo 'menu-default';} ?> <?php if (isset ($right_sidebar)) echo 'right-menu'; ?>">
	<?php if (isset($hide_navbar) && $hide_navbar == true) { ?>

	<?php } else { ?>
	  	<nav class="navbar fixed-top">
	        <div class="d-flex align-items-center navbar-left">
	            <a href="#" class="menu-button d-none d-md-block">
	                <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
	                    <rect x="0.48" y="0.5" width="7" height="1" />
	                    <rect x="0.48" y="7.5" width="7" height="1" />
	                    <rect x="0.48" y="15.5" width="7" height="1" />
	                </svg>
	                <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
	                    <rect x="1.56" y="0.5" width="16" height="1" />
	                    <rect x="1.56" y="7.5" width="16" height="1" />
	                    <rect x="1.56" y="15.5" width="16" height="1" />
	                </svg>
	            </a>

	            <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
	                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
	                    <rect x="0.5" y="0.5" width="25" height="1" />
	                    <rect x="0.5" y="7.5" width="25" height="1" />
	                    <rect x="0.5" y="15.5" width="25" height="1" />
	                </svg>
	            </a>


	        </div>


	        <a class="navbar-logo" href="Dashboard.Default.html">
	            <span class="logo d-none d-xs-block"></span>
	            <span class="logo-mobile d-block d-xs-none"></span>
	        </a>

	        <div class="navbar-right">
	            <div class="header-icons d-inline-block align-middle">
	                <div class="d-none d-md-inline-block align-text-bottom mr-3">
	                </div>

	                <div class="position-relative d-none d-sm-inline-block">
	                    <button class="header-icon btn btn-empty" type="button" id="iconMenuButton" data-toggle="dropdown"
	                        aria-haspopup="true" aria-expanded="false">
	                        <i class="simple-icon-grid"></i>
	                    </button>
	                    <div class="dropdown-menu dropdown-menu-right mt-3  position-absolute" id="iconMenuDropdown">
	                        <a href="#" class="icon-menu-item">
	                            <i class="iconsminds-equalizer d-block"></i>
	                            <span>Settings</span>
	                        </a>

	                        <a href="#" class="icon-menu-item">
	                            <i class="iconsminds-male-female d-block"></i>
	                            <span>Users</span>
	                        </a>

	                        <a href="#" class="icon-menu-item">
	                            <i class="iconsminds-puzzle d-block"></i>
	                            <span>Components</span>
	                        </a>

	                        <a href="#" class="icon-menu-item">
	                            <i class="iconsminds-bar-chart-4 d-block"></i>
	                            <span>Profits</span>
	                        </a>

	                        <a href="#" class="icon-menu-item">
	                            <i class="iconsminds-file d-block"></i>
	                            <span>Surveys</span>
	                        </a>

	                        <a href="#" class="icon-menu-item">
	                            <i class="iconsminds-suitcase d-block"></i>
	                            <span>Tasks</span>
	                        </a>

	                    </div>
	                </div>

	                <div class="position-relative d-none -d-inline-block">
	                    <button class="header-icon btn btn-empty" type="button" id="notificationButton"
	                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                        <i class="simple-icon-bell"></i>
	                        <span class="count">3</span>
	                    </button>
	                    <div class="dropdown-menu dropdown-menu-right mt-3 position-absolute" id="notificationDropdown">
	                        <div class="scroll">
	                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
	                                <a href="#">
	                                    <img src="img/profile-pic-l-2.jpg" alt="Notification Image"
	                                        class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle" />
	                                </a>
	                                <div class="pl-3">
	                                    <a href="#">
	                                        <p class="font-weight-medium mb-1">Joisse Kaycee just sent a new comment!</p>
	                                        <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
	                                    </a>
	                                </div>
	                            </div>
	                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
	                                <a href="#">
	                                    <img src="img/notification-thumb.jpg" alt="Notification Image"
	                                        class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle" />
	                                </a>
	                                <div class="pl-3">
	                                    <a href="#">
	                                        <p class="font-weight-medium mb-1">1 item is out of stock!</p>
	                                        <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
	                                    </a>
	                                </div>
	                            </div>
	                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
	                                <a href="#">
	                                    <img src="img/notification-thumb-2.jpg" alt="Notification Image"
	                                        class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle" />
	                                </a>
	                                <div class="pl-3">
	                                    <a href="#">
	                                        <p class="font-weight-medium mb-1">New order received! It is total $147,20.</p>
	                                        <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
	                                    </a>
	                                </div>
	                            </div>
	                            <div class="d-flex flex-row mb-3 pb-3 ">
	                                <a href="#">
	                                    <img src="img/notification-thumb-3.jpg" alt="Notification Image"
	                                        class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle" />
	                                </a>
	                                <div class="pl-3">
	                                    <a href="#">
	                                        <p class="font-weight-medium mb-1">3 items just added to wish list by a user!
	                                        </p>
	                                        <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
	                                    </a>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>

	                <button class="header-icon btn btn-empty d-none -d-sm-inline-block" type="button" id="fullScreenButton">
	                    <i class="simple-icon-size-fullscreen"></i>
	                    <i class="simple-icon-size-actual"></i>
	                </button>

	            </div>

	            <div class="user d-inline-block">
	                <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true"
	                    aria-expanded="false">
	                    <span class="name">Sarah Kortney</span>
	                    <span>
	                        <img alt="Profile Picture" src="img/profile-pic-l.jpg" />
	                    </span>
	                </button>

	                <div class="dropdown-menu dropdown-menu-right mt-3">
	                    <a class="dropdown-item" href="#">Account</a>
	                    <a class="dropdown-item" href="#">Features</a>
	                    <a class="dropdown-item" href="#">History</a>
	                    <a class="dropdown-item" href="#">Support</a>
	                    <a class="dropdown-item" href="#">Sign out</a>
	                </div>
	            </div>
	        </div>
	    </nav>
	<?php } ?>

	<?php
		$controller = $this->uri->segment (2);
	?>
    <div class="menu">
        <div class="main-menu">
            <div class="scroll">            	
                <ul class="list-unstyled">
                    <li class="<?php if ($controller == 'home') echo 'active'; ?>" >
                        <a href="<?php echo site_url ('coaching/home/dashboard/1'); ?>">
                            <i class="simple-icon-screen-desktop"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="<?php if ($controller == 'courses') echo 'active'; ?>" >
                        <a href="<?php echo site_url ('coaching/courses/index/1'); ?>">
                            <i class="simple-icon-book-open"></i> Courses
                        </a>
                    </li>
                    <li class="<?php if ($controller == 'users') echo 'active'; ?>" >
                        <a href="<?php echo site_url ('coaching/users/index/1'); ?>">
                            <i class="simple-icon-people"></i> Users
                        </a>
                    </li>
                    <li class="<?php if ($controller == 'slots') echo 'active'; ?>" >
                        <a href="<?php echo site_url ('coaching/slots/index/1'); ?>">
                            <i class="simple-icon-calendar"></i> Slots
                        </a>
                    </li>
                    <li class="<?php if ($controller == 'settings') echo 'active'; ?>" >
                        <a href="#settings">
                            <i class="simple-icon-settings"></i> Settings
                        </a>
                    </li>
                    <li hidden="true">
                        <a href="<?php echo site_url ('coaching/settings/index/1'); ?>">
                            <i class="simple-icon-settings"></i> Settings
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>

        <div class="sub-menu">
            <div class="scroll">
                <ul class="list-unstyled" data-link="settings">
                    <li>
                        <a href="<?php echo site_url ('coaching/settings/index/1'); ?>">
                            <i class="iconsminds-information"></i> <span class="d-inline-block">Account Information</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url ('coaching/settings/account_settings/1'); ?>">
                            <i class="iconsminds-gears"></i> <span class="d-inline-block">Account Settings</span>
                        </a>
                    </li>
                    <li hidden="true">
                        <a href="<?php echo site_url ('coaching/settings/login_settings/1'); ?>">
                            <i class="iconsminds-key"></i> <span class="d-inline-block">Login Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url ('coaching/settings/default_settings/1'); ?>">
                            <i class="iconsminds-data-cloud"></i> <span class="d-inline-block">Default Settings</span>
                        </a>
                    </li>
                    <li hidden="true">
                        <a href="<?php echo site_url ('coaching/settings/course_settings/1'); ?>">
                            <i class="iconsminds-book"></i> <span class="d-inline-block">Course Settings</span>
                        </a>
                    </li>
                    <li hidden="true">
                        <a href="<?php echo site_url ('coaching/settings/user_settings/1'); ?>">
                            <i class="iconsminds-user"></i> <span class="d-inline-block">User Settings</span>
                        </a>
                    </li>
                    <li hidden="true">
                        <a href="<?php echo site_url ('coaching/settings/slot_settings/1'); ?>">
                            <i class="iconsminds-calendar-1"></i> <span class="d-inline-block">Slot Settings</span>
                        </a>
                    </li>
                </ul>
                
            </div>
        </div>
    </div>

    <main>
        <div class="container-fluid disable-text-selection">
            <div class="row <?php if (isset ($right_sidebar)) echo 'app-row'; ?>">
                <div class="col-12">
		        	<?php if (isset ($hide_titlebar)) { ?>

		        	<?php } else  { ?>
	                    <div class="mb-2">
		                    <h1>
		                    	<?php
		                    	if (isset ($bc)) {
		                    		echo '<a href="'.site_url (current($bc)).'" title="Back to '.key ($bc).'"><i class="iconsminds-arrow-out-left"></i></a>';
		                    	}
		                    	?>
		                    	<span class="ml-1"><?php if (isset($page_title)) echo $page_title; ?></span>
	                    	</h1>

	                    	<div class="top-right-button-container">
	                    		<?php if (isset ($toolbar_buttons)) { ?>
		                            <div class="btn-group">
		                            	<?php 
		                            	if (isset ($toolbar_buttons['add_new'])) {
		                            		$add_new = $toolbar_buttons['add_new'];
		                            		?>
			                                <a class="btn btn-primary btn-lg pl-4 pr-2" href="<?php echo base_url (current($add_new)); ?>">
			                                    <?php echo key ($add_new); ?>
			                                </a>
		                            	<?php } else { ?>
			                                <a class="btn btn-primary btn-lg pl-4 pr-2" href="#">
			                                    Actions
			                                </a>
		                            	<?php } ?>
		                                <button type="button" class="btn btn-lg btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                                    <span class="sr-only">Toggle Dropdown</span>
		                                </button>
		                                <?php 
		                                if (! empty($toolbar_buttons['actions'])) { 
		                            		$actions = $toolbar_buttons['actions'];
		                                	?>
			                                <div class="dropdown-menu dropdown-menu-right">
			                                	<?php foreach ($actions as $name=>$url) { ?>
					                                <a class="dropdown-item" href="<?php echo base_url ($url); ?>">
					                                    <?php echo $name; ?>
					                                </a>
			                                	<?php } ?>
			                                </div>
		                                <?php } ?>
		                            </div>
	                    		<?php } ?>
	                           
	                        </div>

	                    	<?php if (isset ($sub_title)) { ?>
			                    <nav class="breadcrumb-container d-sm-block d-lg-inline-block" aria-label="breadcrumb">
			                        <ol class="breadcrumb pt-0">
			                            <li class="breadcrumb-item">
			                                <?php echo $sub_title; ?>
			                            </li>
			                        </ol>
			                    </nav>
			                <?php } ?>
	                	</div>

	                    <?php
	                    // include filters
	                    if (isset ($filter_template)) {
	                    	echo $filter_template;
	                    }
	                    ?>
	                    <div class="separator mb-3"></div>
		        	<?php } ?>

					<div class="row justify-content-center">
						<div class="col-md-6">
                			<?php echo $this->message->display (); ?>
						</div>
                	</div>

