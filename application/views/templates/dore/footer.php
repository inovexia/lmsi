        </div>
        </div>
        </div>
        <?php echo isset ($right_sidebar) ? $right_sidebar : null; ?>
        </main>
        <footer class="page-footer">
          <div class="footer-content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <p class="mb-0 text-muted">Product of <a href="https://inovexiasoftware.com" target="_blank">ISSPL</a>
                  </p>
                </div>
                <div class="col-sm-6 d-none d-sm-block">
                  <ul class="breadcrumb pt-0 pr-0 float-right">
                    <li class="breadcrumb-item mb-0">
                      <a href="#" class="btn-link">Docs</a>
                    </li>
                    <li class="breadcrumb-item mb-0">
                      <a href="#" class="btn-link">Support</a>
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
        <script src="<?php echo base_url(THEME_PATH . 'assets/js/vendor/select2.full.js'); ?>"></script>
        <script src="<?php echo base_url(THEME_PATH . 'assets/js/vendor/mousetrap.min.js'); ?>"></script>
        <script src="<?php echo base_url(THEME_PATH . 'assets/js/dore.script.js'); ?>"></script>
        <script src="<?php echo base_url(THEME_PATH . 'assets/js/scripts.single.theme.js'); ?>"></script>
        <!-- Toastr JS for notifications -->
        <script type="text/javascript" src="<?php echo base_url (THEME_PATH . 'assets/js/toastr.min.js'); ?>"></script>
        <!-- Default JS (Must be loaded befaore app.js) -->
        <script type="text/javascript" src="<?php echo base_url (THEME_PATH . 'assets/js/default.js'); ?>"></script>
        <!-- Application JS -->
        <script type="text/javascript" src="<?php echo base_url (THEME_PATH . 'assets/js/app.js?ver=1.5'); ?>"></script>
        <?php
  // Custom JS (Dynamically included) 
  if (isset ($script_footer) && !empty ($script_footer)) :
    foreach ($script_footer as $script_path) :
      echo '<script src="'.base_url(THEME_PATH . $script_path).'" type="text/javascript"></script>';
    endforeach;
  endif;
  // Custom JS with PHP
  echo isset ($script)? $script : null;
  // $this->load->view ('templates/common/scripts');
  ?>
        </body>

        </html>