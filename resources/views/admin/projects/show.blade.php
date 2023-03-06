@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div class="d-flex justify-content-between">
                <div>
                    <h2>Dettaglio del Project: {{ $project->title }}</h2>
                </div>
                <div>
                    <a href="{{ route('admin.projects.index') }}">Torna all'elenco</a>
                </div>
            </div>
        </div>
        <div class="col-12">
            <p><strong>Slug: </strong>{{ $project->slug }}</p>
            <label class="d-block"><strong>Contenuto:</strong></label>
            <p>{{ $project->content }}</p>
            <p><strong>Tipo: </strong>{{ $project->type ?  $project->type->name : 'senza tipo'}}</p>
        </div>
    </div>
</div>
@endsection