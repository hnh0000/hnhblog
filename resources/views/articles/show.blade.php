@extends('layouts.app')

@section('description',$article->describe)

@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">

                @include('articles._article')

            </div>
            @include('commons._tag')
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script>
        var simplemde = new SimpleMDE();
        var testPlain = simplemde.value();
    </script>
@endpush
