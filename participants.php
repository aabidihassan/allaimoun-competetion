<?php

    session_start();
    if(!isset($_SESSION['connected'])) header('Location: index.php');

    require_once('php/connection.php');
    $conn = new Connection();

    if(isset($_POST['add'])){
        $conn->insert('Participation', ['nom', 'prenom', 'telephone', 'adresse'],
        [$_POST['nom'], $_POST['prenom'], $_POST['telephone'], $_POST['adresse']]);
        header('Location: participants.php');
    }

    if(isset($_GET['id'])){
        $conn->delete('Participation', $_GET['id']);
        header('Location: participants.php');
    }

    $list = $conn->selectAll('Participation');

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- STYLES CSS -->
        <link rel="stylesheet" href="assetAdmin/css/Dashboard_Profile.css"> 
        <link rel="stylesheet" href="assetAdmin/css/Collaborateurs.css"> 
        <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet"> 
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="assetAdmin/js/Collaborateurs.js"></script>        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/528542a19d.js" crossorigin="anonymous"></script>

        <!-- BOX ICONS CSS-->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="assetAdmin/bootstrap-5.1.3-dist/css/bootstrap.css">
        <script src="assetAdmin/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
        <title>Collaborateurs</title>

         <!-- DATATABLE -->
         <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    </head>
    <body id="body">

     
        <div class="l-navbar" id="navbar">
        <nav class="nav_b">
                <div>
                    <span class="nav__logos-text"><i class="fa-solid fa-school-flag me-2 fs-3"></i>Association Des parents</span>
        
                    <ul class="nav__dict">
                        <a href="home.php" class="nav__lien" title="Accueil">
                            <i class='bx bx-grid-alt nav__icon'></i>
                            <span class="nav__texte">Classement</span>
                        </a>
                        <a href="participants.php" class="nav__lien active" title="Collaborateurs">
                            <i class='bx bx-id-card nav__icon'></i>
                            <span class="nav__texte">Participants</span>
                        </a>
                    </ul>
                </div>
                <a href="php/logout.php" class="nav__lien" id="nav-link-close">
                    <i class='bx bx-log-out-circle nav__icon'></i>
                    <span class="nav__texte">Déconnexion</span>
                </a>
            </nav>
        </div>
        <main>
           <section class="first">
                <div class="shadow p-2 mb-3 bg-body rounded">
                    <div class="d-flex justify-content-center">
                        <img src="./assetAdmin/images/logo_royaume.png" id="logo_royaume" class="rounded border-0"/>
                    </div>
                </div>
                <h2 id="text-body" >Classement des participants</h2> 
                    
                   
                   <!-- <div class="border_vide"></div> -->
                   <!----------------------ajouter un nouveau collaborateurs--------------------->
                   
                   <div class="hidden_formulaires">
                        <div class="ajouter_user">
                                <p><ion-icon name="add-outline" class="add"></ion-icon><span>Ajouter un nouveau participant </span></p>
                        </div>
                        <div class="formulaire_utilisateur">
                            <form method="POST">
                            <div class="form_container_utilisateur">
                                <div class="nom_prenom_title">
                                    <div class="petit_titre">
                                        <i class="fa-solid fa-user me-2"></i><span>| Participant</span>
                                    </div>
                                    <div class="nom_prenom">
                                        <div class="row g-2">
                                            <div class="col-md">
                                                <input type="text" name="nom" id="" placeholder="Nom" class="form-control">
                                            </div>
                                            <div class="col-md">
                                                <input type="text" name="prenom" id="" placeholder="Prénom" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-md">
                                                <input type="text" name="adresse" id="" placeholder="Adresse" class="form-control">
                                            </div>
                                            <div class="col-md">
                                                <input type="tel" name="telephone" id="" placeholder="Telephone " class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="submit ms-5">
                                    <div class="btn_formulaires">
                                    <button type="submit" name="add">Ajouter</button>
                                    </div>
                                </div>
                            </div>

                            </form>
                            
                        </div>

                        <!-- <div class="ajouter_facture">
                            <p>
                                <ion-icon name="add-outline" class="add"></ion-icon><span>Ajouter une facture </span>
                            </p>
                        </div>
                        <div class="formulaire_facture">
                            <form action="" method="POST">
                                <div class="form_container_facture">
                                    <div class="facture_title">
                                        <div class="petit_titre">
                                            <span>Facture</span>
                                        </div>
                                        <div class="facture">
                                            <select name="user" id="user">
                                                <option selected hidden>Personnes</option>
                                                <option value="homme">Hassan Aabidi</option>
                                                <option value="femme">Hamza Essakhi</option>
                                            </select>
                                            <input type="number" name="electricite" id="electricite" placeholder="l'électricité ">
                                            <input type="number" name="eau" id="eau" placeholder="l'eau ">
                                            <select name="annee" id="sexe">
                                                <option selected hidden>Année</option>
                                                <option value="homme">2022</option>
                                                <option value="femme">2023</option>
                                            </select>
                                            <select name="mois" id="pays">
                                                <option selected hidden>Mois</option>
                                                <option value="Afghanistan">1</option>
                                                <option value="Afghanistan">2</option>
                                                
                                            </select>

                                        </div>
                                    </div>
                                    <div class="submit">
                                        <div class="btn_formulaires">
                                            <button type="submit">Ajouter</button>
                                            <a href="#">Modifier</a>
                                        </div>
                                    </div>
                                </div>
                        
                            </form>
                        
                        </div> -->
                </div>

                <center>
               <div style="margin-top:5%; width:80%;">
                <table id="table_id" class="display pt-4">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Adresse</th>
                            <th>Telephone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            foreach($list as $l){ ?>
                                <tr>
                                    <td><?php echo $l['nom']; ?></td>
                                    <td><?php echo $l['prenom']; ?></td>
                                    <td><?php echo $l['adresse']; ?></td>
                                    <td><?php echo $l['telephone']; ?></td>
                                    <td>
                                        <div class="suppression">
                                            <a href="factures.php?id=<?php echo $l['id'] ?>" title="Consulter"><i class="bx bx-edit edit text-primary"></i></a>
                                            <a href="participants.php?id=<?php echo $l['id'] ?>" title="Supprimer"><i class="bx bx-trash trash text-danger"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                    </tbody>
                </table>
                </div>
                </center>

                <!--********************* modal pour modifier la valeur de facture **********************-->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Consulter factures</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body modal_bdy">
                                <div class="fact_year">
                                    <input type="text" name="fact" id="fact" placeholder="Année de facture ">
                                </div>
                                <div class="fact_type">
                                    <select name="type_fact" id="type_fact">
                                        <option selected hidden>Type de facture</option>
                                        <option value="Eau">Eau</option>
                                        <option value="Electricicté">Electricicté</option>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Valider</button>
                                <button type="reset" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Annuler</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            
        </main>
        
    </body>
    <!-- MAIN JS -->
    <script src="assetAdmin/js/main.js"></script>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="js/annonce.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


    <!--------------script de formulaire----------->
    <script>
        $(document).ready(function(){
            $('#table_id').DataTable();
            $(".ajouter_user").click(function(){
                $(".formulaire_utilisateur").slideToggle("slow");
            });

             $(".ajouter_facture").click(function () {
                $(".formulaire_facture").slideToggle("slow");
            });
        });
</script>

</html>