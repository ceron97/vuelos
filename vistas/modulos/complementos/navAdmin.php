<div class="collapse navbar-collapse " id="navbarTogglerDemo02">
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a href="inicio" class="nav-link <?php if ($_GET["vista"] == "inicio") {echo "active"; } else  {echo "";}?>">
                Inicio 
            </a>
        </li>
        <li class="nav-item">
            <a href="gestionarUsuarios" class="nav-link <?php if ($_GET["vista"] == "gestionarUsuarios") {echo "active"; } else  {echo "";}?>">
                Gestionar Usuarios
            </a>
        </li>
        <li class="nav-item">
            <a href="gestionarVuelos" class="nav-link <?php if ($_GET["vista"] == "gestionarVuelos") {echo "active"; } else  {echo "";}?>">
                Gestionar Vuelos
            </a>
        </li>
        <li class="nav-item">
            <a href="gestionarAerolineas" class="nav-link <?php if ($_GET["vista"] == "gestionarAerolineas") {echo "active"; } else  {echo "";}?>">
                Gestionar Aerolineas
            </a>
        </li>
        <li class="nav-item">
            <a href="gestionarAviones" class="nav-link <?php if ($_GET["vista"] == "gestionarAviones") {echo "active"; } else  {echo "";}?>">
                Gestionar Aviones
            </a>
        </li>
        <li class="nav-item">
            <a href="gestionarFabricantes" class="nav-link <?php if ($_GET["vista"] == "gestionarFabricantes") {echo "active"; } else  {echo "";}?>">
                Gestionar Fabricantes
            </a>
        </li>
        <li class="nav-item">
            <a href="salir" class="nav-link">
                Salir
            </a>
        </li>
    </ul>
</div>