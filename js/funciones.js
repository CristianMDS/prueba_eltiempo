$('.Crear').click((e) => { 
    window.open('vista/creacion.php', 'creacion', 'width=600,height=400');
});

$('.Probar').click((e) => { 
    window.location.href = 'controlador/extras/prueba.php' ;
});

$('.DB').click(function (e) { 
    window.location.href = 'controlador/extras/bd.php';
    
});

function editar(id){
    window.open('vista/edicion.php?id='+id, 'edicion', 'width=600,height=400');
}

function eliminar(id){
    window.open('controlador/eliminar_producto.php?id='+id, 'edicion', 'width=600,height=400');
}

