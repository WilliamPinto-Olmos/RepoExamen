<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estudiante</title>
</head>
<body>
    <p>
        <a href="{{ route('estudiante.index') }}">Ver lista de estudiantes</a>
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
          </tr>
        </thead>
        <tbody>
            <tr>
              <td>{{ $estudiante->id }}</td>
              <td>{{ $estudiante->nombre }}</td>
              <td>{{ $estudiante->codigo }}</td>
              <td>{{ $estudiante->carrera }}</td>
              <td>{{ $estudiante->creditos_cursados }}</td>
              <td>{{ $estudiante->correo }}</td>
            </tr>
        </tbody>
      </table>


      <form action="{{ route('estudiante.destroy', $estudiante) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit">Borrar estudiante</button>
    </form>

    <p>Agregar materia</p>
    <form action="{{ route('estudiante.addMateria', $estudiante) }}" method="POST">
        @csrf
        <label for="materia_id"></label>
        <select name="materia_id" id="materia_id">
            @foreach ($materias as $materia)
                @if ($materia->disponible)
                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                @endif
            @endforeach
        </select>

        <button type="submit">Añadir</button>
    </form>

    <p>Materias del estudiante</p>

    <table border="1">
      <thead>
        <tr>
          <th>ID Materia</th>
          <th>Nombre materia</th>
          <th>Creditos que otorga</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($estudiante->materias as $materia )
              <tr>
                  <td>{{ $materia->id }}</td>
                  <td>{{ $materia->nombre }}</td>
                  <td>{{ $materia->creditos }}</td>
                  <td>
                      <form action="{{ route('estudiante.deleteMateria', $materia, $estudiante) }}" method="POST">
                        @csrf
                            <button type="submit">Borrar</button>
                      </form>
                  </td>
              </tr>
          @endforeach
      </tbody>
    </table>
</body>
</html>
