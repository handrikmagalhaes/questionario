<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH . 'third_party/fpdf/fpdf.php';

class Pdf extends FPDF {

    function Header()
    {
        // Logo
        $this->Image(base_url().'/assets/dist/img/jfal2.png', 88, 10, 30);
        $this->SetXY(90, 27);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Title
        $this->Cell(30, 10, utf8_decode('LAUDO MÉDICO PERICIAL (SISPERJUD)'), 0, 0, 'C');
        $this->SetFont('Arial', '', 12);
        $this->SetXY(90, 34);
        $this->Cell(30, 10, utf8_decode('Justiça Federal - Padrão CNJ'), 0, 0, 'C');
        $this->SetXY(20, 45);

        // Line break
        $this->Ln(5);
    }
}
?>