<?php

require_once dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'controller'.DIRECTORY_SEPARATOR.'loginController.php';
include('header.php');

new header('Login', '../css/login.css');
$connection = new connection();

/*---------- superGlobales ----------*/

	   /* Création du compte */
	   $prenom 	 = isset($_POST['prenom'])   ? $_POST['prenom']   : null;
	   $nom 	 = isset($_POST['nom']) 	 ? $_POST['nom'] 	  : null;
	   $email 	 = isset($_POST['email']) 	 ? $_POST['email']    : null;
	   $password = isset($_POST['password']) ? $_POST['password'] : null;

	   /*  Connexion compte  */
	   $emailDeConnexion 		= isset($_POST['emailDeConnexion'])  	 	 ? $_POST['emailDeConnexion']    : null;
	   $passwordDeConnexion 	= isset($_POST['passwordDeConnexion'])  	 ? $_POST['passwordDeConnexion'] : null;

	   /* Info sur la connexion */
	   $_SESSION['wrongPassword'] = 0;
	   $_SESSION['wrongEmail'] = 0;

if($prenom != null AND $nom != null AND $email != null AND $password != null)
{
	$connection -> create($prenom, $nom, $email, $password);
}

if($emailDeConnexion != null AND $passwordDeConnexion)
{
	$connection -> login($emailDeConnexion, $passwordDeConnexion);
}
?>

<body>


<div class="container" id="container">
	<div class="form-container sign-up-container">
		
		<form action="" method="post">
			<h1>Créer un compte </h1>
			
			<input type="text" placeholder="Prenom" name="prenom" required/>
			<input type="text" placeholder="Nom" name="nom" required/>
			<input type="email" placeholder="Email" name="email" required/>
			<?php

				if($_SESSION['wrongEmail'] == 1)
				{
					echo '<span class="info">L\'email est déjà utilisé</span>';
				}

			?>
			

			<input type="password" placeholder="Password" name="password" required/>

			<button>S'inscrire</button>
		</form>
		</div>
	
	<div class="form-container sign-in-container">
		<form action="" method="post">
			<h1>Se connecter</h1>
			
			<span>Entrez vos Informations</span>
			<input type="email" placeholder="Email" name="emailDeConnexion" required/>
			<?php

				if($_SESSION['wrongPassword'] == 1)
				{
					echo '<span class="info">L\'email ou le mot de passe est incorrect</span>';
				}

			?>

			<input type="password" placeholder="Password" name="passwordDeConnexion" required/>
			<button >Connexion</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Hé, Bon retour</h1>
				<p>Pour rester connecter avec nous veuillez entrez vos informations personnelles</p>
				<button class="ghost" id="connexion">Se connecter</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hé,</h1>
				<p>Entrez vos informations personnelles pour ouvrir un compte chez nous</p>
				<button class="ghost" id="Inscrire">S'inscrire</button>
			</div>
		</div>
	</div>
</div>

<script src="../Js/login.js" charset="utf-8"></script>
</body>

</html>
