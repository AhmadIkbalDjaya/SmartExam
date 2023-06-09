window.addEventListener('close-modal', event=> {
  $('#createModal').modal('hide')
  $('#editModal').modal('hide')
  $('#deleteModal').modal('hide')
  $('#showModal').modal('hide')
})

// window.addEventListener('show-edit-modal', event=> {
//   $('#editModal').modal('show')
// })