<?php
require '../resources/util/databases.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$usuario = $_POST["usuario"];
}

# Incluyendo librerias necesarias #
require "./code128.php";

$pdf = new PDF_Code128('P', 'mm', 'Letter');
$pdf->SetMargins(17, 17, 17);
$pdf->AddPage();

# Logo de la empresa formato png #
$pdf->Image('./img/LogoSP.png', 165, 12, 35, 35, 'PNG');

# Encabezado y datos de la empresa #
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetTextColor(32, 100, 210);
$pdf->Cell(150, 10, utf8_decode(strtoupper("SPARGYM")), 0, 0, 'L');

$pdf->Ln(9);

$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(39, 39, 51);

$pdf->Ln(5);

$pdf->Cell(150, 9, utf8_decode("C/San Juan Bosco, Málaga"), 0, 0, 'L');

$pdf->Ln(5);

$pdf->Cell(150, 9, utf8_decode("Teléfono: 606053369"), 0, 0, 'L');

$pdf->Ln(5);

$pdf->Cell(150, 9, utf8_decode("Email: spaargyym@gmail.com"), 0, 0, 'L');

$pdf->Ln(10);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 7, utf8_decode("Fecha de emisión:"), 0, 0);
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(116, 7, utf8_decode(date("d/m/Y") . " " . date("h:s A")), 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(35, 7, utf8_decode(strtoupper("Factura Nro.")), 0, 0, 'C');

$pdf->Ln(7);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(12, 7, utf8_decode("Cliente:"), 0, 0, 'L');
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(134, 7, utf8_decode("$usuario"), 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(35, 7, utf8_decode(strtoupper("1")), 0, 0, 'C');

$pdf->Ln(10);

$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(13, 7, utf8_decode("Cajero:"), 0, 0);
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(60, 7, utf8_decode("Juan Ruiz"), 0, 0, 'L');
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(8, 7, utf8_decode("Doc: "), 0, 0, 'L');
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(60, 7, utf8_decode("DNI: 77678467R"), 0, 0, 'L');
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(7, 7, utf8_decode("Tel:"), 0, 0, 'L');
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(35, 7, utf8_decode("644267509"), 0, 0);
$pdf->SetTextColor(39, 39, 51);

$pdf->Ln(7);

$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(6, 7, utf8_decode("Dir:"), 0, 0);
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(109, 7, utf8_decode("Gimnasio Spargym, Málaga, Gimnasio"), 0, 0);

$pdf->Ln(9);

# Tabla de productos #
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(23, 83, 201);
$pdf->SetDrawColor(23, 83, 201);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(90, 8, utf8_decode("Producto"), 1, 0, 'C', true);
$pdf->Cell(15, 8, utf8_decode("Cant."), 1, 0, 'C', true);
$pdf->Cell(25, 8, utf8_decode("Precio unitario"), 1, 0, 'C', true);
$pdf->Cell(19, 8, utf8_decode("Descuento"), 1, 0, 'C', true);
$pdf->Cell(32, 8, utf8_decode("Subtotal"), 1, 0, 'C', true);

$pdf->Ln(8);


$pdf->SetTextColor(39, 39, 51);

// Preparar la consulta SQL

$sql = "SELECT * FROM vw_usuarios_productos WHERE usuario = '$usuario'";
$resultado = $conexion -> query($sql);
$precio_total = 0;

/*----------  Detalles de la tabla  ----------*/

// Iterar sobre los resultados y mostrarlos en el documento PDF
if ($resultado -> num_rows > 0) {
	while($fila = $resultado -> fetch_assoc()) {
		$nombre = $fila['producto'];
		$cantidad = $fila['cantidad'];
		$precio_unitario = $fila['precio_unitario'];
		$precio_total += ($precio_unitario * $cantidad);

		$pdf->Cell(90, 7, utf8_decode("$nombre"), 'L', 0, 'C');
		$pdf->Cell(15, 7, utf8_decode("$cantidad"), 'L', 0, 'C');
		$pdf->Cell(25, 7, utf8_decode("$precio_unitario EUR"), 'L', 0, 'C');
		$pdf->Cell(19, 7, utf8_decode("0.00 EUR"), 'L', 0, 'C');
		$pdf->Cell(32, 7, utf8_decode($precio_unitario * $cantidad."EUR"), 'LR', 0, 'C');
		$pdf->Ln(7);
	}
}

/*----------  Fin Detalles de la tabla  ----------*/



$pdf->SetFont('Arial', 'B', 9);
$iva= $precio_total*0.13; 
$pagar= $precio_total + $iva; 
# Impuestos & totales #
$pdf->Cell(100, 7, utf8_decode(''), 'T', 0, 'C');
$pdf->Cell(15, 7, utf8_decode(''), 'T', 0, 'C');
$pdf->Cell(32, 7, utf8_decode("SUBTOTAL"), 'T', 0, 'C');
$pdf->Cell(34, 7, utf8_decode("+ ".$precio_total." EUR"), 'T', 0, 'C');

$pdf->Ln(7);

$pdf->Cell(100, 7, utf8_decode(''), '', 0, 'C');
$pdf->Cell(15, 7, utf8_decode(''), '', 0, 'C');
$pdf->Cell(32, 7, utf8_decode("IVA (13%)"), '', 0, 'C');
$pdf->Cell(34, 7, utf8_decode("+ ".$iva ." EUR"), '', 0, 'C');

$pdf->Ln(7);

$pdf->Cell(100, 7, utf8_decode(''), '', 0, 'C');
$pdf->Cell(15, 7, utf8_decode(''), '', 0, 'C');


$pdf->Cell(32, 7, utf8_decode("TOTAL A PAGAR"), 'T', 0, 'C');
$pdf->Cell(34, 7, utf8_decode("$pagar EUR"), 'T', 0, 'C');

$pdf->Ln(7);

$pdf->Cell(100, 7, utf8_decode(''), '', 0, 'C');
$pdf->Cell(15, 7, utf8_decode(''), '', 0, 'C');
$pdf->Cell(32, 7, utf8_decode("TOTAL PAGADO"), '', 0, 'C');
$pdf->Cell(34, 7, utf8_decode("$pagar EUR"), '', 0, 'C');

$pdf->Ln(7);

$pdf->Cell(100, 7, utf8_decode(''), '', 0, 'C');
$pdf->Cell(15, 7, utf8_decode(''), '', 0, 'C');
$pdf->Cell(32, 7, utf8_decode("CAMBIO"), '', 0, 'C');
$pdf->Cell(34, 7, utf8_decode("00.00 EUR"), '', 0, 'C');

$pdf->Ln(7);

$pdf->Cell(100, 7, utf8_decode(''), '', 0, 'C');
$pdf->Cell(15, 7, utf8_decode(''), '', 0, 'C');
$pdf->Cell(32, 7, utf8_decode("USTED AHORRA"), '', 0, 'C');
$pdf->Cell(34, 7, utf8_decode("0.00 EUR"), '', 0, 'C');

$pdf->Ln(12);

$pdf->SetFont('Arial', '', 9);

$pdf->SetTextColor(39, 39, 51);
$pdf->MultiCell(0, 9, utf8_decode("*** Precios de productos incluyen impuestos. Para poder realizar un reclamo o devolución debe de presentar esta factura ***"), 0, 'C', false);

$pdf->Ln(9);

# Codigo de barras #
$pdf->SetFillColor(39, 39, 51);
$pdf->SetDrawColor(23, 83, 201);
$pdf->Code128(72, $pdf->GetY(), "COD000001V0001", 70, 20);
$pdf->SetXY(12, $pdf->GetY() + 21);
$pdf->SetFont('Arial', '', 12);
$pdf->MultiCell(0, 5, utf8_decode("COD000001V0001"), 0, 'C', false);

# Nombre del archivo PDF #
$pdf->Output("I", "Factura_Nro_1.pdf", true);
