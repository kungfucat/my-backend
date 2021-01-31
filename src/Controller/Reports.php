<?php
// src/Controller/Reports.php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use vendor\Module\ReportMaker\ReportMaker;

header('Access-Control-Allow-Origin: *');
class Reports
{
    /**
     * @Route("/reports", name="reports")
     */
    function makeReport(Request $req, ReportMaker $maker): Response
    {
        // Set and create the output directory
        $outDir = './out';
        if (!file_exists($outDir))
            mkdir($outDir);
        // Define the file name and contents
        $index = count(scandir($outDir));
        $path = "$outDir/document$index" . ".docx";

        $text = $req->query->get('textBlock');
        $id = $maker->newDocument($text);
        $maker->format($id, $path);
        // Respond with a file
        return new BinaryFileResponse($path);
    }
}