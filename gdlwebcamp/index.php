<?php include_once 'includes/templates/header.php'; ?>
    <section class="seccion contenedor">
      <h2>La mejor conferencia de diseño web en español</h2>
      <p>
        Aliquam erat volutpat. In accumsan libero eget arcu lacinia dapibus.
        Aenean tincidunt velit felis, at congue lectus congue sed. Vivamus vel
        ligula convallis mauris accumsan lacinia quis in nulla. Nam sed nibh
        massa. Fusce metus nisl, egestas a quam eget, efficitur laoreet nulla.
        Sed non suscipit orci, vitae auctor augue. Quisque vehicula finibus
        fringilla.
      </p>
    </section>
    <!--seccion-->

    <section class="programa">
      <div class="contenedor-video">
        <img src="img/bg-talleres.jpg" alt="" />
      </div>
      <!--Contenedor-video-->
      <div class="contenido-programa">
        <div class="contenedor">
          <div class="programa-evento">
              <h2>Programa del evento</h2>
                <?php
                try{
                  require_once('includes/funciones/bd_conexion.php');
                  $query = "SELECT * FROM categoria_evento;";
                  $resultado = $connection->query($query);
      
              }catch(\Exception $e){
                  echo $e->getMessage();
                  echo 'no';
              }
              ?>

            
            <nav class="menu-programa">
              <?php while ($cat = $resultado->fetch_array(MYSQLI_ASSOC)) {?>
              <?php $categoria = $cat['cat_evento']; ?>
              <?php $icono = $cat['icono']; ?>
                <a href="#<?php echo strtolower($categoria);?>"><i class="fas <?php echo $icono; ?>"></i> <?php echo $categoria;?></a>
              <?php }?>
            </nav>

            <?php try{
                require_once('includes/funciones/bd_conexion.php');
        
                $sql = "SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                $sql .= "FROM eventos join categoria_evento on (id_categoria_eve = id_categoria) ";
                $sql .= " join invitados on (invitado_id = id_invitado) ";
                $sql .= " and eventos.id_categoria_eve = 1 ";
                $sql .= " order by id_evento LIMIT 2;";

                $sql .= "SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                $sql .= "FROM eventos join categoria_evento on (id_categoria_eve = id_categoria) ";
                $sql .= " join invitados on (invitado_id = id_invitado) ";
                $sql .= " and eventos.id_categoria_eve = 2 ";
                $sql .= " order by id_evento LIMIT 2;";

                $sql .= "SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                $sql .= "FROM eventos join categoria_evento on (id_categoria_eve = id_categoria) ";
                $sql .= " join invitados on (invitado_id = id_invitado) ";
                $sql .= " and eventos.id_categoria_eve = 3 ";
                $sql .= " order by id_evento LIMIT 2;";
                

                }catch(\Exception $e){
                    echo $e->getMessage();
                   
                } ?>
                <?php $connection->multi_query($sql);?>

                <?php do {
                  $consulta = $connection->store_result();
                  $row = $consulta->fetch_all(MYSQLI_ASSOC);?>
                  <?php $i = 0; ?>

                  <?php foreach ($row as $evento): ?>
                  <?php if ($i % 2 == 0) {?>
                  <div id="<?php echo strtolower($evento['cat_evento']); ?>" class="info-curso ocultar clearfix">
                    <?php } ?>
                      <div class="detalle-evento">
                        <h3><?php echo $evento['nombre_evento']; ?></h3>
                        <p><i class="far fa-clock" aria-hidden="true"></i> <?php echo $evento['hora_evento'];?></p>
                        <p><i class="far fa-calendar-alt" aria-hidden="true"></i> <?php echo $evento['fecha_evento'];?></p>
                        <p><i class="fas fa-user-alt" aria-hidden="true"></i> <?php echo $evento['nombre_invitado'] . ' ' . $evento['apellido_invitado'];?></p>
                      </div>
                      <!--Detalle-evento-->
                      
                      
                    <?php if($i % 2 == 1):?> 
                      <a href="calendario.php" class="button float-right">Ver todos</a>
                      </div>
                    <?php endif;?>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                    <?php $consulta->free(); ?>
                  <?php } while ($connection->more_results() && $connection->next_result());?>
                
            
            
            <!--Info-curso-->
          </div>
          <!--Programa evento-->
        </div>
        <!--Contenedor-->
      </div>
      <!--contenido-programa-->
    </section>

    <?php include_once 'includes/templates/lista.php'; ?>

    <div class="contador parallax">
      <div class="contenedor">
        <ul class="resumen-evento clearfix">
          <li>
            <p class="numero"></p>
            Invitados
          </li>
          <li>
            <p class="numero"></p>
            Talleres
          </li>
          <li>
            <p class="numero"></p>
            Días
          </li>
          <li>
            <p class="numero"></p>
            Conferencias
          </li>
        </ul>
      </div>
    </div>

    <section class="precios seccion">
      <h2>Precios</h2>
      <div class="contenedor">
        <ul class="lista-precios clearfix">
          <li>
            <div class="tabla-precio">
              <h3>Pase por día</h3>
              <p class="numero">$30</p>
              <ul>
                <li><i class="fas fa-check"></i> Bocadillos Gratis</li>
                <li><i class="fas fa-check"></i> Todas las conferencias</li>
                <li><i class="fas fa-check"></i> Todos los talleres</li>
              </ul>
              <a href="#" class="button hollow">Comprar</a>
            </div>
          </li>
          <li>
            <div class="tabla-precio">
              <h3>Todos los días</h3>
              <p class="numero">$50</p>
              <ul>
                <li><i class="fas fa-check"></i> Bocadillos Gratis</li>
                <li><i class="fas fa-check"></i> Todas las conferencias</li>
                <li><i class="fas fa-check"></i> Todos los talleres</li>
              </ul>
              <a href="#" class="button">Comprar</a>
            </div>
          </li>
          <li>
            <div class="tabla-precio">
              <h3>Pase por 2 días</h3>
              <p class="numero">$45</p>
              <ul>
                <li><i class="fas fa-check"></i> Bocadillos Gratis</li>
                <li><i class="fas fa-check"></i> Todas las conferencias</li>
                <li><i class="fas fa-check"></i> Todos los talleres</li>
              </ul>
              <a href="#" class="button hollow">Comprar</a>
            </div>
          </li>
        </ul>
      </div>
    </section>

    <div id="mapa" class="mapa"></div>

    <section class="seccion">
      <h2>Testimoniales</h2>
      <div class="testimoniales contenedor clearfix">
        <div class="testimonial">
          <blockquote>
            <p>
              Etiam non tortor eget urna iaculis egestas. Nunc posuere faucibus
              gravida. Praesent interdum iaculis risus ut laoreet. Proin
              fringilla ac eros sed fringilla. Vestibulum vehicula vel nisi ut
              maximus. Integer pharetra condimentum metus, sed volutpat dui
              placerat sed.
            </p>
            <footer class="info-testimonial clearfix">
              <img src="img/testimonial.jpg" alt="imagen testimonial" />
              <cite
                >Oswaldo Aponte Escobedo <span>Diseñador en @Prisma</span></cite
              >
            </footer>
          </blockquote>
        </div>
        <div class="testimonial">
          <blockquote>
            <p>
              Etiam non tortor eget urna iaculis egestas. Nunc posuere faucibus
              gravida. Praesent interdum iaculis risus ut laoreet. Proin
              fringilla ac eros sed fringilla. Vestibulum vehicula vel nisi ut
              maximus. Integer pharetra condimentum metus, sed volutpat dui
              placerat sed.
            </p>
            <footer class="info-testimonial clearfix">
              <img src="img/testimonial.jpg" alt="imagen testimonial" />
              <cite
                >Oswaldo Aponte Escobedo <span>Diseñador en @Prisma</span></cite
              >
            </footer>
          </blockquote>
        </div>
        <div class="testimonial">
          <blockquote>
            <p>
              Etiam non tortor eget urna iaculis egestas. Nunc posuere faucibus
              gravida. Praesent interdum iaculis risus ut laoreet. Proin
              fringilla ac eros sed fringilla. Vestibulum vehicula vel nisi ut
              maximus. Integer pharetra condimentum metus, sed volutpat dui
              placerat sed.
            </p>
            <footer class="info-testimonial clearfix">
              <img src="img/testimonial.jpg" alt="imagen testimonial" />
              <cite
                >Oswaldo Aponte Escobedo <span>Diseñador en @Prisma</span></cite
              >
            </footer>
          </blockquote>
        </div>
      </div>
    </section>

    <div class="newsletter parallax">
      <div class="contenido contenedor">
        <p>Resgistrate al newsletter</p>
        <h3>GdlWebCamp</h3>
        <a href="#" class="button transparente">Registro</a>
      </div>
      <!--contenido-->
    </div>
    <!--newsletter-->

    <section class="seccion">
      <h2>Faltan</h2>
      <div class="cuenta-regresiva">
        <ul class="clearfix">
          <li>
            <p id="dias" class="numero"></p>
            días
          </li>
          <li>
            <p id="horas" class="numero"></p>
            horas
          </li>
          <li>
            <p id="minutos" class="numero"></p>
            minutos
          </li>
          <li>
            <p id="segundos" class="numero"></p>
            segundos
          </li>
        </ul>
      </div>
    </section>
    <?php include_once 'includes/templates/footer.php'; ?>
    