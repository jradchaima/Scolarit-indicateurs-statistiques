<!doctype html>
<html lang="en">



 <!-- Required meta tags -->
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <body>


        <form action="{{ url('actreg-update/'.$activite->id)}}"   method="post">
        {{csrf_field()}}
        {{ method_field('PUT')}}
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">type_activite</label>
            <input type="text" name="type_activite" class="form-control" value="{{ $activite->type_activite }}">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">nb_activite</label>
            <input type="text"   name="nb_activite" class="form-control" value="{{ $activite->nb_activite }}">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">nb_eleve</label>
            <input type="text"   name="nb_eleve" class="form-control" value="{{ $activite->nb_eleve}}">
          </div>
        
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">id_etabl</label>
            <input type="text"  name="id_etabl"class="form-control" value="{{ $activite->id_etabl }}">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">id_centrale</label>
            <input type="text"  name="id_centrale"class="form-control" value="{{ $activite->id_centrale }}">
          </div>
       
      <div class="modal-footer">
        <a href="{{url('/layouts/indactreg')}}"  class="btn btn-secondary" >BACK</a>
        <button type="submit" class="btn btn-primary">UPDATE</button>
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