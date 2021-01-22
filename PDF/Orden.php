<!DOCTYPE html>
<html>
<head>
    <title>Cafeteria Cannela Mx</title>

    <!--jquery-->
    <script src="jquery-3.5.1.min.js"></script>

    <script type="text/javascript">
        function productoSelected(total, producto){
            var cantidad = prompt("¿Cuántos pedidos de este producto desea ordenar?");
            if(isNaN(cantidad) || cantidad == ""){
                alert("Por favor introduzca una cantidad válida >:c");
            }else if(!(cantidad == null) ){
                var nuevo = total;

                var previo = $('#total').val()            
                if(previo == ""){
                    previo = 0;
                }
                $('#total').val(parseFloat(previo) + (parseFloat(nuevo) * cantidad));

                //$('#mail').val("tdwdavid76@gmail.com");

                if( $('#numOrder').val() == ""){
                    $('#numOrder').val(Math.floor(Math.random() * (9999 - 1) + 1));
                }
                

                $('#submit')
                    .show(100);
                $('#borrar')
                    .show(100);

                $('#label1').show(100);
                $('#label2').show(100);
                $('#label3').show(100);
                $('#label4').show(100);
                $('#TituloTicket').show(100);
                $('#TicketData').show(100);

                $('#total').show(100);   
                $('#mail').show(100);
                $('#numOrder').show(100);
                $('#msj').show(100);
                var lista = $('#msj').val();
               $('#msj').val(lista + producto + ".........." + cantidad + "\n"); 
            }
        }

        function borrarOrden(){
            $('#total').val("");     
            //$('#mail').val("");
            $('#numOrder').val("");
            $('#msj').val("");
 
            $('#total').hide();     
            $('#mail').hide();
            $('#numOrder').hide();
            $('#msj').hide();
 

            $('#label1').hide();
            $('#label2').hide();
            $('#label3').hide();
            $('#label4').hide();
            $('#TicketData').hide();
            $('#TituloTicket').hide();

            $("#submit").hide();
            $("#borrar").hide();
       
        }
    </script>

    <link rel="stylesheet" type="text/css" href="OrdenEstilos.css">
</head>
<body>

    <?php session_start(); ?>
    
    <div id="Container" class="container">
    <div id="Titulo" class="titulo">
            <h1>Ordene algo directamente a Caf&eacute; Cannela Mx!</h1>
            <h3>Es f&aacute;cil y r&aacute;pido</h3>
            <p class="descripcion">Selecciona los productos que vas a ordenar, haz click en ellos y selecciona la cantidad, posteriormente, ve hasta la aparte abajo y da click en comprar, se te mandara tu ticket a tu mail y 
            cuando vayas a recoger tu pedido &uacute;nicamente tendr&aacute;s que presentar tu ticket!!</p>
        </div>
        <div id="Pedidos" style="height: 100%">
            <div id="Row" class="row">
                <div id="Producto" class="producto" onclick="productoSelected(50, 'Frapuccino')">                  
                    <img src="Orden_Images/Frapuccino3.png" class="img-prod" alt="Imagen del producto" />


                    <div id="Frapuccino" class="info">
                      
                        <h2>Frapuccino</h2>
                        <h4 id="totalFrapuccino">Precio: $50.00</h4>
                        <p> Se compone de caf&eacute; u otro ingrediente de base, mezclado con hielo y otros ingredientes diversos, coronado con crema batida. </p>
                    </div>
                </div>

                <div id="Producto2" class="producto" onclick="productoSelected(45, 'Macchiato')">                  
                    <img src="Orden_Images/Macchiato3.jpg" class="img-prod" alt="Imagen del producto" />

                    <div id="Macchiato" class="info">
                      
                        <h2>Macchiato</h2>
                        <h4 id="totalMacchiato">Precio: $45.00</h4>
                        <p> Es un caf&eacute; cortado t&iacute;pico de Italia, consiste en un expreso con una peque&ntilde;a cantidad de leche caliente y espumada. Es muy bueno.
                        </p>
                    </div>
                </div>    
            </div>

            <div id="Row2" class="row">
                <div id="Producto3" class="producto" onclick="productoSelected(325, 'Cheesecake')">                  
                    <img src="Orden_Images/Cheesecake.jpg" class="img-prod" alt="Imagen del producto" />


                    <div id="Cheesecake" class="info">
                      
                        <h2 id="totalCheesecake">New York Cheesecake</h2>
                        <h4>Precio: $325.00</h4>
                        <p> Delicioso Cheescake estilo New York, preparado por los mejores maestros panaderos y reposteros de la CDMX, puede ser preparado con frutos rojos o &uacute;nicamente con fresa.</p>
                    </div>
                </div>

                <div id="Producto4" class="producto" onclick="productoSelected(78, 'Bombas de chocolate')">                  
                    <img src="Orden_Images/Bombas.jpg" class="img-prod" alt="Imagen del producto" />

                    <div id="Bombas" class="info">
                      
                        <h2>Bombas de chocolate</h2>
                        <h4 id="totalBombas">Precio: $78.00</h4>
                        <p> Deliciosos chocolates de chocolate abuelita o cacao, Matcha y malvaviscos
                            Hechas de chocolate blanco con leche y semi amargo si las quieres de regalo, ordena tu cajita con o sin decoraci&oacute;n.</p>
                    </div>
                </div>    
            </div>

            <div id="Row3" class="row">
                <div id="Producto5" class="producto" onclick="productoSelected(50, 'Cafe')">                  
                    <img src="Orden_Images/Cafe.jpg" class="img-prod" alt="Imagen del producto" />


                    <div id="Cafe" class="info">
                      
                        <h2 id="precioCafe">Caf&eacute; con leche</h2>
                        <h4>Precio: $50.00</h4>
                        <p> Caf&eacute; con leche. Lleva caf&eacute; y leche, as&iacute; que es caf&eacute; con leche. Un cl&aacute;sico, de veras, caf&eacute;s hay muchos, pero con leche pocos, tiene 
                        la cantidad perfecta de caf&eacute;. Y leche.</p>
                    </div>
                </div>

                <div id="Producto6" class="producto" onclick="productoSelected(500, 'Pastel')">                  
                    <img src="Orden_Images/Pastel.jpg" class="img-prod" alt="Imagen del producto" />

                    <div id="Pastel" class="info">
                      
                        <h2>Pastel navide&ntilde;o</h2>
                        <h4 id="precioPaste">Precio: $500.00</h4>
                        <p> Que se puede decir, Navidad nunca pasa de moda. Delicioso pastel navide&ntilde;o incluso si es Halloween, nada mejor para degustar junto a un cl&aacute;sico caf&eacute; con leche,
                        ya sabes, el que lleva caf&eacute; y leche</p>
                    </div>
                </div>    
            </div>

        </div>

        </div>

        

        <div id="TicketData" class="ticket-data" style="display: none;">
            <form method="post" name="form" action="OrdenPDF.php">
                
                <div id="TituloTicket" class="titulo"  style="display: none;">
                    <h1>Imprima su ticket!</h1>
                </div>

                <div id="contenidoForm" class="row">


                    <div class="form-elem">
                        <label id="label1" style="display: none;">No. de Orden: </label>
                        
                        <input type="number" name="numOrder" id="numOrder" readonly="readonly" class="data-orden noselect" style="display: none;" >

                    </div>
                    <br /><br />
                    <div class="form-elem">
                        <label id="label2" style="display: none;">Correo de usuario: </label>
                        <?php 
                            //echo $_SESSION['email'];
                            echo '<input type="email" name="mail" id="mail" readonly="readonly" class="data-orden noselect" value="'.$_SESSION['email'].'" style="display: none;">';

                        ?>
                            
                    </div>
                    <br /><br />
                    <div class="form-elem">
                        <label id="label3" style="display: none;">Total a pagar en MXN: </label>
                        <input type="number" name="total" id="total" readonly="readonly" class="data-orden noselect" style="display: none;">
                        
                    </div>
                    <br /><br />
                </div>
                <label id="label4" style="display: none;">Lista de productos: </label>
                <textarea id="msj" name="msj" readonly="readonly" class="data-list" rows="10" style="display: none;"></textarea>
                <br /><br />
                <input type="hidden" name="opt" value="5" />    
                <input type="submit" value="Enviar Ticket" class="btn-publicar" id="submit" name="submit" >
                <input type="button" value="Borrar orden" class="btn-publicar" id="borrar" name="borrar" onclick="borrarOrden()">
            </form>
        </div>
    </div>
</body>
</html>