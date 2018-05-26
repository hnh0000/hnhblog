@extends('layouts.app')

@section('content')
    <div class="container ">

        <div class="row">
            @include('layouts._article',compact('articles'))

            @include('layouts._side')
        </div>


    </div>
@endsection
