<?php //GeneratePDF.php
namespace Classes;
//require ('brgyid_pic.php');
//if(!defined('ACCESSCHECK')) {
     // die('Direct access not permitted');
//}
//	require_once 'vendor/autoload.php';
use mikehaertl\pdftk\PDF;

class GeneratePDF {


           public function generate($data)
           {      

                  try {
						//$file = 'piconly_'.rand (1000, 200000).'.pdf';
                        $filename = 'pdf'.$_POST['id_no'].'.pdf';
	
                        $pdf = new Pdf('./BID.pdf' );
						//$pdf = $pdf->stamp('./uploads' .$file)
                        $pdf->fillForm($data)
                        ->flatten()
                        ->saveAs('./brgy id/'. $filename);
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