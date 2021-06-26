  
@extends('layouts.sidebar1')

@section('content')
 <style>
 .container {
	position: absolute;
	top: 30%;
	left: 50%;
	transform: translate(-50%, -50%);
}

table {
	width: 800px;
	border-collapse: collapse;
	overflow: hidden;
	box-shadow: 0 0 20px rgba(0,0,0,0.1);
}


td {
	padding: 15px;
	background-color: rgba(255,255,255,0.2);
	color: #fff;
}

th {
	text-align: left;
}


	th{
		background-color:#FFF;
	}


tbody {
	tr {
		&:hover {
			background-color: rgba(255,255,255,0.3);
		}
	}
	td {
		position: relative;
		&:hover {
			&:before {
				content: "";
				position: absolute;
				left: 0;
				right: 0;
				top: -9999px;
				bottom: -9999px;
				background-color: rgba(255,255,255,0.2);
				z-index: -1;
			}
		}
	}
}
 </style>

<header>{{Auth::user()->representant}}
    
    <h3>{{ Auth::user()->name}}</h3>
</header>
<ul>
<li><a href="/region"><i class="fas fa-qrcode"></i>Aceuil</a></li>
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



<div class="container" >

<br><br>
	<table style="margin-left:12%;">
		<thead>
			<tr>
			
            <th>Activites culturelles et sportives</th>
				<th>Nombre Activites</th>
				
                <th>Nombre des region concernées</th>
			
			</tr>
		</thead>
    <tbody>
            
            <tr>
              
                <td> Activites sportives</td>
                <td>
                <?php
               $k = Auth::user()->id_centrale;
                $m ="activite sportive";
$san = DB::table('activites')->where([
    ['id_centrale', '=', $k],
    ['type_activite','=' ,$m],
    
])->count();


echo($san);

?>
</td>
       
       
         <td>
         <?php
         $l = Auth::user()->centre_id;
$a = DB::table('activites')->where([
    ['id_centrale', '=', $l],
    ['type_activite','=' ,$m],])->distinct('id_etabl')->count('id_etabl');
    echo $a;
         ?>
         </td>



         </tr>
    <tr>
      
    <td>Clubs</td>
    <td>
    <?php
  
    $k1 = Auth::user()->centre_id;
                $m1 ="club";
$san1 = DB::table('activites')->where([
    ['id_centrale', '=', $k1],
    ['type_activite','=' ,$m1],
    
])->count();
echo($san1);

?>
</td>

<td>
<?php 
         
         $a1 = DB::table('activites')->where([
             ['id_centrale', '=', $l],
             ['type_activite','=' ,$m1],])->distinct('id_etabl')->count('id_etabl');
             echo $a1;             
         ?>
      </td>

    </tr>


    <tr>
      
      <td>Voyages</td>
      <td>
      <?php
    
      $k1 = Auth::user()->centre_id;
                  $m1 ="voyage";
  $san1 = DB::table('activites')->where([
      ['id_centrale', '=', $k1],
      ['type_activite','=' ,$m1],
      
  ])->count();
  echo($san1);
  
  ?>
  </td>
  
  <td>
  <?php 
           
           $a1 = DB::table('activites')->where([
               ['id_centrale', '=', $l],
               ['type_activite','=' ,$m1],])->distinct('id_etabl')->count('id_etabl');
               echo $a1;             
           ?>
        </td>
  
      </tr>




      <tr>
      
      <td>Forums</td>
      <td>
      <?php
    
      $k1 = Auth::user()->centre_id;
                  $m1 ="forums";
  $san1 = DB::table('activites')->where([
      ['id_centrale', '=', $k1],
      ['type_activite','=' ,$m1],
      
  ])->count();
  echo($san1);
  
  ?>
  </td>
  
  <td>
  <?php 
           
           $a1 = DB::table('activites')->where([
               ['id_centrale', '=', $l],
               ['type_activite','=' ,$m1],])->distinct('id_etabl')->count('id_etabl');
               echo $a1;             
           ?>
        </td>
  
      </tr>
    </tbody>
  </table>
 
       
      </div>
    </div>
  </div>
</section>

@endsection