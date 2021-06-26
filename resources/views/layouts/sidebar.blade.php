<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  
    <link rel="stylesheet" href="{{ asset('css/back1.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>
  <body>
    <input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn" style="margin-left:-3%;margin-top:-1%"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar" style="position:absolute;top:1px;">

    @yield('content')

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
