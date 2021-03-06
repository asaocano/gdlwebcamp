<section class="seccion clearfix">
      <h2>Nuestros invitados</h2>
        <?php 

        try{
            require_once('includes/funciones/bd_conexion.php');
            $query = "SELECT * FROM invitados";
            $resultado = $connection->query($query);

        }catch(\Exception $e){
            echo $e->getMessage();
            echo 'no';
        }
        ?>
       <div class="invitados contenedor seccion">
        <ul class="lista-invitados clearfix">
        <?php while ($invitado = $resultado->fetch_assoc()) { ?>
            <li>
             <div class="invitado">
                <a class='invitado-info' href="#invitado<?php echo $invitado['invitado_id'];?>">
                    <img src="img/<?php echo $invitado['url_imagen'];?>" alt="imagen invitado" />
                    <p><?php echo $invitado['nombre_invitado'] . ' ' . $invitado['apellido_invitado']; ?></p>
                </a>
             </div>
            </li>
            <div style="display:none;">
                <div class="invitado-info" id="invitado<?php echo $invitado['invitado_id'];?>">
                    <h2><?php echo $invitado['nombre_invitado'] . " " . $invitado['apellido_invitado'];?></h2>
                    <img src="img/<?php echo $invitado['url_imagen'];?>" alt="imagen invitado" />
                    <p><?php echo $invitado['descripcion'];?></p>

                </div>
            </div>
           <?php } ?>
        </ul>
        </div>
      
            
      <?php $connection->close(); ?>
    </section>