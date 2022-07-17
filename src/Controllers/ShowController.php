<?php

namespace App\Controllers;

use App\Models\AnnoncesModel;
use App\Models\PhotoModel;
use App\Models\EmailModel;
use Spi;
class ShowController extends Controller
{
    public function index()
    {
        //$html2pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
        $mpdf = new \Mpdf\Mpdf([
                'displayDefaultOrientation'=>'L',
                'tempDir' => __DIR__ . 'pdf/']);

        //$mpdf = new \Mpdf\mPDF(['tempDir' => __DIR__ . 'pdf/'],'en-X', 'A4', '', '', 11, 11, 10, 10, 5, 5, 'P');
        $AnnoncesModel = new AnnoncesModel;
        $PhotoModel = new PhotoModel;
        $EmailModel = new EmailModel;

        $initAnnonce = $AnnoncesModel->findBy(['id' => $_SESSION['param']['slug']]);
        $annonce = $initAnnonce[0];
        $photos = $PhotoModel->findBy(['id_annonce'=>$_SESSION['param']['slug']]);
        //var_dump($photos);
        $email = $EmailModel->findBy(['id'=>$annonce['id_email']]);
        for($i=0;$i<5;$i++){
            $annonce['photo'.$i]=@$photos[$i]['photo'];

        }
        $annonce['email'] = $email[0]['email'];
        
        // echo "<pre>",print_r($annonce),"</pre>";
        //afficher l'annonce avec le bouton generaterur de pdf
        $this->twig->display('show.html.twig', compact("annonce"));
        
        //pour visualiser l'annonce au format pdf
        //$this->twig->display('mail.twig', compact("annonce"));
        ob_start();
        $this->twig->display('pdf.twig', compact("annonce"));
        $annonceHTMLtoPDF = ob_get_clean();
        $mpdf->WriteHTML($annonceHTMLtoPDF);
        if (is_file('pdf/'.'annonce' . $annonce['id'] . '.pdf')){
            unlink('pdf/'.'annonce' . $annonce['id'] . '.pdf');
        }
        $mpdf->output('pdf/'.'annonce' . $annonce['id'] . '.pdf');
      
            }
}