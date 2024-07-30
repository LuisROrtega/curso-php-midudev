<?php 
    define('LOGO_URL', 'https://w7.pngwing.com/pngs/87/831/png-transparent-php-hd-logo-thumbnail.png'); // Constane global
    const NOMBRE = "Luis Ortega"; // Constantes con mayúsculas

    $name = 'Luis';
    $isDev = true;
    $age = 18;
    $isOld = $age > 40;
    // $age = (bool) 23;

    // if ($isOld) {
    //     echo "<h2>Eres Viejo</h2>";
    // } elseif ($isDev) {
    //     echo "<h2>Eres dev</h2>";
    // } else {
    //     echo "<h2>Eres Joven</h2>";
    // }


    $output = "Hola ";
    $output .= $name . ", tienes " . $age . " años";
    $outputAge = $isOld 
    ? "Eres viejo"
    : "Eres joven";

    $outputAgeMatch = match (true) {
        $age <= 2 => "Eres un bebé, $name",
        $age <= 10 => "Eres un niño, $name",
        $age <= 17 => "Eres un adolescente, $name",
        $age === 18 => "Eres mayor de edad, $name",
        $age <= 30 => "Eres un joven, $name",
        default => "Eres un adulto, $name",
    };

    $array = ["Esto", "es", "un", "array"];
    $array[] = 10;
    $array[0] = "Inicio";

    $person = [
        "name" => "Luis",
        "age" => 23,
        "isDev" => true,
        "hobbies" => ["Programar", "Dormir", "Leer"],
        "address" => [
            "street" => "Calle 123",
            "number" => 1234,
        ]
    ];

    $person["name"] = "Chicha";
    $person["hobbies"][] = "Watch Movies";

    // var_dump($name);
    // var_dump($isDev);
    // var_dump($age);

    // echo is_string($name);
    // echo is_bool($isDev);
    // echo is_string($age);
    
?>

<h2><?= $outputAgeMatch ?></h2>
<p>Array -> [<?= $array[0] ?>]</p>

<?php if ($isOld) : ?>
    <h2>Eres viejo</h2>
<?php elseif ($isDev) : ?>
    <h2>Eres dev</h2>
<?php else : ?>
    <h2>Eres joven</h2>
<?php endif;?>

<img src="<?= LOGO_URL ?>" alt="PHP Logo" width="200">
<h1>
   <?= NOMBRE; ?>
</h1>

<ul>
    <?php foreach ($array as $key => $element) : ?>
        <li><?= $key . " - " . $element ?></li>
    <?php endforeach;?>   
</ul>
<p> <?= $person["hobbies"]; ?> </p>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }
</style>
