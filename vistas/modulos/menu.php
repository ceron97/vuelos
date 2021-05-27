<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
	<div class="container">



		<a href="" class="navbar-brand">
			<span class="text-uppercase font-weight-bold">Te Damos Alas</span>
			<br>
			<?php

				if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {

					print($_SESSION["nombre"]." | ".$_SESSION["rol"]);    

				}else{

					print("Bienvenido | Visitante");

				}


			?>
		</a>

		<button class="navbar-toggler" 
					type="button" 
					data-bs-toggle="collapse" 
					data-bs-target="#navbarTogglerDemo02" 
					aria-controls="navbarTogglerDemo02" 
					aria-expanded="false" 
					aria-label="Toggle navigation"
				>
			<span class="navbar-toggler-icon"></span>
		</button>
		

		<?php

			if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
				if ($_SESSION["id_rol"] == "1") {
					include "complementos/navAdmin.php";
				}elseif ($_SESSION["id_rol"] == "3") {
					include "complementos/navClient.php";
				}
			}else{
				include "complementos/navVisit.php";
			}

		?>
	</div>
</nav>