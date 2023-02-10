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

                        $filename = 'pdf_' . $_POST['name'] . $_POST['cont_no'] . '.pdf';

                        $pdf = new Pdf('./brgy indigency_fill.pdf');
                        $pdf->fillForm($data)
                        ->flatten()
                        ->saveAs( './cert of indigency/' . $filename);
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