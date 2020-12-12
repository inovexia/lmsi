        </div>
    </main>


    <footer class="page-footer">
        <div class="footer-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <p class="mb-0 text-muted">ColoredStrategies 2019</p>
                    </div>
                    <div class="col-sm-6 d-none d-sm-block">
                        <ul class="breadcrumb pt-0 pr-0 float-right">
                            <li class="breadcrumb-item mb-0">
                                <a href="#" class="btn-link">Review</a>
                            </li>
                            <li class="breadcrumb-item mb-0">
                                <a href="#" class="btn-link">Purchase</a>
                            </li>
                            <li class="breadcrumb-item mb-0">
                                <a href="#" class="btn-link">Docs</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="<?php echo base_url(THEME_PATH . 'assets/js/vendor/jquery-3.3.1.min.js'); ?>"></script>
    <script src="<?php echo base_url(THEME_PATH . 'assets/js/vendor/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url(THEME_PATH . 'assets/js/vendor/perfect-scrollbar.min.js'); ?>"></script>
    <script src="<?php echo base_url(THEME_PATH . 'assets/js/vendor/mousetrap.min.js'); ?>"></script>
    <script src="<?php echo base_url(THEME_PATH . 'assets/js/dore.script.js'); ?>"></script>
    <script src="<?php echo base_url(THEME_PATH . 'assets/js/scripts.single.theme.js'); ?>"></script>
    <!-- Toastr JS for notifications -->
    <script type="text/javascript" src="<?php echo base_url (THEME_PATH . 'assets/js/toastr.min.js'); ?>"></script>

    <!-- Default JS (Must be loaded befaore app.js) -->
    <script type="text/javascript" src="<?php echo base_url (THEME_PATH . 'assets/js/default.js'); ?>"></script>
    <!-- Application JS -->
    <script type="text/javascript" src="<?php echo base_url (THEME_PATH . 'assets/js/app.js?ver=1.5'); ?>"></script>
    <!-- Custom Js file -->
    <script type="text/javascript" src="<?php echo base_url (THEME_PATH . 'assets/js/custom.js'); ?>"></script>

    <!-- Custom JS (Dynamically included) -->
    <?php
    if (isset ($script)) {
        echo $script;
    }

    //$this->load->view ('templates/common/scripts');
    ?>  
</body>

</html>