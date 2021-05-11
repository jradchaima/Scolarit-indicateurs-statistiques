  
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

<body class="w3-light-grey" style="margin-left:-16.5%">
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<h2 style="text-align:center">Les statistiques</h2>
  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Les statistiques</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"></i></div>
        <div class="w3-center">
          <h3>52</h3>
        </div>
        <div class="w3-clear"></div>
        <h4> Abscences</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"></i></div>
        <div class="w3-center">

          <h3><?php 
          $k = Auth::user()->region_id;
          $san = DB::table('sanctions')->where('region_id','=',$k)->count();
       
          echo $san;
          ?>
          </h3>
        </div>
        <div class="w3-clear"></div>
        <a href="{{ route('sanctionregion') }}"><h4>Sanctions</h4></a>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i ></i></div>
        <div class="w3-center">
          <h3>23</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Visites Pédagogiques</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i ></i></div>
        <div class="w3-center">
          <h3>50</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Formation</h4>
      </div>
    </div>
  </div>