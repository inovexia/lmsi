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
    <link rel="stylesheet" href="<?php echo base_url(THEME_PATH . 'assets/css/dore.light.purple.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url(THEME_PATH . 'assets/css/main.css'); ?>" />

    <!-- Toastr CSS -->
    <link type="text/css" href="<?php echo base_url(THEME_PATH . 'assets/css/toastr.min.css'); ?>" rel="stylesheet">

    <!-- Custom JS (Dynamically included) -->
    <?php
    if (isset ($script_header) && !empty ($script_header)) {
        foreach ($script_header as $script) {
            echo '<script src="'.base_url($script).'" type="text/javascript"></script>';
        }
    }
    ?>

</head>

<body id="app-container" class="show-spinner <?php if (isset ($hide_sidemenu)) echo 'menu-hidden'; else { echo 'menu-default';} ?>">
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

    <div class="menu">
        <div class="main-menu">
            <div class="scroll">
                <ul class="list-unstyled">
                    <li>
                        <a href="<?php echo site_url ('coaching/home/dashboard/1'); ?>">
                            <i class="iconsminds-shop-4"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url ('coaching/courses/index/1'); ?>">
                            <i class="iconsminds-digital-drawing"></i> Courses
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url ('coaching/users/index/1'); ?>">
                            <i class="iconsminds-air-balloon-1"></i> Users
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url ('coaching/slots/index/1'); ?>">
                            <i class="iconsminds-pantone"></i> Slots
                        </a>
                    </li>
                    <li>
                        <a href="#menu">
                            <i class="iconsminds-three-arrow-fork"></i> Settings
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>

        <div class="sub-menu">
            <div class="scroll">
                <ul class="list-unstyled" data-link="dashboard">
                    <li>
                        <a href="Dashboard.Default.html">
                            <i class="simple-icon-rocket"></i> <span class="d-inline-block">Default</span>
                        </a>
                    </li>
                    <li>
                        <a href="Dashboard.Analytics.html">
                            <i class="simple-icon-pie-chart"></i> <span class="d-inline-block">Analytics</span>
                        </a>
                    </li>
                    <li>
                        <a href="Dashboard.Ecommerce.html">
                            <i class="simple-icon-basket-loaded"></i> <span class="d-inline-block">Ecommerce</span>
                        </a>
                    </li>
                    <li>
                        <a href="Dashboard.Content.html">
                            <i class="simple-icon-doc"></i> <span class="d-inline-block">Content</span>
                        </a>
                    </li>
                </ul>
                <ul class="list-unstyled" data-link="layouts" id="layouts">
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseAuthorization" aria-expanded="true"
                            aria-controls="collapseAuthorization" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Authorization</span>
                        </a>
                        <div id="collapseAuthorization" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="Pages.Auth.Login.html">
                                        <i class="simple-icon-user-following"></i> <span
                                            class="d-inline-block">Login</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Pages.Auth.Register.html">
                                        <i class="simple-icon-user-follow"></i> <span
                                            class="d-inline-block">Register</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Pages.Auth.ForgotPassword.html">
                                        <i class="simple-icon-user-unfollow"></i> <span class="d-inline-block">Forgot
                                            Password</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true"
                            aria-controls="collapseProduct" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Product</span>
                        </a>
                        <div id="collapseProduct" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="Pages.Product.List.html">
                                        <i class="simple-icon-credit-card"></i> <span class="d-inline-block">Data
                                            List</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Pages.Product.Thumbs.html">
                                        <i class="simple-icon-list"></i> <span class="d-inline-block">Thumb
                                            List</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Pages.Product.Images.html">
                                        <i class="simple-icon-grid"></i> <span class="d-inline-block">Image
                                            List</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Pages.Product.Detail.html">
                                        <i class="simple-icon-book-open"></i> <span class="d-inline-block">Detail</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseProfile" aria-expanded="true"
                            aria-controls="collapseProfile" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Profile</span>
                        </a>
                        <div id="collapseProfile" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="Pages.Profile.Social.html">
                                        <i class="simple-icon-share"></i> <span class="d-inline-block">Social</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Pages.Profile.Portfolio.html">
                                        <i class="simple-icon-link"></i> <span class="d-inline-block">Portfolio</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseBlog" aria-expanded="true"
                            aria-controls="collapseBlog" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Blog</span>
                        </a>
                        <div id="collapseBlog" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="Pages.Blog.html">
                                        <i class="simple-icon-list"></i> <span class="d-inline-block">List</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Pages.Blog.Detail.html">
                                        <i class="simple-icon-book-open"></i> <span class="d-inline-block">Detail</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Pages.Blog.Detail.Alt.html">
                                        <i class="simple-icon-picture"></i> <span class="d-inline-block">Detail
                                            Alt</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseMisc" aria-expanded="true"
                            aria-controls="collapseMisc" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Miscellaneous</span>
                        </a>
                        <div id="collapseMisc" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="Pages.Misc.Coming.Soon.html">
                                        <i class="simple-icon-hourglass"></i> <span class="d-inline-block">Coming
                                            Soon</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Pages.Misc.Error.html">
                                        <i class="simple-icon-exclamation"></i> <span
                                            class="d-inline-block">Error</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Pages.Misc.Faq.html">
                                        <i class="simple-icon-question"></i> <span class="d-inline-block">Faq</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Pages.Misc.Invoice.html">
                                        <i class="simple-icon-bag"></i> <span class="d-inline-block">Invoice</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Pages.Misc.Knowledge.Base.html">
                                        <i class="simple-icon-graduation"></i> <span class="d-inline-block">Knowledge
                                            Base</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Pages.Misc.Mailing.html">
                                        <i class="simple-icon-envelope-open"></i> <span
                                            class="d-inline-block">Mailing</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Pages.Misc.Pricing.html">
                                        <i class="simple-icon-diamond"></i> <span class="d-inline-block">Pricing</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Pages.Misc.Search.html">
                                        <i class="simple-icon-magnifier"></i> <span class="d-inline-block">Search</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                </ul>
                <ul class="list-unstyled" data-link="applications">
                    <li>
                        <a href="Apps.MediaLibrary.html">
                            <i class="simple-icon-picture"></i> <span class="d-inline-block">Library</span>
                        </a>
                    </li>
                    <li>
                        <a href="Apps.Todo.List.html">
                            <i class="simple-icon-check"></i> <span class="d-inline-block">Todo</span>
                        </a>
                    </li>
                    <li>
                        <a href="Apps.Survey.List.html">
                            <i class="simple-icon-calculator"></i> <span class="d-inline-block">Survey</span>
                        </a>
                    </li>
                    <li>
                        <a href="Apps.Chat.html">
                            <i class="simple-icon-bubbles"></i> <span class="d-inline-block">Chat</span>
                        </a>
                    </li>
                </ul>
                <ul class="list-unstyled" data-link="ui">
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseForms" aria-expanded="true"
                            aria-controls="collapseForms" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Forms</span>
                        </a>
                        <div id="collapseForms" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="Ui.Forms.Components.html">
                                        <i class="simple-icon-event"></i> <span class="d-inline-block">Components</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Ui.Forms.Layouts.html">
                                        <i class="simple-icon-doc"></i> <span class="d-inline-block">Layouts</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Ui.Forms.Validation.html">
                                        <i class="simple-icon-check"></i> <span class="d-inline-block">Validation</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Ui.Forms.Wizard.html">
                                        <i class="simple-icon-magic-wand"></i> <span
                                            class="d-inline-block">Wizard</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseDataTables" aria-expanded="true"
                            aria-controls="collapseDataTables" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Datatables</span>
                        </a>
                        <div id="collapseDataTables" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="Ui.Datatables.Rows.html">
                                        <i class="simple-icon-screen-desktop"></i> <span class="d-inline-block">Full
                                            Page UI</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Ui.Datatables.Scroll.html">
                                        <i class="simple-icon-mouse"></i> <span class="d-inline-block">Scrollable</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Ui.Datatables.Pagination.html">
                                        <i class="simple-icon-notebook"></i> <span
                                            class="d-inline-block">Pagination</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Ui.Datatables.Default.html">
                                        <i class="simple-icon-grid"></i> <span class="d-inline-block">Default</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseComponents" aria-expanded="true"
                            aria-controls="collapseComponents" class="rotate-arrow-icon opacity-50">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Components</span>
                        </a>
                        <div id="collapseComponents" class="collapse show">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="Ui.Components.Alerts.html">
                                        <i class="simple-icon-bell"></i> <span class="d-inline-block">Alerts</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Ui.Components.Badges.html">
                                        <i class="simple-icon-badge"></i> <span class="d-inline-block">Badges</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Ui.Components.Buttons.html">
                                        <i class="simple-icon-control-play"></i> <span
                                            class="d-inline-block">Buttons</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Ui.Components.Cards.html">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">Cards</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="Ui.Components.Carousel.html">
                                        <i class="simple-icon-picture"></i> <span class="d-inline-block">Carousel</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Ui.Components.Charts.html">
                                        <i class="simple-icon-chart"></i> <span class="d-inline-block">Charts</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Ui.Components.Collapse.html">
                                        <i class="simple-icon-arrow-up"></i> <span
                                            class="d-inline-block">Collapse</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Ui.Components.Dropdowns.html">
                                        <i class="simple-icon-arrow-down"></i> <span
                                            class="d-inline-block">Dropdowns</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Ui.Components.Editors.html">
                                        <i class="simple-icon-book-open"></i> <span
                                            class="d-inline-block">Editors</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Ui.Components.Icons.html">
                                        <i class="simple-icon-star"></i> <span class="d-inline-block">Icons</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Ui.Components.InputGroups.html">
                                        <i class="simple-icon-note"></i> <span class="d-inline-block">Input
                                            Groups</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Ui.Components.Jumbotron.html">
                                        <i class="simple-icon-screen-desktop"></i> <span
                                            class="d-inline-block">Jumbotron</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Ui.Components.Modal.html">
                                        <i class="simple-icon-docs"></i> <span class="d-inline-block">Modal</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Ui.Components.Navigation.html">
                                        <i class="simple-icon-cursor"></i> <span
                                            class="d-inline-block">Navigation</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="Ui.Components.PopoverandTooltip.html">
                                        <i class="simple-icon-pin"></i> <span class="d-inline-block">Popover &
                                            Tooltip</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Ui.Components.Sortable.html">
                                        <i class="simple-icon-shuffle"></i> <span class="d-inline-block">Sortable</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Ui.Components.Tables.html">
                                        <i class="simple-icon-grid"></i> <span class="d-inline-block">Tables</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                </ul>

                <ul class="list-unstyled" data-link="menu" id="menuTypes">
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseMenuTypes" aria-expanded="true"
                            aria-controls="collapseMenuTypes" class="rotate-arrow-icon">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Menu Types</span>
                        </a>
                        <div id="collapseMenuTypes" class="collapse show" data-parent="#menuTypes">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="Menu.Default.html">
                                        <i class="simple-icon-control-pause"></i> <span
                                            class="d-inline-block">Default</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Menu.Subhidden.html">
                                        <i class="simple-icon-arrow-left mi-subhidden"></i> <span
                                            class="d-inline-block">Subhidden</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Menu.Hidden.html">
                                        <i class="simple-icon-control-start mi-hidden"></i> <span
                                            class="d-inline-block">Hidden</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Menu.Mainhidden.html">
                                        <i class="simple-icon-control-rewind mi-hidden"></i> <span
                                            class="d-inline-block">Mainhidden</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseMenuLevel" aria-expanded="true"
                            aria-controls="collapseMenuLevel" class="rotate-arrow-icon collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Menu Levels</span>
                        </a>
                        <div id="collapseMenuLevel" class="collapse" data-parent="#menuTypes">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="#">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">Sub
                                            Level</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="collapse" data-target="#collapseMenuLevel2"
                                        aria-expanded="true" aria-controls="collapseMenuLevel2"
                                        class="rotate-arrow-icon collapsed">
                                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Another
                                            Level</span>
                                    </a>
                                    <div id="collapseMenuLevel2" class="collapse">
                                        <ul class="list-unstyled inner-level-menu">
                                            <li>
                                                <a href="#">
                                                    <i class="simple-icon-layers"></i> <span class="d-inline-block">Sub
                                                        Level</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseMenuDetached" aria-expanded="true"
                            aria-controls="collapseMenuDetached" class="rotate-arrow-icon collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Detached</span>
                        </a>
                        <div id="collapseMenuDetached" class="collapse">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="#">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">Sub
                                            Level</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                
            </div>
        </div>
    </div>

    <main>
        <div class="container-fluid disable-text-selection">
        	<?php if (isset ($hide_titlebar)) { ?>

        	<?php } else  { ?>
	            <div class="row">
	                <div class="col-12">
	                    <div class="mb-2">
		                    <h1>
		                    	<?php
		                    	if (isset ($bc)) {
		                    		echo '<span class="mr-3"><a href="'.site_url (current($bc)).'" title="Back to '.key ($bc).'"><i class="iconsminds-arrow-out-left"></i></a></span>';
		                    	}
		                    	?>
		                    	<?php if (isset($page_title)) echo $page_title; ?>
	                    	</h1>

	                    	<div class="top-right-button-container">
	                    		<?php if (isset ($toolbar_buttons)) { ?>
	                            <div class="btn-group">
	                            	<?php 
	                            	if (isset ($toolbar_buttons['add_new'])) { 
	                            		$add_new = $toolbar_buttons['add_new'];
	                            		?>
		                                <div class="btn btn-primary btn-lg pl-4 pr-0 ">
		                                    <?php echo key ($add_new); ?>
		                                </div>
	                            	<?php } ?>
	                                <button type="button" class="btn btn-lg btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                    <span class="sr-only">Toggle Dropdown</span>
	                                </button>
	                                <div class="dropdown-menu dropdown-menu-right">
	                                    <a class="dropdown-item" href="#">Action</a>
	                                    <a class="dropdown-item" href="#">Another action</a>
	                                </div>
	                            </div>
	                    		<?php } ?>
	                            <div class="btn-group">
	                                <div class="btn btn-primary btn-lg pl-4 pr-0 check-button">
	                                    <label class="custom-control custom-checkbox mb-0 d-inline-block">
	                                        <input type="checkbox" class="custom-control-input" id="checkAll">
	                                        <span class="custom-control-label">&nbsp;</span>
	                                    </label>
	                                </div>
	                                <button type="button" class="btn btn-lg btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                    <span class="sr-only">Toggle Dropdown</span>
	                                </button>
	                                <div class="dropdown-menu dropdown-menu-right">
	                                    <a class="dropdown-item" href="#">Action</a>
	                                    <a class="dropdown-item" href="#">Another action</a>
	                                </div>
	                            </div>
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

	                    <div class="mb-2">
	                        <a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse" href="#displayOptions"
	                            role="button" aria-expanded="true" aria-controls="displayOptions">
	                            Display Options
	                            <i class="simple-icon-arrow-down align-middle"></i>
	                        </a>
	                        <div class="collapse dont-collapse-sm" id="displayOptions">
	                            <span class="mr-3 mb-2 d-inline-blocks d-none float-md-left">
	                                <a href="#" class="mr-2 view-icon active">
	                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 19">
	                                        <path class="view-icon-svg" d="M17.5,3H.5a.5.5,0,0,1,0-1h17a.5.5,0,0,1,0,1Z" />
	                                        <path class="view-icon-svg" d="M17.5,10H.5a.5.5,0,0,1,0-1h17a.5.5,0,0,1,0,1Z" />
	                                        <path class="view-icon-svg" d="M17.5,17H.5a.5.5,0,0,1,0-1h17a.5.5,0,0,1,0,1Z" />
	                                    </svg>
	                                </a>
	                                <a href="#" class="mr-2 view-icon">
	                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 19">
	                                        <path class="view-icon-svg" d="M17.5,3H6.5a.5.5,0,0,1,0-1h11a.5.5,0,0,1,0,1Z" />
	                                        <path class="view-icon-svg"
	                                            d="M3,2V3H1V2H3m.12-1H.88A.87.87,0,0,0,0,1.88V3.12A.87.87,0,0,0,.88,4H3.12A.87.87,0,0,0,4,3.12V1.88A.87.87,0,0,0,3.12,1Z" />
	                                        <path class="view-icon-svg"
	                                            d="M3,9v1H1V9H3m.12-1H.88A.87.87,0,0,0,0,8.88v1.24A.87.87,0,0,0,.88,11H3.12A.87.87,0,0,0,4,10.12V8.88A.87.87,0,0,0,3.12,8Z" />
	                                        <path class="view-icon-svg"
	                                            d="M3,16v1H1V16H3m.12-1H.88a.87.87,0,0,0-.88.88v1.24A.87.87,0,0,0,.88,18H3.12A.87.87,0,0,0,4,17.12V15.88A.87.87,0,0,0,3.12,15Z" />
	                                        <path class="view-icon-svg"
	                                            d="M17.5,10H6.5a.5.5,0,0,1,0-1h11a.5.5,0,0,1,0,1Z" />
	                                        <path class="view-icon-svg"
	                                            d="M17.5,17H6.5a.5.5,0,0,1,0-1h11a.5.5,0,0,1,0,1Z" /></svg>
	                                </a>
	                                <a href="#" class="mr-2 view-icon">
	                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 19">
	                                        <path class="view-icon-svg"
	                                            d="M7,2V8H1V2H7m.12-1H.88A.87.87,0,0,0,0,1.88V8.12A.87.87,0,0,0,.88,9H7.12A.87.87,0,0,0,8,8.12V1.88A.87.87,0,0,0,7.12,1Z" />
	                                        <path class="view-icon-svg"
	                                            d="M17,2V8H11V2h6m.12-1H10.88a.87.87,0,0,0-.88.88V8.12a.87.87,0,0,0,.88.88h6.24A.87.87,0,0,0,18,8.12V1.88A.87.87,0,0,0,17.12,1Z" />
	                                        <path class="view-icon-svg"
	                                            d="M7,12v6H1V12H7m.12-1H.88a.87.87,0,0,0-.88.88v6.24A.87.87,0,0,0,.88,19H7.12A.87.87,0,0,0,8,18.12V11.88A.87.87,0,0,0,7.12,11Z" />
	                                        <path class="view-icon-svg"
	                                            d="M17,12v6H11V12h6m.12-1H10.88a.87.87,0,0,0-.88.88v6.24a.87.87,0,0,0,.88.88h6.24a.87.87,0,0,0,.88-.88V11.88a.87.87,0,0,0-.88-.88Z" />
	                                    </svg>
	                                </a>
	                            </span>
	                            <div class="d-block d-md-inline-block">
	                                <div class="btn-group float-md-left mr-1 mb-1">
	                                    <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button"
	                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                        Order By
	                                    </button>
	                                    <div class="dropdown-menu">
	                                        <a class="dropdown-item" href="#">Action</a>
	                                        <a class="dropdown-item" href="#">Another action</a>
	                                    </div>
	                                </div>
	                                <!-- <div class="search-sm calendar-sm d-inline-block float-md-left mr-1 mb-1 align-top">
	                                    <input class="form-control datepicker" placeholder="Search by day">
	                                </div> -->
                                    <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
	                                    <input id="search-by-name" class="form-control search-by-name" placeholder="Search by name">
	                                </div>
	                            </div>
	                            <div class="float-md-right">
	                                <span class="text-muted text-small">Displaying 1-10 of 210 items </span>
	                                <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button"
	                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                    20
	                                </button>
	                                <div class="dropdown-menu dropdown-menu-right">
	                                    <a class="dropdown-item" href="#">10</a>
	                                    <a class="dropdown-item active" href="#">20</a>
	                                    <a class="dropdown-item" href="#">30</a>
	                                    <a class="dropdown-item" href="#">50</a>
	                                    <a class="dropdown-item" href="#">100</a>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="separator mb-5"></div>
	                </div>
	            </div>
        	<?php } ?>
