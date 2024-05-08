<?php
require('C:\xa\htdocs\FitFusion\public\assets\fpdf\fpdf.php');

// Instantiate the FPDF class
$pdf = new FPDF('p', 'mm', 'A4');
$pdf->AddPage();

// Set font for the title
$pdf->SetFont('Arial', 'B', 20);

// Title
$pdf->Cell(0, 10, 'Newly Registered Members', 0, 1, 'C');

// Set font for the table header
$pdf->SetFont('Arial', 'B', 12);

// Set fill color for the header
$pdf->SetFillColor(176, 196, 222);

// Set text color for the header
$pdf->SetTextColor(0, 0, 128);

// Table headers
$pdf->Cell(10, 10, 'ID', 1, 0, 'C', true);
$pdf->Cell(60, 10, 'Member Email', 1, 0, 'C', true);
$pdf->Cell(23, 10, 'Gym Name', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Package ID', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Registered Date', 1, 1, 'C', true);

// Set font for the table data
$pdf->SetFont('Arial', '', 12);

// Set fill color for alternate rows
$pdf->SetFillColor(240, 248, 255);

// Set text color for the table data
$pdf->SetTextColor(0);

// Initialize a variable to alternate row background color
$fill = false;

// Loop through the data and add rows
foreach ($data as $x) {
    // Alternate row background color
    $fill = !$fill;
    // Set fill color for alternate rows
    $pdf->SetFillColor($fill ? 240 : 255, $fill ? 248 : 255, $fill ? 255 : 255);

    $pdf->Cell(10, 10, $x->id, 1, 0, 'C', $fill);
    $pdf->Cell(60, 10, $x->memberemail, 1, 0, 'L', $fill);
    $pdf->Cell(23, 10, $x->gymname, 1, 0, 'L', $fill);
    $pdf->Cell(30, 10, $x->packageid, 1, 0, 'C', $fill);
    $pdf->Cell(40, 10, $x->registereddate, 1, 1, 'C', $fill);
}

// Output the PDF
$pdf->Output();
?>
