<!-- The Modal -->
<div class="modal fade" id="modal-payments-edit<?php echo $id_dicetak; ?>">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h6 class="modal-title text-center">Edit Bukti Pembayaran</h6>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body text-left">
        <!-- Form modal untuk menginputkan data buku -->
              <form action="proses_payments_upload_edit.php?id_pembayaran=<?php echo $pembayaran['id_pembayaran']; ?>" method="POST" enctype="multipart/form-data">
                <div class="row">

                  <input type="number" class="form-control" name="total" value="<?php echo $price; ?>" required hidden>

                  <div class="form-group col-12">
                    <label for="">Metode Pembayaran:</label>
                    <select class="form-control text-secondary tulisan" name="metode_pembayaran" required>
                      <option value="BNI" <?php if ($pembayaran['metode_pembayaran']=="BNI") echo "selected"; ?>>
                        BNI (Bank Negara Indonesia)
                      </option>
                      <option value="BRI" <?php if ($pembayaran['metode_pembayaran']=="BRI") echo "selected"; ?>>
                        BRI (Bank Rakyat Indonesia)
                      </option>
                      <option value="Mandiri" <?php if ($pembayaran['metode_pembayaran']=="Mandiri") echo "selected"; ?>>
                        Bank Mandiri
                      </option>
                      <option value="BCA" <?php if ($pembayaran['metode_pembayaran']=="BCA") echo "selected"; ?>>
                        BCA (Bank Central Asia)
                      </option>
                    </select>
                  </div>

                  <div class="form-group col-12">
                    <label for="">File Bukti Pembayaran:</label>
                    <input type="file" class="form-control-file" accept="image/*" name="file_bukti" required>
                  </div>

                  <div class="form-group col-12 text-center">
                    <button type="submit" class="btn btn-sm btn-warning" style="margin-top:5%; color: white;">Update</button>
                  </div>

                </div>
              </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer"></div>

    </div>
  </div>
</div>
