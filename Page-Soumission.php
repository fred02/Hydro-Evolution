<?php

require 'lib/autoload.php';

?>
<!DOCTYPE html>
<html>
    <head>
	   <meta charset="utf-8" />
       <title> Page-Soumission </title>
	   <link rel="stylesheet" href="Web/css/style.css">
	   <script type="text/javascript">
			function submitForm(action)
			{
				document.getElementById('pdfGenerate').action = action;
				document.getElementById('pdfGenerate').submit();
			}
     </script>
    </head>
    <body>
 
       
	  <!-- #Balise entête -->
  	<header class="tete">
	    
        <h2> <img src="Web/images/logo.png"></br> <strong> Page de Soumissions pour les représentants :   </strong> </h2>
       
	</header>
	
	 <!-- #Balise navigation -->
	 <nav>
          
     </nav> 
    <!-- #Balise centrale -->  
       
	   
  <section>	
    <div >	
      <div>
	  <nav>
	    <form id="pdfGenerate" name="pdfGenerate" action="lib/report_pdf.php" method="post" class="pdf_report">
	        <ul>
			     
                 <li  ><input type="submit" name="submit" onclick="submitForm('lib/report_pdf.php')" class="button" value="Produire Rapport" /> </li>
				 <li  ><input type="submit" name="submit" class="button" value="Sauvegarder soumission" />  </li>
				 
            </ul>
			<ul>
            <li><a href="Page-Soumission.php"> Nouvelle soumission </a> </li>
           </ul>
			
	     </nav>
	<!--   </form> -->
	  <div class="identification-info-client">
	<!--  <form action="Page-Soumission.php" method="post" class="calcul"> -->
	  <table width=40% border=1>
	  <?php
	  // creation of client object 
	  if (isset ($_POST['companyName']) and isset ($_POST['companyContact']) and isset ($_POST['phone']) and isset ($_POST['companyAdress']) and isset ($_POST['representative']) )
	  {
		   if(isset($_POST['submit']))
			   {
				   // Invoice Number : HE(Hydro Evolution) + date(month-day-year) + Database number
					$date=date("mdy");
					$invoiceNum = "HE" . $date;
					
				    $submission = new Submission (
						[
							'client_name' => $_POST['companyName'],
						    'contact' => $_POST['companyContact'],
							'phone_number' => $_POST['phone'],
							'adress' => $_POST['companyAdress'],
							'repName' => $_POST['representative'],
							'contratNumber' => $invoiceNum 
						]
					);
			   } 
		
	  }
	  
	  
	  //echo $submission->adress();
	  ?>
	  <tr class="ligne">
			   <th width=15%> Compagnie(Client): </th>
               <td colspan=3> <input  type="text" name="companyName" value="<?php if(isset($_POST['submit'])){
													                              echo $submission->client_name(); }?>" /></td>
			   
	  </tr>
	  <tr class="ligne">
			   <th width=15%> Contact: </th>
               <td width=20%> <input  type="text" name="companyContact" value="<?php if(isset($_POST['submit'])){
													                              echo $submission->contact(); }?>" /></td>
			   <th width=15%> Téléphone: </th>
			   <td width=25%> <input  type="text" name="phone" value="<?php if(isset($_POST['submit'])){
													                              echo $submission->phone_number(); }?>" /></td>
	  </tr>
	  <tr class="ligne">
			   <th width=15%> Adresse du Site: </th>
               <td colspan=3  > <input  type="text" name="companyAdress" value="<?php if(isset($_POST['submit'])){
													                              echo $submission->adress(); }?>" /> </td>
			   
	  </tr>
      <tr class="ligne">
			   <th width=15%> Représentant: </th>
               <td colspan=3  > <input  type="text" name="representative" value="<?php if(isset($_POST['submit'])){
													                              echo $submission->repName(); }?>" /> </td>
			   
	  </tr>
	  
	  
	  </table>
	  
	  </br>
	<!--  </form> -->
	  </div>
	  
	  <div class="tableau-consommation">
	<!--  <form action="Page-Soumission.php" method="post" class="calcul"> -->
	  <caption><strong>TABLEAU DE CONSOMMATION</strong></caption>
	  <table width=100% border=1>
	  
	        
	        <tr class="ligne1">
			   <th rowspan=2> Remplir les cases jaunes </th>
			   <th colspan=5 align=center > Information techniques </th>			 
               <th rowspan 2> Consomm. totale </th>
               <th rowspan 2> Économie totale </th>
               <th> Cout par unité </th>	
               <th> Fx</td>
			   <th> Coût d'opération¹</th>
               <th> Économie globale²</th>			   
			</tr>
			<tr class="ligne2">
			   
			   <th >Modèle</th>
			   <th >Quantité</th>
			   <th >Puissance</th>
			   <th >Heures</th>
			   <th >Jours</th>
			   <th >annuelle(KwH)</th>
			   <th >annuelle(KwH)</th>
			   <th >lampe DEL($)</th>
			   <th >Fx</th>
			   <th >avec DEL ($)</th>
			   <th >annuelle ($)</th>
			   
			</tr> 
			<?php
			if (isset ($_POST['tauxHydro']) ) 
			{
				if (isset ($_POST['submit']) ) 
				{
				SubmissionCalculus::$TAUX_HYDRO = $_POST['tauxHydro'];		      				
				}
			}	
			?>
				<?php
			   // object number 1				 			
			   if ( isset ($_POST['actualLampQuantity']) and isset ($_POST['actualLampPower']) and isset ($_POST['actualLampHours']) and isset ($_POST['actualLampDays'])
				        and isset ($_POST['LedQuantity']) and isset($_POST['LedPower']) and isset ($_POST['LedHours']) and isset ($_POST['LedDays']) 
						and isset ($_POST['actualLampTotAnnualConsump'])   and isset ($_POST['LedTotAnnualConsump']) and isset ($_POST['actualVsDelTotAnnualEcon']) and isset ($_POST['actualLampOperCostRegular'])
						and isset ($_POST['actualLampOperCostRegular'])and isset ($_POST['LedOperCost']) and isset ($_POST['LedGlobalAnnuaEconomy']) 
						and isset ($_POST['actualLampUnitPriceRegular']) and isset ($_POST['actualLampFx'])  
						and isset ($_POST['LedUnitPriceLed']) and isset ($_POST['LedFx'])  ) {										  	   			  
			   
			   if(isset($_POST['submit']))
			   {
				   $submissionCalculus = new SubmissionCalculus (
						[
						    'actual_lamp_model' => $_POST['actualLampModel'],
							'actual_lamp_qty' => $_POST['actualLampQuantity'],
							'actual_lamp_power' => $_POST['actualLampPower'],
							'actual_lamp_hours' => $_POST['actualLampHours'],
							'actual_lamp_days' => $_POST['actualLampDays'],
							'actualLampUnitPriceRegular' => $_POST['actualLampUnitPriceRegular'],
							'actualLampFx' => $_POST['actualLampFx'],							
								
							'del_model' => $_POST['LedModel'],
							'del_qty'   => $_POST['LedQuantity'],
							'del_power' => $_POST['LedPower'],
							'del_hours' => $_POST['LedHours'],
							'del_days'  => $_POST['LedDays'],
							'LedUnitPriceLed' => $_POST['LedUnitPriceLed'],
							'LedFx' => $_POST['LedFx'],
							
							'tot_cons' => $_POST['actualLampTotAnnualConsump'],
							'tot_cons_del' => $_POST['LedTotAnnualConsump'],
							'tot_ann_economy' => $_POST['actualVsDelTotAnnualEcon'],
							'actualLampOperCostRegular' => $_POST['actualLampOperCostRegular'],
							'LedOperCost' => $_POST['LedOperCost'],
							'LedGlobalAnnualEconomy' => $_POST['LedGlobalAnnuaEconomy'],
	
							'sum_actu_tot_comsum' => $_POST['cumulActLampTotAnnualConsump'],
							'sum_del_tot_consum' => $_POST['cumulSumTotAnnualEcon'],
							'sum_tot_ann_econ' => $_POST['cumulDelTotAnnualConsump'],
							'sum_glob_annu_econ' => $_POST['cumulTotalGlobal']
						]
					);
										
					
			   }
			   	
			   	
               				
			   $submissionCalculus->setTot_cons(SubmissionCalculus::actual_lamp_total_annu_consump($submissionCalculus->actual_lamp_qty(),$submissionCalculus->actual_lamp_power(),
												    $submissionCalculus->actual_lamp_hours(),$submissionCalculus->actual_lamp_days()));
			   $submissionCalculus->setTot_cons_del(SubmissionCalculus::del_total_annu_consump($submissionCalculus->del_qty(),$submissionCalculus->del_power(),
													$submissionCalculus->del_hours(),$submissionCalculus->del_days()) );
																			
			   $submissionCalculus->setTot_ann_economy(SubmissionCalculus::total_annual_econ_del_vs_actual($submissionCalculus->tot_cons(),$submissionCalculus->tot_cons_del()));
			   $submissionCalculus->setActualLampOperCostRegular(SubmissionCalculus::operational_cost_actual_lamp(SubmissionCalculus::$TAUX_HYDRO,$submissionCalculus->tot_cons(),$submissionCalculus->actualLampUnitPriceRegular(),
																							$submissionCalculus->actualLampFx(),$submissionCalculus->actual_lamp_qty()) );
			   $submissionCalculus->setLedOperCost (SubmissionCalculus::operational_cost_del(SubmissionCalculus::$TAUX_HYDRO,$submissionCalculus->tot_cons_del(),
													$submissionCalculus->LedUnitPriceLed(),$submissionCalculus->LedFx(),$submissionCalculus->del_qty()) );
			   $submissionCalculus->setLedGlobalAnnualEconomy ( SubmissionCalculus::global_annual_economy($submissionCalculus->actualLampOperCostRegular(),
													$submissionCalculus->LedOperCost()) );
			   			                	   
			   
			   SubmissionCalculus::$sum_actu_tot_comsum =SubmissionCalculus::sum_actu_tot_comsum($submissionCalculus->tot_cons());
			   SubmissionCalculus::$sum_del_tot_consum  =SubmissionCalculus::sum_del_tot_consum($submissionCalculus->tot_cons_del());
			   SubmissionCalculus::$sum_tot_ann_econ    =SubmissionCalculus::sum_tot_ann_econ($submissionCalculus->tot_ann_economy());
			   SubmissionCalculus::$sum_glob_annu_econ  =SubmissionCalculus::sum_glob_annu_econ($submissionCalculus->LedGlobalAnnualEconomy());
			   }
			   			   
			   // object number 2
			    if ( isset ($_POST['actualLampQuantity2']) and isset ($_POST['actualLampPower2']) and isset ($_POST['actualLampHours2']) and isset ($_POST['actualLampDays2'])
				        and isset ($_POST['LedQuantity2']) and isset($_POST['LedPower2']) and isset ($_POST['LedHours2']) and isset ($_POST['LedDays2']) 
						and isset ($_POST['actualLampTotAnnualConsump2'])   and isset ($_POST['LedTotAnnualConsump2']) and isset ($_POST['actualVsDelTotAnnualEcon2']) and isset ($_POST['actualLampOperCostRegular2'])
						and isset ($_POST['actualLampOperCostRegular2'])and isset ($_POST['LedOperCost2']) and isset ($_POST['LedGlobalAnnuaEconomy2']) 
						and isset ($_POST['actualLampUnitPriceRegular2']) and isset ($_POST['actualLampFx2'])  
						and isset ($_POST['LedUnitPriceLed2']) and isset ($_POST['LedFx2'])  ) {										  	   			  
			   
			   if(isset($_POST['submit']))
			   {
				   $submissionCalculus2 = new SubmissionCalculus (
						[
						    'actual_lamp_model' => $_POST['actualLampModel2'],
							'actual_lamp_qty' => $_POST['actualLampQuantity2'],
							'actual_lamp_power' => $_POST['actualLampPower2'],
							'actual_lamp_hours' => $_POST['actualLampHours2'],
							'actual_lamp_days' => $_POST['actualLampDays2'],
							'actualLampUnitPriceRegular' => $_POST['actualLampUnitPriceRegular2'],
							'actualLampFx' => $_POST['actualLampFx2'],							
								
							'del_model' => $_POST['LedModel2'],
							'del_qty'   => $_POST['LedQuantity2'],
							'del_power' => $_POST['LedPower2'],
							'del_hours' => $_POST['LedHours2'],
							'del_days'  => $_POST['LedDays2'],
							'LedUnitPriceLed' => $_POST['LedUnitPriceLed2'],
							'LedFx' => $_POST['LedFx2'],
							
							'tot_cons' => $_POST['actualLampTotAnnualConsump2'],
							'tot_cons_del' => $_POST['LedTotAnnualConsump2'],
							'tot_ann_economy' => $_POST['actualVsDelTotAnnualEcon2'],
							'actualLampOperCostRegular' => $_POST['actualLampOperCostRegular2'],
							'LedOperCost' => $_POST['LedOperCost2'],
							'LedGlobalAnnualEconomy' => $_POST['LedGlobalAnnuaEconomy2'],
	
							'sum_actu_tot_comsum' => $_POST['cumulActLampTotAnnualConsump'],
							'sum_del_tot_consum' => $_POST['cumulSumTotAnnualEcon'],
							'sum_tot_ann_econ' => $_POST['cumulDelTotAnnualConsump'],
							'sum_glob_annu_econ' => $_POST['cumulTotalGlobal']
						]
					);
					
					
			   }
             	
               				
			   $submissionCalculus2->setTot_cons(SubmissionCalculus::actual_lamp_total_annu_consump($submissionCalculus2->actual_lamp_qty(),$submissionCalculus2->actual_lamp_power(),
												    $submissionCalculus2->actual_lamp_hours(),$submissionCalculus2->actual_lamp_days()));
			   $submissionCalculus2->setTot_cons_del(SubmissionCalculus::del_total_annu_consump($submissionCalculus2->del_qty(),$submissionCalculus2->del_power(),
													$submissionCalculus2->del_hours(),$submissionCalculus2->del_days()) );
																			
			   $submissionCalculus2->setTot_ann_economy(SubmissionCalculus::total_annual_econ_del_vs_actual($submissionCalculus2->tot_cons(),$submissionCalculus2->tot_cons_del()));
			   $submissionCalculus2->setActualLampOperCostRegular(SubmissionCalculus::operational_cost_actual_lamp(SubmissionCalculus::$TAUX_HYDRO,$submissionCalculus2->tot_cons(),$submissionCalculus2->actualLampUnitPriceRegular(),
																							$submissionCalculus2->actualLampFx(),$submissionCalculus2->actual_lamp_qty()) );
			   $submissionCalculus2->setLedOperCost (SubmissionCalculus::operational_cost_del(SubmissionCalculus::$TAUX_HYDRO,$submissionCalculus2->tot_cons_del(),
													$submissionCalculus2->LedUnitPriceLed(),$submissionCalculus2->LedFx(),$submissionCalculus2->del_qty()) );
			   $submissionCalculus2->setLedGlobalAnnualEconomy ( SubmissionCalculus::global_annual_economy($submissionCalculus2->actualLampOperCostRegular(),
													$submissionCalculus2->LedOperCost()) );
			   			                	   
			   
			   SubmissionCalculus::$sum_actu_tot_comsum=SubmissionCalculus::sum_actu_tot_comsum($submissionCalculus2->tot_cons());
			   SubmissionCalculus::$sum_del_tot_consum =SubmissionCalculus::sum_del_tot_consum($submissionCalculus2->tot_cons_del());
			   SubmissionCalculus::$sum_tot_ann_econ   =SubmissionCalculus::sum_tot_ann_econ($submissionCalculus2->tot_ann_economy());
			   SubmissionCalculus::$sum_glob_annu_econ =SubmissionCalculus::sum_glob_annu_econ($submissionCalculus2->LedGlobalAnnualEconomy());			   			   		 
			   }
			   ?>
    
		<div class="case-to-fill">	
			<tr class="ligne3">
			   <th> Lampes actuelles</th>
			   
			   <td > <input  type="text" name="actualLampModel" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus->actual_lamp_model() ;}?>" size="5"/></td> 
			   <td > <input  type="text" name="actualLampQuantity" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus->actual_lamp_qty() ;}?>" size="5"/></td>
			  
			   <td > <input  type="text" name="actualLampPower" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus->actual_lamp_power() ;}?>" size="5"/></td>
			   <td > <input  type="text" name="actualLampHours" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus->actual_lamp_hours() ;}?>" size="5"/></td>
			   <td > <input  type="text" name="actualLampDays" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus->actual_lamp_days() ;}?>" size="5"/></td>			
			   <td > <input  type="text" name="actualLampTotAnnualConsump" value="<?php  if(isset($_POST['submit'])){
                                                             echo  $submissionCalculus->tot_cons() ;} ?>" size="5"/></td>
			   <td rowspan=2> <input  type="text" name="actualVsDelTotAnnualEcon" value="<?php  if(isset($_POST['submit'])){
                                                             echo  $submissionCalculus->tot_ann_economy() ;} ?>" size="5" /></td>
			   <td > <input  type="text" name="actualLampUnitPriceRegular" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus->actualLampUnitPriceRegular() ;}?>" size="5"/></td>
			   <td > <input  type="text" name="actualLampFx" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus->actualLampFx() ;}?>" size="5"/></td>
			   <td > <input  type="text" name="actualLampOperCostRegular" value="<?php if(isset($_POST['submit'])){
				                                           echo $submissionCalculus->actualLampOperCostRegular() ;} ?>" size="5"/></td>

			</tr>
			
			<tr class="ligne4">
			   <th> Remplacement lampes D.E.L</th>
			   <td >
			   <select name="LedModel">
					<option value="AMP-LUX-01">AMP-LUX-01</option>
					<option value="AMP-LUX-02">AMP-LUX-02</option>
					<option value="ENC-LUX-01">ENC-LUX-01</option>
					<option value="ENC-LUX-02">ENC-LUX-02</option>
					<option value="ENC-LUX-03">ENC-LUX-03</option>
					<option value="ENC-LUX-04">ENC-LUX-04</option>
					<option value="E26-LUX-01">E26-LUX-01</option>					
					<option value="GU10-LUX-01">GU10-LUX-01</option>
					<option value="GU10-LUX-02">GU10-LUX-02</option>
					<option value="GU10-LUX-03">GU10-LUX-03</option>					
					<option value="HGHBY-LUX-01">HGHBY-LUX-01</option>
					<option value="HGHBY-LUX-02">HGHBY-LUX-02</option>
					<option value="HGHBY-LUX-03">HGHBY-LUX-03</option>
					<option value="HGHBY-LUX-04">HGHBY-LUX-04</option>					
					<option value="MR16-LUX-01">MR16-LUX-01</option>
					<option value="MR16-LUX-02">MR16-LUX-02</option>
					<option value="MR16-LUX-03">MR16-LUX-03</option>					
					<option value="PAR20-LUX-01">PAR20-LUX-01</option>
					<option value="PAR20-LUX-02">PAR20-LUX-02</option>
					<option value="PAR30-LUX-01">PAR30-LUX-01</option>
					<option value="PAR38-LUX-01">PAR38-LUX-01</option>
					<option value="PAR38-LUX-02">PAR38-LUX-02</option>															
					<option value="TUB-LUX-01">TUB-LUX-01</option>
					<option value="TUB-LUX-02">TUB-LUX-02</option>
					<option value="TUB-LUX-03">TUB-LUX-03</option>
					<option value="TUB-LUX-04">TUB-LUX-04</option>	
				</select>
				<?php if(isset($_POST['submit'])){echo $submissionCalculus->setDel_model($_POST['LedModel']) ;}?>
               </td>
			<!--   <td > <input  type="text" name="LedModel" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus->del_model() ;}?>" size="5"/></td> -->
			   <td > <input  type="text" name="LedQuantity" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus->del_qty() ;}?>" size="5"/></td>
			   <td > <input  type="text" name="LedPower" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus->del_power() ;}?>" size="5"/></td>
			   <td > <input  type="text" name="LedHours" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus->del_hours() ;}?>" size="5"/></td>
			   <td > <input  type="text" name="LedDays" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus->del_days() ;}?>" size="5"/></td>
			   <td > <input  type="text" name="LedTotAnnualConsump" value="<?php  if(isset($_POST['submit'])){
                                                          echo $submissionCalculus->tot_cons_del() ;} ?>" size="5"/></td>			   
			   <td > <input  type="text" name="LedUnitPriceLed" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus->LedUnitPriceLed() ;}?>" size="5"/></td>
			   <td > <input  type="text" name="LedFx" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus->LedFx() ;}?>" size="5"/></td>
			   <td > <input  type="text" name="LedOperCost" value="<?php if(isset($_POST['submit'])){
														  echo $submissionCalculus->LedOperCost() ;}?>" size="5"/></td>
			   <td > <input  type="text" name="LedGlobalAnnuaEconomy" value="<?php if(isset($_POST['submit'])){
														  echo $submissionCalculus->LedGlobalAnnualEconomy() ;}?>" size="5"/></td>
			</tr>
			<tr >
			   <td colspan=12>. </td> 
			</tr>		
        </div>
		<tr class="ligne3">
			   <th> Lampes actuelles</th>
			   <td > <input  type="text" name="actualLampModel2" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus2->actual_lamp_model() ;}?>" size="5"/></td>
			   <td > <input  type="text" name="actualLampQuantity2" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus2->actual_lamp_qty() ;}?>" size="5"/></td>
			  
			   <td > <input  type="text" name="actualLampPower2" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus2->actual_lamp_power() ;}?>" size="5"/></td>
			   <td > <input  type="text" name="actualLampHours2" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus2->actual_lamp_hours() ;}?>" size="5"/></td>
			   <td > <input  type="text" name="actualLampDays2" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus2->actual_lamp_days() ;}?>" size="5"/></td>			
			   <td > <input  type="text" name="actualLampTotAnnualConsump2" value="<?php  if(isset($_POST['submit'])){
                                                             echo  $submissionCalculus2->tot_cons() ;} ?>" size="5"/></td>
			   <td rowspan=2> <input  type="text" name="actualVsDelTotAnnualEcon2" value="<?php  if(isset($_POST['submit'])){
                                                             echo  $submissionCalculus2->tot_ann_economy() ;} ?>" size="5" /></td>
			   <td > <input  type="text" name="actualLampUnitPriceRegular2" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus2->actualLampUnitPriceRegular() ;}?>" size="5"/></td>
			   <td > <input  type="text" name="actualLampFx2" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus2->actualLampFx() ;}?>" size="5"/></td>
			   <td > <input  type="text" name="actualLampOperCostRegular2" value="<?php if(isset($_POST['submit'])){
				                                           echo $submissionCalculus2->actualLampOperCostRegular() ;} ?>" size="5"/></td>
									
			</tr>
			
			<tr class="ligne4">
			   <th> Remplacement lampes D.E.L</th>
			   <td >
			   <select name="LedModel2">
					<option value="AMP-LUX-01">AMP-LUX-01</option>
					<option value="AMP-LUX-02">AMP-LUX-02</option>
					<option value="ENC-LUX-01">ENC-LUX-01</option>
					<option value="ENC-LUX-02">ENC-LUX-02</option>
					<option value="ENC-LUX-03">ENC-LUX-03</option>
					<option value="ENC-LUX-04">ENC-LUX-04</option>
					<option value="E26-LUX-01">E26-LUX-01</option>					
					<option value="GU10-LUX-01">GU10-LUX-01</option>
					<option value="GU10-LUX-02">GU10-LUX-02</option>
					<option value="GU10-LUX-03">GU10-LUX-03</option>					
					<option value="HGHBY-LUX-01">HGHBY-LUX-01</option>
					<option value="HGHBY-LUX-02">HGHBY-LUX-02</option>
					<option value="HGHBY-LUX-03">HGHBY-LUX-03</option>
					<option value="HGHBY-LUX-04">HGHBY-LUX-04</option>					
					<option value="MR16-LUX-01">MR16-LUX-01</option>
					<option value="MR16-LUX-02">MR16-LUX-02</option>
					<option value="MR16-LUX-03">MR16-LUX-03</option>					
					<option value="PAR20-LUX-01">PAR20-LUX-01</option>
					<option value="PAR20-LUX-02">PAR20-LUX-02</option>
					<option value="PAR30-LUX-01">PAR30-LUX-01</option>
					<option value="PAR38-LUX-01">PAR38-LUX-01</option>
					<option value="PAR38-LUX-02">PAR38-LUX-02</option>															
					<option value="TUB-LUX-01">TUB-LUX-01</option>
					<option value="TUB-LUX-02">TUB-LUX-02</option>
					<option value="TUB-LUX-03">TUB-LUX-03</option>
					<option value="TUB-LUX-04">TUB-LUX-04</option>															
				</select>
				<?php if(isset($_POST['submit'])){echo $submissionCalculus2->setDel_model($_POST['LedModel2']) ;}?>
               </td>
			 <!--  <td > <input  type="text" name="LedModel2" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus2->del_model() ;}?>" size="5"/></td> -->
			   <td > <input  type="text" name="LedQuantity2" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus2->del_qty() ;}?>" size="5"/></td>
			   <td > <input  type="text" name="LedPower2" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus2->del_power() ;}?>" size="5"/></td>
			   <td > <input  type="text" name="LedHours2" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus2->del_hours() ;}?>" size="5"/></td>
			   <td > <input  type="text" name="LedDays2" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus2->del_days() ;}?>" size="5"/></td>
			   <td > <input  type="text" name="LedTotAnnualConsump2" value="<?php  if(isset($_POST['submit'])){
                                                          echo $submissionCalculus2->tot_cons_del() ;} ?>" size="5"/></td>			   
			   <td > <input  type="text" name="LedUnitPriceLed2" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus2->LedUnitPriceLed() ;}?>" size="5"/></td>
			   <td > <input  type="text" name="LedFx2" value="<?php if(isset($_POST['submit'])){
													echo $submissionCalculus2->LedFx() ;}?>" size="5"/></td>
			   <td > <input  type="text" name="LedOperCost2" value="<?php if(isset($_POST['submit'])){
														  echo $submissionCalculus2->LedOperCost() ;}?>" size="5"/></td>
			   <td > <input  type="text" name="LedGlobalAnnuaEconomy2" value="<?php if(isset($_POST['submit'])){
														  echo $submissionCalculus2->LedGlobalAnnualEconomy() ;}?>" size="5"/></td>
			</tr>
			<tr >
			   <td colspan=12>. </td> 
			</tr>
		<div>
		 
		</div>
        

    <tfoot> <!-- Pied de tableau -->
        <tr class="">
		 
			   <th colspan=6></th>
			   <th >annuel(KwH)</th>
			   <th >annuel(KwH)</th>
			   <th colspan=4></th>
			 			   
		</tr>
		<tr class="">
			   <th rowspan=3 align=center > TOTAUX </th>
			   <th colspan=5> Éclérage Actuel</th>
			   <td > <input  type="text" name="cumulActLampTotAnnualConsump" value=" <?php if(isset($_POST['submit'])){
																		echo SubmissionCalculus::$sum_actu_tot_comsum ;} ?>" size="5"/></td>
			   <td rowspan=3> <input  type="text" name="cumulSumTotAnnualEcon" value="<?php if(isset($_POST['submit'])){
													                    echo SubmissionCalculus::$sum_tot_ann_econ ;}?>" size="5"/> </td>
			   <th colspan=4>  Économie approx. annuelle / TOTAL($) </th>
		</tr>
		<tr class="">
			   
			   <td colspan=6>.</td>
			   <td colspan=3>.</td>
			   <td></td>
			  		   
		</tr>
		<tr class="">
		       <th colspan=5> Éclérage D.E.L</th>
			   <td > <input  type="text" name="cumulDelTotAnnualConsump" value="<?php if(isset($_POST['submit'])){
													echo SubmissionCalculus::$sum_del_tot_consum ;}?>" size="5"/></td>
			   <th colspan=3></th>
			   <td > <input  type="text" name="cumulTotalGlobal" value="<?php if(isset($_POST['submit'])){
													echo SubmissionCalculus::$sum_glob_annu_econ ;}?>" size="5"/> </td>
			   
			  		   
		</tr>
    </tfoot>		
	  </table>
	  
	  
	  </br>
	    
		<label>
			<span>&nbsp;</span> 
			<input type="submit" name="submit" onclick="submitForm('Page-Soumission.php')" class="button" value="Calcul" />
			<input type="reset"  name="reset"  id="reset" value="Reset"  />  
									
		</label>
		
	<!--	</form> -->
	   
	  </div>
	  	 
	  
     <!-- Buttom of the page -->
	  </br>
	  
	  
	 <!--   <form action="" method="post" class="submiss-form">   -->
	</br>
    </br>
      
	<fieldset class="case-to-fill">
	
		<legend><strong>Hydro-Evolution</strong></legend>
		<span>¹ Calculé à partir d'un taux de </span>
		
		<input type="text" name="tauxHydro" value="<?php echo SubmissionCalculus::$TAUX_HYDRO; ?>" placeholder="<?php echo "Taux Hydro" ; ?>" />		
		<span> du KwH (Hydro-Québec) - Inclut aussi le coût de remplacement des lampes sur une base d'un an. </span></br>
		        <span>** Les informations et chiffres sont tous approximatifs, une étude réelle sera à l'ouverture d'un dossier avec Hydro-Québec. ** </span>
	</fieldset>

	

	
		</form>
		

  </div>
 </div>
 </section>	
    	
         
	   
        <ul>
            <li><a href="index.php"> Page du formulaire</a> </li>
        </ul>
    </body>
</html>



