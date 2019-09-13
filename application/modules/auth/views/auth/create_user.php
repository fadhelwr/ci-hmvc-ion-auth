<!-- Main content -->
<section class="content col-lg-6">

      <!-- Default box -->
      <div class="box">
            <div class="box-header with-border">
                  <h3 class="box-title"><?php echo lang('create_user_heading');?> <small class="text-danger"><?php echo lang('create_user_subheading');?></small></h3>
                  <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                              title="Collapse">
                        <i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                  </div>
            </div>
            <div class="box-body">
            <?php echo form_open("auth/create_user");?>
                  <div class="form-group col-lg-6">
                        <label for="">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                  </div>
                  <div class="form-group col-lg-6">
                        <label for="">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                  </div>
                  <?php
                  if($identity_column!=='email') { ?>

                        <label for=""><?php echo lang('create_user_identity_label');?></label>
                        <input type="text" class="form-control" name="identity" id="identity" placeholder="Email">
                        <?=form_error('identity');?>
                  <?php }?>
                  <div class="form-group col-lg-6">
                        <label for="">Company Name</label>
                        <input type="text" class="form-control" name="company" id="company" placeholder="Company Name">
                  </div>
                  <div class="form-group col-lg-6">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                  </div>
                  <div class="form-group col-lg-6">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                  </div>
                  <div class="form-group col-lg-6">
                        <label for="">Confirm Password</label>
                        <input type="text" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm Password">
                  </div>
                  <div class="form-group col-lg-6">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                  </div>
                  <div class="form-group col-lg-6">
                        <label>&nbsp;</label>
                        <input type="submit" value="Save" class="btn btn-primary btn-sm form-control">
                  </div>
            <?php echo form_close();?>
            </div>
      </div>
</section>

<!--<h1><?php echo lang('create_user_heading');?></h1>
<p><?php echo lang('create_user_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_user");?>

      <p>
            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </p>

      <p>
            <?php echo lang('create_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </p>
      
      <?php
      if($identity_column!=='email') {
          echo '<p>';
          echo lang('create_user_identity_label', 'identity');
          echo '<br />';
          echo form_error('identity');
          echo form_input($identity);
          echo '</p>';
      }
      ?>

      <p>
            <?php echo lang('create_user_company_label', 'company');?> <br />
            <?php echo form_input($company);?>
      </p>

      <p>
            <?php echo lang('create_user_email_label', 'email');?> <br />
            <?php echo form_input($email);?>
      </p>

      <p>
            <?php echo lang('create_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>
      </p>

      <p>
            <?php echo lang('create_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </p>

      <p>
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
            <?php echo form_input($password_confirm);?>
      </p>


      <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>

<?php echo form_close();?>-->
