<!-- The Modal -->
<div class="modal fade" id="modal-create">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Kertas</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <!-- Form modal untuk menginputkan data buku -->
              <form action="proses_create_paper.php" method="POST">
                <div class="row">

                  <div class="form-group col-12">
                    <label for="">Jenis:</label>
                    <input type="text" class="form-control" name="jenis" required>
                  </div>

                  <div class="form-group col-12">
                    <label for="">Harga:</label>
                    <input type="number" class="form-control" name="harga" required min="1" step="1">
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
