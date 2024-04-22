@extends('layouts.app')
@section('title-page', 'Dashboard')
@section('page_slug', $slug_page)
@section('body_class', '')
@section('content')
<div class="container_">
    <!-- ============================================================== -->
    <!-- Start Wrapper -->
    <!-- ============================================================== -->
    <div class="wrapper">
        @include('layouts._partials.top')
        @include('layouts._partials.left')
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            @if( $slug_page && $slug_page === 'administradoras'  )
                    @include('layouts._partials.administradoras')
                @else
                    @include('layouts._partials.dashboard')
                @endif
            @include('layouts._partials.footer')
        </div>
        <!-- ============================================================== -->
        <!-- END Page Content here -->
        <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

</div>
{{-- END Container --}}
@include('layouts._partials.theme-settings', [ 'page_slug' => $slug_page])
@endsection
