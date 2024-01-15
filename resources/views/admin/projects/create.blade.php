@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <form action="{{ route('admin.projects.store') }}" method="POST">
                
                @csrf

                <div class="mb-3 py-3">
                    <label for="title" class="form-label"><strong>Titolo progetto</strong></label>
                    <input type="text" required class="form-control w-50 mb-3" name="title" id="title" placeholder="Titolo del progetto" value="{{ old('title') }}">

                    <label for="type_id" class="form-label"><strong>Tipo</strong></label>
                    <select name="type_id" class="form-control w-50 mb-3" id="type_id">

                        <option>Seleziona un tipo di progetto</option>

                        @foreach($types as $type)
                            <option @selected( old('type_id') == $type->id ) value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach

                    </select>

                    <div class="form-group mb-3">
                        <p><strong>Tecnologie</strong></p>
                        <div class="d-flex flex-wrap gap-4">
                            
                            @foreach ($technologies as $technology)
                            <input name="technologies[]" class="form-check-input" type="checkbox" value="{{$technology->id}}" id="technology-{{$technology->id}}" 
                            @checked(in_array($technology->id, old('technologies', [])))>
                            <label class="form-check-label" for="technology-{{$technology->id}}">
                              {{$technology->name}}
                            </label>
                            @endforeach                            
                        </div>
                    </div>

                    <label for="content" class="form-label"><strong>Contenuto</strong></label>
                    <textarea  class="form-control w-50" name="content" id="title" placeholder="Contenuto del progetto" value="{{ old('content') }}"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Invia</button>
              </form>
        </div>
    </section>
@endsection