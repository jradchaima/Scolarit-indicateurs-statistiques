  
@extends('layouts.sidebar')
@section('content')

<header>{{Auth::user()->representant}}
    
    <h3>{{ Auth::user()->name}}</h3>
</header>
<ul>
<li><a href="#"><i class="fas fa-qrcode"></i>Aceuil</a></li>
<li><a href="{{ route('user.index') }}"><i class="fas fa-address-book"></i>Les utilisateurs</a></li>
<li><a href="#"><i class="fas fa-stream"></i> les rapports mensuels</a></li>
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
<body class="w3-light-grey" style="margin-left:-16.5%">
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<h2 style="text-align:center">Espace Administrateur</h2>
  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Les indicateurs</b></h5>
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

          <h3>
          5
          </h3>
        </div>
        <div class="w3-clear"></div>
        <a href="{{ route('sanctionetabliss') }}"><h4>Sanctions</h4></a>
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

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
        <h5>Admin</h5>
        <img src="{{ asset('img/adminimg.jpg') }}" style="width:50%;" alt="">
      </div>
      <div class="w3-twothird">
        <h5>Les indicateurs </h5>
        <table class="w3-table w3-striped w3-white">
          <tr>
            <td></td>
            <td>Restaurants</td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td> Foyers </td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td> Activités culturels</td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td>Abscences</td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td>Sanctions</td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td>Formations</td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td>Visites Pédagogiques</td>
            <td></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <hr>
 
 

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>


</section>
 
@endsection
