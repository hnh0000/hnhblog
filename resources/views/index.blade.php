@extends('layouts.app')

@section('content')
    <div class="container ">

        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                @include('layouts._article',compact('articles'))
            </div>

            @include('layouts._side')

        </div>

        @if($articles->total())
            <div role="row" class="chunk col-md-8">
                {{ $articles->links() }}
            </div>
        @endif

    </div>
@endsection
