@if(isset($materia))
    <!-- Editar materia -->
    <form action="{{ route('materia.update', $materia) }}" method="POST">
    @method('PATCH')
@else
    <!-- Crear materia -->
    <form action="{{ route('materia.store') }}" method="POST">
@endif
    @csrf
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" value="{{ $materia->nombre ?? '' }}">
        <br/>

        <label for="creditos">Créditos: </label>
        <input type="number" name="creditos" id="creditos" value="{{ $materia->creditos ?? '' }}">
        <br/>

        <label for="profesor">Profesor: </label>
        <input type="text" name="profesor" id="profesor" value="{{ $materia->profesor ?? '' }}">
        <br/>

        <label for="turno">Turno: </label>
            <select name="turno" id="turno">
                <option value="matutino">Matutino</option>
                <option value="vespertino">Vespertino</option>
            </select>
        <br/>

        <label for="disponible">Disponible: </label>
            Sí <input type="radio" name="disponible" id="disponible" value="1">
            No <input type="radio" name="disponible" id="disponible" value="0">
        <br/>

        <button type="submit">Enviar</button>
    <form/>
