<!-- The Modal -->
<div class="modal fade" id="modal-payments<?php echo $id_dicetak; ?>">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h6 class="modal-title text-center">Upload Bukti Pembayaran</h6>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body text-left">
        <!-- Form modal untuk menginputkan data buku -->
              <form action="proses_payments_upload.php?id_dicetak=<?php echo $id_dicetak; ?>" method="POST" enctype="multipart/form-data">
                <div class="row">

                  <input type="number" class="form-control" name="total" value="<?php echo $price; ?>" required hidden>

                  <div class="form-group col-12">
                    <label for="">Metode Pembayaran:</label>
                    <select class="form-control text-secondary tulisan" name="metode_pembayaran" required>
                      <option value="BNI">BNI (Bank Negara Indonesia)</option>
                      <option value="BRI">BRI (Bank Rakyat Indonesia)</option>
                      <option value="Mandiri">Bank Mandiri</option>
                      <option value="BCA">BCA (Bank Central Asia)</option>
                    </select>
                  </div>

                  <div class="form-group col-12">
                    <label for="">File Bukti Pembayaran:</label>
                    <input type="file" class="form-control-file" accept="image/*" name="file_bukti" required>
                  </div>

                  <div class="form-group col-12 text-center">
                    <button type="submit" class="btn btn-sm btn-primary" style="margin-top:5%;">Submit</button>
                  </div>

                </div>
              </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer"></div>

    </div>
  </div>
</div>
