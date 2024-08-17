$('.Crear').click((e) => { 
    window.open('vista/creacion.php', 'creacion', 'width=600,height=400');
});

$('.Probar').click((e) => { 
    window.location.href = 'controlador/extras/prueba.php' ;
});

$('.DB').click(function (e) { 
    window.location.href = 'controlador/extras/create_bd.php';
    
});

function editar(id){
    window.open('vista/edicion.php?id='+id, 'edicion', 'width=600,height=400');
}

function eliminar(id){
    $.post("controlador/eliminar_producto.php", { "id": id },
        function (d) {
            if(d.trim() === 'yes'){
                Swal.fire({
                    title: "¡Eliminado!",
                    icon: "success",
                    text: "El producto fue eliminado exitosamente"
                }).then((e) => {
                    if(e.isConfirmed)
                        window.location.reload();
                });
            }
        },
        "HTML"
    );
}

