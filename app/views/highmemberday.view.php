<?php
require('C:\xa\htdocs\FitFusion\public\assets\fpdf\fpdf.php');

$pdf = new FPDF('P','mm','A4'); // Use new class
$pdf->AddPage();

// Title
$pdf->SetFont('Arial','B',20);
$pdf->Cell(35,10,'',0,0);
$pdf->Cell(59,5,'Busy Days Report',0,0);
$pdf->Cell(59,10,'',0,1);

// Chart properties
$chartX=10;
$chartY=30;
$chartWidth=150;
$chartHeight=100;
$chartTopPadding=10;
$chartLeftPadding=20;
$chartBottomPadding=20;
$chartRightPadding=5;

// Calculate chart box dimensions
$chartBoxX=$chartX+$chartLeftPadding;
$chartBoxY=$chartY+$chartTopPadding;
$chartBoxWidth=$chartWidth-$chartLeftPadding-$chartRightPadding;
$chartBoxHeight=$chartHeight-$chartBottomPadding-$chartTopPadding;

// Bar width
$barWidth=20;

// Chart data
$data1=Array(
    'Sunday'=>[
        'color'=>[255, 204, 204], // Light pink
        'value'=>$data['finalarr']['Sunday']
    ],
    'Monday'=>[
        'color'=>[204, 255, 204], // Light green
        'value'=>$data['finalarr']['Monday']
    ],
    'Tuesday'=>[
        'color'=>[204, 204, 255], // Light blue
        'value'=>$data['finalarr']['Tuesday']
    ],
    'Wednesday'=>[
        'color'=>[255, 255, 204], // Light yellow
        'value'=>$data['finalarr']['Wednesday']
    ],
    'Thursday'=>[
        'color'=>[255, 204, 255], // Light purple
        'value'=>$data['finalarr']['Thursday']
    ],
    'Friday'=>[
        'color'=>[255, 229, 204], // Light orange
        'value'=>$data['finalarr']['Friday']
    ],
    'Saturday'=>[
        'color'=>[204, 255, 255], // Light cyan
        'value'=>$data['finalarr']['Saturday']
    ]
);

// Find maximum value for scaling
$dataMax=0;
foreach($data1 as $item){
    if($item['value']>$dataMax) $dataMax=$item['value'];
}

// Data step
$dataStep=50;

// Set font, line width, and color
$pdf->SetFont('Arial','',9);
$pdf->SetLineWidth(0.2);
$pdf->SetDrawColor(0);

// Draw chart boundary
$pdf->Rect($chartX, $chartY, $chartWidth, $chartHeight);

// Vertical axis line
$pdf->Line($chartBoxX, $chartBoxY, $chartBoxX, ($chartBoxY + $chartBoxHeight));

// Horizontal axis line
$pdf->Line($chartBoxX - 2, ($chartBoxY + $chartBoxHeight), $chartBoxX + $chartBoxWidth, ($chartBoxY + $chartBoxHeight));

// Vertical axis labels
for($i=0; $i<=$dataMax; $i+=$dataStep){
    $yAxisPos=$chartBoxY+($chartBoxHeight*($dataMax-$i)/$dataMax);
    $pdf->Line($chartBoxX-2, $yAxisPos, $chartBoxX, $yAxisPos);
    $pdf->SetXY($chartBoxX - $chartLeftPadding, $yAxisPos - 2);
    $pdf->Cell($chartLeftPadding - 4, 5, $dataMax - $i, 0, 0, 'R');
}

// Horizontal axis labels and bars
$pdf->SetXY($chartBoxX, $chartBoxY + $chartBoxHeight);
$xLabelWidth = $chartBoxWidth / count($data1);
$barXPos = 0;
foreach($data1 as $itemName => $item){
    $pdf->Cell($xLabelWidth, 5, $itemName, 0, 0, 'C');
    $pdf->SetFillColor($item['color'][0], $item['color'][1], $item['color'][2]);
    $barHeight = $chartBoxHeight * $item['value'] / $dataMax;
    $barX = ($xLabelWidth * $barXPos) + $chartBoxX;
    $barY = $chartBoxY + $chartBoxHeight - $barHeight;
    $pdf->Rect($barX, $barY, $barWidth, $barHeight, 'DF');
    $barXPos++;
}

// Axis labels
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetXY($chartX, $chartY);
$pdf->Cell(100, 10, "Average of Members", 0);
$pdf->SetXY($chartX + ($chartWidth / 2) - 50, $chartY + $chartHeight - ($chartBottomPadding / 2));
$pdf->Cell(100, 5, "Day", 0, 0, 'C');

// Add space between chart and table
$pdf->Ln(20);

// Draw table
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(211, 211, 211); // Light gray
$pdf->Cell(25, 10, 'Day', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Total Members', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Average', 1, 1, 'C', true);

$pdf->setFont('Arial', '', 10);
$arr = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
$rowFillColor = 0; // Counter for alternating row colors
foreach($arr as $x){
    // Alternate row background colors
    if ($rowFillColor % 2 == 0) {
        $pdf->SetFillColor(245, 245, 245); // Light gray
    } else {
        $pdf->SetFillColor(255, 255, 255); // White
    }
    $pdf->Cell(25, 10, $x, 1, 0, 'C', true); // Set background color
    $pdf->Cell(50, 10, $data['noofmemweekday'][$x], 1, 0, 'C', true); // Set background color
    $pdf->Cell(50, 10, round($data['finalarr'][$x], 2), 1, 1, 'C', true); // Set background color
    $rowFillColor++;
}

// Output the PDF
$pdf->Output();
?>
