  
@extends('layouts.sidebar')
@section('content')
<header>{{Auth::user()->representant}}
    
    <h3>{{ Auth::user()->name}}</h3>
</header>
<ul>
<li><a href="#"><i class="fas fa-qrcode"></i>Aceuil</a></li>
<li><a href="#"><i class="fas fa-clipboard"></i>Recommondation</a></li>
<li><a href="#"><i class="fas fa-stream"></i>Rapport mensuel</a></li>
<li><a href="#"><i class="fas fa-chart-pie"></i>Les indicateurs</a></li>

<li><a href="#"><i class="fas fa-sliders-h"></i>Les statistiques</a></li>
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
<style>
body{
  background-image: url(../img/region.jpg);
}
</style>
</section>
  </body>
</html>
@endsection