@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <section class="py-5">
                <h1> {{ $project->title }} </h1>

                @if ($project->type)
                    <h2 class="fs-3"> {{ $project->type->name }} </h2>
                @endif

                <ul class="d-flex gap-2">
                @foreach ($project->technologies as $technology)
                    <li class="badge badge-primary color-badge-text" >{{$technology->name}}</li>
                @endforeach
                </ul> 

                <p class="fs-5">{{ $project->created_at->format('d/m/Y')}}</p>
                <div class="d-flex gap-3 mb-4">

                    {{-- DELETE --}}
                    <form action="{{route('admin.projects.destroy', $project)}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <input class="btn btn-danger" type="submit" value="Elimina">
                    </form>

                    {{-- EDIT --}}
                    <a class="btn btn-primary" href="{{route('admin.projects.edit', $project)}}">Modifica</a>
                </div>
                <p> {{ $project->content}} </p>
            </section>
        </div>
    </section>
@endsection