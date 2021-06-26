
<!doctype html>
<html lang="en">



 <!-- Required meta tags -->
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <body>

        <form action="{{ url('dossier-update/'.$dossiermedical->id)}}"   method="post">
        {{csrf_field()}}
        {{ method_field('PUT')}}
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">nom_etudient</label>
            <input type="text" name="nom_etudient" class="form-control" value="{{ $dossiermedical->nom_etudient }}">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">prenom_etudient</label>
            <input type="text"   name="prenom_etudient" class="form-control" value="{{ $dossiermedical->prenom_etudient }}">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">handicape</label>
            <input type="text"   name="handicape" class="form-control" value="{{ $dossiermedical->handicape}}">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">maladie_chronique</label>
            <input type="text"  name="maladie_chronique"class="form-control" value="{{ $dossiermedical->maladie_chronique }}">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">autre_maladie</label>
            <input type="text"  name="autre_maladie"class="form-control" value="{{ $dossiermedical->autre_maladie }}">
          </div>
     
       
       
      <div class="modal-footer">
        <a href="{{url('/layouts/dossiermedical')}}"  class="btn btn-secondary" >Fermer</a>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
      </div>
      </form>
    </div>
  </div>
</div>
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>