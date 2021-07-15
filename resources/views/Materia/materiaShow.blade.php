<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Materia</title>
</head>
<body>

    <p>
        <a href="{{ route('materia.index') }}">Ver lista de materias</a>
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
          </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $materia->id }}</td>
                <td>{{ $materia->creditos }}</td>
                <td>{{ $materia->nombre }}</td>
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
            </tr>
        </tbody>
      </table>

      <form action="{{ route('materia.destroy', $materia) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit">Borrar materia</button>
      </form>

      <br>

      <p>Alumnos inscritos</p>

      <table border="1">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Código</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($materia->estudiantes as $estudiante )
                <tr>
                    <td>{{ $estudiante->id }}</td>
                    <td>{{ $estudiante->nombre }}</td>
                    <td>{{ $estudiante->codigo }}</td>
                </tr>
            @endforeach
        </tbody>
      </table>


</body>
</html>
