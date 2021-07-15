@if(isset($estudiante))
    <!-- Editar estudiante -->
    <form action="{{ route('estudiante.update', $estudiante) }}" method="POST">
    @method('PATCH')
@else
    <!-- Crear estudiante -->
    <form action="{{ route('estudiante.store') }}" method="POST">
@endif
    @csrf
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" value="{{ $estudiante->nombre ?? '' }}">
        <br/>

        <label for="codigo">Código: </label>
        <input type="number" name="codigo" id="codigo" value="{{ $estudiante->codigo ?? '' }}">
        <br/>

        <label for="carrera">Carrera: </label>
        <input type="text" name="carrera" id="carrera" value="{{ $estudiante->carrera ?? '' }}">
        <br/>

        <label for="creditos_cursados">Créditos cursados: </label>
        <input type="number" min="1" name="creditos_cursados" id="creditos_cursados" value="{{ $estudiante->creditos_cursados ?? '' }}">
        <br/>

        <label for="correo">Correo: </label>
        <input type="text" name="correo" id="correo" value="{{ $estudiante->correo ?? '' }}">
        <br/>

        <button type="submit">Enviar</button>
    <form/>
