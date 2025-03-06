<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consolas</title>
</head>
<body>
    <h1>Lista de consolas</h1>
    <ul>
        <!--     
            El @ practicamente sustituye las llaves
            Las dobles llaves actuan como si fuese echo
        -->
        @foreach($consolas as $consola)
            <!-- como es un objeto, se accede con flechita -->
            <li>{{ $consola -> nombre }}</li>
        @endforeach
    </ul>
</body>
</html>