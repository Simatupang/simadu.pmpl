function terima($dicetak){
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
      location.href = 'proses_terima_dicetak.php?id_dicetak=' + $dicetak;
    }
  })
}

function tolak($dicetak){
  swal({
    title: 'Are you sure?',
    text: "Please give a message",
    type: 'warning',
    input: 'text',
    inputAttributes: {
      autocapitalize: 'off'
    },
    showCancelButton: true,
    showLoaderOnConfirm: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, reject this!',
  }).then((result) => {
    if (result.value) {
      $pesan = result.value;
      location.href = 'proses_tolak_dicetak.php?id_dicetak=' + $dicetak + "&pesan=" + $pesan;
    }
  })
}
