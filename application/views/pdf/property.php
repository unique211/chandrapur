
<?php

//include 'fpdf.php';
//include 'exfpdf.php';
//include 'easyTable.php';


		//$id=1;
		$language='';
        foreach($record as $value){
            $id=$value->id;
            $name=$value->name;
            $ward_no=$value->ward_no;
            $municipalty_ward_no=$value->municipalty_ward_no;
            $property_no=$value->property_no;
            $date=$value->n_date;
            $language=$value->language;
            $today= date('d/m/Y');
        }
      //  if($language=="english"){
            $pdf=new exFPDF();
            $pdf->AddPage("L","A4");
            $pdf->SetFont('helvetica', '', 10);
            $pdf->AddFont('helvetica', '', 'helvetica.php');
            $pdf->AddFont('helvetica', 'B', 'helveticab.php');
            $pdf->AddFont('helvetica', 'I', 'helveticai.php');
            $pdf->AddFont('helvetica', 'BI', 'helveticabi.php');
    
            $table=new easyTable($pdf, '{60,300}', 'width:360; border-color:#000000; font-size:10; paddingY:2;');
    
            $table->easyCell('', 'img:images/cmc.jpg, w35; rowspan:5; align:L;');
            $table->easyCell("", ' font-size:24;');
            $table->printRow();
    
            $table->easyCell("", ' font-size:24;');
            $table->printRow();
            $table->easyCell("", '  font-size:24;');
            $table->printRow();
            $table->easyCell("", ' font-size:24;');
            $table->printRow();
          
            $table->easyCell("Chandrapur City Municipal Corporation, Chandrapur", ' align:L; font-style:BU; font-size:24;');
            $table->printRow();
    
            $table->easyCell("-:: Property Transfer Note ::-", ' align:C; colspan:2;  font-size:15;');
            $table->printRow();
            $table->endTable(0);
    
            $table=new easyTable($pdf, '{30,300,30}', 'width:360; border-color:#000000; font-size:10; paddingY:2;');
    
            $table->easyCell("" ,'colspan:3; rowspan:2');
            $table->printRow();
            $table->easyCell("" ,'colspan:3;');
            $table->printRow();
    
            $table->easyCell("" );
            $table->easyCell("It is certified that Mr. /Smt <b>$name</b> Will stay on word no. <b>$ward_no</b> Chandrapur city municipality / ward no. <b>$municipalty_ward_no</b> Property No. <b>$property_no</b> Their Property transfer is being recorded.", ' align:L; colspan:2;  font-size:10;');
          
            $table->printRow();
       
            $table->endTable(0);
    
            $table=new easyTable($pdf, '{100,260}', 'width:360; border-color:#000000; font-size:10; paddingY:2;');
    
            $table->easyCell("" ,'colspan:2; ');
            $table->printRow();
            $table->easyCell("" ,'colspan:2; ');
            $table->printRow();
            $table->easyCell("" ,'colspan:2; ');
            $table->printRow();
            $table->easyCell("" ,'colspan:2; ');
            $table->printRow();
            $table->easyCell("" ,'colspan:2; ');
            $table->printRow();
            
            
            $table->easyCell("Location: Chandrapur Municipal Corporation\nDate: $date",'align:L;   font-size:10;' );
            $table->easyCell("", ' align:L;  font-size:10;');
         
            $table->printRow();
       
            $table->endTable(0);
    
            $table=new easyTable($pdf, '{80,180,80,20}', 'width:360; border-color:#000000; font-size:10; paddingY:2;');
    
            $table->easyCell("" ,'colspan:2; ');
           // $table->easyCell("" );
            $table->easyCell("<b>Commissioner</b>\nChandrapur city municipality",'align:C;   font-size:10;' );
            $table->easyCell("" );
            $table->printRow();
          
           $table->endTable(0);

            $pdf->Output();
       /* }else{
            $pdf=new exFPDF();
            // $pdf->AddFont('FontUTF8', '', 'DV-TTSurekh_Normal.php');
        
            $pdf->AddPage("L", "A4");
            //  $pdf->SetFont('helvetica', '', 16);
            $pdf->AddFont('FontUTF8', '', 'DV-TTSurekh_Normal.php');
            $pdf->AddFont('FontUTF8', 'B', 'DV-TTSurekh_Bold.php');
            $pdf->AddFont('FontUTF8', 'I', 'DV-TTSurekh_Italic.php');
            $pdf->AddFont('FontUTF8', 'BI', 'DV-TTSurekh_Bold_Italic.php');
       
         
        
            //   $pdf->AddFont('FontUTF8','','dejavusanscondensed.php',true);
            //  $pdf->SetFont('dejavu','',14);
            //  $pdf->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);
            // $pdf->SetFont('DejaVu','',14);

            //    $pdf->SetFont('helvetica', '', 10);
      

            $table=new easyTable($pdf, '{60,300}', 'width:360; border-color:#000000; font-size:10; paddingY:2;');
    
            $table->easyCell('', 'img:images/cmc.jpg, w35; rowspan:5; align:L;');
            $table->easyCell("", ' font-size:24;');
            $table->printRow();
    
            $table->easyCell("", ' font-size:24;');
            $table->printRow();
            $table->easyCell("", '  font-size:24;');
            $table->printRow();
            $table->easyCell("", ' font-size:24;');
            $table->printRow();
          
            $table->easyCell("Chandrapur City Municipal Corporation, Chandrapur", ' align:L; font-style:BU; font-size:24;');
            $table->printRow();
    
            $table->easyCell(iconv("UTF-8", "ENCODE", "-:: मालमत्ता हस्तांतरण नोंद ::-"), ' align:C; colspan:2;  font-size:15;font-family:FontUTF8;');
            $table->printRow();
            $table->endTable(0);
    
            $table=new easyTable($pdf, '{30,300,30}', 'width:360; border-color:#000000; font-size:10; paddingY:2;');
    
            $table->easyCell("", 'colspan:3; rowspan:2');
            $table->printRow();
            $table->easyCell("", 'colspan:3;');
            $table->printRow();
    
            $table->easyCell("");
            $table->easyCell("It is certified that Mr. /Smt <b>$name</b> Will stay on word no. <b>$ward_no</b> Chandrapur city municipality / ward no. <b>$municipalty_ward_no</b> Property No. <b>$property_no</b> Their Property transfer is being recorded.", ' align:L; colspan:2;  font-size:10;');
          
            $table->printRow();
       
            $table->endTable(0);
    
            $table=new easyTable($pdf, '{100,260}', 'width:360; border-color:#000000; font-size:10; paddingY:2;');
    
            $table->easyCell("", 'colspan:2; ');
            $table->printRow();
            $table->easyCell("", 'colspan:2; ');
            $table->printRow();
            $table->easyCell("", 'colspan:2; ');
            $table->printRow();
            $table->easyCell("", 'colspan:2; ');
            $table->printRow();
            $table->easyCell("", 'colspan:2; ');
            $table->printRow();
            
            
            $table->easyCell("Location: Chandrapur Municipal Corporation\nDate: $date", 'align:L;   font-size:10;');
            $table->easyCell("", ' align:L;  font-size:10;');
         
            $table->printRow();
       
            $table->endTable(0);
    
            $table=new easyTable($pdf, '{80,180,80,20}', 'width:360; border-color:#000000; font-size:10; paddingY:2;');
    
            $table->easyCell("", 'colspan:2; ');
            // $table->easyCell("" );
            $table->easyCell("<b>Commissioner</b>\nChandrapur city municipality", 'align:C;   font-size:10;');
            $table->easyCell("");
            $table->printRow();
          
            $table->endTable(0);

            $pdf->Output();
        }*/

       
    

?>