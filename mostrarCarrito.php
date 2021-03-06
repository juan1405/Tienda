<!--Muestra el carrito de los usuarios invitados-->
<?php

include 'global/config.php';
include 'global/carrito.php';
include 'templates/cabecera.php';


?>

<br>
<h3 class="text-center">Automóvil seleccionado</h3>

<?php  if (!empty($_SESSION['CARRITO'])) {
    # Si no está vacía la sesión del carro te muestra todos los productos que haya guardado el usuario invitado


?>

<table class="table table-light table-bordered">
    <tbody>
        <tr>
            <th width="40%">Nombre</th>
            <th width="15%" class="text-center">Cantidad</th>
            <th width="20%" class="text-center">Precio</th>
            <th width="20%"  class="text-center">Total</th>
            <th width="5%"></th>
        </tr>
        <!--Se hace un bucle para recorrer la sesión carrito y sacar los productos guardados por el usuario-->
        <?php $total=0; ?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto) { ?>
       <tr>
            <td  width="40%"><?php echo $producto['NOMBRE'] ?></td>
            <td  width="15%"  class="text-center"><?php echo $producto['CANTIDAD'] ?></td>
            <td  width="20%"  class="text-center"><?php echo number_format($producto['PRECIO'], 2)."€" ?></td>
            <td  width="20%"  class="text-center"><?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'], 2)."€"  ?></td>
           
           
            <td width="5%">
                <form action="" method="post">
                    <input type="hidden" name="id" id="id" value="<?php  echo openssl_encrypt(  $producto['ID'], COD, KEY);  ?>">
                    <button class="btn btn-danger" type="submit" value="Eliminar" name="btnAccion">Eliminar</button>
                </form>
        
            </td>
       </tr>
       <?php $total=$total+($producto['PRECIO']*$producto['CANTIDAD']); ?>

        <?php } ?>
       <tr>
           <td colspan="3" align="right"> <h3>Total</h3></td>
           <td align="right"><h3><?php echo number_format($total,2); ?>€</h3></td> 
           <td></td>
       </tr>

       <tr>
           <td colspan="5">

            <form action="pagar.php" method="post">
               
            <button class="btn btn-primary btn btn-lg btn-block" value="proceder" class="btnAccion" type="submit">Realizar Compra</button>
                 

            </form>

               
           </td>
       </tr>
    </tbody>
</table>


<?php }else {?>
    <div class="alert alert-danger text-center" role="alert">
        No hay productos en el carrito.
    </div>
    <?php } ?>
<?php
include 'templates/pie.php';
?>