@extends('layouts.app')

@section('title', 'Projects List')


@section('content')
    <h1 class="text-center mt-5">Discover My Projects</h1>
    <ul class="list-unstyled">
        @forelse ($projects as $project)
            <li class="my-5">
                <div class="card bg-light p-5">
                    <div class="card-header rounded border-0 mb-4 d-flex justify-content-between align-content-center ">
                        <h2 class="m-0 d-flex align-items-center">
                            {{ $project->title }}
                        </h2>
                        <div class="d-flex">
                            @if ($project->type)
                                <p style="border: 1px solid {{ $project->type->color }}; color: {{ $project->type->color }}"
                                    class="d-flex rounded align-items-center m-0 px-3">
                                    {{ $project->type->label }}</p>
                            @else
                                <p style="background-color: lightgray"
                                    class="d-flex rounded border border-dark align-items-center m-0 px-3">
                                    None</p>
                            @endif
                            @if ($project->is_public)
                                <div class="alert alert-success m-0 ms-2">
                                    Open-source
                                </div>
                            @else
                                <div class="alert alert-danger m-0 ms-2">
                                    Private-source
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="">
                            {{ $project->description }}
                        </p>
                        <ul>
                            <li>
                                <strong>Repository name:</strong> {{ $project->slug }}
                            </li>
                            <li>
                                <strong>Category:</strong> {{ $project->type ? $project->type->label : 'None' }}
                            </li>
                            <li>
                                <strong>Main Language:</strong> {{ $project->main_lang }}
                            </li>
                            <li>
                                <strong>Other Languages:</strong> {{ $project->other_langs }}
                            </li>
                            <li>
                                <strong>Stars:</strong>
                                @for ($i = 0; $i < $project->n_stars; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer d-flex justify-content-between mt-3 align-items-center border-0 bg-light">
                        <div class="text-end w-100">
                            Creazione: {{ $project->created_at }} <br>
                            Ultima Modifica: {{ $project->updated_at }}
                        </div>
                    </div>
                </div>
            </li>
        @empty
            <h4 class="alert alert-danger mt-5 text-center">Non ci sono progetti disponibili</h4>
        @endforelse
    </ul>
@endsection

@section('scripts')
    @vite('resources/js/delete-confirm.js');
@endsection
