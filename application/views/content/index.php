<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title  ?></h1>


	<div class="row">
		<div class="col-lg-6">
			<!-- Approach -->
			<div class="card shadow mb-4">
				<!-- <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Kelola <?= $title  ?></h6>
                </div> -->
				<div class="card-body">
					<?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>'); ?>
					<?= $this->session->flashdata('message'); ?>
					<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Tambah
						Content</a>
					<table class="table table-hover text-center">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Judul</th>
								<th scope="col">Isi</th>
								<th scope="col">Jenis</th>
								<th scope="col">User</th>
								<th scope="col">Aktif</th>
								<th scope="col">Tanggal Dibuat</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1 ?>
							<?php foreach ($content as $m) : ?>
							<tr>
								<th scope="row"><?= $i; ?></th>
								<td><?= $m['judul']; ?></td>
								<td><?= $m['isi']; ?></td>
								<td><?= $m['jenis']; ?></td>
								<td><?= $m['aktif']; ?></td>
								<td><?= $m['date_created']; ?></td>
								<td>
									<a href="<?php echo site_url('Menu/edit_menu/'.$m['id']); ?>"
										class="badge badge-pill badge-success">Ubah</a>
									<a href="<?php echo site_url('Menu/hapus_menu/'.$m['id']); ?>"
										class="badge badge-pill badge-danger">Hapus</a>
								</td>
							</tr>
							<?php $i++; ?>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>


		</div>
		<!-- /.container-fluid -->

	</div>
	<!-- End of Main Content -->

	<!-- Modal -->

	<!-- Modal -->
	<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="newMenuModalLabel">Add New Content</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('content/insert'); ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<input type="text" class="form-control" id="judul" name="judul" placeholder="Nama judul">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="isi" name="isi" placeholder="Nama isi">
						</div>
							<div class="form-group">
						<select name="id_jenis" id="id_jenis" class="form-control custom-select">
							<option value="">Pilih Jenis</option>
							<?php foreach($JenisContent as $m) : ?>
							<option value="<?= $m['id_jenis']; ?>"><?= $m['jenis']; ?></option>
							<!-- pilih id tapi yang ditampilkan adalah nama menunya -->
							<?php endforeach; ?>
						</select></div>
			
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input checked class="custom-control-input" type="checkbox" value="1" id="is_active"
									name="is_active">
								<label class="custom-control-label" for="is_active">
									Aktif?
								</label>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
