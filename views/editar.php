<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>
    <link rel="stylesheet" href="../src/scss/base/producto.scss">
</head>
<body>
    <div class="container">
        <h1>Detalle del Producto</h1>
        <div class="product">
        <?php if($producto->Nombre == 'Gansito'): ?>
            <img class="product-img-p" src="../build/img/gansito.jpg" alt="Producto">
        <?php elseif($producto->Nombre == 'Sabritas'): ?>
            <img class="product-img-p" src="../build/img/sabritas.jpg" alt="Producto">
        <?php elseif($producto->Nombre == 'Oreo'): ?>
            <img class="product-img-p" src="../build/img/oreo.jpg" alt="Producto">
        <?php elseif($producto->Nombre == 'Gatorade'): ?>
            <img class="product-img-p" src="../build/img/Imagen2.jpg" alt="Producto">
        <?php elseif($producto->Nombre == 'Agua Ciel'): ?>
            <img class="product-img-p" src="../build/img/Imagen3.jpg" alt="Producto">
        <?php elseif($producto->Nombre == 'Hersheys'): ?>
            <img class="product-img-p" src="../build/img/Imagen4.jpg" alt="Producto">
        <?php elseif($producto->Nombre == 'Paleta Magnum'): ?>
            <img class="product-img-p" src="../build/img/paleta.png" alt="Producto">
        <?php elseif($producto->Nombre == 'Galletas Oreo'): ?>
            <img class="product-img-p" src="../build/img/oreo.png" alt="Producto">
        <?php endif; ?>
            <div class="product-info">
                <h2><?php echo $producto->Nombre?></h2>
                <p>SKU: <?php echo $producto->id?></p>
                <p>Descripción: <?php echo $producto->Descripcion?></p>
                <p>Precio:<?php echo $producto->Precioventa?></p>
                <form action="/editarDatos?id=<?php echo $producto->id?>" method="POST">
                <label for="Descripcion">Descripción: </label><input id="Descripcion" name="Descripcion" placeholder="Inserta nueva descripción">
                <label for="Precio">Precio: </label><input id="Precio" name="Precio" placeholder="Inserta nuevo precio"><br<<br><br><br>
                <input type="submit" value="Actualizar cambios" class="btn">
                <a style="background-color:red" href="/mostrar" class="btn btn-delete">Volver al Inicio</a>
                </form>
                
            </div>
        </div>
    </div>
</body>
</html>
