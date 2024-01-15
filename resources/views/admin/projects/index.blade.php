@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1> Projects index </h1>   
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Progetto</th>
                        <th>Tipo</th>
                        <th>Contenuto</th>
                        <th></th>
                        <th>
                            <a href="{{route('admin.projects.create' )}}" class="btn btn-primary">Nuovo</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>
                                <a href="{{route('admin.projects.show', $project)}}"> {{ $project->title }}</a>
                            </td>
                            {{-- <td>{{ isset($project->type) ? $project->type->name : '-' }}</td> --}}
                            <td>{{ optional($project->type)->name }}</td>
                            <td>{{ $project->content }}</td>
                            <td>
                                <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-warning fs-btn">Modifica</a>
                            </td>
                            <td>
                                <form action="{{route('admin.projects.destroy', $project)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <input class="btn btn-danger fs-btn" type="submit" value="Elimina">
                                </form>
                            </td>
                        </tr>
                    @empty
                        <td>Nessun progetto</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection