<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title  ?></h1>


	<div class="row">
		<div class="col-lg-12">
		<!-- Approach -->
              <div class="card shadow mb-4">
                <!-- <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Kelola <?= $title  ?></h6>
                </div> -->
                <div class="card-body">
                 <?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>'); ?>
    <?= $this->session->flashdata('message'); ?>
		<div class="row d-flex justify-content-center mt-5">
<div class="col-12">
	<div class="card">
		<div class="card-body">
		<div class="card-titile">
			<h3>Form <?= $title  ?></h3>
			<hr>
		</div>
		<?php foreach ($user_sub_menu as $u) {
			
		?>
			<form action=<?php echo site_url('Menu/update_sub_menu'); ?> method="post">
				<div class="container">
					<div class="form-group">
						<label for="id">Id</label>
						<input type="number" class="form-control" readonly  name="id" id="id" value=<?php echo $u->id ?>>
					</div>
					<div class="form-group">
						<label for="menu">Nama Menu</label>
						<!-- <input type="text" class="form-control" name="menu_id" id="menu" value=<?php echo $u->menu_id ?>> -->
						<select name="menu_id" id="menu_id" class="form-control custom-select">
							<?= $aww=$this->db->query("SELECT DISTINCT `user_menu`.*, `user_menu`.`menu`
          					  FROM `user_menu` JOIN `user_sub_menu`")->result(); ?>
							<?php foreach($aww as $key => $value) : 
								if($value->id == $u->menu_id){ ?>
							<option value="<?= $value->id ?>" selected><?= $value->menu;?>
							</option>
							<?php }else{ ?>
							<option value="<?= $value->id ?>"><?= $value->menu;?></option>
						<?php	} endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="nama">Nama Title</label>
						<input type="text" class="form-control" name="title" id="nama" value=<?php echo $u->title ?>>
					</div>
					<div class="form-group">
						<label for="url">Url</label>
						<input type="text" class="form-control" name="url" id="url" value=<?php echo $u->url ?>>
					</div>
					<div class="form-group">
						<label for="icon">Icon</label>
						<input type="text" class="form-control" name="icon" id="icon" value=<?php echo $u->icon ?>>
					</div>
					<div class="form-group">
						<label for="ective">Active</label>
						<!-- <input type="text" class="form-control" name="is_active" id="ective" value=<?php echo $u->is_active ?>> -->
							<select name="is_active" id="is_active" class="form-control custom-select">
						<?php if($u->is_active == '1'){ ?>
						<option value="1" selected>Active</option>
						<option value="0">Not Active</option>
						<?php } else{ ?>
							<option value="1">Active</option>
						<option value="0" selected>Not Active</option>
						<?php } ?>
						</select>
					</div>
                   
                <input type="submit" value="Simpan" class="btn btn-success float-right">
				</div>
			</form>
							<?php } ?>
		</div>
	</div>
</div>
</div>
                </div>
              </div>
    

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
