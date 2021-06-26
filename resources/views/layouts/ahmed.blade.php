
<!doctype html>
<html lang="en">

<head>

<link rel="stylesheet" href="{{ asset('css/dataTables.min.css') }}">
</head>
<body>

<script src="{{ asset('js/dataTables.min.js')}}"></script>
<script src="{{ asset('js/swetaler.js')}}"></script>
<script>
@if (session('status'))
//alert('{{ session('status')}}');
swal({
  title: '{{ session('status')}}',
  //text: "You clicked the button!",
  icon: '{{ session('statuscode')}}',
  button: "OK!",
});
@endif
</script>
@yield('scripts')
</body>
</html>