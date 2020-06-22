<?php include_once 'includes/templates/header.php'; ?>
    <section class="seccion contenedor">
    <h2>Compra</h2>
    <?php if(isset($_POST['submit'])): ?>
        <?php
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $regalo =$_POST['regalo'];
        $total = $_POST['total_pedido'];
        $fecha = date('Y-m-d H:i:s');

        //pedidos
        $boletos = $_POST['boletos'];
        $camisas = $_POST['pedido_camisas'];
        $etiquetas = $_POST['pedido_etiquetas'];
        include_once 'includes/funciones/funciones.php';
        $pedido = productos_json($boletos, $camisas, $etiquetas);
        echo '<pre>';
        var_dump($pedido);
        echo '</pre>';
        ?>
    <?php endif; ?>
    </section>
<?php include_once 'includes/templates/footer.php'; ?>