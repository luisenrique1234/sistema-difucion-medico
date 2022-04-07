function alereliminar(codigo) {

    Swal.fire({
title: '<h3>¿Estas Segura de eliminar el ID:'+codigo+'?</h3>',
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#20558A',
confirmButtonText: '<h5>Sí <i class="fa fa-user-times" aria-hidden="true"></i></h5>',
cancelButtonText: '<h5>Cancelar <i class="fa fa-times" aria-hidden="true"></i></h5>'
})
.then((result) => {
if (result.value) {
window.location.href = '../php/tablas_mantenimiento.php?accion=DLT&id='+codigo
}
}); 


}

function alerpublicele(codigo3) {

    Swal.fire({
title: '<h3>¿Estas Segura de eliminar el ID:'+codigo3+'?</h3>',
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#20558A',
confirmButtonText: '<h5>Sí <i class="fa fa-user-times" aria-hidden="true"></i></h5>',
cancelButtonText: '<h5>Cancelar <i class="fa fa-times" aria-hidden="true"></i></h5>'
})
.then((result) => {
if (result.value) {
window.location.href = '../php/tablas_mantenimiento.php?accion=DLTPU&id='+codigo3
}
}); 


}

function alerconfe(codigo3) {

    Swal.fire({
title: '<h3>¿Estas Segura de eliminar el ID:'+codigo3+'?</h3>',
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#20558A',
confirmButtonText: '<h5>Sí <i class="fa fa-user-times" aria-hidden="true"></i></h5>',
cancelButtonText: '<h5>Cancelar <i class="fa fa-times" aria-hidden="true"></i></h5>'
})
.then((result) => {
if (result.value) {
window.location.href = '../php/tablas_mantenimiento.php?accion=DLTCON&id='+codigo3
}
}); 


}

function aleractivar2(codigo2) {

    Swal.fire({
title: '<h3>¿Estas seguro de Activar  el ID:'+codigo2+'?</h3>',
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#20558A',
confirmButtonText: '<h5>Sí <i class="fa fa-user-plus" aria-hidden="true"></i></h5>',
cancelButtonText: '<h5>Cancelar <i class="fa fa-times" aria-hidden="true"></i></h5>'
})
.then((result) => {
if (result.value) {
window.location.href = '../php/tablas_mantenimiento.php?accion=ACTME&id='+codigo2
}
}); 


}

function aleractivarpu(codigo2) {

  Swal.fire({
title: '<h3>¿Estas seguro de Activar  el ID:'+codigo2+'?</h3>',
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#20558A',
confirmButtonText: '<h5>Sí <i class="fa fa-user-plus" aria-hidden="true"></i></h5>',
cancelButtonText: '<h5>Cancelar <i class="fa fa-times" aria-hidden="true"></i></h5>'
})
.then((result) => {
if (result.value) {
window.location.href = '../php/tablas_mantenimiento.php?accion=ACTPU&id='+codigo2
}
}); 


}

function aleracticonfe(codigo2) {

  Swal.fire({
title: '<h3>¿Estas seguro de Activar  el ID:'+codigo2+'?</h3>',
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#20558A',
confirmButtonText: '<h5>Sí <i class="fa fa-user-plus" aria-hidden="true"></i></h5>',
cancelButtonText: '<h5>Cancelar <i class="fa fa-times" aria-hidden="true"></i></h5>'
})
.then((result) => {
if (result.value) {
window.location.href = '../php/tablas_mantenimiento.php?accion=ACTICONFE&id='+codigo2
}
}); 


}

function alerarol(codigo2) {

    Swal.fire({
title: '<h3>¿Estas seguro de Activar  el ID:'+codigo2+'?</h3>',
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#20558A',
confirmButtonText: '<h5>Sí <i class="fa fa-user-plus" aria-hidden="true"></i></h5>',
cancelButtonText: '<h5>Cancelar <i class="fa fa-times" aria-hidden="true"></i></h5>'
})
.then((result) => {
if (result.value) {
window.location.href = '../php/tablas_mantenimiento.php?accion=DLTROL&id='+codigo2
}
}); 


}

function aleraespci(codigo2) {

    Swal.fire({
title: '<h3>¿Estas seguro de Activar  el ID:'+codigo2+'?</h3>',
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#20558A',
confirmButtonText: '<h5>Sí <i class="fa fa-user-plus" aria-hidden="true"></i></h5>',
cancelButtonText: '<h5>Cancelar <i class="fa fa-times" aria-hidden="true"></i></h5>'
})
.then((result) => {
if (result.value) {
window.location.href = '../php/tablas_mantenimiento.php?accion=DLTESP&id='+codigo2
}
}); 


}

function alertaactivar() {

    Swal.fire({
title: '<h3>¿Estas seguro de cerrar sesión?</h3>',
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#20558A',
confirmButtonText: '<h5>Salir</h5>',
cancelButtonText: '<h5>Cancelar</h5>'
})
.then((result) => {
if (result.value) {
window.location.href = '../bd/logout2.php'
}
}); 


}



function alercerrarsision() {

  Swal.fire({
title: '<h3>¿Estas seguro de cerrar sesión?</h3>',
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#20558A',
confirmButtonText: '<h5>Salir</h5>',
cancelButtonText: '<h5>Cancelar</h5>'
})
.then((result) => {
if (result.value) {
window.location.href = '../bd/logout2.php'
}
}); 


}

/*<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert2@7.0.9/dist/sweetalert2.all.js"></script>*/

               /* $(".confirm").click(function(e) {
  e.preventDefault(); // Prevent the href from redirecting directly
  var linkURL = $(this).attr("href");
  warnBeforeRedirect(linkURL);
});

function warnBeforeRedirect(linkURL) {
  swal({
    title: "¿Estas seguro de Eliminar este usuario?",
    text: "" + linkURL,
    type: "warning",
    showCancelButton: true,
    confirmButtonText: 'Sí <i class="fa fa-user-times" aria-hidden="true"></i>',
        cancelButtonText: 'Cancelar <i class="fa fa-times" aria-hidden="true"></i>',
  }).then(function(result) {
    console.log(result);
    if (result.value) {
      window.location.href = linkURL;
    }
  });
}*/
