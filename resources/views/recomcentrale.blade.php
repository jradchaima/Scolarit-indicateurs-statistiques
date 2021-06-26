
@extends('layouts.ahmed')
<!doctype html>
<html lang="en">



 <!-- Required meta tags -->
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
  

 
  <body>




    <br> </br>
    <h3>&ensp; &ensp; &ensp; Liste of Recommondation</h3>



 <table id="table1" class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">recommondation</th>
 
    
      
    </tr>
  </thead>
  <tbody>




 


@foreach ($recondation as $data)
    <tr>
      <td scope="row">{{$data->id}}</td>
      <td>{{$data->recom}}</td>
     

       
 
      
     
    </tr>
 
@endforeach
  </tbody>
</table>



</table>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  </body>
</html>


@section('scripts')
<script>
$(document).ready( function () {
    $('#table1').DataTable();


    $('#table1').on('click', '.deletebtn', function() {
    $tr = $(this).closest('tr');
    var data= $tr.children("td").map(function() {
       return $(this).text();
    }).get();
   console.log(data);
    $('#delete_recomreg').val(data[0]);
    $('#delete_model_form').attr('action','/recomreg-delete/'+data[0]);
    $('#deletemodelpop').modal('show');
  } );



} );
</script>
@endsection




