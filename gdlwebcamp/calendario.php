<?php include_once 'includes/templates/header.php'; ?>

    <section class="seccion clearfix">
      <h2>Calendario de eventos</h2>
        <?php 

        try{
            require_once('includes/funciones/bd_conexion.php');
            $query = "SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
            $query .= "FROM eventos join categoria_evento on (id_categoria_eve = id_categoria) ";
            $query .= " join invitados on (invitado_id = id_invitado) ";
            $query .= " order by id_evento;";
            $resultado = $connection->query($query);

        }catch(\Exception $e){
            echo $e->getMessage();
            echo 'no';
        }
        ?>
      <div class="calendario contenedor clearfix">
        <?php  $calendario = array();?>
        <?php while ($eventos = $resultado->fetch_assoc()) {
          $fecha = $eventos['fecha_evento'];
          $evento = array(
            'titulo' => $eventos['nombre_evento'],
            'fecha' => $eventos['fecha_evento'],
            'hora' => $eventos['hora_evento'],
            'categoria' => $eventos['cat_evento'],
            'icono' => 'fa' . ' ' . $eventos['icono'],
            'invitado' => $eventos['nombre_invitado'] . ' ' . $eventos['apellido_invitado']
          );
            $calendario[$fecha][] = $evento;
             } //termina while?>
        
        <?php //Imprime todos los eventos 
        foreach ($calendario as $dia => $lista_eventos) { ?>  
          <?php foreach ($lista_eventos as $evento) { ?>
            <div class="dia clearfix">
            <p class="titulo"><?php echo $evento['titulo']; ?></p>
            <p class="hora"><i class="fa fa-clock-o" aria-hidden="true"></i>
            <?php echo $evento['fecha'] . ' ' . $evento['hora']; ?>
            </p>
            <p><i class= "<?php echo $evento['icono']?>" aria-hidden="true"></i>
            <?php echo $evento['categoria']; ?></p>
            <p><i class="fa fa-user" aria-hidden="true"></i>
            <?php echo $evento['invitado']; ?>
            </p>
            
            </div>
         <?php } //Foreach lista_eventos?>
       <?php } //Foreach calendario?>
        
      </div>

      <?php $connection->close(); ?>
    </section>

    <?php include_once 'includes/templates/footer.php'; ?>
