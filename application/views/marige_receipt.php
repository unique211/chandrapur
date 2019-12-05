<?php include('include/header.php');  ?>

	 
	   
<div id="divToPrint">
     <center>
<div id="print_save_div">
   
<?php
 
                             
 foreach($record as $value)
 {
	//$today= date('d/m/Y');
 ?>


                                                  <table id="print_save_table" width="100%" border="1">
                                                       <tbody>
                                                            <tr>
                                                                 <td align="center" colspan="2"><b>
                                                                           <br>
                                                                           <font style="vertical-align: inherit;">
                                                                                Chandrapur City Municipal Corporation
                                                                           </font>
                                                                      </b><br><br><br>
                                                                      <font style="vertical-align: inherit;"> Receipt
                                                                           Voucher</font><br><br>
                                                                      <!-- <font vertical-align: inherit;"> </font><font style="vertical-align: inherit;"></font>-->
                                                                 </td>
                                                            </tr>

                                                            <tr>
                                                                 <td></td>
                                                                 <td></td>
                                                            </tr>
                                                       </tbody>
                                                  </table>
                                                  <br>
                                                  <table width="100%" border="1">
                                                  <input type="hidden"id="ref_id4" value="">
                                                       <tbody>
                                                            <tr>
                                                                 <th style="background-color: rgb(231, 226, 226);">
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">
                                                                                Receipt.No. :   <b><?php echo htmlentities($value->receipt_no);?></b></font>
                                                                      </font>
                                                                 </th>
                                                                 <th style="background-color: rgb(231, 226, 226);">
                                                                           <font style="vertical-align: inherit;">Date
                                                                                of Receipt :   <b><?php echo htmlentities($value->receipt_date);?></b></font>
                                                                 </th>
                                                                 <th style="background-color: rgb(231, 226, 226);">
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">Cash
                                                                                Collection Center No.  :    <b><?php echo htmlentities($value->collection_no);?></b></font>
                                                                      </font>
                                                                 </th>
                                                                 <th style="background-color: rgb(231, 226, 226);">
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">
                                                                                Counter No. :     <b><?php echo htmlentities($value->counter_no);?></b></font>
                                                                      </font>
                                                                 </th>

                                                            </tr>
                                                          
                                                       </tbody>
                                                  </table>
                                                  <br>
                                                  <table width="100%" border="1">
                                                       <tbody>
                                                            <tr>
                                                                 <th align="left"
                                                                      style="width: 24%;padding-left: 8px;background-color: rgb(231, 226, 226);">
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">
                                                                                Received From :</font>
                                                                      </font>
                                                                 </th>
                                                                 <td style="padding-left: 0px;">
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">
                                                                           <b><?php echo htmlentities($value->receive_from);?></b>
                                                                           </font>
                                                                      </font>
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                                 <th align="left"
                                                                      style="padding-left: 8px;background-color: rgb(231, 226, 226);">
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">Amount
                                                                                (Rs) :</font>
                                                                      </font>
                                                                 </th>
                                                                 <td style="padding-left: 0px;">
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">
                                                                           <b><?php echo htmlentities($value->amt);?></b>
                                                                           </font>
                                                                      </font>
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                                 <th align="left"
                                                                      style="padding-left: 8px;background-color: rgb(231, 226, 226);">
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">Amount
                                                                                In Words :</font>
                                                                      </font>
                                                                 </th>
                                                                 <td style="padding-left: 0px;">
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">
                                                                           <b><?php echo htmlentities($value->amt_words);?></b>
                                                                           </font>
                                                                      </font>
                                                                 </td>
                                                            </tr>

                                                            <tr>
                                                                 <th align="left"
                                                                      style="padding-left: 8px;background-color: rgb(231, 226, 226);">
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">
                                                                                Function :</font>
                                                                      </font>
                                                                 </th>
                                                                 <td style="padding-left: 0px;">
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">
                                                                           <b><?php echo htmlentities($value->function);?></b>
                                                                           </font>
                                                                      </font>
                                                                 </td>
                                                            </tr>

                                                       </tbody>
                                                  </table>
                                                  <br>

                                                  <table width="100%" border="1">
                                                       <tbody>
                                                            <tr>

                                                                 <th style="background-color: rgb(231, 226, 226);">
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">Mode
                                                                                Of Receipt  :<b><?php echo htmlentities($value->mode);?></b></font>
                                                                      </font>
                                                                 </th>
                                                                 <th style="background-color: rgb(231, 226, 226);">
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">Amount
                                                                                (Rs)  :<b><?php echo htmlentities($value->amt2);?></b></font>
                                                                      </font>
                                                                 </th>
                                                                 <th style="background-color: rgb(231, 226, 226);">
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">Cheque
                                                                                No.  :<b><?php echo htmlentities($value->chq_no);?></b></font>
                                                                      </font>
                                                                 </th>
                                                                 <th style="background-color: rgb(231, 226, 226);">
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">Cheque
                                                                                Date  :<b><?php echo htmlentities($value->chq_date);?></b></font>
                                                                      </font>
                                                                 </th>
                                                                 <th style="background-color: rgb(231, 226, 226);">
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">Bank
                                                                                Name : <b><?php echo htmlentities($value->bank);?></b></font>
                                                                      </font>
                                                                 </th>
                                                                 <!--<th style="background-color: rgb(231, 226, 226);">Branch Name</th> -->
                                                            </tr>
                                                            <tr>
                                                                 <td style="padding-left: 8px;">
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">
                                                                           </font>
                                                                      </font>
                                                                 </td>
                                                                 <td style="padding-left: 8px;">
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">
                                                                           </font>
                                                                      </font>
                                                                 </td>
                                                                 <td style="padding-left: 8px;"></td>
                                                                 <td style="padding-left: 8px;">
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">
                                                                           </font>
                                                                      </font>
                                                                 </td>
                                                                 <td style="padding-left: 8px;"></td>
                                                                 <!--<td style="padding-left: 8px;"></td> -->
                                                            </tr>
                                                       </tbody>
                                                  </table>
                                                  <br>
                                                  <table width="100%" border="1">
                                                       <tbody>
                                                            <tr>

                                                                 <th style="background-color: rgb(231, 226, 226);">
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">
                                                                                Reference No./Bill No. :<b><?php echo htmlentities($value->bill_no);?></b></font>
                                                                      </font>
                                                                 </th>
                                                                 <th style="background-color: rgb(231, 226, 226);">
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">Date
                                                                                of Bill : <b><?php echo htmlentities($value->bill_date);?></b></font>
                                                                      </font>
                                                                 </th>
                                                                 <th style="background-color: rgb(231, 226, 226);">
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">
                                                                                Details : <b><?php echo htmlentities($value->details);?></b></font>
                                                                      </font>
                                                                 </th>
                                                                 <th style="background-color: rgb(231, 226, 226);">
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">
                                                                                Payable Amount (Rs) : <b><?php echo htmlentities($value->payble);?></b></font>
                                                                      </font>
                                                                 </th>
                                                                 <th style="background-color: rgb(231, 226, 226);">
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">Amount
                                                                                Received (Rs) :<b><?php echo htmlentities($value->receive_amt);?></b></font>
                                                                      </font>
                                                                 </th>

                                                            </tr>
                                                           

                                                       </tbody>
                                                  </table>
                                                  <table width="42%" border="1" align="right">
                                                       <tbody>
                                                            <tr>
                                                                 <th style="background-color: rgb(231, 226, 226);">
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">Total </font>
                                                                      </font>
                                                                 </th>
                                                                 <td align="right" style="padding-right: 8px;">
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">
                                                                           <b><?php echo htmlentities($value->total);?></b>
                                                                           </font>
                                                                      </font>
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                            </tr>
                                                       </tbody>
                                                  </table>
                                                  <hr>

                                                  <br><br>
                                                  <table width="50%" align="right">
                                                       <tbody>
                                                            <tr>
                                                                 <td>
                                                                      &nbsp;
                                                                 </td>
                                                                 <td>
                                                                      &nbsp;
                                                                 </td>
                                                                 <td>
                                                                      <font style="vertical-align: inherit;">
                                                                           <font style="vertical-align: inherit;">
                                                                                Signature of Authorized Officer
                                                                           </font>
                                                                      </font>
                                                                 </td>
                                                            </tr>
                                                       </tbody>
                                                  </table>
                                                  <br><br><br>
 <?php }?>

                                             </div>
                                        </center>
</div>



<?php include('include/footer_scripts.php');  ?>
<!-- <button onclick="myFunction()">Print this page</button> -->
<a  class="printPage btn btn-primary" href="#">Print</a>

<script>

$('a.printPage').click(function() {
        var divToPrint = document.getElementById("divToPrint");
        newWin = window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    });

 
</script>