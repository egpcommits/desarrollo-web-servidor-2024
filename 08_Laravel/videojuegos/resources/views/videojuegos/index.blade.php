<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos</title>
</head>
<body>
    <h1>Index de videojuegos</h1>
    <table>
        <thead>
            <tr>
                <th>Bideojuego</th>
                <th>PEGI</th>
                <th>Genero</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($videojuegos as $videojuego)
            <!--@php
                list($titulo, $pegi, $genero) = $videojuego
            @endphp -->
                <tr>
                    <td>{{ $videojuego[0] }}</td>
                    <td>{{ $videojuego[1] }}</td>
                    <td>{{ $videojuego[2] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>