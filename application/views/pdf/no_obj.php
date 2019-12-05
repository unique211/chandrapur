<?php
//include 'fpdf.php';
//include 'exfpdf.php';
//include 'easyTable.php';

/*$cells=array('Lorem ipsum dolor', 
'Consectetur adipiscing elit. Nam quis tincidunt mi', 
'Vitae pulvinar tortor. Integer quis mattis lorem. Quisque maximus ut ipsum aliquet mattis.', 
'Sed in tristique enim. Vivamus malesuada, sapien non consequat tempus, risus mauris ornare risus, in varius urna est quis enim.', 
'Suspendisse nec fermentum orci, ut feugiat felis.', 
'Phasellus molestie urna nisi, nec
imperdiet orci pretium vel. Donec vehicula tellus nisl, nec commodo diam posuere eu.',
'Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc in libero non velit consectetur facilisis tincidunt non justo.',
'Pellentesque', 'Scelerisque nec nibh a sollicitudin.', 'Nullam porttitor nulla est, nec semper felis mattis sit amet.',
'Donec', 'fringilla congue felis, ornare', 'tempus velit congue at.', 
'Curabitur euismod, urna ut pretium sodales',
'felis ligula tincidunt tellus, a vestibulum urna velit ac odio.',
'In non est et arcu sollicitudin', 
'Faucibus et in metus. Proin consequat dictum aliquam. Fusce sodales, nisl sit amet ornare porta', 
'velit odio ultricies quam', 'ut accumsan massa enim a tortor', 
'Sed euismod est eu laoreet blandit.',
'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
'Donec eget enim egestas, pulvinar nulla non, mollis risus. In id ipsum ex. Morbi laoreet dui feugiat enim dapibus rhoncus. Curabitur mollis velit accumsan ex suscipit fringilla. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur quis fermentum nibh. Aenean eget tellus eu ligula hendrerit dapibus vitae at leo. Vivamus at ligula non purus iaculis eleifend. Integer eget risus non dui scelerisque consectetur. Quisque et leo ut ex lacinia malesuada dictum vitae diam. Integer eleifend in nibh in mattis. Aenean eu justo quis mauris tempus eleifend. Praesent malesuada turpis ut justo semper tempor. Integer varius, nisi non elementum molestie, leo arcu euismod velit, eu tempor ligula diam convallis sem. Sed ultrices hendrerit suscipit. Pellentesque volutpat a urna nec placerat. Etiam auctor dapibus leo nec ullamcorper. Nullam id placerat elit. Vivamus ut quam a metus tincidunt laoreet sit amet a ligula. Sed rutrum felis ipsum, sit amet finibus magna tincidunt id. Suspendisse vel urna interdum lacus luctus ornare. Curabitur ultricies nunc est, eget rhoncus orci vestibulum eleifend. In in consequat mi. Curabitur sodales magna at consequat molestie. Aliquam vulputate, neque varius maximus imperdiet, nisi orci accumsan risus, sit amet placerat augue ipsum eget elit. Quisque sodales orci non est tincidunt tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In ut diam in dolor ultricies accumsan sit amet eu ex. Pellentesque aliquet scelerisque ullamcorper. Aenean porta enim eget nisl viverra euismod sed non eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at imperdiet sem, non volutpat metus. Phasellus sed velit sed orci iaculis venenatis ac id risus.');*/

/*function Header()
{
	// Logo
	$this->Image(base_url().'images/logo.png',10,6,30);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Move to the right
	$this->Cell(80);
	// Title
	$this->Cell(30,10,'My Page',1,0,'C');
	// Line break
	$this->Ln(20);
}*/
		//$id=1;

        foreach($record as $value){
            $id=$value->id;
            $name=$value->name;
            $house_no=$value->house_no;
            $ward_no=$value->ward_no;
            $language=$value->language;
            $today= date('d/m/Y');
        }

        if($language=="english"){
            $pdf=new exFPDF();
            $pdf->AddPage("L","A4");
            $pdf->SetFont('helvetica', '', 10);
            $pdf->AddFont('helvetica', '', 'helvetica.php');
            $pdf->AddFont('helvetica', 'B', 'helveticab.php');
            $pdf->AddFont('helvetica', 'I', 'helveticai.php');
            $pdf->AddFont('helvetica', 'BI', 'helveticabi.php');
    
            $table=new easyTable($pdf, '{180,180}', 'width:360; border-color:#000000; font-size:10; paddingY:2;');
    
           
            $table->easyCell("Office of Chandrapur Municipal Corporation", ' align:C; colspan:2; font-size:16;');
            $table->printRow();
       
            $table->easyCell("-:: No - Objection Certificate ::-", ' align:C; colspan:2;  font-size:15;');
            $table->printRow();
            $table->endTable(0);
    
            $table=new easyTable($pdf, '{140,100,120}', 'width:360; border-color:#000000; font-size:10; paddingY:2;');
            
            $table->easyCell("",'colspan:3');
            $table->printRow();
    
            $table->easyCell("");
            $table->easyCell("Go No. Tax Department/2019\nOffice of Chandrapur Municipal Corporation\nDate:<b>$today</b>", ' align:L; colspan:2;  font-size:10;');
            $table->printRow();
            $table->endTable(0);
    
            $table=new easyTable($pdf, '{30,300,30}', 'width:360; border-color:#000000; font-size:10; paddingY:2;');
    
            $table->easyCell("" ,'colspan:3; rowspan:2');
            $table->printRow();
            $table->easyCell("" ,'colspan:3;');
            $table->printRow();
    
          
    
            $table->easyCell("It is certified that the house number <b>$house_no</b> of Mr./Mrs <b>$name</b> This is owned by <b>$ward_no in</b> its own possession. There is no for them to get electricity supply.", ' align:L; colspan:3;  font-size:10;');
            $table->printRow();
    
           
    
            $table->easyCell("However, when taking a strong connection, take vigilance that the wire will not go from another plot/house. Also, in case of any legal difficulty / objection, the right to suspend/cancel the certificate A They N Found Max. 1965 has been reserved under section 338(3).", ' align:L; colspan:3;  font-size:10;');
            $table->printRow();
       
            $table->endTable(20);
            $table=new easyTable($pdf, '{80,180,80,20}', 'width:360; border-color:#000000; font-size:10; paddingY:2;');
    
    
            $table->easyCell("" ,'colspan:2; ');
            $table->easyCell("<b>Chief Officer</b>\nChandrapur city municipality",'align:C;   font-size:10;' );
            $table->easyCell("" );
            $table->printRow();
          $table->endTable(0);
    
            
            $pdf->Output();
        }else{
            $pdf=new exFPDF();
            $pdf->AddPage("L","A4");
            $pdf->SetFont('helvetica', '', 10);
            $pdf->AddFont('helvetica', '', 'helvetica.php');
            $pdf->AddFont('helvetica', 'B', 'helveticab.php');
            $pdf->AddFont('helvetica', 'I', 'helveticai.php');
            $pdf->AddFont('helvetica', 'BI', 'helveticabi.php');
    
            $table=new easyTable($pdf, '{180,180}', 'width:360; border-color:#000000; font-size:10; paddingY:2;');
    
           
            $table->easyCell("Office of Chandrapur Municipal Corporation", ' align:C; colspan:2; font-size:16;');
            $table->printRow();
       
            $table->easyCell("-:: No - Objection Certificate ::-", ' align:C; colspan:2;  font-size:15;');
            $table->printRow();
            $table->endTable(0);
    
            $table=new easyTable($pdf, '{140,100,120}', 'width:360; border-color:#000000; font-size:10; paddingY:2;');
            
            $table->easyCell("",'colspan:3');
            $table->printRow();
    
            $table->easyCell("");
            $table->easyCell("Go No. Tax Department/2019\nOffice of Chandrapur Municipal Corporation\nDate:<b> $today</b>", ' align:L; colspan:2;  font-size:10;');
            $table->printRow();
            $table->endTable(0);
    
            $table=new easyTable($pdf, '{30,300,30}', 'width:360; border-color:#000000; font-size:10; paddingY:2;');
    
            $table->easyCell("" ,'colspan:3; rowspan:2');
            $table->printRow();
            $table->easyCell("" ,'colspan:3;');
            $table->printRow();
    
          
    
            $table->easyCell("It is certified that the house number <b>$house_no</b> of Mr./Mrs <b>$name</b> This is owned by <b>$ward_no in</b> its own possession. There is no for them to get electricity supply.", ' align:L; colspan:3;  font-size:10;');
            $table->printRow();
    
           
    
            $table->easyCell("However, when taking a strong connection, take vigilance that the wire will not go from another plot/house. Also, in case of any legal difficulty / objection, the right to suspend/cancel the certificate A They N Found Max. 1965 has been reserved under section 338(3).", ' align:L; colspan:3;  font-size:10;');
            $table->printRow();
       
            $table->endTable(20);
            $table=new easyTable($pdf, '{80,180,80,20}', 'width:360; border-color:#000000; font-size:10; paddingY:2;');
    
    
            $table->easyCell("" ,'colspan:2; ');
            $table->easyCell("<b>Chief Officer</b>\nChandrapur city municipality",'align:C;   font-size:10;' );
            $table->easyCell("" );
            $table->printRow();
          $table->endTable(0);
    
            
            $pdf->Output();
        }

       
    

?>