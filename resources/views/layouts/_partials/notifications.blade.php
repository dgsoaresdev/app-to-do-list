  @if(Session::has('success'))
  		<script>toastr.success("{{ Session::get('success') }}")</script>
        @php session()->forget('success'); @endphp
  @endif
  
  @if(Session::has('info'))
  		<script>toastr.info("{{ Session::get('info') }}");</script>
        @php session()->forget('info'); @endphp
  @endif

  @if(Session::has('warning'))
  		<script>toastr.warning("{{ Session::get('warning') }}");</script>
        @php session()->forget('warning'); @endphp
  @endif

  @if(Session::has('error'))
  		<script>toastr.error("{{ Session::get('error') }}");</script>
        @php session()->forget('error'); @endphp
  @endif
