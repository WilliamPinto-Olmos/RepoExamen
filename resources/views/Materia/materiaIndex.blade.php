<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index materias</title>
</head>
<body>
      <p>
        <a href="{{ route('inicio') }}">Inicio</a>
      </p>

      <p>
        <a href="{{ route('materia.create') }}">Agregar nueva materia</a>
      </p>

      <table border="1">
        <thead>
          <tr>
            <th>ID</th>
            <th>Creditos</th>
            <th>Nombre</th>
            <th>Profesor</th>
            <th>Turno</th>
            <th>Disponible</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($materias as $materia)
            <tr>
              <td>{{ $materia->id }}</td>
              <td>
                <a href="{{ route('materia.show', $materia) }}">{{ $materia->nombre }}</a>
              </td>
              <td>{{ $materia->creditos }}</td>
              <td>{{ $materia->profesor }}</td>
              <td>{{ $materia->turno }}</td>
              @if ($materia->disponible)
                <td>
                    Sí
                </td>
              @else
                <td>
                    No
                </td>
              @endif
              <td>
                <a href="{{ route('materia.edit', $materia) }}">Editar materia</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
</body>
</html>
