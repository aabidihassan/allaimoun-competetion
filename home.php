<?php

    session_start();
    if(!isset($_SESSION['connected'])) header('Location: index.php');

    require_once('php/connection.php');
    $conn = new Connection();
    $list = $conn->selectAll('total');

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- STYLES CSS -->
        <link rel="stylesheet" href="assetAdmin/css/Dashboard_Profile.css">
        <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet"> 
                
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/528542a19d.js" crossorigin="anonymous"></script>

        <!-- BOX ICONS CSS-->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <title>Administrateur</title>

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
                        <a href="home.php" class="nav__lien active" title="Accueil">
                            <i class='bx bx-grid-alt nav__icon'></i>
                            <span class="nav__texte">Classement</span>
                        </a>
                        <a href="participants.php" class="nav__lien" title="Collaborateurs">
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
                <center>
               <div style="margin-top:5%; width:80%;">
                <table id="table_id" class="display pt-4">
                    <thead>
                        <tr>
                            <th>Participant</th>
                            <th>Total Eau</th>
                            <th>Total Electricite</th>
                            <th>Total des factures</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            foreach($list as $l){ 
                                $user = $conn->selectOne('Participation', $l['participant']);
                                ?>
                                <tr>
                                    <td><?php echo $user['nom'] . " " . $user['prenom']; ?></td>
                                    <td><?php echo $l['totaleau']; ?></td>
                                    <td><?php echo $l['totalelec']; ?></td>
                                    <td><?php echo $l['totalelec'] + $l['totaleau']; ?></td>
                                </tr>
                            <?php } ?>
                    </tbody>
                </table>
                </div>
                </center>
            </section>
        </main>
        
    </body>


    <!-- main js -->
    <script src="assetAdmin/js/main.js"></script>
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
</html>