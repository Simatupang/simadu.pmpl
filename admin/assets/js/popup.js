function popupSuccess($data){
  swal({
    type: 'success',
    title: $data
  })
}

function popupError($data){
  swal({
    type: 'error',
    title: $data
  })
}
