  
@extends('layouts.sidebar1')

@section('content')

<header>Admin
<h3>{{ Auth::user()->name}}</h3>
</header>
<style>


    p:hover{
        text-decoration:underline;
    }
</style>
<ul>
<li><a href="#"><i class="fas fa-qrcode"></i>Dashboard</a></li>
<li><a href="{{ route('user.index') }}"><i class="fas fa-link"></i>Les utilisateurs</a></li>
<li><a href="#"><i class="fas fa-stream"></i>Overview</a></li>
<li><a href="#"><i class="fas fa-calendar-week"></i>Events</a></li>
<li><a href="#"><i class="far fa-question-circle"></i>About</a></li>
<li><a href="#"><i class="fas fa-sliders-h"></i>Services</a></li>
<li>
          <a  href="{{ route('logout') }}" 
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       
                                       <span class="fa fa-sign-out mr-3"> {{ __('Logout') }}</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>
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
    <p>Voir les utilisateurs responsables de chaque region</p>
  </div><br><br>
  <div class="w3-panel w3-blue">
    <h3>Centre</h3>
    <p>Voir les utilisateurs responsables de chaque centre</p>
  </div>
</div>
</section>

@endsection