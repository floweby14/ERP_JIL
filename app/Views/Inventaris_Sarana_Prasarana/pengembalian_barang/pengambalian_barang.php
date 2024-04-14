<div class="col-12">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<div class="container mt-4">
					<table id="example" class="table items-table table table-bordered table-striped verticle-middle table-responsive-sm" style="min-width: 100%">
						<thead>
							<tr>
								<th style="text-align: center;">Username</th>
								<th style="text-align: center;">Nama Barang</th>
								<th style="text-align: center;">Tanggal Peminjaman</th>
								<th style="text-align: center;">Tanggal Pengembalian</th>
								<th style="text-align: center;">Status</th>
								<th style="text-align: center;">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no=1;
							foreach ($data as $dataa){?>
								<tr>
									<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->username?></td>
									<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->nama_barang?> - <?php echo $dataa->stok?> Barang</td>
									<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->tanggal_pp?></td>
									<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->tanggal_pengembalian?></td>
									<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->status?></td>
								<?php 
								if ((session()->get('level') == 5 || session()->get('level') == 6) && $dataa->status == "Barang Belum Dikembalikan") { ?>
								    <td style="text-align: center;">
								        <a onclick="openPengembalian('<?= base_url('/Inventaris_Sarana_Prasarana/aksi_pengembalian_barang/'.$dataa->id_pp )?>')" class="mx-2">
								            <button type="button" class="btn btn-success">
								                <i class="fa-solid fa-check"></i>
								            </button>
								        </a>
								    </td>
								<?php } elseif ((session()->get('level') >= 1 && session()->get('level') <= 3) && $dataa->status == "Barang Dikembalikan") { ?>
								    <td style="text-align: center;">
								        <a onclick="openDiterima('<?= base_url('/Inventaris_Sarana_Prasarana/aksi_barang_diterima/'.$dataa->id_pp )?>')" class="mx-2">
								            <button type="button" class="btn btn-success">
								                <i class="fa-solid fa-check"></i>
								            </button>
								        </a>
								    </td>	
								<?php } elseif (in_array(session()->get('level'), [1, 2, 3, 4, 5, 6]) && $dataa->status == "Barang Telah Diterima") { ?>
								    <td style="text-align: center;"></td>
								<?php } else {} ?>
								<td style="text-align: center;"></td>

									<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

									<div class="modal fade" id="pengembalian_barang" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
												</div>
												<div class="modal-body text-center">
													<i class="fa-solid fa-triangle-exclamation" style="font-size: 80px; color: #FFA500;"></i>
													<h1></h1><br>
													<h5>Apakah anda yakin ingin mengembalikan barang?</h5>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary light" data-bs-dismiss="modal">Kembali</button>
													<a id="Pengembalian" href="#">
														<button type="button" class="btn btn-danger">Iya, Kembalikan Barang Ini</button>
													</a>
												</div>
											</div>
										</div>
									</div>
									<script>
										function openPengembalian(pengembalian_brg) {
											document.getElementById('Pengembalian').href = pengembalian_brg;
											$('#pengembalian_barang').modal('show');
										}
									</script>

									<div class="modal fade" id="barang_diterima" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
												</div>
												<div class="modal-body text-center">
													<i class="fa-solid fa-triangle-exclamation" style="font-size: 80px; color: #FFA500;"></i>
													<h1></h1><br>
													<h5>Apakah anda yakin ingin menerima barang ini?</h5>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary light" data-bs-dismiss="modal">Kembali</button>
													<a id="Pengembaliann" href="#">
														<button type="button" class="btn btn-danger">Iya, Barang Telah Diterima</button>
													</a>
												</div>
											</div>
										</div>
									</div>
									<script>
										function openDiterima(brg_diterima) {
											document.getElementById('Pengembaliann').href = brg_diterima;
											$('#barang_diterima').modal('show');
										}
									</script>
								</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
