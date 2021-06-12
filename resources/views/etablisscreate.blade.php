  
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



<fieldset style="margin-left:8%;">
        <legend>Nouveau utilisateur établissement</legend>
        <form action="{{ route('user.store') }}" method="post">
            @csrf

                <div class="row">
                <div class="col">
                    <div class="form-group">
           
                      <label for="pet-select">Choisir un établissement:</label>

                      <select name="region" id="region" onChange="changecat(this.value);" class="form-control">
                      <option value="" disabled selected>Select</option>
                      <?php
                      $san1 = DB::table('etablissements')->get();
                      foreach($san1 as $s){
                          $id = $s->id;
                          $nom = $s->nom;
                    

                      ?>
    <option value="<?php  echo $id;?>"> <?php  echo $nom;?></option>
    
  <?php
   }
   ?>


</select>
 


</div>

                <div class="row">
                <div class="col">
                    <div class="form-group">
                      <label for="Email">Email </label>
                      <input type="email" name="email"  value="{{ old('email') }}" id="email" class="form-control" placeholder="" >
                      @error('email')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col">
                    <div class="form-group">
                      <label for="Mot de passe">Mot de passe</label>
                      <input type="password" name="password"  value="{{ old('password') }}" id="password" class="form-control" placeholder="" >
                      @error('password')<div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <button type="submit"class="btn btn-outline-primary btn-block">Ajouter!</button>
            </div>
        </form>
    </fieldset>
    </section>
 
    @endsection