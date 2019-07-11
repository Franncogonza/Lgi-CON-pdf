<?php
    //llamado a los campos
    $nombre=$_POST['nombre'];
    $correo=$_POST['correo'];
    $telefono=$_POST['telefono']; 
    $dia=$_POST['dia'];
    $hora=$_POST['hora'];
    $random=rand(1,1000);

    //validaciones en el formulario de solicitud de turno
          
        if(empty($nombre)){        // empty valida si el campo esta vacio
            echo("*****Agrega tu nombre***** <br><br>");
        }
        elseif(is_numeric($nombre)){ // si es un munero
            echo "***** El nombre de estar compuesto por letras ***** <br><br>";
        }

        if(empty($telefono)){        // empty valida si el campo esta vacio
            echo("***** Agrega tu telefono ***** <br><br>");
        }
        elseif(!is_numeric($telefono)){ // si no es un munero
            echo "***** El telefono de estar compuesto por numeros ***** <br><br>";
        }

        if(empty($correo)){        // empty valida si el campo esta vacio
            echo("***** Agrega tu correo ***** <br><br>");
        }
        elseif(is_numeric($correo)){ // si es un munero
            echo "***** El email de estar compuesto por letras ***** <br><br>";
        }
        // filter_var es un filtro de variables
        // filtra la variable $correo y aplica el filtro "FILTER_VALIDATE_EMAIL"
        // el cual valida que el contenido de la variable corresponda a la
        // estructura de una direccion de correo electronico.
        // fuente de la informacion www.php.net
        elseif(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
            echo "***** El formato de correo es invalido *****, ingrese pór ejemplo aa@bb.com <br><br>";
            
        }

       

       


    // una vez subido los archivos a un hosting, se descomentara el siguiente codigo para
    // que automaticamente se envie al correo de la empresa la solicitud de turno
    //datos para el correo
    //$destinatario="cd.galarza@hotmail.com";
    //$asunto="Peticion de truno";
    // concateno valores en la variable $carta
//$carta ="De: $nombre \n";
   // $carta .="Correo: $correo \n";
   // $carta .="Telefono: $telefono \n";
   // $carta .="Dia: $dia \n";
   // $carta .="Hora: $hora \n";
   // $carta .="codigo de verificacion de turno: $random \n";

    //enviando el mensaje
    // aclaracion, la funcion mail solo funciona cuando el sitio esta alojado en un hosting.
    // para que funcione en un servidor remoto se deben de configurar el archivo php.init de apache.
   // mail($destinatario, $asunto, $carta);


    //creacion del archivo pdf para imprimir
    //Agregamos la libreria FPDF
    require('./pdf/fpdf.php');
    
    $pdf = new FPDF(); //Creamos un objeto de la librería
    $pdf->AddPage(); //Agregamos una Pagina
    $pdf->SetFont('Arial','B',16); //Establecemos tipo de fuente, negrita y tamaño 16
    //Agregamos texto en una celda de 40px ancho y 10px de alto, Con Borde, Sin salto de linea y Alineada a la derecha
    $pdf->SetFont('Arial','BU',16);
    $pdf->SetTextColor(25,175,194);
    $pdf->Sety(30);
    $pdf->Cell(100,20,"SASTRERIA EL ELEGANTE",0,1,'C');
    $pdf->SetTextColor(0,0,0);
    $pdf->Setxy(50,70);
    $pdf->Cell(100,20,"Comprobante de Solicitud de Turno",0,1,'C');
    $pdf->SetFont('Arial','B',16);
    $pdf->Setxy(50,90);
    $pdf->Setxy(50,100);
    $pdf->Cell(100,20,"$nombre",1,1,'C');
    $pdf->Setx(50);  
    $pdf->Cell(100,20,"$dia",1,1,'C'); 
    $pdf->Setx(50);
    $pdf->Cell(100,20,"$hora",1,1,'C');
    $pdf->Setx(50);  
    $pdf->Cell(100,20,"$random",1,1,'C'); 
    $pdf->Sety(200);
    $pdf->SetTextColor(165,22,22);
    $pdf->Cell(100,20,"En breve confirmaremos su turno via email, conserve este comprobante.",0,1,'L');
    $pdf->Output(); //Mostramos el PDF creado
?>