@extends('layouts.sidebar')
@section('content')
<header>
    
   {{ Auth::user()->name}}
</header>
<ul>
<ul>
<li><a href="/welcome"><i class="fas fa-qrcode"></i>Aceuil</a></li>
<li><a href="{{ route('user.index') }}"><i class="fas fa-address-book"></i>Les utilisateurs</a></li>
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
        <h5 class="modal-title" id="exampleModalLabel">Nouvelle Etablissement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
        <form action="/saveetabliss"   method="post">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nom  Etablissement</label>
            <input type="text" name="name" class="form-control" id="recipient-name">
            @error('name')<div class="text-danger">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nom de la région </label>
            <input type="text" name="name_region" class="form-control" id="recipient-name">
          </div>
		  <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nom de la centre </label>
            <input type="text" name="name_centre" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email de la direction</label>
            <input type="text"   name="email" class="form-control" id="recipient-name">
            @error('email')<div class="text-danger">{{ $message }}</div> @enderror
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Mot de passe</label>
            <input type="password"   name="password" class="form-control" id="recipient-name">
            @error('password')<div class="text-danger">{{ $message }}</div> @enderror
          </div>
		
		
       


       
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregister</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Supprimer L'​élément selectionne ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="delete_model_form" method="POST">
      {{csrf_field()}}
      {{ method_field('DELETE')}}

      <div class="modal-body">
        <input type="hidden" id="delete_regionuser">
        <h5>L'​élément sélectionné va uniquement être supprimé</h5>
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
    <h3 style="text-align:center;margin-left:5%;margin-bottom:-5%;">&ensp; &ensp; &ensp; Liste des Etablissements</h3>

    
<br> </br><br> </br>

 <table id="table1" class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nom  Etablissement</th>
      <th scope="col">Nom de la région</th>
	  <th scope="col">Nom de la centre</th>
      <th scope="col">Email de la direction</th>
  
 
      <th scope="col">Modifier </th>
      <th scope="col">Supprimer</th>
   
      
    </tr>
  </thead>
  <tbody>







@foreach ( $etablissuser as $data)
    <tr>
      <td scope="row">{{$data->id}}</td>
      <td>{{$data->name}}</td>
	  <td><?php  $a = $data->region_id;
                         
						 $a1 = DB::table('regions')->where('id','=',$a)->get();
						 foreach ($a1 as $n){
							 $l = $n->nom_region;
						   echo $l;} ?></td>
      <td><?php  $a = $data->centre_id;
                         
                          $a1 = DB::table('centres')->where('id','=',$a)->get();
                          foreach ($a1 as $n){
                              $l = $n->nom_centre;
                            echo $l;} ?></td>
      <td>{{$data->email}}</td>

  

      <td><a href="{{ url('etablissement-edit/'.$data->id)}}" class="btn btn-success">EDIT  </a>          </td>
     
      <td>
      <a href="javascript:void(0)" class="btn btn-danger deletebtn">Supprimer  </a>   </td>
      
     
    </tr>
 
@endforeach
  </tbody>
 
</table>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</section>
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
    $('#delete_regionuser').val(data[0]);
    $('#delete_model_form').attr('action','/etablissement-delete/'+data[0]);
    $('#deletemodelpop').modal('show');
  } );


} );
</script>
@endsection