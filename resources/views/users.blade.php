  
@extends('layouts.sidebar1')


  

@section('content')

<header>{{Auth::user()->representant}}
    
    <h3>{{ Auth::user()->name}}</h3>
</header>
<ul>
<li><a href="#"><i class="fas fa-qrcode"></i>Aceuil</a></li>
<li><a href="{{ route('user.index') }}"><i class="fas fa-address-book"></i>Les utilisateurs</a></li>
<li><a href="#"><i class="fas fa-stream"></i> rapports mensuels</a></li>
<li><a href="#"><i class="fas fa-chart-pie"></i>les  indicateurs</a></li>

<li><a href="#"><i class="fas fa-sliders-h"></i> Les statistiques</a></li>
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


 
<div class="w3-container" style="margin-left:100px;">
  <h2>Les utilisateurs</h2>
<br>

  <div class="w3-panel w3-blue">
    <h3>Etablissement</h3>
    <p ><a href="{{ route('etablissuser') }}">Voir les utilisateurs responsables de chaque établissement</a></p>
  </div>
  <br><br>
  <div class="w3-panel w3-blue">
    <h3>Region</h3>
    <p>  <a href="{{ route('regionuser') }}"> Voir les utilisateurs responsables de chaque region</a> </p>
  </div><br><br>
  <div class="w3-panel w3-blue">
    <h3>Centre</h3>
    <p>  <a href="{{ route('centraluser') }}"> Voir les utilisateurs responsables de chaque centre</a></p>
  </div>
</div>
</section>

@endsection