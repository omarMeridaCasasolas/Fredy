<?php 
    //session_start();
    require_once('../vendor/autoload.php');
    $rutaGuardado = "../pdfs/";
    $clavePrincipal = $idConvMaxFinal;
    $nombreini = "convocatoria";
    $nombrePDF="nombre";
    $nombrePDF =$nombreini.$fechaPublicacion.$clavePrincipal;
    $nombreArchivo = $nombrePDF.".pdf";
    $pdf = new Dompdf\Dompdf();
    $pdf->set_paper("A4", "portrait");
    ob_start();
    include '12345.php'; // Selecionamos el documento que vamos a convertir
    $pdf->loadHtml(utf8_decode(ob_get_clean()),'UTF-8');
    $pdf->render();
    $output = $pdf->output();
    file_put_contents($rutaGuardado.$nombreArchivo, $output);
    $_SESSION['NombreArchivo'] =  $rutaGuardado.$nombreArchivo;
    //$pdf->stream('Ejemplo.pdf');
?>  
