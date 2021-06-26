@extends('layouts.sidebar')
@section('content')
<header>
   {{ Auth::user()->name}}
</header>

<ul>
<li><a href="/etablissement"><i class="fas fa-qrcode " class="nav-link"></i>Aceuil</a></li>
<li><a href="/layouts/recommondation"><i class="fas fa-clipboard" ></i>Recommondation</a></li>
<li><a href="/lesrapports"><i class="fas fa-stream"></i>Les Rapports</a></li>


<li>
          <a  href="{{ route('logout') }}" 
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                     <i class="fas fa-sign-out-alt"></i>{{ __('Déconnexion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </li>
</ul>
</div>

<section>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"style="position:absolute;top:20%;right:6%;width:150px;">Ajouter</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouvelle cas de violence</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>            
      
        <form action="/save"   method="post">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date</label>
            <input type="date" name="date" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Type_violence</label>
            <input type="text"   name="cause_violence"  class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Cause_violence</label>
            <input type="text"    name="type_violence" class="form-control" id="recipient-name">
          </div>
		
	

		  

      
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
      </form>
    </div>
  </div>
</div>
 



<!-- Modal  delete-->

<div class="modal fade" id="deletemodelpop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Supprimer l'element selectionne ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="delete_model_form" method="POST">
      {{csrf_field()}}
      {{ method_field('DELETE')}}

      <div class="modal-body">
        <input type="hidden" id="delete_violence">
        <h5>l'element selectionne va uniquement etre supprimer</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ANNULER</button>
        <button  type="submit" class="btn btn-outline-danger">SUPPRIMER</button>
      </div>
      </form>
    </div>
  </div>
</div>
    <br> </br>
    <br>
    <br> </br>
    <h3 style="text-align:center;margin-left:5%;margin-bottom:-5%;">&ensp; &ensp; &ensp; Liste des violences</h3>

    
<br> </br><br> </br>

    

 <table id="table1" class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Date</th>
      <th scope="col">type_violence</th>
    
      <th scope="col">cause_violence</th>
  
 
 
      <th scope="col">EDIT</th>
      <th scope="col">Supprimer</th>
   
      
    </tr>
  </thead>
  <tbody>




 


@foreach ($violence as $data)
    <tr>
      <td scope="row">{{$data->id}}</td>
      <td>{{$data->violence_date}}</td>
      <td>{{$data->type_violence}}</td>
      <td>{{$data->cause_violence}}</td>
    
      <td><a href="{{ url('editviolence/'.$data->id)}}" class="btn btn-success">EDIT  </a>          </td>
     
       
      <td>
      <a href="javascript:void(0)" class="btn btn-danger deletebtn">Supprimer </a>   </td>
      
     
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

 @endsection
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
    $('#delete_violence').val(data[0]);
    $('#delete_model_form').attr('action','/violencedelete/'+data[0]);
    $('#deletemodelpop').modal('show');
  } );



} );
</script>
@endsection