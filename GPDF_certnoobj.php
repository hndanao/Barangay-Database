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

                        $pdf = new Pdf('./certification of no obj_fill.pdf');
                        $pdf->fillForm($data)
                        ->flatten()
                        ->saveAs( './cert of no objection/' . $filename);
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