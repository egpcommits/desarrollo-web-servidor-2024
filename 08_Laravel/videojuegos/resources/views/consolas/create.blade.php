<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- se le va a mandar un post al metodo store -->
    <form action="{{ route('consolas.store') }}" method="post">
        @csrf <!-- laravel se niega a hacer post, put o delete a no ser que se ponga esto -->
        <!-- Cross Site Request Forgery - para seguridad -->
        <label>Nombre: </label>
        <input type="text" name="nombre"><br><br>
        <label>Año de lanzamiento</label>
        <input type="number" name="ano_lanzamiento"><br><br>
        <input type="submit" value="Crear">
    </form>
</body>
</html>