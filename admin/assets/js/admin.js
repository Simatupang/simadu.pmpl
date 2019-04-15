$(document).ready(function() {
  $('#example').DataTable({
    "columns": [
      null,
      null,
      null,
      null
    ],
    "order": [[ 0, "desc" ]]
  });

});

function del($admin){
  swal({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.value) {
      location.href = 'proses_delete_admin.php?id_admin=' + $admin;
    }
  })
}
