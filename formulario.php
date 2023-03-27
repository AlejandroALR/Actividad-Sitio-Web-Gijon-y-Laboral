<?php
function recoge($var, $m = "")
{
    $tmp = is_array($m) ? [] : "";
    if (isset($_REQUEST[$var])) {
        if (!is_array($_REQUEST[$var]) && !is_array($m)) {
            $tmp = trim(htmlspecialchars($_REQUEST[$var]));
        } elseif (is_array($_REQUEST[$var]) && is_array($m)) {
            $tmp = $_REQUEST[$var];
            array_walk_recursive($tmp, function (&$valor) {
                $valor = trim(htmlspecialchars($valor));
            });
        }
    }
    return $tmp;
}

$nombre      = recoge("nombre");
$apellidos   = recoge("apellidos");
$numero        = recoge("numero");
$email        = recoge("email");
$dudas        = recoge("dudas");
$privacidad = recoge("privacidad");
$contacto      = recoge("contacto");


$nombreOk      = false;
$apellidosOk   = false;
$numeroOk        = false;
$emailOk        = false;
$dudasOk        = false;
$privacidadOk = false;
$contactoOk        = false;


if ($nombre == "") {
    print "  <p class=\"aviso\">No ha escrito su nombre.</p>\n";
    print "\n";
} else {
    $nombreOk = true;
}

if ($apellidos == "") {
    print "  <p class=\"aviso\">No ha escrito sus apellidos.</p>\n";
    print "\n";
} else {
    $apellidosOk = true;
}

if ($numero == "...") {
    print "  <p class=\"aviso\">No ha indicado su Numero de telefono.</p>\n";
    print "\n";
} else {
    $numeroOk = true;
}

if ($email == "...") {
    print "  <p class=\"aviso\">No ha indicado su Email.</p>\n";
    print "\n";
} else {
    $emailOk = true;
}

//Aqui iria el textarea de Dudas


if ($privacidad == "") {
    print " <p>No acepta las politicas de privacidad.</p>\n";
} elseif ($privacidadOk) {
    print " <p>Acepta las politicas de privacidad.</p>\n";
}


if ($contacto == "telefono") {
    print "  <p>Quiere que le contactemos por llamada telefonica.</p>\n";
} else {
    print "  <p>Quiere que le contactemos via correo electronico.</p>\n";
}
print "\n";


if ($nombreOk && $apellidosOk && $numeroOk && $emailOk && $dudasOk && $privacidadOk && $contactoOk) {
    
    print "  <p>Su nombre es <strong>$nombre</strong>.</p>\n";
    print "\n";
    print "  <p>Sus apellidos son <strong>$apellidos</strong>.</p>\n";
    print "\n";
    print "  <p>Su numero de Telefono es <strong>$numero</strong>.</p>\n";
    print "\n";
    print "  <p>Su correo electronico es <strong>$email</strong>.</p>\n";
    print "\n";

// Aqui iria el textarea de Dudas


    if ($privacidad == "") {
        print " <p>No acepta las politicas de privacidad.</p>\n";
    } elseif ($privacidadOk) {
        print " <p>Acepta las politicas de privacidad.</p>\n";
    }
    print "\n";

    if ($contacto == "telefono") {
        print "  <p>Quiere que le contactemos por llamada telefonica.</p>\n";
    } else {
        print "  <p>Quiere que le contactemos via correo electronico.</p>\n";
    }
    print "\n";

}
?>

