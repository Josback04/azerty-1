<?php
include('header.php');
$idUser = isset($_SESSION['nom']) ? $_SESSION['nom'] : null;

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'creationSiteController.php';

include('./footer.php');

$header  = new header('CREER UNE DESTINATION', '../Css/style2.css');
$header2=new header('CREER UNE DESTINATION', '../Css/creation.css');
// $header2->nav();
$header->nav();

//superGlobales
$idUser = isset($_SESSION['idUser'])         ? $_SESSION['idUser']         : null;

$nom         = isset($_POST['nom'])         ? $_POST['nom']         : null;
$ville       = isset($_POST['ville'])       ? $_POST['ville']       : null;
$pays        = isset($_POST['pays'])        ? $_POST['pays']        : null;
$continent   = isset($_POST['continent'])   ? $_POST['continent']   : null;
$description = isset($_POST['description']) ? $_POST['description'] : null;
$adresse    = isset($_POST['adresse'])    ? $_POST['adresse']    : null;

$adresse = str_replace(' ', '+', $adresse);

$creation = new creation();

if($nom != null AND $ville != null AND $pays != null AND $continent != null AND $description != null AND $idUser != null AND $adresse != null)
{
    $creation -> setSite($idUser, $continent, $pays, $adresse, $nom, $description, $_FILES);
}
?>
<body>
		<div class="wrapper">
            <form action="" method="POST" id="wizard" enctype="multipart/form-data">
        		<!-- SECTION 1 -->
                <section id="etape1" class="card active">
                    <div class="partie1">
						<div class="imgGauche">
							<img src="../medias/Belfast-City-Hall.jpg" alt="">
						</div>
						<div class="formContent" >
							<div class="formHeader">
								<h3>Rejoignez nous</h3>
							</div>
							<p>Voir des petits details sur vous-même</p>
                        <?php 

                            $creation -> getUser($idUser);

                        ?>
                            <div class="formRow">
                                <div class="formHolder" >

                                </div>
                                <div class="formHolder">
                                     <button onclick=next1(); id="btn-next1">Suivant</button>
                                </div>
                               
                            </div>
							
						</div>
					</div>
                </section>

				<!-- SECTION 2 -->
                <h2></h2>
                <section id="etape2" class="card">
                    <div class="partie1">
						<div class="imgGauche">
                        <img src="../medias/Belfast-City-Hall.jpg" alt="">
						</div>
						<div class="formContent">
							<div class="formHeader">
								<h3>Rejoignez nous</h3>
							</div>
							<p>Ajoutez des petits détails</p>
							
							<div class="formRow">
                                <div class="formHolder">
                                    <select name="continent" id="selectionner">
                                    <?php

                                        $creation -> getContinent();

                                    ?>
                                    </select>
                                </div>

                                <div class="formHolder"> 
                                    <input type="text"placeholder="Pays" class="formControl" name="pays" required>
                                </div>
								
							</div>

                            <div class="formRow">
								<div class="formHolder">
									<input type="text" placeholder="Ville" class="formControl" name="ville" required>
								</div>

                                <div class="formHolder"> 
                                    <input type="text" placeholder="Nom du site" class="formControl" name="nom" required>
                                </div>
                            </div>

                            <div class="formRow">
                                <div class="formHolder"> 
                                    <input class="inputImg"  required type="file" placeholder="choisirImage" name="image" required/>
                                </div>
                            </div>

                            <div class="formRow">
                                <div class="formHolder" >
                                    <button onclick=prev1() id="btn-prev1">Précedent</button>
                                </div>
                                <div class="formHolder">
                                     <button onclick=next2() id="btn-next2">Suivant</button>
                                </div>
                            </div>

							
						</div>
					</div>
                </section>

                <!-- SECTION 3 -->
                <h2></h2>
                <section id="etape3" class="card">
                    <div class="partie1">
						<div class="imgGauche">
                        <img src="../medias/Belfast-City-Hall.jpg" alt="">
						</div>
						<div class="formContent">
							<div class="formHeader">
								<h3>Rejoignez nous</h3>
							</div>
							<p>Une description</p>

                            <div class="formRow">
								<div class="formHolder">
									<input type="text" placeholder="Adresse" class="formControl" name="adresse" style="width: 600px;" required>
								</div>
                            </div>

							<div class="formRow">
								<div class="formHolder w-100">
									<textarea name="description" id="" placeholder="description du site" class="formControl" style="height: 99px;" required></textarea>
								</div>
							</div>
                            <div class="formRow">
                                <div class="formHolder" >
                                    <button onclick=prev2() id="btn-prev2" >precedent</button>
                                </div>
                                
                                <div class="formHolder">
                                    <a href="./destination.php">
                                        <input type="submit">
                                    </a>
                                     
                                </div>
                               
                            </div>
							
						</div>
                        
					</div>
                    
                </section>
                
                

            </form>
		</div>

		
</body>

<script src="../Js/creationSite.js"></script>