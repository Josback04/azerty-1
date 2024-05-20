<?php
include('header.php');
$idUser = isset($_SESSION['nom']) ? $_SESSION['nom'] : null;

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'ajouterMediaController.php';

include('./footer.php');

$header  = new header('CREER UNE DESTINATION', '../Css/style2.css');
$header2=new header('CREER UNE DESTINATION', '../Css/creation.css');
// $header2->nav();
$header->nav();

//superGlobales
$idUser = isset($_SESSION['idUser'])         ? $_SESSION['idUser']         : null;

$idDest = isset($_GET['idDest']) ? $_GET['idDest'] : null;

$ajout = new ajout();

if($_FILES != null)
{
    $ajout -> setMedia($idDest, $_FILES); 
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
								<h3>Ajouter des photos</h3>
							</div>
							<p>Voir des petits details sur le site</p>
<?php
    $ajout -> getDestination($idDest);
?>
                            <div class="formRow">
                                <div class="formHolder"> 
                                    <input class="inputImg" type="file" placeholder="choisirImage" name="image" required/>
                                </div>
							</div>

                            <div class="formHolder">
                                        <input type="submit" value="Enregistrer" id="upload">      
                            </div>
							
						</div>
					</div>
                </section>
            </form>
		</div>

		
</body>

<script src="../Js/creationSite.js"></script>