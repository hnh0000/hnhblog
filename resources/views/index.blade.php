@extends('layouts.app')

@section('content')
    <div class="container ">

        <div class="row">
            @include('layouts._article',compact('articles'))

            @include('layouts._side')

        </div>

        @if($articles->total())
            <div role="row" class="chunk col-md-8">
                {{ $articles->links() }}
            </div>
        @endif

    </div>
@endsection
