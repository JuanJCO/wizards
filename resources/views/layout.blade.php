<!DOCTYPE html>
<html>
<head>

	<title>Wizards of the Coast</title>
	
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

        <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<style>    
		#logo{
  		color: #ab5348;
		  font-family: "Impact" !important;  
		  font-size: 50px;
		  margin-left: 15px;
		}    

		#menu, #login{
  		color: white;
		  font-family: "Impact" !important;  
		  margin-left: 15px;	
		}

	</style>

	<script type="text/javascript">
		document.addEventListener('DOMContentLoaded', function() {
		var elems = document.querySelectorAll('.sidenav');
    	var instances = M.Sidenav.init(elems);
  		});
	</script>

    <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<header>
	

  <nav class="blue-grey darken-3">
    <div class="nav-wrapper">
      <a href="http://localhost/proyectos/wizards/public" class="brand-logo" id="logo">WIZARDS OF THE COAST</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="http://localhost/proyectos/wizards/public/colecciones">Colecciones</a></li>
        <li><a href="http://localhost/proyectos/wizards/public/ventas">Ventas</a></li>
        <li><a href="http://localhost/proyectos/wizards/public/crear">Crear Carta</a></li>
        <li><a href="http://localhost/proyectos/wizards/public/vender">Vender Carta</a></li>
        <li><a href="http://localhost/proyectos/wizards/public/login">Login</a></li>
        <li><a href="http://localhost/proyectos/wizards/public/registro">Registro</a></li>
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="http://localhost/proyectos/wizards/public/colecciones">Colecciones</a></li>
    <li><a href="http://localhost/proyectos/wizards/public/ventas">Ventas</a></li>
    <li><a href="http://localhost/proyectos/wizards/public/crear">Crear Carta</a></li>
    <li><a href="http://localhost/proyectos/wizards/public/vender">Vender Carta</a></li>
    <li><a href="http://localhost/proyectos/wizards/public/login">Login</a></li>
    <li><a href="http://localhost/proyectos/wizards/public/registro">Registro</a></li>
  </ul>

</header>


<body class="grey lighten-4">

<br>
  <div class="container">
    <nav>
      <div class="nav-wrapper blue-grey lighten-3">
        <form method=POST action="http://localhost/proyectos/wizards/public/api/cartas/filtrarNombre">
          <div class="input-field">
            <input id="search" type="search" name="nombre" required>
            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
            <i class="material-icons">close</i>
          </div>
        </form>
      </div>
    </nav>
  </div>

	<div class="container">
        @yield('content')
    </div>


</body>



</html>
