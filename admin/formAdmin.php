  <?php
    	session_start();
    	require "lib.php";
    	include "../index/header.php"
    ?>
    <section >
    <?php
    if(isset($_SESSION["error"])){
    		//?errors=1,2,3,4,6
    		$list_Errors = explode(",", $_SESSION["error"]);
    		foreach ($list_Errors as $error) {
    			echo "<li>".$msgError[$error];
    		}
    		$form = $_SESSION["data"];
    		unset($_SESSION["data"]);
    		unset($_SESSION["error"]);

    	}
      if (AdminConnected()) {

    ?>



    <head>

    <script  src="../js/changementForm.js" charset="utf-8"></script>
    </head>

  <div class="row">
    <div class="col-lg-10 col-md-9">
      <!--                        <div class="col-lg-1"><img src="img/ajout_contact.png" alt=""></div>-->
      <h1 class="titre-contact">Ajout </h1>
    </div>

  </div>
  </div>


  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="tableaudebord">
          <div class="contact_container">
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <h2>Selectionnez le type de donnée à entrer</h2>
                <p> Veuillez remplir toutes les informations ci-dessous</p>
                <div class="nb_com" style="display:none">9</div>
              </div>
            </div>
          </div>

          <div class='container'>
            <div class='row'>



<center>


                <div class='row'>

                  <div class="col-lg-6">
                    <!--<form class="form-horizontal" role="form">-->
                    <div class="form-group">
                      <label for="choix" class="col-sm-3 control-label">Choisir type :</label>
                      <div class="col-sm-8">
                        <select  class="form-control"  name="choix"  required="requried"
                    		onchange ="changeForm(this)">
                        <option value="1">
                          Musique
                        </option>
                        <option value="2">
                          Evenement
                        </option>
                        <option value="3">
                          Etablissement
                        </option>
                        <option value="4">
                          Film
                        </option>
                      </select>
                      </div>
                    </div>
                  </div>
                </div>
                <br />
                  <!--Formulaire Musique-->
                    <section id="1" style= "display:block">
                      <div class='row'>

                        <div class="col-lg-6">
                      <form method= "POST" class="form-horizontal" name ="musique" role="form"  action = "saveAdminMusique.php" >
                      <div class="form-group">
                        <label for="Genre" class="col-sm-3 control-label">Genre :</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="genre" placeholder="Exemple : Rock" required="requried" value="<?php echo (isset($form["genre"]))?$form["genre"]:"" ?>">
                          <br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Artiste" class="col-sm-3 control-label">Artiste :</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="artiste" placeholder="Exemple : AC/DC" required="requried"
                          value="<?php echo (isset($form["artiste"]))?$form["artiste"]:""?>">
                        </div>
                      </div>

                      <br>
                      <div class="form-group">
                        <label for="Album" class="col-sm-3 control-label">Album :</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="album" placeholder="Exemple: Highway to hell" required="requried" value="<?php echo (isset($form["album"]))?$form["album"]:"" ?>">
                        </div>
                      </div>


                      <div class="form-group">
                        <label for="cp" class="col-sm-3 control-label">Piste :</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="nom_piste" placeholder="Exemple: Highway to hell" required="requried" value="<?php echo (isset($form["nom_piste"]))?$form["nom_piste"]:"" ?>">
                        </div>
                      </div>

                  <div class="col-lg-12">
                    <div class="button">
                      <div class="col-lg-5 col-md-7 hidden-md hidden-xs">
                      <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-xs-12">
                        <button name="submit" id="submit" type="submit" value="submit" class="btn btn-default"><span class="glyphicon glyphicon-floppy-disk"></span>Enregistrer<span class="glyphicon glyphicon-chevron-right"></span></button>
                      </div>
                    </div>
                  </div>
                  </div>
                </form>
                </div>

                </div>
                    </section>
                    <!--formulaire Evenement-->
                    <section id="2" style= "display:none">
                      <div class='row'>

                        <div class="col-lg-6">
                      <form method= "POST" class="form-horizontal" name ="inscription" role="form"  action = "saveAdminEvent.php" >

                      <div class="form-group">
                        <label for="nom" class="col-sm-3 control-label">Nom : </label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="nom_event" placeholder="Nom de l'évenement" required="requried" value="<?php echo (isset($form["nom_event"]))?$form["nom_event"]:"" ?>">
                          <br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Date:</label>
                        <div class="col-sm-8">
                          <input type="date" class="form-control" name="date_event" placeholder="" required="requried"
                          value="<?php echo (isset($form["date_event"]))?$form["date_event"]:"" ?>">
                        </div>
                      </div>
                      <br>
                      <div class="form-group">
                        <label for="mail" class="col-sm-3 control-label">Genre :</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="genre" placeholder="Exemple : Variété" required="requried" value="<?php echo (isset($form["genre"]))?$form["genre"]:"" ?>">
                        </div>
                      </div>


                      <div class="form-group">
                        <label for="cp" class="col-sm-3 control-label">Code Postal</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="CP" placeholder="ex : 75012" required="requried" value="<?php echo (isset($form["CP"]))?$form["CP"]:"" ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="ville" class="col-sm-3 control-label">Adresse:</label>
                        <div class="col-sm-8">
                          <input type="text" name="adresse" class="form-control" placeholder="ex : 222 boulevard Foch, Paris" required="requried" value="<?php echo (isset($form["adresse"]))?$form["adresse"]:"" ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="ville" class="col-sm-3 control-label">n°établissement:</label>
                        <div class="col-sm-8">
                          <input type="text" name="adresse" class="form-control" placeholder="ex : 4" required="requried" value="<?php echo (isset($form["id_etablissement"]))?$form["id_etablissement"]:"" ?>">
                        </div>
                      </div>


                  <div class="col-lg-12">
                    <div class="button">
                      <div class="col-lg-5 col-md-7 hidden-md hidden-xs">
                      <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-xs-12">
                        <button name="submit" id="submit" type="submit" value="submit" class="btn btn-default"><span class="glyphicon glyphicon-floppy-disk"></span>Enregistrer<span class="glyphicon glyphicon-chevron-right"></span></button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>


                    </section>
                    <section id="3" style= "display:none">
                      <div class='row'>

                        <div class="col-lg-6">
                      <form method= "POST" class="form-horizontal" name ="form_etab" role="form"  action = "saveAdminEtab.php" >

                      <div class="form-group">
                        <label for="nom" class="col-sm-3 control-label">Nom : </label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="nom_etablissement" placeholder="ex: Stade de France " required="requried" value="<?php echo (isset($form["nom_event"]))?$form["nom_event"]:"" ?>">
                          <br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="nom" class="col-sm-3 control-label">Type : </label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="type" placeholder="ex: Bar" required="requried" value="<?php echo (isset($form["nom_event"]))?$form["nom_event"]:"" ?>">
                          <br>
                        </div>
                      </div>
                      <br>
                      <div class="form-group">
                        <label for="mail" class="col-sm-3 control-label">Genre :</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="genre" placeholder="Exemple : Variété" required="requried" value="<?php echo (isset($form["genre"]))?$form["genre"]:"" ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="ville" class="col-sm-3 control-label">Adresse:</label>
                        <div class="col-sm-8">
                          <input type="text" name="adresse" class="form-control" placeholder="ex : 222 boulevard Foch, Paris" required="requried" value="<?php echo (isset($form["adresse"]))?$form["adresse"]:"" ?>">
                        </div>
                      </div>


                      <div class="form-group">
                        <label for="cp" class="col-sm-3 control-label">Code Postal</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="CP" placeholder="ex : 75012" required="requried" value="<?php echo (isset($form["CP"]))?$form["CP"]:"" ?>">
                        </div>
                      </div>




                  <div class="col-lg-12">
                    <div class="button">
                      <div class="col-lg-5 col-md-7 hidden-md hidden-xs">
                      <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-xs-12">
                        <button name="submit" id="submit" type="submit" value="submit" class="btn btn-default"><span class="glyphicon glyphicon-floppy-disk"></span>Enregistrer<span class="glyphicon glyphicon-chevron-right"></span></button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>


                    </section>

                    </section>
                    <section id="4" style = "display :none">

                    </section>
                    <!--                                    </form>-->
                  </div>


          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
<footer>
  <div class="row">
    <div class="col-lg-12">
      <p>Copyright &copy; Lucky Party 2017</p>
    </div>
  </div>
  <!-- /.row -->
</footer>
<?php }else {
  header("Location: connectAdmin.php");
} ?>
