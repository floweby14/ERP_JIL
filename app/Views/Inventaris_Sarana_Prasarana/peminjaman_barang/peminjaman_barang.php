<div class="col-12">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<div class="container mt-4">
					<div class="d-flex justify-content-between align-items-center mb-3">
						<h1></h1>
						<?php  if(session()->get('level')== 5 || session()->get('level')== 6) { ?>
							<button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">
								<i class="fa-solid fa-plus"></i> Tambah
							</button>
						<?php }else{} ?>
						<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-xl">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Apakah anda yakin ingin menambah data ini?</h4>
										<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
									</div>
									<form id="imageForm" class="form-horizontal form-label-left" action="<?= base_url('Inventaris_Sarana_Prasarana/tambah_peminjaman')?>" method="post">
										<div class="modal-body">
											<style>
												@keyframes blink {
													0% {
														opacity: 1;
													}
													50% {
														opacity: 0;
													}
													100% {
														opacity: 1;
													}
												}
												.blinking-icon {
													animation: blink 1s infinite;
												}
											</style>
											<div class="alert alert-info" role="alert">
												<i class="fa-solid fa-triangle-exclamation blinking-icon"></i> 
												Apabila anda menginput data peminjaman anda tidak dapat menghapus dan mengubah data lagi.
											</div>
											<div class="row">
												<div class="mb-3 col-md-6">
									                <label class="form-label">Nama Barang<span style="color: black;"> :</span></label>
									                <select name="id_barang" class="form-control text-capitalize" id="id_barang" required autocomplete="on" onchange="updateTotalHarga()">
									                    <option disabled selected>~ Pilih Nama Barang ~</option>
									                    <?php foreach ($p as $barang) {?>
									                        <option class="text-capitalize" value="<?php echo $barang->id_barang ?>" data-harga="<?php echo $barang->nama_barang ?>"><?php echo $barang->nama_barang ?> - <?php echo $barang->jumlah ?> Barang Tersedia</option>
									                    <?php } ?>
									                </select>
									            </div>
									            <div class="mb-3 col-md-6">
									                <label class="form-label">Stok Barang<span style="color: black;"> :</span></label>
									                <input type="number" id="stok" name="stok" class="form-control text-capitalize" placeholder="Stok Barang" autocomplete="on">
									            </div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Kembali</button>
												<button type="submit" class="btn btn-success">Iya, Tambah</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>

					<table id="example" class="table items-table table table-bordered table-striped verticle-middle table-responsive-sm" style="min-width: 100%">
						<thead>
							<tr>
								<th style="text-align: center;">Nama Barang</th>
								<th style="text-align: center;">Stok Peminjaman</th>
								<th style="text-align: center;">Input By</th>
								<th style="text-align: center;">Input Date (Peminjaman)</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no=1;
							foreach ($data as $dataa){?>
								<tr>
									<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->nama_barang?></td>
									<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->stok?> Barang</td>
									<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->username?></td>
									<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->tanggal_pp?></td>
								</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
