<div id="loading"></div>
<div id="script" data-load="login.init" class="bg-gradient-primary boddy">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background: url('<?php echo base_url($login_page_image); ?>');>"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><?php echo lang('login_heading'); ?></h1>
                                    </div>
                                    <?php echo form_open(base_url('admin/login/submit'), ['id' => 'login-form', 'data-fail' => lang('ajax_request_error')]); ?>
                                        <div class="form-group">
                                            <input type="identity" name="identity" class="form-control form-control-user"
                                                   id="InputIdentity" aria-describedby="identityHelp"
                                                   placeholder="<?php echo lang('login_identity_label'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                   id="InputPassword" placeholder="<?php echo lang('login_password_label'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" name="remember-me" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck"><?php echo lang('login_remember_label'); ?></label>
                                            </div>
                                        </div>
                                        <button id="login-btn" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <?php if($login_with_google != 0) { ?>
                                            <a href="index.html" class="btn btn-google btn-user btn-block">
                                                <i class="fab fa-google fa-fw"></i> Login with Google
                                            </a>
                                        <?php } ?>
                                        <?php if($login_with_facebook != 0) { ?>
                                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                                <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                            </a>
                                        <?php } ?>
                                    <?php echo form_close(); ?>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html"><?php echo lang('login_forgot_password'); ?></a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html"><?php echo lang('create_user_heading'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

