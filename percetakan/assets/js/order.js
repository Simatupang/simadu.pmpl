function selesai($dicetak){
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
      location.href = 'proses_selesai_dicetak.php?id_dicetak=' + $dicetak;
    }
  })
}
