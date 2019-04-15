<!-- The Modal -->
<div class="modal fade" id="modal-create">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Admin</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <!-- Form modal untuk menginputkan data buku -->
              <form action="proses_create_admin.php" method="POST">
                <div class="row">

                  <div class="form-group col-12">
                    <label for="">Email:</label>
                    <input type="email" class="form-control" name="email" required>
                  </div>

                  <div class="form-group col-12">
                    <label for="">Password:</label>
                    <input type="password" class="form-control" name="password" required>
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
