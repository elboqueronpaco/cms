<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="<?= urlBase() ?>">Inicio</a></li>
                <li><a href="<?= urlBase() ?>?controller=pages&action=about">nosotros</a></li>
            </ul>
            <ul>
                <li><a href="<?= urlBase() ?>?controller=users&action=register">Registrate</a></li>
                
            </ul>
        </nav>
    </header>