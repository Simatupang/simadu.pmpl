<?php
  session_start();
  if (empty($_SESSION['login_admin']) || $_SESSION['role_admin'] != "superadmin"){
    header('Location: login.php');
  }
  include "../config.php";
  // $_SESSION['page'] = 'home';
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Chiko Books - Admin</title>
    <?php include "../cdn.php"; ?>

    <link href="../assets/img/logo.png" rel="shortcut icon">
    <link href="../assets/css/primary.css" rel="stylesheet">
    <link href="assets/css/navbar.css" rel="stylesheet">
    <link href="assets/css/admin.css" rel="stylesheet">
  </head>

  <body>

    <div class="row">

      <?php include "navbar.php"; ?>

      <div class="col-10">
        <br>
        <div class="container">
          <h3>Paper Page</h3>
          <hr>

          <!-- Button to Open the Modal -->
          <div class="row">
          	<div class="col-12 text-right">
          			<button type="button" class="btn btn-info create" data-toggle="modal" data-target="#modal-create">
          				Create
          			</button>
          		</div>
          </div>

          <?php include "admin_create.php"; ?>

          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
          			<th>ID Admin</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
              </tr>
            </thead>
          	<tbody>
          		<?php
                $line = "SELECT * FROM admin WHERE id_admin<>" . $_SESSION['login_admin'];
                $query = mysqli_query($conn, $line);
                while ($admin = mysqli_fetch_array($query, MYSQLI_ASSOC)):
              ?>
          			<tr>
          				<td><?php echo $admin['id_admin']; ?></td>
          				<td><?php echo $admin['email']; ?></td>
          				<td><?php echo $admin['password']; ?></td>
          				<td>

          					<a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit<?php echo $admin['id_admin']; ?>">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-danger" onclick="del('<?php echo $admin['id_admin']; ?>');">
                      <i class="fa fa-trash act"></i>
                    </a>

          				</td>
          			</tr>
              <?php include "admin_edit.php"; ?>
              <?php endwhile; ?>
          	</tbody>
          	<tfoot>
              <tr>
                <th>ID Admin</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>

        </div>
      </div>

    </div>

    <!-- Pemanggilan Javascript  -->
    <script src="assets/js/admin.js"></script>
  </body>
</html>
