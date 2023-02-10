<?php //GeneratePDF.php
namespace Classes;

//if(!defined('ACCESSCHECK')) {
     // die('Direct access not permitted');
//}


use mikehaertl\pdftk\PDF;

class GeneratePDF {


           public function generate($data)
           {      

                  try {

                        $filename = 'pdf_' . $_POST['name'] . rand(2000,1200000) . '.pdf';

                        $pdf = new Pdf('./cert of residency_fill.pdf');
                        $pdf->fillForm($data)
                        ->flatten()
                        ->saveAs( './cert of residency/' . $filename);
                        //->send( $filename . '.pdf$');
					
                        return $filename;
   
                  }
                  catch(Exception $e)
                  {
                        return $e->getMessage();
                  }
      

           }
}
?>
