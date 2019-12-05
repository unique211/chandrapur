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
            $prof_name=$value->prof_name;
            $subject=$value->subject;
           $ref_date=$value->nref_date;
           $fee=$value->fee;
           $form_no=$value->form_no;
            $bill_date=$value->nbill_date;
           $fire_name=$value->fire_name;
           $fire_sub=$value->fire_sub;
           $certificate_date=$value->ncertificate_date;
            $language=$value->language;
          $today= date('d/m/Y');
        }
        
       // if( $language=="english"){
                    
        $pdf=new exFPDF();
        $pdf->AddPage("L","A4");
        $pdf->SetFont('helvetica', '', 10);
        $pdf->AddFont('helvetica', '', 'helvetica.php');
        $pdf->AddFont('helvetica', 'B', 'helveticab.php');
        $pdf->AddFont('helvetica', 'I', 'helveticai.php');
        $pdf->AddFont('helvetica', 'BI', 'helveticabi.php');

        $table=new easyTable($pdf, '{360}', 'width:360; border-color:#000000; font-size:8; paddingY:1;');

       
       

       
        $table->easyCell("Chandrapur city municipality", ' align:C;  font-size:12;');
       $table->printRow();

       $table->easyCell("Fire Fighting & Emergency Services", ' align:C;  font-size:12;');
       $table->printRow();

       $table->easyCell("Office: Chandrapur City Municipal Corporation, Chandrapur, Taluka: Chandrapur, District, Phone no.: 0", ' align:C;  font-size:8; border:B;');
       $table->printRow();

       $table->easyCell("", ' align:C;  font-size:8; border:B;');
       $table->printRow();
      
        
        $table->endTable(0);

        $table=new easyTable($pdf, '{10,70,200,80}', 'width:360; border-color:#000000; font-size:8; paddingY:1;');

       
        $table->easyCell("Go Sr./Fire",'align:L; colspan:2; ');
        $table->easyCell("");
        $table->easyCell("Date: $today",'align:L;');
        $table->printRow();

        $table->easyCell("per",'align:L; ');
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("",'align:L; ');
        $table->printRow();

        $table->easyCell("",'align:L; ');
        $table->easyCell("\nM/s-$name\nProf. Mr. $prof_name");
        $table->easyCell("");
        $table->easyCell("",'align:L; ');
        $table->printRow();
        
        $table->endTable(0);

        $table=new easyTable($pdf, '{360}', 'width:360; border-color:#000000; font-size:8; paddingY:1;');
        $table->easyCell("<b>Subject :  $subject Non-participatory certificate</b>",'align:C;font-style:U;');
        $table->printRow();

        $table->easyCell("<b>Reference:</b>1.Your date of application <b>$ref_date</b>",'align:C;font-style:U;');
        $table->printRow();


        $table->easyCell("2.Non-financial certificate fee of Rs./- <b>$fee</b> Receipt form <b>$form_no</b> D <b>$bill_date</b> Bill payment",'align:C;');
        $table->printRow();

        $table->endTable(0);

        $table=new easyTable($pdf, '{30,300,30}', 'width:360; border-color:#000000; font-size:8; paddingY:1;');

       
        $table->easyCell("" );
        $table->easyCell("Sir," ,'colspan:2;');
        $table->printRow();

        $table->easyCell("" );
        $table->easyCell("Under the above mentioned issues, M/S. <b>$fire_name</b> From <b>Chandrapur City Municipal</b> Fire Brigade No <b>05</b> Fire department for this <b>$fire_sub</b>. However, the conditions given below must be strictly adhered to." ,'colspan:2;');
        $table->printRow();

        $table->easyCell("" );
        $table->easyCell("" ,'colspan:2;');
        $table->printRow();

     

        $table->easyCell("" );
        $table->easyCell("Terms:-" ,'colspan:2;font-style:BU;');
        $table->printRow();

        $table->endTable(0);

        $table=new easyTable($pdf, '{30,10,290,30}', 'width:360; border-color:#000000; font-size:8; paddingY:1;');

         
        $table->easyCell("" );
        $table->easyCell("1.Fire brigade must have a road that can easily reach a car accident if there is a fire." ,'colspan:3;');
        $table->printRow();

        $table->easyCell("" );
        $table->easyCell("2.Store kerosene in a diffrent room the stove." ,'colspan:3;');
        $table->printRow();

        $table->easyCell("" );
        $table->easyCell("3.Setting exhaust wings in the kitchenroom (as necessary)." ,'colspan:3;');
        $table->printRow();

        $table->easyCell("" );
        $table->easyCell("4.To maintain fire extinguishers in the hotel's fire brigade rules." ,'colspan:3;');
        $table->printRow();
   
        $table->easyCell("",'colspan:2;' );
        $table->easyCell("A) A.B.C. Type fire extinguishers 05kg weighing 2 nos." ,'colspan:2;');
        $table->printRow();

        $table->easyCell("" );
        $table->easyCell("5.After taking all goverment licenses as per the rules, start the business." ,'colspan:3;');
        $table->printRow();

        $table->easyCell("" );
        $table->easyCell("6.If there is a fire incident, then take precautions that there will be no obstruction to traffic." ,'colspan:3;');
        $table->printRow();

        $table->easyCell("" );
        $table->easyCell("7.When the Fire Office goes to the Investigator, the Fire Officer will have the right to cancel the certificate on the ground without giving any kind of information if there is an error in above matters." ,'colspan:3;');
        $table->printRow();

        $table->easyCell("" );
        $table->easyCell("8.The person is personally responsible for the errors and shortcomings received after obtainning a non-objection certificate, and the Fire Officer or the municipal corporation will not be held liable in this regard." ,'colspan:3;');
        $table->printRow();

        $table->easyCell("" );
        $table->easyCell("9.In future, if necessary, necessary compulsory/additional fire prevention measures are required according to the instructions of the Fire Brigade Officer.",'colspan:3;');
        $table->printRow();

        $table->easyCell("" );
        $table->easyCell("10.For this business, the business owner will be required to obtain other necessary permissions from the Chandrapur Municipal Corporation." ,'colspan:3;');
        $table->printRow();

        $table->easyCell("" );
        $table->easyCell("11.Essential services like place of business The phone number of firefighting force, police ambulance, is required." ,'colspan:3;');
        $table->printRow();

        $table->easyCell("",'colspan:2;' );
        $table->easyCell("<b>This non-objection certificate is up to the  $certificate_date of maturity.</b> After this it will be mandatory for the business owner to renew the non-objection certificate for the next period.",'colspan:2;');
        $table->printRow();

        $table->endTable(6);

        $table=new easyTable($pdf, '{80,180,80,20}', 'width:360; border-color:#000000; font-size:8; paddingY:1;');

        $table->easyCell("" ,'colspan:2; ');
        $table->easyCell("Q.Fire officer\nFire Fighting & Emergency Services\nChandrapur city municipality",'align:C;   font-size:8;' );
        $table->easyCell("" );
        $table->printRow();

        $table->easyCell("Notice: It is mandatory to renew the non-objection certificate within one month after the deadline for the submission of the non-objection certificate. It renewal is not renewed in time, then a fee of Rs. 50/- per month will be levied." ,'colspan:4; font-style:U; ');
        
         $table->printRow();
      
        $table->endTable(0);
         $pdf->Output();
       /* }else{
            $pdf=new exFPDF();
            $pdf->AddPage("L","A4");
            $pdf->SetFont('helvetica', '', 10);
            $pdf->AddFont('helvetica', '', 'helvetica.php');
            $pdf->AddFont('helvetica', 'B', 'helveticab.php');
            $pdf->AddFont('helvetica', 'I', 'helveticai.php');
            $pdf->AddFont('helvetica', 'BI', 'helveticabi.php');
    
            $table=new easyTable($pdf, '{360}', 'width:360; border-color:#000000; font-size:8; paddingY:1;');
    
           
           
    
           
            $table->easyCell("Chandrapur city municipality", ' align:C;  font-size:12;');
           $table->printRow();
    
           $table->easyCell("Fire Fighting & Emergency Services", ' align:C;  font-size:12;');
           $table->printRow();
    
           $table->easyCell("Office: Chandrapur City Municipal Corporation, Chandrapur, Taluka: Chandrapur, District, Phone no.: 0", ' align:C;  font-size:8; border:B;');
           $table->printRow();
    
           $table->easyCell("", ' align:C;  font-size:8; border:B;');
           $table->printRow();
          
            
            $table->endTable(0);
    
            $table=new easyTable($pdf, '{10,70,200,80}', 'width:360; border-color:#000000; font-size:8; paddingY:1;');
    
           
            $table->easyCell("Go Sr./Fire",'align:L; colspan:2; ');
            $table->easyCell("");
            $table->easyCell("Date: $today",'align:L;');
            $table->printRow();
    
            $table->easyCell("per",'align:L; ');
            $table->easyCell("");
            $table->easyCell("");
            $table->easyCell("",'align:L; ');
            $table->printRow();
    
            $table->easyCell("",'align:L; ');
            $table->easyCell("\nM/s-$name\nProf. Mr. $prof_name");
            $table->easyCell("");
            $table->easyCell("",'align:L; ');
            $table->printRow();
            
            $table->endTable(0);
    
            $table=new easyTable($pdf, '{360}', 'width:360; border-color:#000000; font-size:8; paddingY:1;');
            $table->easyCell("<b>Subject :  $subject Non-participatory certificate</b>",'align:C;font-style:U;');
            $table->printRow();
    
            $table->easyCell("<b>Reference:</b>1.Your date of application <b>$ref_date</b>",'align:C;font-style:U;');
            $table->printRow();
    
    
            $table->easyCell("2.Non-financial certificate fee of Rs./- <b>$fee</b> Receipt form <b>$form_no</b> D <b>$bill_date</b> Bill payment",'align:C;');
            $table->printRow();
    
            $table->endTable(0);
    
            $table=new easyTable($pdf, '{30,300,30}', 'width:360; border-color:#000000; font-size:8; paddingY:1;');
    
           
            $table->easyCell("" );
            $table->easyCell("Sir," ,'colspan:2;');
            $table->printRow();
    
            $table->easyCell("" );
            $table->easyCell("Under the above mentioned issues, M/S. <b>$fire_name</b> From <b>Chandrapur City Municipal</b> Fire Brigade No <b>05</b> Fire department for this <b>$fire_sub</b>. However, the conditions given below must be strictly adhered to." ,'colspan:2;');
            $table->printRow();
    
            $table->easyCell("" );
            $table->easyCell("" ,'colspan:2;');
            $table->printRow();
    
         
    
            $table->easyCell("" );
            $table->easyCell("Terms:-" ,'colspan:2;font-style:BU;');
            $table->printRow();
    
            $table->endTable(0);
    
            $table=new easyTable($pdf, '{30,10,290,30}', 'width:360; border-color:#000000; font-size:8; paddingY:1;');
    
             
            $table->easyCell("" );
            $table->easyCell("1.Fire brigade must have a road that can easily reach a car accident if there is a fire." ,'colspan:3;');
            $table->printRow();
    
            $table->easyCell("" );
            $table->easyCell("2.Store kerosene in a diffrent room the stove." ,'colspan:3;');
            $table->printRow();
    
            $table->easyCell("" );
            $table->easyCell("3.Setting exhaust wings in the kitchenroom (as necessary)." ,'colspan:3;');
            $table->printRow();
    
            $table->easyCell("" );
            $table->easyCell("4.To maintain fire extinguishers in the hotel's fire brigade rules." ,'colspan:3;');
            $table->printRow();
       
            $table->easyCell("",'colspan:2;' );
            $table->easyCell("A) A.B.C. Type fire extinguishers 05kg weighing 2 nos." ,'colspan:2;');
            $table->printRow();
    
            $table->easyCell("" );
            $table->easyCell("5.After taking all goverment licenses as per the rules, start the business." ,'colspan:3;');
            $table->printRow();
    
            $table->easyCell("" );
            $table->easyCell("6.If there is a fire incident, then take precautions that there will be no obstruction to traffic." ,'colspan:3;');
            $table->printRow();
    
            $table->easyCell("" );
            $table->easyCell("7.When the Fire Office goes to the Investigator, the Fire Officer will have the right to cancel the certificate on the ground without giving any kind of information if there is an error in above matters." ,'colspan:3;');
            $table->printRow();
    
            $table->easyCell("" );
            $table->easyCell("8.The person is personally responsible for the errors and shortcomings received after obtainning a non-objection certificate, and the Fire Officer or the municipal corporation will not be held liable in this regard." ,'colspan:3;');
            $table->printRow();
    
            $table->easyCell("" );
            $table->easyCell("9.In future, if necessary, necessary compulsory/additional fire prevention measures are required according to the instructions of the Fire Brigade Officer.",'colspan:3;');
            $table->printRow();
    
            $table->easyCell("" );
            $table->easyCell("10.For this business, the business owner will be required to obtain other necessary permissions from the Chandrapur Municipal Corporation." ,'colspan:3;');
            $table->printRow();
    
            $table->easyCell("" );
            $table->easyCell("11.Essential services like place of business The phone number of firefighting force, police ambulance, is required." ,'colspan:3;');
            $table->printRow();
    
            $table->easyCell("",'colspan:2;' );
            $table->easyCell("<b>This non-objection certificate is up to the  $certificate_date of maturity.</b> After this it will be mandatory for the business owner to renew the non-objection certificate for the next period.",'colspan:2;');
            $table->printRow();
    
            $table->endTable(6);
    
            $table=new easyTable($pdf, '{80,180,80,20}', 'width:360; border-color:#000000; font-size:8; paddingY:1;');
    
            $table->easyCell("" ,'colspan:2; ');
            $table->easyCell("Q.Fire officer\nFire Fighting & Emergency Services\nChandrapur city municipality",'align:C;   font-size:8;' );
            $table->easyCell("" );
            $table->printRow();
    
            $table->easyCell("Notice: It is mandatory to renew the non-objection certificate within one month after the deadline for the submission of the non-objection certificate. It renewal is not renewed in time, then a fee of Rs. 50/- per month will be levied." ,'colspan:4; font-style:U; ');
            
             $table->printRow();
          
            $table->endTable(0);
             $pdf->Output();
        }*/

    

?>