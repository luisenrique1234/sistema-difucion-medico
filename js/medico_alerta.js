function alercerrarme() {

    Swal.fire({
  title: '<h3>¿Estas seguro de cerrar sesión?</h3>',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#45bcdb',
  confirmButtonText: '<h5>Salir</h5>',
  cancelButtonText: '<h5>Cancelar</h5>'
  })
  .then((result) => {
  if (result.value) {
  window.location.href = 'bd/logout.php'
  }
  }); 
  
  
}

function alereliminarinv(codigo) {

    Swal.fire({
title: '<h3>¿Estas seguro de eliminar esta Investigacion?</h3>',
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#45bcdb',
confirmButtonText: '<h5>Sí <i class="fa fa-user-times" aria-hidden="true"></i></h5>',
cancelButtonText: '<h5>Cancelar <i class="fa fa-times" aria-hidden="true"></i></h5>'
})
.then((result) => {
if (result.value) {
window.location.href = 'php/pcientifico.php?accion=DLT&id='+codigo
}
}); 


}

function alereliminarpub(codigo) {

    Swal.fire({
title: '<h3>¿Estas seguro de eliminar esta Publicación?</h3>',
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#45bcdb',
confirmButtonText: '<h5>Sí <i class="fa fa-user-times" aria-hidden="true"></i></h5>',
cancelButtonText: '<h5>Cancelar <i class="fa fa-times" aria-hidden="true"></i></h5>'
})
.then((result) => {
if (result.value) {
window.location.href = 'php/public.php?accion=DLT&id='+codigo
}
}); 


}