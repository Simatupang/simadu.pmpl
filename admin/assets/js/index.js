$(document).ready(function() {
  $('#example').DataTable({
    "columns": [
      { "width": "7%"},
      { "width": "7%"},
      null,
      null,
      null,
      null,
      null,
      null,
      { "width": "7%"}
    ],
    "order": [[ 0, "desc" ]]
  });

});

function terima($pembayaran){
  swal({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, accept this!'
  }).then((result) => {
    if (result.value) {
      location.href = 'proses_terima_pembayaran.php?id_pembayaran=' + $pembayaran;
    }
  })
}

function tolak($pembayaran){
  swal({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, reject this!'
  }).then((result) => {
    if (result.value) {
      location.href = 'proses_tolak_pembayaran.php?id_pembayaran=' + $pembayaran;
    }
  })
}
