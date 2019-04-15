<!-- The Modal -->
<div class="modal fade" id="modal-edit<?php echo $buku['id_buku']; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Buku</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <!-- Form modal untuk menginputkan data buku -->
              <form action="proses_edit_data_buku.php?id_buku=<?php echo $buku['id_buku']; ?>" method="POST" enctype="multipart/form-data">
                <div class="row">

                  <div class="form-group col-12">
                    <h6 class="font-weight-bold">Data Buku</h6>
                  </div>

                  <div class="form-group col-12">
                    <label for="">Judul:</label>
                    <input type="text" class="form-control" name="judul" value="<?php echo $buku['judul']; ?>" required>
                  </div>

                  <div class="form-group col-12">
                    <label for="">Sinopsis:</label>
                    <textarea class="form-control" name="sinopsis" required><?php echo $buku['sinopsis']; ?></textarea>
                  </div>

                  <div class="form-group col-md-4 col-sm-12">
                    <label for="">Jumlah Halaman Isi:</label>
                    <input type="number" class="form-control" name="jum_hal" value="<?php echo $buku['jum_hal']; ?>" required min="1" step="1">
                  </div>

                  <div class="col-12 text-right">
                    <button type="submit" class="btn btn-warning" style="color: white;">Update</button>
                  </div>

                </div>
              </form>

              <form action="proses_edit_file_sampul_buku.php?id_buku=<?php echo $buku['id_buku']; ?>" method="POST" enctype="multipart/form-data">
                <div class="row">

                  <div class="form-group col-12">
                    <h6 class="font-weight-bold">File Sampul Buku</h6>
                  </div>

                  <div class="form-group col-12">
                    <label for="">File Sampul Buku: <b><?php echo $buku['file_sampul']; ?></b></label>
                    <input type="file" class="form-control-file" accept=".pdf" name="file_sampul" required>
                  </div>

                  <div class="col-12 text-right">
                    <button type="submit" class="btn btn-warning" style="color: white;">Update</button>
                  </div>

                </div>
              </form>

              <form action="proses_edit_file_isi_buku.php?id_buku=<?php echo $buku['id_buku']; ?>" method="POST" enctype="multipart/form-data">
                <div class="row">

                  <div class="form-group col-12">
                    <h6 class="font-weight-bold">File Isi Buku</h6>
                  </div>

                  <div class="form-group col-12">
                    <label for="">File Isi Buku: <b><?php echo $buku['file_buku']; ?></b></label>
                    <input type="file" class="form-control-file" accept=".pdf" name="file_buku" required>
                  </div>

                  <div class="col-12 text-right">
                    <button type="submit" class="btn btn-warning" style="color: white;">Update</button>
                  </div>

                </div>
              </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer"></div>

    </div>
  </div>
</div>
