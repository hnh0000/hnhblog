@extends('layouts.app')

@push('styles')

@endpush

@section('content')
    <div class="container">
        <div class="col-md-3">
            <div class="box">
                <div class="padding-sm">
                    <div class="media">
                        <a href="">
                            <img data-toggle="tooltip" data-placement="top" title="修改头像" class="avatar"
                                 src="{{$user->avatar}}" alt="">
                        </a>
                    </div>
                    <hr>
                    <div class="media">
                        <ul style="margin-left: 0;padding-left: 0;text-align: center">
                            <li><span>ID：</span>{{$user->id}}</li>
                            <li><span>昵称：</span>{{$user->name}}</li>
                            <li><span>性别：</span>{{$user->sex()}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

       @yield('user-content')
    </div>
@endsection


@push('scripts')
    <script !src="">
        function goTo(str) {
            location.href = location.href+str;
        }
    </script>
@endpush
