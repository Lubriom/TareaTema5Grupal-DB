<div class="home__productos">
    <?php

    use App\Models\ProductoModel;
    use App\Models\Model;

    $conexionProducto = new ProductoModel();
    $resultado = $conexionProducto->all();

    echo '<pre>'; print_r($resultado); echo '</pre>';
    ?>
    <!-- <div class="card__producto">
        <div class="card__title">
            <h1>Coche de Juguete</h1>
            <p>Precio: 3.99€</p>
        </div>
        <button type="submit" class="card__button">Agregar al carrito</button>
    </div> -->
</div>