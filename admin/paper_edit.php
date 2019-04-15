<!-- The Modal -->
<div class="modal fade" id="modal-edit<?php echo $kertas['id_kertas']; ?>">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Kertas</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <!-- Form modal untuk menginputkan data buku -->
              <form action="proses_edit_paper.php?id_kertas=<?php echo $kertas['id_kertas']; ?>" method="POST">
                <div class="row">

                  <div class="form-group col-12">
                    <label for="">Jenis:</label>
                    <input type="text" class="form-control" name="jenis" value="<?php echo $kertas['jenis']; ?>" required>
                  </div>

                  <div class="form-group col-12">
                    <label for="">Harga:</label>
                    <input type="number" class="form-control" name="harga" value="<?php echo $kertas['harga']; ?>" required min="1" step="1">
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
