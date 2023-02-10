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

                        $filename = 'pdf_' . $_POST['o_name'] . $_POST['bcl_no'] . '.pdf';

                        $pdf = new Pdf('./business clearance_fill.pdf');
                        $pdf->fillForm($data)
                        ->flatten()
                        ->saveAs( './business clearance/' . $filename);
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