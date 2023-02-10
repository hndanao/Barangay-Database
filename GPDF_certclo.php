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

                        $filename = 'pdf_' . $_POST['b_name'] . $_POST['ctrl_no'] . '.pdf';

                        $pdf = new Pdf('./cert of closure_fill.pdf');
                        $pdf->fillForm($data)
                        ->flatten()
                        ->saveAs( './cert of closure/' . $filename);
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