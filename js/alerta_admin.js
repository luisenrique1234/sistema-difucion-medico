function aleratadmin(codigo2) {

    Swal.fire({
title: '<h3>¿Estas seguro de Desactivar  el ID:'+codigo2+'?</h3>',
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#20558A',
confirmButtonText: '<h5>Sí <i class="fa fa-user-plus" aria-hidden="true"></i></h5>',
cancelButtonText: '<h5>Cancelar <i class="fa fa-times" aria-hidden="true"></i></h5>'
})
.then((result) => {
if (result.value) {
window.location.href = '../php/reg_admin.php?accion=DLT&id='+codigo2
}
}); 


}
