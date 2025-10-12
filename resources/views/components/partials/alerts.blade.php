@if(session('success') || session('status') || session('error'))
  @php
    $type = session('success') ? 'success' : (session('status') ? 'info' : 'danger');
    $msg  = session('success') ?? session('status') ?? session('error');
  @endphp
  <div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
    {!! $msg !!}
    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
  </div>
  <script>
    setTimeout(function(){ var el=document.querySelector('.alert'); if(el){ $(el).alert('close'); } }, 4000);
  </script>
@endif
