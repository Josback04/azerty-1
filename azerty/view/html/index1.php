<?php
session_start();

require_once dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'controller'.DIRECTORY_SEPARATOR.'loginController.php';
include('header.php');

new header('Loginjhdgsdh', '../Css/style2.css');
?>

<body>
    <header>
        <div class="banniere_image">
            
        <nav>
            <ul>
                <li><a href="">Home</a></li>

                <?php
                if(isset($_SESSION['nom']))
                {
                    echo '<li><a href="./deconnexion.php">Se déconnecter</a></li>';
                }
                else
                {
                    echo '<li><a href="./login.php">Se connecter</a></li>';
                }
                    
                ?>
                
                <li><a href="../projet/destination.php">Destination</a></li>
                <li><a href="">Reservation Vol</a></li>
                <li><a href="">Infos</a></li>

            </ul>
        </nav>
        <h2>Name</h2>

       <div class="slogan">  <h1> Decouvrez des endroits uniques pour vos voyages <br> marre du commun</h1> </div>

       <!-- div barre de recherche -->
       <div class="contour_barre_recherche">
        <div class="zone_barre_recherche"> 
            <input type="text" placeholder="Ou veux tu aller?">
            <select name="" id="">
                <option value="" aria-placeholder="Ou">efqfq</option> 
            </select>

            <button class="chercher">Chercher</button>
        </div>

       </div>
    </div>
    </header>

    <!-- section mid Favorites places -->

    <section class="Middle">
       
        
        </div><div class="container_card">
            <div class="card_content"> 
                <a href="">
                    <img src="../projet/medias/Turaida_Castle_shutterstock_1099742582-300x250.jpg" alt="">
                    <div class="description_place">
                        <h4>ASSIKALA, FINLAND</h4>
                        <p>Southern Finland </p>
                    </div>
                </a>
            </div>

        </div><div class="container_card">
            <div class="card_content"> 
                <a href="">
                    <img src="../projet/medias/Trinity-College_Dublin_shutterstock_1117321526-300x250.jpg"  alt="">
                    <div class="description_place">
                        <h4>ASSIKALA, FINLAND </h4>
                        <p>Southern Finland</p>
                    </div>
                </a>
            </div>

        </div><div class="container_card">
            <div class="card_content"> 
                <a href="">
                    <img src="../projet/medias/Trinity-College_Dublin_shutterstock_1117321526-300x250.jpg"  alt="">
                    <div class="description_place">
                        <h4>ASSIKALA, FINLAND</h4>
                        <p>Southern Finland </p>
                    </div>
                </a>
            </div>

        </div>
        <div class="container_card">
            <div class="card_content"> 
                <a href="">
                    <img src="../projet/medias/Turaida_Castle_shutterstock_1099742582-300x250.jpg"  alt="">
                    <div class="description_place">
                        <h4>ASSIKALA, FINLAND</h4>
                        <p>Southern Finland </p>
                    </div>
                </a>
            </div>
        </div>
        
        <div class="container_card">
            <div class="card_content"> 
                <a href="">
                    <img src="../projet/medias/Edinburgh-259x300 - Copie.jpg"  alt="">
                    <div class="description_place">
                        <h4>ASSIKALA, FINLAND</h4>
                        <p>Southern Finland </p>
                    </div>
                </a>
            </div>  
        </div>
    </section>

    <section class="Why_us">
        <h3>Pourquoi nous</h3>
        <p>On vous offre la plateforme idéale pour découvrir et échanger</p>

        <div class="Avis">
            <i class="fa-regular fa-star"></i>
            <h3>Meilleure sélection</h3>
            <div class="decrip_card">
                <p>Avec notre Sélection des meilleurs autochtones, votre valise se fera toute seule </p>
            </div>
        </div>

        <div class="Avis">
            <i class="fa-regular fa-shield-check"></i>
            <h3>Meilleure rapport Qualité-Prix</h3>
            <div class="decrip_card">
                <p>A croire que c'est offert, mais attention, vous n'etes pas le produit </p>
            </div>
        </div>

        <div class="Avis">
            <i class="fa-light fa-comments-question"></i>
            <h3>24/7 d'aide</h3>
            <div class="decrip_card">
                <p>Besoin d'aide? d'un petit conseil? Bah on est là !!!</p>
            </div>
        </div>

    </section>

   <!-- position place -->
   <section class="position">
    <div class="generale">
        <h3>Proche de vous !</h3>

        <div class="position_place">
            <div class="un">
                <img src="../projet/medias/Edinburgh-259x300 - Copie.jpg" alt="Edinburg">
                <div class="image_hover">
                    <a href="" class="texte_hover"> Venez visiter Edinburg et ses particularités...</a>
                </div>
            </div>

            <div class="une">
                <img src="../projet/medias/Edinburgh-259x300 - Copie.jpg" alt="Edinburg">
                <div class="image_hover">
                    <a href="" class="texte_hover"> Venez visiter Edinburg et ses particularités...</a>
                </div>
            </div>

            <div class="une">
                <img src="../projet/medias/Edinburgh-259x300 - Copie.jpg" alt="Edinburg">
                <div class="image_hover">
                    <a href="" class="texte_hover"> Venez visiter Edinburg et ses particularités...</a>
                </div>
            </div>

            <div class="une">
                <img src="../projet/medias/Edinburgh-259x300 - Copie.jpg" alt="Edinburg">
                <div class="image_hover">
                    <a href="" class="texte_hover"> Venez visiter Edinburg et ses particularités...</a>
                </div>
            </div>

            <div class="une">
                <img src="../projet/medias/Edinburgh-259x300 - Copie.jpg" alt="Edinburg">
                <div class="image_hover">
                    <a href="" class="texte_hover"> Venez visiter Edinburg et ses particularités...</a>
                </div>
            </div>

            <div class="une">
                <img src="../projet/medias/Edinburgh-259x300 - Copie.jpg" alt="Edinburg">
                <div class="image_hover">
                    <a href="" class="texte_hover"> Venez visiter Edinburg et ses particularités...</a>
                </div>
            </div>
        </div>
    </div>
   </section>
    <!-- aside -->
    <!-- Top Autochtones -->
    <section class="Top_autochtones">
       <a href=""> <h4 class="all_autochtones">Tous les Autochtones</h4> </a>
        <h3>Top Autochtones</h3>
        
        <div class="generale_top_autochtones">
            <div class="autochtone_card">
                <a href="">
                <div class="card_content_autochtone">
                    <h3>John Doe <br>Autochtone nv3</h3>
                </div>
            </a>
            </div>

            <div class="autochtone_card">
                <a href="">
                <div class="card_content_autochtone">
                    <h3>John Doe <br>Autochtone nv3</h3>
                </div>
            </a>
            </div>

            <div class="autochtone_card">
                <a href="">
                <div class="card_content_autochtone">
                    <h3>John Doe <br>Autochtone nv3</h3>
                </div>
            </a>
            </div>

            <div class="autochtone_card">
                <a href="">
                <div class="card_content_autochtone">
                    <h3>John Doe <br>Autochtone nv3</h3>
                </div>
            </a>
            </div>
        </div>
        
    </section>

    <footer>
        <div class="titre_footer">
            <h3>AZERTY</h3> </div>
        
        

        <div class="azerty">
            <a href="">About us</a>
            <a href="">Destination</a>
            <a href="">Reservation vol</a>
            <a href="">Blog</a>
            <a href="">Deal</a>
        </div>

        <div class="information">
            <a href="">Help</a>
            <a href="">Contact</a>
            <a href="">Privacy Policy</a>
            <a href="">Terms & conditions</a>
            <a href="">Trust & Safety</a>
        </div>

        <div class="social_media">
            <i class="fa fa-facebook-square"></i>
            <i class="fa fa-twitter-square"></i>
            <i class="fa fa- instagram-square"></i>
        </div>
    </footer>

</body>
</html>