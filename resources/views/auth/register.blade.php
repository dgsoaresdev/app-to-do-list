
@section('page_slug', 'login')
@extends('layouts.app', ['page_slug' => 'login'])
@section('title-page', 'Página de Login')
@section('body_class', 'authentication-bg')
@section('content')
    <div class="container_">
        <div class="wrapper">
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                @include('layouts._partials.register')
            </div>
        </div> 
        {{--  End wrapper --}}
    </div>
    {{--  End Container --}}
@endsection
