<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;

// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public $img ;
    public function pdf()
    {
        // $options = new Options();

        $pdf = PDF::setOptions(
            [
            'defaultFont' => 'THSarabunNew',
            'debugLayout' => true,
            'isRemoteEnabled' => true,
            'enable_remote' => true
            ]
        );
        $dompdf = new Dompdf($pdf);
        $dompdf->loadHtml(view('pdf'));
        $dompdf->setPaper('A4');
        $dompdf->render();
        return $dompdf->stream('demo.pdf', array("Attachment" => false));
        // return $dompdf->stream();
        // return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('pdf')->stream();

    }
}
