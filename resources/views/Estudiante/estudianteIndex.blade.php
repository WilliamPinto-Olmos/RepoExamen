<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index estudiantes</title>
</head>
<body>
      <p>
        <a href="{{ route('inicio') }}">Inicio</a>
      </p>

      <p>
        <a href="{{ route('estudiante.create') }}">Agregar nuevo estudiante</a>
      </p>

      <table border="1">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Código</th>
            <th>Carrera</th>
            <th>Creditos</th>
            <th>Correo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($estudiantes as $estudiante)
            <tr>
              <td>{{ $estudiante->id }}</td>
              <td>
                <a href="{{ route('estudiante.show', $estudiante->id) }}">{{ $estudiante->nombre }}</a>
              </td>
              <td>{{ $estudiante->codigo }}</td>
              <td>{{ $estudiante->carrera }}</td>
              <td>{{ $estudiante->creditos_cursados }}</td>
              <td>{{ $estudiante->correo }}</td>
              <td>
                <a href="{{ route('estudiante.edit', $estudiante) }}">Editar estudiante</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
</body>
</html>
