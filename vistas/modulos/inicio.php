<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-interval="1">
	<div class="carousel-indicators">
		<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
		<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
		<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
	</div>

	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="vistas/img/avion.jpg" class="d-block w-100" alt="0" height="500">
			<div class="carousel-caption d-none d-md-block">
				<h5>Bienvenido a “Te Damos Alas”</h5>
				<p>Explora nuestros servicios disponibles.</p>
				<?php
					if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
				?>
						<p>Disfruta de los servicios ofrecidos en nuestra pagina web.</p>
				<?php
					}else{
				?>
					<p>Para mas opciones <a href="login">Inicia sesión</a></p>
				<?php
					}
				?>
			</div>
		</div>

		<div class="carousel-item">
			<img src="vistas/img/avion2.jpg" class="d-block w-100" alt="1" height="500">
			<div class="carousel-caption d-none d-md-block">
				<h5>Encuentra tu destino soñado</h5>
				<p>Busca el lugar al que siempre haz querido viajar, hazlo con nosotros.</p>
				<?php
					if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
				?>
						<p>Disfruta de los servicios ofrecidos en nuestra pagina web.</p>
				<?php
					}else{
				?>
					<p>Para mas opciones <a href="login">Inicia sesión</a></p>
				<?php
					}
				?>
			</div>
		</div>

		<div class="carousel-item">
			<img src="vistas/img/avion3.jpg" class="d-block w-100" alt="2" height="500">
			<div class="carousel-caption d-none d-md-block">
				<h5>Seguridad y comodidad</h5>
				<p>Nos aseguramos de ofrecerte los mejores estandares de seguridad y logres disfrutar tu viaje con comodidad.</p>
				<?php
					if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
				?>
						<p>Disfruta de los servicios ofrecidos en nuestra pagina web.</p>
				<?php
					}else{
				?>
					<p>Para mas opciones <a href="login">Inicia sesión</a></p>
				<?php
					}
				?>
			</div>
		</div>
	</div>

	<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
	</button>

	<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
	</button>
</div>