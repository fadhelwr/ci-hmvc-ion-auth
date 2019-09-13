<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Data User</h3>&nbsp;&nbsp;&nbsp;
		<a href="<?=base_url('auth/create_user')?>" class="btn btn-success btn-xs btn-flat">Crate New User</a>
		<button type="button" class="btn btn-xs bg-navy btn-flat" data-toggle="modal" data-target="#createGroup">Create New Group</button>
		<small id="infoMessage"><?php echo $message;?></small>
		<div class="box-tools pull-right">
		<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
				title="Collapse">
			<i class="fa fa-minus"></i></button>
		<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
			<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<div class="table-responsive">
			<table class="table table-bordered table-striped display">
			<thead>
			<tr>
				<th><?php echo lang('index_fname_th');?></th>
				<th><?php echo lang('index_lname_th');?></th>
				<th><?php echo lang('index_email_th');?></th>
				<th><?php echo lang('index_groups_th');?></th>
				<th><?php echo lang('index_status_th');?></th>
				<th><?php echo lang('index_action_th');?></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($users as $user):?>
				<tr>
					<td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
					<td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
					<td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
					<td>
						<?php foreach ($user->groups as $group):?>
							<?php if($group->name == "admin") { ?>
								<button class="btn btn-xs bg-navy btn-flat" data-toggle="modal" data-target="#editGroup<?=$group->id?>"><?=$group->name?></button>
							<?php } else { ?>
								<button class="btn btn-xs btn-warning btn-flat" data-toggle="modal" data-target="#editGroup<?=$group->id?>"><?=$group->name?></button>
							<?php } ?>

							<!-- MODAL EDIT GROUP -->
							<div class="modal fade" id="editGroup<?=$group->id?>">
								<div class="modal-dialog">
									<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title"><?php echo lang('edit_group_heading');?> | <small><?php echo lang('edit_group_subheading');?></small></h4>
									</div>
									<div class="modal-body">
									<?php echo form_open("auth/edit_group/".$group->id);?>
										<div class="form-group">
											<label>Group Name</label>
											<input type="text" value="<?=$group->name?>" class="form-control" name="group_name" id="group_name" />
										</div>
										<div class="form-group">
											<label>Description</label>
											<input type="text" value="<?=$group->description?>" class="form-control" name="group_description" id="group_description" />
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
										<input type="submit" class="btn btn-primary"/>
									</div>
									<?php echo form_close();?>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- END MODAL EDIT GROUP -->
						<?php endforeach?>
					</td>
					<td>
						<?php if($user->active == 1) { ?>
							<button type="button" class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#modal-default<?=$user->id?>">
								Active
							</button>
							<!-- MODAL DEACTIVATE USER -->
							<div class="modal fade" id="modal-default<?=$user->id?>">
								<div class="modal-dialog">
									<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title"><?php echo lang('deactivate_heading');?> | <small><?php echo sprintf(lang('deactivate_subheading'), $user->username);?>?</small></h4>
									</div>
									<div class="modal-body">
									<?php echo form_open("auth/deactivate/".$user->id);?>
										<div class="form-group">
											<div class="radio">
												<label class="col-lg-12">
												<input type="radio" name="confirm" value="yes" checked="checked" />
												Yes, deactivate user!
												</label>
											</div>
											<div class="radio">
												<label class="col-lg-12">
												<input type="radio" name="confirm" value="no" />
												No, don't do that!
												</label>
											</div>
										</div>

										<?php echo form_hidden($csrf); ?>
  										<?php echo form_hidden(['id' => $user->id]); ?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
										<input type="submit" class="btn btn-primary"/>
									</div>
									<?php echo form_close();?>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- END MODAL DEACTIVATE USER -->

							
							<!-- MODAL CREATE GROUP -->
							<div class="modal fade" id="createGroup">
								<div class="modal-dialog">
									<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title"><?php echo lang('create_group_heading');?> | <small><?php echo lang('create_group_subheading');?></small></h4>
									</div>
									<div class="modal-body">
									<?php echo form_open("auth/create_group");?>
										<div class="form-group">
											<label>Group Name</label>
											<input type="text" class="form-control" name="group_name" />
										</div>
										<div class="form-group">
											<label>Description</label>
											<input type="text" class="form-control" name="description" />
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
										<input type="submit" class="btn btn-primary"/>
									</div>
									<?php echo form_close();?>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- END MODAL CREATE GROUP -->
						<?php } else { ?>
							<a href="<?=base_url('auth/activate/'.$user->id)?>" class="btn btn-xs btn-default btn-flat">Non-active</a>
						<?php } ?>
					</td>

					<td>
						<a href="<?=base_url('auth/edit_user/'.$user->id)?>" class="btn btn-xs btn-success btn-flat">Edit</a>
						<a class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#deleteUser<?=$user->id?>">Delete</a>
						<!-- MODAL DELETE USER -->
						<div class="modal fade" id="deleteUser<?=$user->id?>">
							<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title">Delete User <?=$user->username?></h4>
								</div>
								<div class="modal-body">
									<p>Are you sure want to delete <?=$user->username?>?</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
									<a href="<?=base_url('auth/delete_user/'.$user->id)?>" class="btn btn-danger">Yes, delete it!</a>
								</div>
								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<!-- END MODAL DELETE USER -->
					</td>
				</tr>
			<?php endforeach;?>
			</tbody>
			<tfoot>
				<tr>
					<th><?php echo lang('index_fname_th');?></th>
					<th><?php echo lang('index_lname_th');?></th>
					<th><?php echo lang('index_email_th');?></th>
					<th><?php echo lang('index_groups_th');?></th>
					<th><?php echo lang('index_status_th');?></th>
					<th><?php echo lang('index_action_th');?></th>
				</tr>
			</tfoot>
			</table>
		</div>
	</div>
	<!-- /.box-body -->
	<div class="box-footer">
		<span class="pull-right hidden-xs">HMVC Ion_Auth CodeIgniter 3.1.10</span>
	</div>
	<!-- /.box-footer-->
	</div>
	<!-- /.box -->


	<!-- Default box -->
	<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Group List</h3>

		<div class="box-tools pull-right">
		<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
				title="Collapse">
			<i class="fa fa-minus"></i></button>
		<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
			<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
	<table class="table table-bordered table-striped display table-responsive">
		<thead>
			<tr>
				<th>Group Name</th>
				<th>Description</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($groups as $group):?>
			<tr>
				<td><?=$group->name?></td>
				<td><?=$group->description?></td>
				<td>
					<button class="btn btn-xs bg-navy btn-flat" data-toggle="modal" data-target="#editGroup<?=$group->id?>">Edit</button>
					<button class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#deleteGroup<?=$group->id?>">Delete</button>
					<!-- MODAL DELETE USER -->
					<div class="modal fade" id="deleteGroup<?=$group->id?>">
						<div class="modal-dialog">
							<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Delete Group <?=$group->name?></h4>
							</div>
							<div class="modal-body">
								<p>Are you sure want to delete <?=$group->name?>?</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
								<a href="<?=base_url('auth/delete_group/'.$group->id)?>" class="btn btn-danger">Yes, delete it!</a>
							</div>
							</div>
							<!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
					</div>
					<!-- END MODAL DELETE USER -->		
				</td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>
	</div>
	<!-- /.box-body -->
	<div class="box-footer">
		Group list
	</div>
	<!-- /.box-footer-->
	</div>
	<!-- /.box -->

</section>
<!-- /.user content -->

<!-- 
<h1><?php echo lang('deactivate_heading');?></h1>
<p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></p>

<?php echo form_open("auth/deactivate/".$user->id);?>

  <p>
  	<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
    <input type="radio" name="confirm" value="yes" checked="checked" />
    <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
    <input type="radio" name="confirm" value="no" />
  </p>

  <?php echo form_hidden($csrf); ?>
  <?php echo form_hidden(['id' => $user->id]); ?>

  <p><?php echo form_submit('submit', lang('deactivate_submit_btn'));?></p>

<?php echo form_close();?>	
	
	
<h1><?php echo lang('index_heading');?></h1>
<p><?php echo lang('index_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<table cellpadding=0 cellspacing=10>
	<tr>
		<th><?php echo lang('index_fname_th');?></th>
		<th><?php echo lang('index_lname_th');?></th>
		<th><?php echo lang('index_email_th');?></th>
		<th><?php echo lang('index_groups_th');?></th>
		<th><?php echo lang('index_status_th');?></th>
		<th><?php echo lang('index_action_th');?></th>
	</tr>
	<?php foreach ($users as $user):?>
		<tr>
            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
			<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                <?php endforeach?>
			</td>
			<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
			<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
		</tr>
	<?php endforeach;?>
</table>

<p><?php echo anchor('auth/create_user', lang('index_create_user_link'))?> | <?php echo anchor('auth/create_group', lang('index_create_group_link'))?></p>-->