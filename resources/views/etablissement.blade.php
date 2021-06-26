  
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

<body class="w3-light-grey" style="margin-left:-16.5%">
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<h2 style="text-align:center">Espace Etablissement</h2>
  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Les Rapports</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">



    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16" style="width:80%">
        <div class="w3-left"></i></div>
        <div class="w3-center">
        <h3><?php 
          $k = Auth::user()->etabliss_id;
          $san = DB::table('absenceensegs')->where('id_etabl','=',$k)->count();
       
          echo $san;
          ?>
          </h3>
        </div>
         <div class="w3-clear"></div>
        <a href="/layouts/rapabsenceenseg"><h4>Absences Enseignants</h4></a>
      </div>
    </div>
    <div class="w3-quarter" >
      <div class="w3-container w3-blue w3-padding-16" style="width:80%">
        <div class="w3-left"></i></div>
        <div class="w3-center">

        <h3><?php 
          $k = Auth::user()->etabliss_id;
          $san = DB::table('absenceeleves')->where('id_etabl','=',$k)->count();
       
          echo $san;
          ?>
          </h3>
        </div>
        <div class="w3-clear"></div>
        <a href="/layouts/rapabsenceeleve"><h4>Absences Eleves</h4></a>
      </div>
    </div>



    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16"style="width:80%">
        <div class="w3-left"><i ></i></div>
        <div class="w3-center">
             <h3><?php 
          $k = Auth::user()->etabliss_id;
          $san = DB::table('activites')->where('id_etabl','=',$k)->count();
       
          echo $san;
          ?>
          </h3>
        </div>
        <div class="w3-clear"></div>
        <a href="/layouts/rapactivite"> <h4>Activités culturels </h4></a>
      </div>
    </div>



    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16"style="width:80%">
        <div class="w3-left"><i ></i></div>
        <div class="w3-center">
        <h3><?php 
          $k = Auth::user()->etabliss_id;
          $san = DB::table('communications')->where('id_etabl','=',$k)->count();
       
          echo $san;
          ?>
          </h3>
        </div>
        <div class="w3-clear"></div>
        <a href="/layouts/rapcommunication"><h4>Communications</h4></a>
      </div>
    </div>
  </div>



  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
        <h5>Etablissement</h5>
        <img src="{{ asset('img/etablissement.jpg') }}" style="width:100%" alt="">
      </div>
      <div class="w3-twothird">
        <h5><b>Les indicateurs</b> </h5>
        <table class="w3-table w3-striped w3-white">
          <tr>
            <td></td>
          <td><a href="/layouts/absenceeleve">Absence Eleve</a></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
           
          <td><a href="/layouts/absenceenseg">Absence Enseignant</a></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td><a href="/layouts/activite"> Activités culturels</a></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td><a href="/layouts/dossiermedical">Dossier Medical</a></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td> <a href="/layouts/communication"> Communication</a></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td><a href="/sanction"> Sanctions </a></td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td><a href="/violence">Violences </a></td></td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td><a href="/layouts/communication">Visites pédagogiques </a></td></td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td><a href="/layouts/communication">Formations </a></td></td></td>
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