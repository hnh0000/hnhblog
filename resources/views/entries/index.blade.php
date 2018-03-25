@extends('entries.layouts.app')

@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                @include('entries.commons._artisan')
            </div>
                @include('entries.commons._aside')
        </div>
    </div>
@endsection
