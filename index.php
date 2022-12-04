<html>

<head>
	<title>Drags Med</title>
	<link rel="stylesheet" type="text/css" href="css/estilo_3.css">
</head>

<body>
<header>
	
	<h1>Drags Med</h1>


</header>


<main>
<img src="img/vive_2.png" class="ali-derecha">
<?php

//CONECTAMOS CON LA BD
require "conexion.php";

//OBTENEMOS EL NÚMERO DEL NODO DENTRO DEL ÁRBOL (PARA SABER QUÉ CAMINO HEMOS TOMADO)

$nodo = 1;
$nodoRepuesto = 0;
$numPregunta = 1;
$proxPregunta = 2;

if(isset($_GET['n'])) {
	$nodo = $_GET["n"];
}

if(isset($_GET['r'])) {
	$nodoRepuesto = $_GET["r"];
}

if(isset($_GET['np'])) {
	$numPregunta = $_GET["np"];
	$proxPregunta = $numPregunta+1;
}



//------------------------------------------------------
//SI HAY UN NODO DE REPUESTO SE AÑADE A LA LISTA (ARRAY)
if($nodoRepuesto!=0){

	session_start();	//iniciamos la sesión
	$nodosRepuesto =array();	//creamos el array
 

	//COMPROBAMOS SI EXISTE LA VARIABLE DE SESIÓN (ES DECIR, SI HEMOS GUARDADO ALGÚN NODO EN EL QUE DUDÁSEMOS)
	if(isset($_SESSION['nodosRepuesto'])){
		
		$nodosRepuesto = $_SESSION['nodosRepuesto'];	//Guardamos el array de la sesión en el array vacío
		array_push($nodosRepuesto,$nodoRepuesto);		//añadimos el nodo a la lista
		$_SESSION['nodosRepuesto']=$nodosRepuesto;		//Volvemos a guardar el array de la sesión, actualizado
		
	}
	
	
	else{
		array_push($nodosRepuesto,$nodoRepuesto);		//añadimos el nodo a la lista
		$_SESSION['nodosRepuesto']=$nodosRepuesto;
	}
	
	
}


//------------------------------------------------------
//CALCULAMOS LO SIGUIENTES PASOS A SEGUIR

$nodoSi = $nodo * 2;
$nodoNo = $nodo * 2 + 1;

$nodoProbablementeSi = $nodoSi;
$nodoProbablementeNo = $nodoNo;

//-----------------------------------------------------
//OBTENEMOS UN NÚMERO AL AZAR ENTRE CERO Y UNO
//lo hacemos para evitar que tenga una tendencia a recorrer siempre el mismo camino

$aleatrio = rand(0,1);

$nodoAleatorio 	  = 0;	//EL QUE ELEGIMOS
$nodoAleatorioAlt = 0;	//EL CONTRARIO

if($aleatrio==0){
	$nodoAleatorio = $nodoNo;
	$nodoAleatorioAlt = $nodoSi;
}

else{
	$nodoAleatorio = $nodoSi;
	$nodoAleatorioAlt = $nodoNo;
}
//-----------------------------------------------------


//HACEMOS LA CONSULTA A LA BD
//$consulta = "SELECT texto,pregunta FROM arbol WHERE nodo = ".$nodo.";";
$consulta = "SELECT texto,pregunta FROM drogas WHERE nodo = ".$nodo.";";
$texto = '';
$pregunta = true;
 
if ($resultado = mysqli_query($enlace, $consulta)) {
 
	if($resultado->num_rows === 0)
    {
        echo 'No existe el nodo';
    }

	else{
		while ($fila = mysqli_fetch_row($resultado)) {
			$texto 	  = $fila[0];
			$pregunta = $fila[1];
		}
		
		
		//SI NO ES UNA PREGUNTA ES UN RESULTADO FINAL (DRAG MED DA UNA RESPUESTA)
		echo "<div class='pregunta'>";
		echo "<h2>PREGUNTA No.".$numPregunta."</h2>";
		echo"</div>";
		if($pregunta == 0){
			
			echo "<div class='contenedorPregunta'>";
			echo "<h2>El pasiente tiene abstinecia por ". $texto . "</h2>";
			//echo "<h2>¿Has pensado en ". $texto . "?</h2>";
			echo "</div>";
			
			
			echo "<div class='contenedorRespuestas'>";
			echo "<a class='boton' href='respuesta.php?r=1&n=".$nodo."&p=".$texto."&np=".$proxPregunta."'>SÍ</a>";
			echo "<a class='boton' href='respuesta.php?r=0&n=".$nodo."&p=".$texto."&np=".$proxPregunta."'>NO</a>";
			echo "</div>";
		
		}
		
		//SI ES UNA PREGUNTA, PREGUNTAMOS (SI DUDAMOS, EN EL PARÁMETRO "R" GUARDAMOS LA RAMA ALTERNATIVA, SINO VALE CERO)
		else{
			echo "<div class='contenedorPregunta'>";
					echo "<h2> ¿Tiene ". $texto . " ?</h2>";
			//echo "<h2>¿Tu personaje es ". $texto . "?</h2>";
			echo "</div>";
			
			echo "<div class='contenedorRespuestas'>";
			
			echo "<a class='boton' href='index.php?n=".$nodoSi."&r=0&np=".$proxPregunta."'>SÍ</a>";
			echo "<a class='boton' href='index.php?n=".$nodoNo."&r=0&np=".$proxPregunta."'>NO</a>";
			/*echo "<a class='boton' href='index.php?n=".$nodoProbablementeSi."&r=".$nodoProbablementeNo."&np=".$proxPregunta."'>PROBABLEMENTE</a>";
			echo "<a class='boton' href='index.php?n=".$nodoProbablementeNo."&r=".$nodoProbablementeSi."&np=".$proxPregunta."'>PROBABLEMENTE NO</a>";
			echo "<a class='boton' href='index.php?n=".$nodoAleatorio."&r=".$nodoAleatorioAlt."&np=".$proxPregunta."'>NO LO SÉ</a>";
			*/
			echo "<div class='limpiar'></div>";
		
			echo "</div>";
		}
		
	}

    mysqli_free_result($resultado);
}

?>

</main>

<br>
<br>



<footer>

<?php

	echo "<div class = 'regreso'>";
	echo "<a class='regre' href='index.php?n=1&r=0'></a>";
	//echo "<br><br><a href='datos.php'>Datos del Adivinador</a>";
	echo "</div>";
?>

</footer>

</body>

</html>