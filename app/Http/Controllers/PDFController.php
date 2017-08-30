<?php

namespace web\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use web\Servidor;
use web\Setor;
use web\Patrimonio;

class PDFController extends Controller
{
    public function selecao()
    {
        return view('pdf.selecao_pdf');
    }

    public function gerarPdf(Request $request)
    {
        if($request->download == 'download')
        {
            switch ($request->rb)
            {
                case 'Solitacoes':
                    break;
                case 'Usuarios':
                    break;
                case 'Servidores':
                    $pdf = $this->servidorPdfDown();
                    return $pdf->download('Servidores.pdf');
                    break;
                case 'Setores':
                    $pdf = $this->setorPdfDown();
                    return $pdf->download('Setores.pdf');
                    break;
                case 'Departamentos':
                    break;
                case 'Salas_Predios':
                    break;
                case 'Bens_Moveis':
                    $pdf = $this->bensPdfDown();
                    return $pdf->download('BensPermanentes.pdf');
                    break;
            }

        }
        else
        {
            switch ($request->rb)
            {
                case 'Solitacoes':
                    break;
                case 'Usuarios':
                    break;
                case 'Servidores':
                    $pdf = $this->servidorPdfStream();
                    return $pdf->stream('Servidores');
                    break;
                case 'Setores':
                    $pdf = $this->setorPdfStream();
                    return $pdf->stream('Setores');
                    break;
                case 'Departamentos':
                    break;
                case 'Salas_Predios':
                    break;
                case 'Bens_Moveis':
                    $pdf = $this->bensPdfStream();
                    return $pdf->stream('BensPermanentes.pdf');
                    break;
            }

        }
    }

    private function servidorPdfStream()
    {
        $servidores = Servidor::orderBy('nome')->get();
        $view = view('pdf.servidores_pdf', ['servidores' => $servidores]);
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHtml($view);
        return $pdf;

    }

    private function servidorPdfDown()
    {
        $servidores = Servidor::orderBy('nome')->get();
        return PDF::loadView('pdf.servidores_pdf', ['servidores' => $servidores]);
    }

    private function setorPdfStream()
    {
        $setores = Setor::orderBy('descricao')->get();
        $view = view('pdf.setores_pdf', ['setores' => $setores]);
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHtml($view);
        return $pdf;
    }

    private function setorPdfDown()
    {
        $setores = Setor::orderBy('descricao')->get();
        return PDF::loadView('pdf.setores_pdf', ['setores' => $setores]);
    }
    
    private function bensPdfStream()
    {
        $patrimonio = Patrimonio::orderBy('id')->get();
        $view = view('pdf.patrimonio_pdf', ['patrimonio' => $patrimonio]);
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHtml($view);
        return $pdf;
    }

    private function bensPdfDown()
    {
        $patrimonio = Patrimonio::orderBy('id')->get();
        return PDF::loadView('pdf.patrimonio_pdf', ['patrimonio' => $patrimonio]);
    }

}