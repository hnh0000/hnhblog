@extends('layouts.app')

@section('description',$article->describe)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">

                @include('articles._article')

            </div>

            @include('layouts._side')

        </div>
    </div>
@endsection