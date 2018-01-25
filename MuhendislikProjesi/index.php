<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Rehber</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

</head>
<body>

      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  
                      <div class="form-group">
                        <label class="col-form-label">Ad Soyad</label>
                        <input name="bilgilerim_adsoyad" required="" type="text" id="adSoyad" class="form-control" placeholder="Ad Soyad">


                      <div class="form-group"> 
                            <label class="col-form-label" required="" id="telefon">Telefon No</label>
                            <input name="bilgilerim_no" required="" type="text" class="form-control"  placeholder="Telefon No"> 
                      </div>

						<div class="form-group"> 
                            <label class="col-form-label" required="" id="telefon">Adres</label>
                            <textarea name="bilgilerim_adres" required="" type="text" class="form-control"  placeholder="Adres"></textarea>
                      </div>

                      <div class="form-group">
                            <button type="submit"  class="btn btn-danger" name="insertislemi" style="width: 170px">Kaydet</button>
                      </div>
                
                <hr>
                
                <table class="table table-hover" id="kayitlar">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Ad-Soyad</th>
                   <th scope="col">Telefon No</th>
					<th scope="col">Adres</th>
                  <th scope="col"></th>
                  <th scope="col"></th>

                </tr>
              </thead>
              <tbody>
                
              </tbody>
            </table>
            </div>
          </div>
      </div>



<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>

