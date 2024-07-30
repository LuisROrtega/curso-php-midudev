<?php
    const CHARACTER_API_URL = "https://rickandmortyapi.com/api/character/39"; // get character
    const EPISODE_API_URL = "https://rickandmortyapi.com/api/episode/";

    function fetchFromApi($url) {
        # Inicializar una nueva sesion de curl; ch = curl handle
        $ch = curl_init($url);
        // Indicar que queremos recibir el resultado de la petición y no mostrarla en pantalla
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        # Guardar el resultado de la petición
        $result = curl_exec($ch);
        $data = json_decode($result, true);

        // Cerrar conexión cURL
        curl_close($ch);

        return $data;
    }

    $characterData = fetchFromApi(CHARACTER_API_URL);
    $episodeData = fetchFromApi(EPISODE_API_URL);

    $episodeId = substr(implode($characterData["episode"]), -2);
    $episodeName = $episodeData["results"][0]["id"] == $episodeId;
    // var_dump($data);

    // En caso de solamente solicitar get
    // $result = file_get_contents(API_URL);
?>

<head>
    <meta charset="UTF-8">
    <title>Curso PHP - MiduDev</title>
    <meta name="description" content="Curso de MiduDev PHP intensivo">
    <!-- Centered viewport -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
</head>

<body>
    <main>
        <h1>Rick & Morty API</h1>
        <section>
            <h2 id="api">Charcter API</h2>
            <pre style="height: 250px; overflow: scroll;">
                <?= var_dump($characterData); ?>
            </pre>
            <h2 id="api">Episode API</h2>
            <pre style="height: 250px; overflow: scroll;">
                <?= var_dump($episodeData); ?>
            </pre>
        </section>
        <section class="card">
            <h3 style="color: gold;"><?= $characterData["name"] ?></h3>
            <img src="<?= $characterData["image"] ?>" alt="<?= $characterData["name"]; ?>">
        </section>
        <section class="info">
            <?php if ($characterData["status"] === "Alive") :?>
                <span class="fa-solid fa-heart"></span>
                <p>
                    Status - <span style="color: yellowgreen;"><?= $characterData["status"]; ?></span> 
                </p>
            <?php else :?>
                <span class="fa-solid fa-face-dizzy"></span>
                <p>
                    Status - <span style="color: orangered;"><?= $characterData["status"]; ?></span>
                </p>
            <?php endif;?>
        </section>
        <section>
            <p>Las known location: </p>
            <p style="color: darkgray;"><?= $characterData["location"]["name"]; ?></p>

            <p>First seen in: </p>
            <p style="color: darkgray;"><?= implode($characterData["episode"]); ?></p>
            <p style="color: darkgray;"><?= var_dump($episodeId); ?></p>
            <p style="color: darkgray;"><?= var_dump($episodeName);?></p>
        </section>
    </main>

    <script src="https://kit.fontawesome.com/b452287dd4.js" crossorigin="anonymous"></script>
</body>

<style>
    :root {
        color-scheme: light dark;
    }

    main {
        display: grid;
        place-items: center;
    }

    #api {
        text-align: center;
    }

    .card {
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .info {
        display: flex;
        align-items: center;
    }

    p {
        font-size: 1em;
        margin-left: 8px; /* Añadir un margen para separar el texto del icono */
        color: azure;
    }

    .fa-heart {
        color: red;
        margin-bottom: 15px;
        font-size: 1.2em;
    }

    .fa-face-dizzy {
        color: goldenrod;
        margin-bottom: 15px;
        font-size: 1.2em;
    }

</style>