<!-- The Modal -->
<div class="modal fade" id="modal-profil">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Foto Profil</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <!-- Form modal untuk menginputkan data buku -->
              <form action="proses_account_profil.php" method="POST" enctype="multipart/form-data">
                <div class="row">

                  <div class="form-group col-12">
                    <input type="file" class="form-control-file" accept="image/*" name="file_profil" required>
                  </div>

                  <div class="form-group col-12 text-center">
                    <button type="submit" class="btn btn-primary" style="margin-top:5%;">Submit</button>
                  </div>

                </div>
              </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer"></div>

    </div>
  </div>
</div>
