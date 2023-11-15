<!--Aqui mostrem per pantalla les categories de la nostra base de dades-->
<!DOCTYPE html>
<html>
<head>
    <title>Pàgina Principal</title>
    <link rel="stylesheet" href="/../../css/CSSPantallaPrincipal.css">
</head>
<body>
    <div id = "LlistatCat">
        <h1>Categories</h1>
            <?php foreach ($categories as $categoria): ?>
                <button onclick="productes(<?=($categoria['id']) ?>)"><?=($categoria['nom']) ?></button>
                    <br>
                <button onclick="productes(<?=($categoria['id']) ?>)">
                    <img src="<?=($categoria['Imatge']) ?>" class="Imatges-Categoria">
                </button>
                    <br>
            <?php endforeach; ?>
        </div>
    <div id="prod"></div>
    <div id="descripcio"></div>
    <script src="/../../js/CarregaProductes.js"></script>
</body>
</html>