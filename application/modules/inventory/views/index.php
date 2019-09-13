<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"><?=$title?></h3><br/>
    <button type="button" class="btn btn-xs bg-navy btn-flat" data-toggle="modal" data-target="#createItem">Create New Item</button>
    <a href="<?=base_url('inventory/test_pdf')?>" target="_blank" class="btn btn-xs btn-danger btn-flat">
        <i class="fa fa-file-pdf-o"></i> Export All
    </a>
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
				<th>ID</th>
				<th>Items Name</th>
				<th>Description</th>
                <th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($inventory as $row):?>
				<tr>
					<td><?=$row->id?></td>
					<td><?=$row->item_name?></td>
					<td><?=$row->item_desc?></td>
                    <td>
                        <button type="button" class="btn btn-xs btn-success btn-flat" data-toggle="modal" data-target="#editItem<?=$row->id?>">Edit</button>
                        <!-- EDIT ITEM MODAL -->
                        <div class="modal fade" id="editItem<?=$row->id?>">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Edit Item</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                    <?php echo form_open("inventory/update_item/".$row->id);?>
                                        <?php
                                        $id = $row->id;

                                        if ($row->id == $id) { ?>
                                        <div class="form-group col-lg-6">
                                            <label for="">Item Name</label>
                                            <input type="text" class="form-control" id="item_name" value="<?=$row->item_name?>" name="item_name" placeholder="Item Name">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="">Description</label>
                                            <input type="text" class="form-control" id="item_desc" value="<?=$row->item_desc?>" name="item_desc" placeholder="Item Description">
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                <?php echo form_close();?>
                            </div>
                            <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /EDIT ITEM MODAL -->

                        <button type="button" class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="#deleteItem<?=$row->id?>">Delete</button>
                        <!-- MODAL DELETE ITEM -->
                        <div class="modal fade" id="deleteItem<?=$row->id?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Delete Group <?=$row->item_name?></h4>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure want to delete <?=$row->item_desc?>?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <a href="<?=base_url('inventory/delete_item/'.$row->id)?>" class="btn btn-danger">Yes, delete it!</a>
                                </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- END MODAL DELETE ITEM -->                    
                    </td>
				</tr>
			<?php endforeach;?>
			</tbody>
			<tfoot>
				<tr>
                    <th>ID</th>
                    <th>Items Name</th>
                    <th>Description</th>
                    <th>Action</th>
				</tr>
			</tfoot>
			</table>
		</div>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    Footer
  </div>
  <!-- /.box-footer-->
</div>
<!-- /.box -->
<!-- NEW ITEM MODAL -->
<div class="modal fade" id="createItem">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Create New Item</h4>
        </div>
        <div class="modal-body">
            <div class="row">
            <?php echo form_open("inventory/create_item");?>
                <div class="form-group col-lg-6">
                    <label for="">Item Name</label>
                    <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Item Name">
                </div>
                <div class="form-group col-lg-6">
                    <label for="">Description</label>
                    <input type="text" class="form-control" id="item_desc" name="item_desc" placeholder="Item Description">
                </div>
            
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        <?php echo form_close();?>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /NEW ITEM MODAL -->

</section>
<!-- /.content -->