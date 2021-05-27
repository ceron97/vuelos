<?php 
//destruye la sesison y lo redirige al login
session_destroy();

echo '<script>
	
	window.location = "inicio"

</script>';

