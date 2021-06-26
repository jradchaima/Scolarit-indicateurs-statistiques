  
@extends('layouts.sidebar1')

@section('content')
 <style>
 .container {
	position: absolute;
	top: 50%;
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

@if (session('AjouterEtabliss'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('AjouterEtabliss') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (session('deleteEtabliss'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('deleteEtabliss') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="container" style="margin-left:10%;margin-top:-10%">

<br><br>
	<table>
		<thead>
			<tr>
			
				<th>Sanctions</th>
				<th>Nombre sanctions</th>
				<th>Les Causes</th>
			
			</tr>
		</thead>
    <tbody>
            
            <tr>
              
                <td> Expultion temporaire</td>
                <td>
                <?php
               $k = Auth::user()->etabliss_id;
                $m ="expulsion temporaire";
$san = DB::table('sanctions')->where([
    ['etabliss_id', '=', $k],
    ['type_sanction','=' ,$m],
    
])->count();


echo($san);

?>
</td>
                <td> 
                <?php 
                $caus1 = DB::table('sanctions')->where([
                    ['etabliss_id', '=', $k],
                    ['type_sanction','=' ,$m],
                    ['cause_sanction', '=', 'bavarder'],])->count();
                    $caus2 = DB::table('sanctions')->where([
                        ['etabliss_id', '=', $k],
                        ['type_sanction','=' ,$m],
                        ['cause_sanction', '=', 'pas de travail'],])->count();

         if($caus1 > $caus2)
         echo "bavarder";
         else if ($caus1 < $caus2)
         echo "pas de travail";
         else  if ($caus1 == $caus2)
         echo "bavarder et pas de travail";
         else
         echo "cause non connu";
         ?>
                </td>
       
            </tr>
    <tr>
      
    <td> Expultion definitive</td>
    <td>
    <?php
  
    $k1 = Auth::user()->etabliss_id;
                $m1 ="expulsion definitive";
$san1 = DB::table('sanctions')->where([
    ['etabliss_id', '=', $k1],
    ['type_sanction','=' ,$m1],
    
])->count();
echo($san1);

?>
</td>
<td>
<?php 
                $cause1 = DB::table('sanctions')->where([
                    ['etabliss_id', '=', $k1],
                    ['type_sanction','=' ,$m1],
                    ['cause_sanction', '=', 'bavarder'],])->count();
                    $cause2 = DB::table('sanctions')->where([
                        ['etabliss_id', '=', $k1],
                        ['type_sanction','=' ,$m1],
                        ['cause_sanction', '=', 'pas de travail'],])->count();

         if($cause1 > $cause2)
         echo "bavarder";
         else if ($cause1 < $cause2)
         echo "pas de travail";
         else  if ($cause1 == $cause2)
         echo "bavarder et pas de travail";
         else
         echo "cause non connu";
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