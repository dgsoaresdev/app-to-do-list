@if( $slug_page && $slug_page === 'tarefas'  )
    @include('layouts._partials.tarefas')
@else
    @include('layouts._partials.dashboard')
@endif

{{-- @if ( $content ) 
    @include('layouts._components.{{ $content }}')
@else
@include('layouts._components.dashboard')
@endif --}}