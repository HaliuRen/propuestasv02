@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success">
    {{session('info')}}
</div>        
@endif

<form action="{{route('messages.store')}}" method="POST">
    @csrf

    <div class="m-4 bg-white p-5">
        <div class="form-group">
            <label for="subject">Asunto</label>
            <input type="text" name="subject" class="form-control" id="subject" placeholder="Ingrese el asunto" value="{{old('subject')}}">
            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                else.</small> --}}
            @error('subject')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="body">Mensaje</label>
            <textarea class="form-control" name="body" id="body" rows="4" placeholder="Escriba su mensaje." >{{old('body')}}</textarea>
            @error('body')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="to_user_id">Destinatario</label>
            <select name="to_user_id" class="form-control @error('to_user_id') is-invalid @enderror" id="to_user_id">
                <option value="">Seleccione un usuario</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{ old('to_user_id')==$user->id ? 'selected' : '' }}
                    >{{ $user->email }}</option>
                @endforeach
            </select>
            <!-- mostrando mensaje de validacion -->
            @error('to_user_id')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>
@stop