<!-- The Modal -->
<div class="modal fade" id="modal-create">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Buku</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <!-- Form modal untuk menginputkan data buku -->
              <form action="proses_create_buku.php" method="POST" enctype="multipart/form-data">
                <div class="row">

                  <div class="form-group col-12">
                    <label for="">Judul:</label>
                    <input type="text" class="form-control" name="judul" required>
                  </div>

                  <div class="form-group col-12">
                    <label for="">Sinopsis:</label>
                    <textarea class="form-control" name="sinopsis" required></textarea>
                  </div>

                  <div class="form-group col-12">
                    <label for="">File Sampul Buku:</label>
                    <input type="file" class="form-control-file" accept=".pdf" name="file_sampul" required>
                  </div>

                  <div class="form-group col-12">
                    <label for="">File Isi Buku:</label>
                    <input type="file" class="form-control-file" accept=".pdf" name="file_buku" required>
                  </div>

                  <div class="form-group col-md-4 col-sm-12">
                    <label for="">Jumlah Halaman Isi:</label>
                    <input type="number" class="form-control" name="jum_hal" required min="1" step="1">
                  </div>

                  <div class="col-12 text-right">
                    <button type="submit" class="btn btn-dark">Submit</button>
                  </div>

                </div>
              </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer"></div>

    </div>
  </div>
</div>
