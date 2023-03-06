@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <h2>Aggiungi nuovo Project</h2>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li> 
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-12">
            <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf
            <div class="form-group my-3">
                <label class="control-label">
                    Titolo
                </label>
                <input type="text" class="form-control" placeholder="Titolo" id="title" name ="title">
            </div>
            <div class="form-group my-3">
                <label class="control-label">
                    Contenuto
                </label>
                <textarea type="text-area" class="form-control" placeholder="Contenuto" id="content" name ="content"></textarea>
            </div>
            <div class="form-group my-3">
                <label class="control-label">
                    Tipo
                </label>
                <select class="form-control" id="type_id" name ="type_id">
                    <option value="">
                        Tipo
                    </option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group my-3">
                <label class="control-label">
                    Tecnologie
                </label>
                @foreach ($technologies as $technology)
                <div class="form-check @error('technologies') is-invalid @enderror">
                    <input type="checkbox" class="form-check-input" value="{{$technology->name}}" name="technologies[]">
                    <label class="form-check-label">{{ $technology->name }}</label>
                </div>
                @endforeach
            </div>
            <div class="form-group my-3">
                <button type="submit" class="btn btn-sm btn-success">Salva Project</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection