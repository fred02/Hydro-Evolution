<!DOCTYPE html>
<html>

<!-- Header -->

  <head>
    <title>Accueil du site</title>
    <meta charset="utf-8" />
  </head>
  
  
  
  
<!-- Body -->
<body>


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
				
    
		<div class="case-to-fill">	
			<tr class="ligne3">
			   <th> Lampes actuelles</th>
			   <td > <input  type="text" name="actualLampModel" value="" size="5"/></td>
			   <td > <input  type="text" name="actualLampQuantity" value="" size="5"/></td>
			  
			   <td > <input  type="text" name="actualLampPower" value="" size="5"/></td>
			   <td > <input  type="text" name="actualLampHours" value="" size="5"/></td>
			   <td > <input  type="text" name="actualLampDays" value="" size="5"/></td>			
			   <td > <input  type="text" name="actualLampTotAnnualConsump" value="" size="5"/></td>
			   <td rowspan=2> <input  type="text" name="actualVsDelTotAnnualEcon" value="" size="5" /></td>
			   <td > <input  type="text" name="actualLampUnitPriceRegular" value="" size="5"/></td>
			   <td > <input  type="text" name="actualLampFx" value="" size="5"/></td>
			   <td > <input  type="text" name="actualLampOperCostRegular" value="" size="5"/></td>
									
			</tr>
			
			<tr class="ligne4">
			   <th> Remplacement lampes D.E.L</th>
			   <td > <input  type="text" name="LedModel" value="" size="5"/></td>
			   <td > <input  type="text" name="LedQuantity" value="" size="5"/></td>
			   <td > <input  type="text" name="LedPower" value="" size="5"/></td>
			   <td > <input  type="text" name="LedHours" value="" size="5"/></td>
			   <td > <input  type="text" name="LedDays" value="" size="5"/></td>
			   <td > <input  type="text" name="LedTotAnnualConsump" value="" size="5"/></td>			   
			   <td > <input  type="text" name="LedUnitPriceLed" value="" size="5"/></td>
			   <td > <input  type="text" name="LedFx" value="" size="5"/></td>
			   <td > <input  type="text" name="LedOperCost" value="" size="5"/></td>
			   <td > <input  type="text" name="LedGlobalAnnuaEconomy" value="" size="5"/></td>
			</tr>
			<tr >
			   <td colspan=12>. </td> 
			</tr>
			
        </div>
		<tr class="ligne3">
			   <th> Lampes actuelles</th>
			   <td > <input  type="text" name="actualLampModel2" value="" size="5"/></td>
			   <td > <input  type="text" name="actualLampQuantity2" value="" size="5"/></td>
			  
			   <td > <input  type="text" name="actualLampPower2" value="" size="5"/></td>
			   <td > <input  type="text" name="actualLampHours2" value="" size="5"/></td>
			   <td > <input  type="text" name="actualLampDays2" value="" size="5"/></td>			
			   <td > <input  type="text" name="actualLampTotAnnualConsump2" value="" size="5"/></td>
			   <td rowspan=2> <input  type="text" name="actualVsDelTotAnnualEcon2" value="" size="5" /></td>
			   <td > <input  type="text" name="actualLampUnitPriceRegular2" value="" size="5"/></td>
			   <td > <input  type="text" name="actualLampFx2" value="" size="5"/></td>
			   <td > <input  type="text" name="actualLampOperCostRegular2" value="" size="5"/></td>
									
			</tr>
			
			<tr class="ligne4">
			   <th> Remplacement lampes D.E.L</th>
			   <td > <input  type="text" name="LedModel2" value="" size="5"/></td>
			   <td > <input  type="text" name="LedQuantity2" value="" size="5"/></td>
			   <td > <input  type="text" name="LedPower2" value="" size="5"/></td>
			   <td > <input  type="text" name="LedHours2" value="" size="5"/></td>
			   <td > <input  type="text" name="LedDays2" value="" size="5"/></td>
			   <td > <input  type="text" name="LedTotAnnualConsump2" value="" size="5"/></td>			   
			   <td > <input  type="text" name="LedUnitPriceLed2" value="" size="5"/></td>
			   <td > <input  type="text" name="LedFx2" value="" size="5"/></td>
			   <td > <input  type="text" name="LedOperCost2" value="" size="5"/></td>
			   <td > <input  type="text" name="LedGlobalAnnuaEconomy2" value="" size="5"/></td>
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
			   <td > <input  type="text" name="cumulActLampTotAnnualConsump" value="" size="5"/></td>
			   <td rowspan=3> <input  type="text" name="cumulSumTotAnnualEcon" value="" size="5"/> </td>
			   <th colspan=4>  Économie approx. annuelle / TOTAL($) </th>
		</tr>
		<tr class="">
			   
			   <td colspan=6>.</td>
			   <td colspan=3>.</td>
			   <td></td>
			  		   
		</tr>
		<tr class="">
		       <th colspan=5> Éclérage D.E.L</th>
			   <td > <input  type="text" name="cumulDelTotAnnualConsump" value="" size="5"/></td>
			   <th colspan=3></th>
			   <td > <input  type="text" name="cumulTotalGlobal" value="" size="5"/> </td>
			   
			  		   
		</tr>
    </tfoot>		
	  </table>
</body>	  
	  
<!-- Footer -->
</html>