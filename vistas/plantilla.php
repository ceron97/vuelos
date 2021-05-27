<?php

    session_start();

?>
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>

            <?php 
                //Valida si existe una ruta, si existe cambia los parametros
                if (isset($_SESSION["iniciarSesion"]) 
                    && $_SESSION["iniciarSesion"] == "ok") {
                    if (isset($_GET["ruta"])) {

                        $cadena_devuelta = ucfirst($_GET["ruta"]);//Pone la primera letra en mayuscula
                        $resultado2 = str_replace("-", " ", $cadena_devuelta);//Reemplaza los guiones por espacios
                        //Asigna una tilde a la palabra

                        echo $resultado2." - Te Damos Alas";

                    }else{
                    //si no existe una ruta se le asigna un nombre a la pagina

                        echo 'Inicio - Te Damos Alas';

                    }
                }else{
                    echo 'login - Te Damos Alas';
                }
            ?>

        </title>

        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--=====================================
        =                  CSS                  =
        ======================================-->
        <!-- Login -->
        <link rel="stylesheet" href="vistas/css/login.css">
        <!-- Principal -->
        <link rel="stylesheet" href="vistas/css/principal.css">


        <!--=====================================
        =               SCRIPTS                 =
        ======================================-->
        <!-- jQuery v3.4.1 -->
        <script src="vistas/js/jquery/jquery.min.js"></script>


        <!--=================================================================
        =                               PLUGINS                             =
        ==================================================================-->  

        <!--=====================================
        =                  CSS                  =
        ======================================-->
        <!-- Bootstrap v4.0.0 CSS -->
        <link rel="stylesheet" href="vistas/dist/css/bootstrap.min.css">
        <!-- datatables -->
        <link rel="stylesheet" href="vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <!-- SweetAlert2 CSS -->
        <link rel="stylesheet" href="vistas/plugins/sweetalert2/sweetalert2.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">


        <!--=====================================
        =            SCRIPTS                    =
        ======================================-->
        <!-- Bootstrap v4.0.0 JS -->
        <script src="vistas/dist/js/bootstrap.min.js"></script>
        <!-- datatables -->
        <script src="vistas/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- sweetalert2 JS -->
        <script src="vistas/plugins/sweetalert2/sweetalert2.min.js"></script>

    </head>

    <body>

        <?php

            if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
                //$_SESSION["iniciarSesion"] = "1";
                echo '<div class="wrapper">';

                /*=============================================
                =                     MENU                    =
                =============================================*/
                include "vistas/modulos/menu.php";

                
                /*=============================================
                =                   CONTENIDO                =
                =============================================*/
                echo '<div class="contenedorCuerpo">';
                if (isset($_GET["vista"])) {

                    if ($_SESSION["id_rol"] == "1") {

                        if ($_GET["vista"] == "inicio"  
                                ||  $_GET["vista"] == "gestionarUsuarios"
                                ||  $_GET["vista"] == "gestionarVuelos"
                                ||  $_GET["vista"] == "gestionarAerolineas"
                                ||  $_GET["vista"] == "gestionarAviones"
                                ||  $_GET["vista"] == "gestionarFabricantes"
                                ||  $_GET["vista"] == "salir") {

                            include 'vistas/modulos/'.$_GET["vista"].'.php';

                        }else{

                            include 'vistas/modulos/404.php';

                        }

                    }elseif($_SESSION["id_rol"] == "3"){

                        if ($_GET["vista"] == "inicio"  
                                ||  $_GET["vista"] == "consultarVuelos"
                                ||  $_GET["vista"] == "gestionarVuelosPropios"
                                ||  $_GET["vista"] == "gestionarInformacionPersonal"
                                ||  $_GET["vista"] == "salir") {

                            include 'vistas/modulos/'.$_GET["vista"].'.php';

                        }else{

                            include 'vistas/modulos/404.php';

                        }

                    }

                }else{

                    include 'vistas/modulos/inicio.php';

                }
                echo '</div>';
                echo '</div>';

                /*=============================================
                =                    FOOTER                   =
                =============================================*/
                include "vistas/modulos/footer.php";


            }else{

                if (isset($_GET["vista"])) {
                        if ($_GET["vista"] == "login"){

                            include "vistas/modulos/login.php";

                        }elseif($_GET["vista"] == "crearCuenta"){

                            include "vistas/modulos/crearCuenta.php";

                        }else{
                            
                            /*=============================================
                            =                     MENU                    =
                            =============================================*/
                            include "vistas/modulos/menu.php";

                            /*=============================================
                            =                   CONTENIDO                =
                            =============================================*/
                            include 'vistas/modulos/inicio.php';

                            /*=============================================
                            =                    FOOTER                   =
                            =============================================*/
                            include "vistas/modulos/footer.php";

                        }

                }else{

                    /*=============================================
                    =                     MENU                    =
                    =============================================*/
                    include "vistas/modulos/menu.php";

                    /*=============================================
                    =                   CONTENIDO                =
                    =============================================*/
                    include 'vistas/modulos/inicio.php';

                    /*=============================================
                    =                    FOOTER                   =
                    =============================================*/
                    include "vistas/modulos/footer.php";

                }

            }

        ?>

        <!-- Gestionar Aerolineas -->
        <script src="vistas/js/gestionarAerolineas.js"></script>
        <!-- Gestionar Aviones -->
        <script src="vistas/js/gestionarAviones.js"></script>
        <!-- Gestionar Fabricantes -->
        <script src="vistas/js/gestionarFabricantes.js"></script>
        <!-- Gestionar Usuarios -->
        <script src="vistas/js/gestionarUsuarios.js"></script>
        <!-- Gestionar Vuelos -->
        <script src="vistas/js/gestionarVuelos.js"></script>
        <!-- Consulta vuelos -->
        <script src="vistas/js/consultarVuelos.js"></script>
        <!-- Gestionar Informacion Personal -->
        <script src="vistas/js/gestionarInformacionPersonal.js"></script>
        <!-- Principal -->
        <script src="vistas/js/principal.js"></script>
    </body>
</html>
