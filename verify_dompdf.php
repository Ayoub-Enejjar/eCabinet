<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;

try {
    $dompdf = new Dompdf();
    $dompdf->loadHtml('<h1>DomPDF Test</h1><p>If you see this, DomPDF is working correctly.</p>');
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    file_put_contents('dompdf_verification.pdf', $dompdf->output());
    echo "SUCCESS: PDF generated as dompdf_verification.pdf\n";
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
