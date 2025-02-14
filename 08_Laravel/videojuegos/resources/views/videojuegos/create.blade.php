<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- se le va a mandar un post al metodo store -->
    <form action="{{ route('videojuegos.store') }}" method="post">
        @csrf <!-- laravel se niega a hacer post, put o delete a no ser que se ponga esto -->
        <!-- Cross Site Request Forgery - para seguridad -->
        <label>Videojuego:</label>
        <input type="text" name="videojuego"><br><br>
        <label>PEGI:</label>
        <input type="number" name="pegi"><br><br>
        <label>Género:</label>
        <input type="number" name="genero"><br><br>
        <input type="submit" value="Crear">
    </form>
</body>
</html>