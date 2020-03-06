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
		<?php foreach ($user_menu as $u) {
			
		?>
			<form action=<?php echo site_url('Menu/update'); ?> method="post">
				<div class="container">
					<div class="form-group">
						<label for="id">Id</label>
						<input type="number" class="form-control" readonly  name="id" id="id" value=<?php echo $u->id ?>>
					</div>
					<div class="form-group">
						<label for="nama">Nama Menu</label>
						<input type="text" class="form-control" placeholder="ex: Iqbal Mahatma" name="menu" id="nama" value=<?php echo $u->menu ?>>
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
