<?php

require_once __DIR__ . '/vendor/autoload.php';

$originFile = "IVR_SE.pdf";
$originFile = "protegido.pdf";
$destFile = "alternativo/".$originFile;
$pass = "123";

$pdf = new \FPDI_Protection();
$alreadyProtected = False;

try {
    $ownerPassword = $pdf->setProtection(
        array(),
        $pass,
        'ABCD'
    );
    $pageCount = $pdf->setSourceFile($originFile);
} catch (CrossReferenceException $error) {
    $alreadyProtected = True;
}

if($alreadyProtected) {
    echo $originFile; /* esto es solo para depurar */
    return $originFile;
}

for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
    $templateId = $pdf->importPage($pageNo);
    $pdf->AddPage();
    $pdf->useTemplate($templateId, ['adjustPageSize' => true]);
}

// Output the new PDF
$pdf->Output('F', $destFile);
echo $destFile;
return;
