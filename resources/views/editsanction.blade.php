
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




        <form action="{{ url('sanctionupdate/'.$sanction->id)}}"   method="post" style="margin-left:10%;">
        {{csrf_field()}}
        {{ method_field('PUT')}}
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date</label>
            <input type="text" name="date" class="form-control" value="{{ $sanction->sanction_date }}">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre de jours</label>
            <input type="text"   name="nbr_jours" class="form-control" value="{{ $sanction->nombre_jours }}">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Type de sanction</label>
            <input type="text"   name="type_sanction" class="form-control" value="{{ $sanction->type_sanction }}">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Cause sanction</label>
            <input type="text"  name="cause_sanction"class="form-control" value="{{ $sanction->cause_sanction }}">
          </div>
       
      </div>
      <div class="modal-footer">
        <a href=""  class="btn btn-secondary" >BACK</a>
        <button type="submit" class="btn btn-primary">UPDATE</button>
      </div>
      </form>
    </div>
  </div>
</div>
</section>


   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection