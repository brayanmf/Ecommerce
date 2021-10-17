document.addEventListener('DOMContentLoaded', function () {
    

    $.ajax({
        type: "post",
        url:"ajax/leercarrito.php",
        dataType: "json",
        success: function(response){
            llenarcarrito(response);  /*que no se pierda la cookies y este relleno en el head ,php */  
        }
    })
    $.ajax({
        type: "post",
        url:"ajax/leercarrito.php",
        dataType: "json",
        success: function(response){
            vertablacarrito(response);  /*que no se pierda la cookies y este relleno pero en la tabla ,php */  
        }
    })
    var $xd=0;
    var Arraycantidad = []
    var Arrayprecio = []
    var subtotal = []

    function vertablacarrito(response){
       $("#tablacarrito tbody").text("")/*asegurarnos q este limpio para agregar otro*/
        var Total=0;
        response.forEach(element => {
        
            var precio=parseFloat(element['precio']);
            var totalp=element['cantidad']*precio;/*total */
            Total=Total+totalp;/*todo total */
        
            $("#tablacarrito tbody").append(
                `<tr><td><img src="${element['web_path']}" class="img-size-50"> </td>
                <td>${element['nombre']} </td>
                <td>${element['cantidad']}
                <button type="button" class="btn-xs btn-primary" id="mas" data-id="${element['id']}" data-tipo="mas">+</button>
                <button type="button" class="btn-xs btn-danger" id="menos" data-id="${element['id']}" data-tipo="menos">-</button>
                </td>
                <td>$${(precio).toFixed(2)} </td>
              
           
                <td>$${(totalp).toFixed(2)} </td>
               <td> <a href="javascript:location.reload()"  class="text-danger" id="borrar" data-id="${element['id']}"> <i class="fa fa-trash" ></i></a></td>
            
              
            </tr> `
            );
            Arraycantidad.push(element['cantidad'])
            Arrayprecio.push(precio)
            subtotal.push(totalp)

        });

    
        $xd=Total   
       let a= document.getElementById("total")
       a.setAttribute("value",$xd)
       let b=document.getElementById("cantidad")
        b.setAttribute("value",Arraycantidad)
        let c=document.getElementById("precio")
        c.setAttribute("value",Arrayprecio)
        let d=document.getElementById("subtotal")
        d.setAttribute("value",subtotal)
        
    
           
       
    


        $("#tablacarrito tbody").append(
            `<tr>
                <td colspan="4" class="text-right"><strong>Total :</strong></td>
                <td>$${(Total).toFixed(2)}<t/d>
                <td><t/d>
            </tr>`
        )
     
    }





    $(document).on("click","#mas,#menos",function(e){
        e.preventDefault();
        var id=$(this).data('id');
        var tipo=$(this).data('tipo');
    
        $.ajax({
            type: "post",
            url:"ajax/cantidadproducto.php",
            data:{"id":id,"tipo":tipo},
            dataType: "json",
            success: function(response){
                vertablacarrito(response);
                llenarcarrito(response);
                
            }
        })
    });
    $(document).on("click","#borrar",function(e){
        e.preventDefault();
        var id=$(this).data('id');
        $.ajax({
            type: "post",
            url:"ajax/borrarproducto.php",
            data:{"id":id},
            dataType: "json",
            success: function(response){
               /*solo actulizamos*/
            }    
        })
        location.reload();
    });
    $("#agregarcarrito").click(function(e){
        e.preventDefault();
        var id=$(this).data('id');
        var nombre=$(this).data('nombre');
        var web_path=$(this).data('web_path');
        var cantidad=$('#cantidadp').val();/*lo recibe del input */
        var precio=$(this).data('precio');
        $.ajax({
            type: "post",
            url:"ajax/agregarcarrito.php",
            data:{"id":id,"nombre":nombre,"web_path":web_path,"cantidad":cantidad,"precio":precio},
            dataType: "json",
            success: function(response){
                llenarcarrito(response);
                $("#badgeproducto").hide(500).show(500).hide(500).show(500).hide(500).show(500);
                $("#badgeproducto").click();

                
            }
        })
        
    });

    function llenarcarrito(response){
        var cuantosp=Object.keys(response).length;/*cuenta nuestros prod ,del array*/
        if(cuantosp>0){
        $("#badgeproducto").text(cuantosp);/*conteo de pro = carrito */
    }else{
            $("#badgeproducto").text("")
        }

        $("#listacarrito").text("");/*asegurarnos q este limpio para agregar otro*/
        response.forEach(element => {
            $("#listacarrito").append(/*`compatible para llevar variables y el html ",' */
            `<a href="index.php?modulo=mercado-detalle&id=${element['id']}" class="dropdown-item">
                <div class="media">
                    <img src="${element['web_path']}" alt="imagen de producto" class="img-size-50 mr-3 img-circle">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">${element['nombre']}
                            <span class="float-right text-sm text-primary">
                                <i class="fas fa-eye"></i>
                            </span>
                        </h3>
                        <p class="text-sm">Cantidad : ${element['cantidad']}</p>
                    </div>
                </div>
            </a>
            <div class="dropdown-divider"></div>`
            );
         
      
        });
        /*------agrega el html para borrar---- */
        $("#listacarrito").append(
            `<a href="index.php?modulo=carrito" class="dropdown-item dropdown-footer text-primary" id="ver">Ver Carrito
            <i class="fa fa-cart-plus"></i>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer text-danger" id="borrarcarrito">Borrar Carrito
            <i class="fa fa-trash"></i>
            </a>`);

    }
  
    $(document).on("click","#borrarcarrito",function(e){
    /*$("#borrarcarrito").click(function(e){  por alguna razon jquery no funciono y es por q el doc se est manipulando*/
        e.preventDefault();
        $.ajax({
            type: "post",
            url:"ajax/borrarcarrito.php",

            dataType: "json",
            success: function(response){
             /*borramos y actualizmos*/
            

            }
         
        })
        location.reload();
        
    })
    $.ajax({
        type: "post",
        url:"ajax/leercarrito.php",

        dataType: "json",
        success: function(response){
         /*borramos y actualizmos*/
        
         vertablapasarela(response);
        }
        })

        function vertablapasarela(response){
            $("#tablapasarela tbody").text("")/*asegurarnos q este limpio para agregar otro*/
             var Total=0;
             response.forEach(element => { 

                 var precio=parseFloat(element['precio']);
                var totalp=element['cantidad']*precio;/*total */
                 Total=Total+totalp;/*todo total */
                 $("#tablapasarela tbody").append(
                     `<tr><td><img src="${element['web_path']}" class="img-size-50"> </td>
                     <td>${element['nombre']} </td>
                     <td>${element['cantidad']}
                     </td>
                     <td>$${(precio).toFixed(2)} </td>
                   
                
                     <td>$${(totalp).toFixed(2)} 
                  
                     </td>
                  
                   
                 </tr> `
                 );
     
     
             });
             
        $("#tablapasarela tbody").append(
            `<tr>
                <td colspan="4" class="text-right"><strong>Total :</strong></td>
                <td>$${(Total).toFixed(2)}</td>          
            </tr>`

        )

       


 }



    
        

 /*******************************************************************************************/
    var nombrerec=$("#nombrerec").val();
    var emailrec=$("#emailrec").val();
    var direccionrec=$("#direccionrec").val();
    $("#jalar").click(function (e){
        var nombrecli=$("#nombrecli").val();
        var emailcli=$("#emailcli").val();
        var direccioncli=$("#direccioncli").val();
        if($(this).prop("checked")==true){  
            $("#nombrerec").val(nombrecli);
            $("#emailrec").val(emailcli);
            $("#direccionrec").val(direccioncli);
            }else{
            $("#nombrerec").val(nombrerec);/*vacio */
            $("#emailrec").val(emailrec);
            $("#direccionrec").val(direccionrec);
            }
        
    });

 






});
 
   


/*$(window).on("load",function(){
    var URLactual = window.location;*/
  
/*if(URLactual=="http://localhost/ecommerce1/index.php?modulo=pasarela"){
    alert(URLactual+"?"+a)
}*/






    
        
            





