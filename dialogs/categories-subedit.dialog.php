<?php
/*
 * Version: 1.0, 31.05.2012
 * by Adam Wysocki, goldpaid777@gmail.com
 *
 * Copyright (c) 2012 Adam Wysocki
 *
 *	This is core connector class
 *
*/

# SET DATA -------------------
$once->set_data(array(
	"id" => intval($_GET['id'])
));

# GET DATA -------------------
$data=$once->once_select_item(strtolower($_GET['module']).'_categories');

# GET DATA -------------------
$once->category_get(strtolower($_GET['module']));

# GET DATA -------------------
$categories=$once->category_get_roots();

if(!isset($_GET['nomodal'])){
echo '
<div id="subcategory-data" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-id="'.$_GET['id'].'">';
}
?>
	<div class="container">
		<div class="modal-dialog" style="width: 100%;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><i class="fa fa-bug"></i> Edit subcategory</h4>
				</div>
				<div class="modal-body">
					<div class="row tab-header">
						<div class="col-md-12">
							<ul class="nav nav-tabs">
								<li role="presentation" class="active"><a href="#tab_information" aria-controls="tab_information" role="tab" data-toggle="tab">General information</a></li>
							</ul>
						</div>
					</div>
					<div class="row tab-body">
						<div class="col-md-12">
							<div class="tab-content">
								<div class="tab-pane active" id="tab_information">
									<div class="row">
										<div class="col-md-12">
											<form id="subcategoryForm" method="post">
												<div class="col-md-6">
													<div class="form-group">
														<label for="title">Name</label>
														<input type="text" value="<?php echo $data['item']['name'];?>" class="form-control" name="name" placeholder="Enter name">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="ico">Ico</label>
														<input type="text" value="<?php echo $data['item']['ico'];?>" class="form-control" name="ico" placeholder="Enter ico">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label for="title">Title</label>
														<input type="text" value="<?php echo $data['item']['title'];?>" class="form-control" name="title" placeholder="Enter title" disabled>
													</div>
												</div>
												<!--
												<div class="col-md-4">
													<div class="form-group">
														<label>Parent category</label>
														<select class="form-control save-select" name="parent_id" data-parent_id="<?php echo $data['item']['parent_id'];?>">
															<option value="0" selected disabled>Root categories trees</option>
															<?php echo $once->category_display_select_tree(0, 0);?>
														</select>
													</div>
												</div>
												-->
												<div class="col-md-12">
													<div class="form-group">
														<label for="keywords">Keywords</label>
														<input type="text" value="<?php echo $data['item']['keywords'];?>" class="form-control" name="keywords" placeholder="Enter keywords" disabled>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label for="description">Description</label>
														<textarea class="form-control" name="description" placeholder="Enter description" cols="10" rows="10" disabled><?php echo $data['item']['description'];?></textarea>
													</div>
												</div>
												<input type="submit" class="hidden">
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer clearfix">
					<button class="btn btn-primary pull-left item-save" type="submit"><i class="fa fa-check"></i> Save</button>
					<button type="button" class="btn btn-danger item-close" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
				</div>
			</div>
		</div>
	</div>
<?php
if(!isset($_GET['nomodal'])){
	echo '
	</div>';
}
?>
<script type="text/javascript">
	$(document).ready(function () {
		// Initialize actions
		once.categories.actions.subcategoryEdit($(this));
	});
</script>
<div id="item-edit"></div>