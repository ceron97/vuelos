<div class="collapse navbar-collapse " id="navbarTogglerDemo02">
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a href="inicio" class="nav-link <?php if ($_GET["vista"] == "inicio") {echo "active"; } else  {echo "";}?>">
                Inicio 
            </a>
        </li>
        <li class="nav-item">
            <a href="consultarVuelos" class="nav-link <?php if ($_GET["vista"] == "consultarVuelos") {echo "active"; } else  {echo "";}?>">
                Consultar vuelos
            </a>
        </li>
        <li class="nav-item">
            <a href="gestionarVuelosPropios" class="nav-link <?php if ($_GET["vista"] == "gestionarVuelosPropios") {echo "active"; } else  {echo "";}?>">
                Gestionar vuelos propios
            </a>
        </li>
        <li class="nav-item">
            <a href="gestionarInformacionPersonal" class="nav-link <?php if ($_GET["vista"] == "gestionarInformacionPersonal") {echo "active"; } else  {echo "";}?>">
                Gestionar informacion personal
            </a>
        </li>
        <li class="nav-item">
            <a href="salir" class="nav-link">
                Salir
            </a>
        </li>
    </ul>
</div>