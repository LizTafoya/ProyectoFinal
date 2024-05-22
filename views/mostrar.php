
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .product {
            display: none; /* Inicialmente ocultar todos los productos */
        }
        .product img {
            width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <h1>Listado de Productos</h1>
        
        <div class="search-form">
            <form id="searchForm">
                <input type="text" id="search" name="search" placeholder="Buscar por SKU o nombre">
                <button type="submit" class="btn">Buscar</button>
                <i class="fa-solid fa-magnifying-glass"></i>
            </form>
        </div>
        
        <div class="products-container">
            <?php foreach($producto as $productos): ?>
                <div class="product">
                    <?php if($productos->Nombre == 'Gansito'): ?>
                        <img class="product-img" src="../build/img/gansito.jpg" alt="Producto">
                    <?php elseif($productos->Nombre == 'Sabritas'): ?>
                        <img class="product-img" src="../build/img/sabritas.jpg" alt="Producto">
                    <?php elseif($productos->Nombre == 'Oreo'): ?>
                        <img class="product-img" src="../build/img/oreo.jpg" alt="Producto">
                    <?php elseif($productos->Nombre == 'Gatorade'): ?>
                        <img class="product-img" src="../build/img/Imagen2.jpg" alt="Producto">
                    <?php elseif($productos->Nombre == 'Agua Ciel'): ?>
                        <img class="product-img" src="../build/img/Imagen3.jpg" alt="Producto">
                    <?php elseif($productos->Nombre == 'Hersheys'): ?>
                        <img class="product-img" src="../build/img/Imagen4.jpg" alt="Producto">
                    <?php elseif($productos->Nombre == 'Paleta Magnum'): ?>
                        <img class="product-img" src="../build/img/paleta.png" alt="Producto">
                    <?php elseif($productos->Nombre == 'Galletas Oreo'): ?>
                        <img class="product-img" src="../build/img/oreo.png" alt="Producto">
                    <?php endif; ?>
                    <div class="product-info">
                        <p class="product-name"><?php echo $productos->Nombre; ?></p>
                        <p class="product-sku">SKU: <?php echo $productos->id; ?></p>
                        <p>Descripción: <?php echo $productos->Descripcion; ?></p>
                        <p>Precio: $<?php echo $productos->Precioventa; ?></p>
                        <a href="/info?Nombre=<?php echo $productos->Nombre; ?>">Ver detalles</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search');
            const searchForm = document.getElementById('searchForm');
            const products = document.getElementsByClassName('product');

            function performSearch(query) {
                Array.from(products).forEach(product => {
                    const productName = product.querySelector('.product-name').innerText.toLowerCase();
                    const productSKU = product.querySelector('.product-sku').innerText.toLowerCase();

                    if (productName.includes(query) || productSKU.includes(query)) {
                        product.style.display = 'block';
                    } else {
                        product.style.display = 'none';
                    }
                });
            }

            searchInput.addEventListener('input', function() {
                const query = this.value.toLowerCase();

                if (query.length >= 5) {
                    performSearch(query);
                } else {
                    Array.from(products).forEach(product => {
                        product.style.display = 'block';
                    });
                }
            });

            searchForm.addEventListener('submit', function(event) {
                event.preventDefault();
                const query = searchInput.value.toLowerCase();

                if (query.length >= 1) {
                    performSearch(query);
                }else{
                    Array.from(products).forEach(product => {
                        product.style.display = 'block';
                    });
                }
            });
        });
    </script>
</body>
</html>
