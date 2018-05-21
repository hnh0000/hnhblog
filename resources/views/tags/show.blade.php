@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                @include('layouts._article')
            </div>
            @include('layouts._tag')
        </div>
        <div role="row">
            {{ $articles->links() }}
        </div>
    </div>
@endsection
