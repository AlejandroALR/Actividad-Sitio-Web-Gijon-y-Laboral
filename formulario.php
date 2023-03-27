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

$nombre        = recoge("nombre");
$apellidos     = recoge("apellidos");
$numero        = recoge("numero");
$email         = recoge("email");
$dudas         = recoge("dudas");
$privacidad    = recoge("privacidad");
$contacto      = recoge("contacto");
$mensajes      = array();


$nombreOk       = false;
$apellidosOk    = false;
$numeroOk       = false;
$emailOk        = false;
$dudasOk        = false;
$privacidadOk   = false;
$contactoOk     = false;


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

if ($numero == "") {
    print "  <p class=\"aviso\">No ha indicado su Numero de telefono.</p>\n";
    print "\n";
} else {
    $numeroOk = true;
}

if ($email == "") {
    print "  <p class=\"aviso\">No ha indicado su Email.</p>\n";
    print "\n";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    print "  <p class=\"aviso\">No ha escrito una dirección de correo correcta.</p>\n";
    print "\n";
} else {
    $emailOk = true;
}

if(isset($_POST['dudas']) ){
    $mensajes[] = "Las dudas son [".$_POST['dudas']."]";
}



if ($nombreOk && $apellidosOk && $numeroOk && $emailOk) {
    
    print "  <p>Su nombre es <strong>$nombre</strong>.</p>\n";
    print "\n";
    print "  <p>Sus apellidos son <strong>$apellidos</strong>.</p>\n";
    print "\n";
    print "  <p>Su numero de Telefono es <strong>$numero</strong>.</p>\n";
    print "\n";
    print "  <p>Su correo electronico es <strong>$email</strong>.</p>\n";
    print "\n";
    print "  <p>Sus dudas son <strong>$dudas</strong>.</p>\n";
    print "\n";



}
?>

