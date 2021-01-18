 function agregarCategoria(){
    var categoria=$('#nombreCategoria').val();

         if(categoria==""){
              swal("Debes agregar una categoria");
              return false;
         }else{
              $.ajax({
                   type:"POST",
                   data:"categoria="+ categoria,
                   url:"../procesos/categorias/agregarCategoria.php",
                   success:function(respuesta) {
                        respuesta=respuesta.trim();
                        if(respuesta==1){
                         $("#tablaCategorias").load("categorias/tablaCategoria.php");
                             $('#nombreCategoria').val("");
                             swal("Agregado con exito","success");
                        }else{
                         swal("Fallo al agregar", "Error");
                        }
                        
                   }


              });
         }
}

function eliminarCategoria(idCategoria){
     idCategoria=parseInt(idCategoria);
     if(idCategoria<1){
          swal("no tienes id de categoria");
          return false;

     }else{
          //
          swal({
               title: "Seguro que quieres eliminar esta categoria?",
               text: "Si la elimnas no podras eliminarla",
               icon: "warning",
               buttons: true,
               dangerMode: true,
             })
             .then((willDelete) => {
               if (willDelete) {
                    $.ajax({
                         type:"POST",
                         data:"idCategoria=" + idCategoria,
                         url:"../procesos/categorias/eliminarCategoria.php",
                         success:function(respuesta){
                              respuesta=respuesta.trim();
                            if(respuesta==1){
                              $("#tablaCategorias").load("categorias/tablaCategoria.php");
                              swal("Eliminado con exito", {
                                    icon:"success",
                                   });

                            }else{
                                 swal("Fallo al eliminar","error");
                            }

                         }
                    });
               
               } 
             });
          //
     }

}

function obtenerDatosCategoria(idCategoria){
     $.ajax({
          type:"POST",
          data:"idCategoria= "+idCategoria,
          url:"../procesos/categorias/obtenerCategoria.php",
          success:function(respuesta){
               console.log(respuesta);
              respuesta=jQuery.parseJSON(respuesta);
              $('#idCategoria').val(respuesta['idCategoria']);
              $('#categoriaU').val(respuesta['nombreCategoria']);

      
          }
     });

}

function actualizaCategoria(){
     if($('#categoriaU').val()=="" ){
          swal("no hay categoria");
          return false;
     }
     else{

          $.ajax({
               type:"POST",
               data: $('#frmActualizaCategoria').serialize(),
               url:"../procesos/categorias/actualizarCategoria.php",
               success:function(respuesta){
                    console.log(respuesta);
                    respuesta=respuesta.trim();
                    if(respuesta==1){
                         $("#tablaCategorias").load("categorias/tablaCategoria.php");
                         swal("Actualizado con exito", "","success");
                         $('#modalActualizarCategoria').modal('toggle');

                    }else{
                         swal("Fallo al actualizar", "error");


                    }

               }
          });

     }
}