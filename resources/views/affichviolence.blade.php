
  
@extends('layouts.sidebar')
@section('content')
<header>{{Auth::user()->representant}}
    
    <h3>{{ Auth::user()->name}}</h3>
</header>
<ul>
<li><a href="/region"><i class="fas fa-qrcode"></i>Aceuil</a></li>
<li><a href="#"><i class="fas fa-clipboard"></i>Recommondation</a></li>
<li><a href="#"><i class="fas fa-stream"></i>Rapport mensuel</a></li>

<li><a href="{{ route('sancstat') }}"><i class="fas fa-chart-pie"></i>Les statistiques</a></li>
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

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-left:10%;width:+9%;" >Ajouter</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New violence</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
        <form action="/save"   method="post">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date Violence</label>
            <input type="date" name="date" class="form-control" id="recipient-name">
          </div>
         
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">cause de violence</label>
            <input type="text"   name="cause_violence" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">type de violence</label>
            <input type="text"  name="type_violence"class="form-control" id="recipient-name">
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Enregister</button>
      </div>
      </form>
    </div>
  </div>
</div>
 




    <br> </br>
    <h3 style="text-align:left;margin-left:5%;margin-bottom:-5%;">&ensp; &ensp; &ensp; Liste des violences</h3>

    
<br> </br><br> </br>
@if (session('status'))
<div class="alert alert-success" role="alert">
{{ session('status')}}
</div>
@endif

 <table id="datatable" class="table" style="margin-left:5%;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">violence date</th>

      <th scope="col">cause violence</th>
    
      <th scope="col">type violence</th>
      <th scope="col">modifier </th>
      <th scope="col">supprimer</th>
   
      
    </tr>
  </thead>
  <tbody>







@foreach ($violence as $data)
    <tr>
      <th scope="row">{{$data->violence_date}}</th>
      <td>{{$data->cause_violence}}</td>
      <td>{{$data->type_violence}}</td>

      <td><a href="{{ url('editviolence/'.$data->id)}}" class="btn btn-success">Modifier</a>            </td>
     
      <td>
      <form action="{{ url('violencedelete/'.$data->id)}}" method="POST">
      {{csrf_field()}}
      {{ method_field('DELETE')}}
      <button type="submit"  class="btn btn-danger">DELETE</button>
      </form>
      
     
    </tr>
 
@endforeach
  </tbody>
</table>



</table>

<script>
$(document).ready(function() {
    $('#datatable').DataTable();
});
</script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="{{ asset('js/dataTables.min.js')}}"></script>
  @endsection