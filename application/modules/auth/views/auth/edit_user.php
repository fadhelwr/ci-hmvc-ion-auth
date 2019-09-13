<!-- Main content -->
<section class="content col-lg-6">

      <!-- Default box -->
      <div class="box">
            <div class="box-header with-border">
                  <h3 class="box-title">Edit User <small class="text-danger"><?php echo lang('edit_user_subheading');?></small></h3>
                  <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                              title="Collapse">
                        <i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                  </div>
            </div>
            <div class="box-body">
            <?php echo form_open(uri_string());?>
                  <div class="form-group col-lg-6">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" value="<?=$user->first_name?>" placeholder="First Name">
                  </div>
                  <div class="form-group col-lg-6">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" value="<?=$user->last_name?>" placeholder="Last Name">
                  </div>
                  <div class="form-group col-lg-6">
                        <label for="exampleInputEmail1">Company Name</label>
                        <input type="text" class="form-control" name="company" value="<?=$user->company?>" id="company" placeholder="Company Name">
                  </div>
                  <div class="form-group col-lg-6">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" class="form-control" name="phone" value="<?=$user->phone?>" id="phone" placeholder="Phone">
                  </div>
                  <div class="form-group col-lg-6">
                        <label for="exampleInputEmail1">Password (if changing password) </label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                  </div>
                  <div class="form-group col-lg-6">
                        <label for="exampleInputEmail1">Confirm Password (if changing password) </label>
                        <input type="text" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm Password">
                  </div>
                  <div class="form-group col-sm-6">
                        <?php if ($this->ion_auth->is_admin()): ?>
                              <?php foreach ($groups as $group):?>
                              <label class="col-lg-6">
                              <?php
                                    $gID=$group['id'];
                                    $checked = null;
                                    $item = null;
                                    foreach($currentGroups as $grp) {
                                    if ($gID == $grp->id) {
                                          $checked= ' checked="checked"';
                                    break;
                                    }
                                    }
                              ?>
                              <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                              </label>
                              <?php endforeach?>
                        <?php endif ?>

                        <?php echo form_hidden('id', $user->id);?>
                        <?php echo form_hidden($csrf); ?>
                  </div>
                  <div class="form-group col-lg-6">
                        <input type="submit" value="Update" class="btn btn-primary btn-sm form-control">
                  </div>
            <?php echo form_close();?>
            </div>
      </div>
</section>

<!--<h1><?php echo lang('edit_user_heading');?></h1>
<p><?php echo lang('edit_user_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(uri_string());?>

      <p>
            <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </p>

      <p>
            <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </p>

      <p>
            <?php echo lang('edit_user_company_label', 'company');?> <br />
            <?php echo form_input($company);?>
      </p>

      <p>
            <?php echo lang('edit_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>
      </p>

      <p>
            <?php echo lang('edit_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </p>

      <p>
            <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
            <?php echo form_input($password_confirm);?>
      </p>

      <?php if ($this->ion_auth->is_admin()): ?>

      <h3><?php echo lang('edit_user_groups_heading');?></h3>
      <?php foreach ($groups as $group):?>
            <label class="checkbox">
            <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                  if ($gID == $grp->id) {
                        $checked= ' checked="checked"';
                  break;
                  }
                  }
            ?>
            <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
            <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
            </label>
      <?php endforeach?>

      <?php endif ?>

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>

      <p><?php echo form_submit('submit', lang('edit_user_submit_btn'));?></p>

<?php echo form_close();?>-->
