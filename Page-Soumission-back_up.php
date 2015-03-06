<?php

require 'lib/autoload.php';

?>
<!DOCTYPE html>
<html>
    <head>
	   <meta charset="utf-8" />
       <title> Page-Soumission </title>
	   <link rel="stylesheet" href="Web/css/style.css">
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
	  
	  <div class="identification-info-client">
	  <table width=40% border=1>
	  <tr class="ligne">
			   <th width=15%> Contact: </th>
               <td width=20%> <input  type="text" name="general[pax]" value="" /></td>
			   <th width=15%> Téléphone: </th>
			   <td width=25%> <input  type="text" name="general[pax]" value="" /></td>
	  </tr>
	  <tr class="ligne">
			   <th width=15%> Adresse du Site: </th>
               <td colspan=3  > <input  type="text" name="general[pax]" value="" /> </td>
			   
	  </tr>
      <tr class="ligne">
			   <th width=15%> Représentant: </th>
               <td colspan=3  > <input  type="text" name="general[pax]" value="" /> </td>
			   
	  </tr>
	  
	  
	  </table>
	  </br>
	  </div>
	  
	  <div class="tableau-consommation">
	  <form action="Page-Soumission.php" method="post" class="calcul">
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
			   if ( isset ($_POST['actualLampQuantity']) and isset ($_POST['actualLampPower']) and isset ($_POST['actualLampHours']) and isset ($_POST['actualLampDays'])
				        and isset ($_POST['LedQuantity']) and isset($_POST['LedPower']) and isset ($_POST['LedHours']) and isset ($_POST['LedDays']) 
						and isset ($_POST['actualLampTotAnnualConsump'])   and isset ($_POST['LedTotAnnualConsump']) and isset ($_POST['actualVsDelTotAnnualEcon']) and isset ($_POST['actualLampOperCostRegular'])
						and isset ($_POST['actualLampOperCostRegular'])and isset ($_POST['LedOperCost']) and isset ($_POST['LedGlobalAnnuaEconomy']) 
						and isset ($_POST['actualLampUnitPriceRegular']) and isset ($_POST['actualLampFx'])  
						and isset ($_POST['LedUnitPriceLed']) and isset ($_POST['LedFx'])  ) {
							
			   $qty = $_POST['actualLampQuantity'];	
               $pow = $_POST['actualLampPower'];	
			   $Hrs = $_POST['actualLampHours'];	
			   $dys = $_POST['actualLampDays'];	   
			   $actualLampUnitPriceRegular = $_POST['actualLampUnitPriceRegular'];
			   $actualLampFx = $_POST['actualLampFx'];

			   $qty_del = $_POST['LedQuantity'];	
               $pow_del = $_POST['LedPower'];	
			   $Hrs_del = $_POST['LedHours'];	
			   $dys_del = $_POST['LedDays'];
			   $LedUnitPriceLed = $_POST['LedUnitPriceLed'];
			   $LedFx = $_POST['LedFx'];
			   
			   if(isset($_POST['submit']))
			   {
				   $submissionCalculus = new SubmissionCalculus (
						[
							'actual_lamp_qty' => $_POST['actualLampQuantity'],
							'actual_lamp_power' => $_POST['actualLampPower'],
							'actual_lamp_hours' => $_POST['actualLampHours'],
							'actual_lamp_days' => $_POST['actualLampDays'],
							'actualLampUnitPriceRegular' => $_POST['actualLampUnitPriceRegular'],
							'actualLampFx' => $_POST['actualLampFx'],							
								
							'del_qty' => $_POST['LedQuantity'],
							'del_power' => $_POST['LedPower'],
							'del_hours' => $_POST['LedPower'],
							'del_days' => $_POST['LedDays'],
							'LedUnitPriceLed' => $_POST['LedUnitPriceLed'],
							'LedFx' => $_POST['LedFx'],
							
							'tot_cons' => $_POST['actualLampTotAnnualConsump'],
							'tot_cons_del' => $_POST['LedTotAnnualConsump'],
							'tot_ann_economy' => $_POST['actualVsDelTotAnnualEcon'],
							'actualLampOperCostRegular' => $_POST['actualLampOperCostRegular'],
							'LedOperCost' => $_POST['LedOperCost'],
							'LedGlobalAnnualEconomy' => $_POST['LedGlobalAnnuaEconomy']
						]
					);
			   }
			   	
             echo $submissionCalculus->actual_lamp_qty();				
			   $tot_cons= SubmissionCalculus::actual_lamp_total_annu_consump($submissionCalculus->actual_lamp_qty(),$pow,$Hrs,$dys);
			   $tot_cons_del= SubmissionCalculus::del_total_annu_consump($qty_del,$pow_del,$Hrs_del,$dys_del);
			   $tot_ann_economy= SubmissionCalculus::total_annual_econ_del_vs_actual($tot_cons,$tot_cons_del);
			   $actualLampOperCostRegular = SubmissionCalculus::operational_cost_actual_lamp(SubmissionCalculus::TAUX_HYDRO,$tot_cons,$actualLampUnitPriceRegular,$actualLampFx,$qty);
			   $LedOperCost = SubmissionCalculus::operational_cost_del(SubmissionCalculus::TAUX_HYDRO,$tot_cons_del,$LedUnitPriceLed,$LedFx,$qty_del);
			   $LedGlobalAnnualEconomy = SubmissionCalculus::global_annual_economy($actualLampOperCostRegular,$LedOperCost);
			   
			   
			   }
			   ?>
    
		<div class="case-to-fill">	
			<tr class="ligne3">
			   <th> Lampes actuelles</th>
			   <td > <input  type="text" name="actualLampModel" value="<?php if(isset($_POST['submit'])){
													echo 3 ;}?>" size="5"/></td>
			   <td > <input  type="text" name="actualLampQuantity" value="" size="5"/></td>
			  
			   <td > <input  type="text" name="actualLampPower" value="" size="5"/></td>
			   <td > <input  type="text" name="actualLampHours" value="" size="5"/></td>
			   <td > <input  type="text" name="actualLampDays" value="" size="5"/></td>			
			   <td > <input  type="text" name="actualLampTotAnnualConsump" value="<?php  if(isset($_POST['submit'])){
                                                             echo  $tot_cons ;} ?>" size="5"/></td>
			   <td rowspan=2> <input  type="text" name="actualVsDelTotAnnualEcon" value="<?php  if(isset($_POST['submit'])){
                                                             echo  $tot_ann_economy;} ?>" size="5" /></td>
			   <td > <input  type="text" name="actualLampUnitPriceRegular" value="" size="5"/></td>
			   <td > <input  type="text" name="actualLampFx" value="" size="5"/></td>
			   <td > <input  type="text" name="actualLampOperCostRegular" value="<?php if(isset($_POST['submit'])){
				                                           echo $actualLampOperCostRegular ;} ?>" size="5"/></td>
									
			</tr>
			
			<tr class="ligne4">
			   <th> Remplacement lampes D.E.L</th>
			   <td > <input  type="text" name="LedModel" value="" size="5"/></td>
			   <td > <input  type="text" name="LedQuantity" value="" size="5"/></td>
			   <td > <input  type="text" name="LedPower" value="" size="5"/></td>
			   <td > <input  type="text" name="LedHours" value="" size="5"/></td>
			   <td > <input  type="text" name="LedDays" value="" size="5"/></td>
			   <td > <input  type="text" name="LedTotAnnualConsump" value="<?php  if(isset($_POST['submit'])){
                                                             echo  $tot_cons_del;} ?>" size="5"/></td>			   
			   <td > <input  type="text" name="LedUnitPriceLed" value="" size="5"/></td>
			   <td > <input  type="text" name="LedFx" value="" size="5"/></td>
			   <td > <input  type="text" name="LedOperCost" value="<?php if(isset($_POST['submit'])){
														echo $LedOperCost ;}?>" size="5"/></td>
			   <td > <input  type="text" name="LedGlobalAnnuaEconomy" value="<?php if(isset($_POST['submit'])){
														echo $LedGlobalAnnualEconomy ;}?>" size="5"/></td>
			</tr>
			<tr >
			   <td colspan=12>. </td> 
			</tr>
			
        </div>
		<?php
		
		?>
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
			   <td > <input  type="text" name="actual-lamp[sum-tot-annual-consump]" value="" size="5"/></td>
			   <td rowspan=3> <input  type="text" name="actual-vs-del[sum-tot-annual-econ]" value="" size="5"/> </td>
			   <th colspan=4>  Économie approx. annuelle / TOTAL($) </th>
		</tr>
		<tr class="">
			   
			   <td colspan=6>.</td>
			   <td colspan=3>.</td>
			   <td></td>
			  		   
		</tr>
		<tr class="">
		       <th colspan=5> Éclérage D.E.L</th>
			   <td > <input  type="text" name="DEL[sum-tot-annual-consump]" value="" size="5"/></td>
			   <th colspan=3></th>
			   <td > <input  type="text" name="TOTAL[sum-tot-econ]" value="" size="5"/> </td>
			   
			  		   
		</tr>
    </tfoot>		
	  </table>
	  
	  
	  </br>
	    
			<label>
			<span>&nbsp;</span> 
			<input type="submit" name="submit" class="button" value="Calcul" />
			<input type="reset"  name="reset"  id="reset" value="Reset" /> 
			
			
			
		</label>
		</form>
	   
	  </div>
	  	 
	  
     <!-- Buttom of the page -->
	  </br>
	  
	  
	    <form action="" method="post" class="submiss-form">
	</br>
    </br>
    
      	
	<fieldset class="case-to-fill">
	
		<legend><strong>Hydro-Evolution</strong></legend>
		<span>¹ Calculé à partir d'un taux de </span>
		
		<input type="text" name="general[pax]" value="<?php echo SubmissionCalculus::TAUX_HYDRO;?>" placeholder="0,0882 $" />		
		<span> du KwH (Hydro-Québec) - Inclut aussi le coût de remplacement des lampes sur une base d'un an. </span></br>
		        <span>** Les informations et chiffres sont tous approximatifs, une étude réelle sera à l'ouverture d'un dossier avec Hydro-Québec. ** </span>
	</fieldset>

	

	
		</form>
		

  </div>
 </div>
 </section>	
    	
         
	   
        <ul>
            <li><a href="index.php"> Page du formulaire !</a> </li>
        </ul>
    </body>
</html>



