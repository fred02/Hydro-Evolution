<?php
/**
 * 
 * @author 
 * @version 2.0
 */
class SubmissionCalculus
{
  
  protected $errors = [],
            $id,
            $actual_lamp_model,
            $actual_lamp_qty,
			$actual_lamp_power,
			$actual_lamp_hours,
			$actual_lamp_days,
			$actualLampUnitPriceRegular,
			$actualLampFx,
			
			$del_model,
			$del_qty,
			$del_power,
			$del_hours,
			$del_days,
			$LedUnitPriceLed,
			$LedFx,
			
			$tot_cons,
			$tot_cons_del,
			$tot_ann_economy,
			$actualLampOperCostRegular,
			$LedOperCost,
			$LedGlobalAnnualEconomy;
			
  public static $sum_actu_tot_comsum=0.00,
				$sum_del_tot_consum= 0.00,
				$sum_tot_ann_econ=   0.00,
				$sum_glob_annu_econ= 0.00;
		
	
  public static $TAUX_HYDRO;	 
  /**
   * Constructeur de la classe qui assigne les données spécifiées en paramètre aux attributs correspondants.
   * @param $valeurs array Les valeurs à assigner
   * @return void
   */
  public function __construct($valeurs = [])
  {
    if (!empty($valeurs)) // Si on a spécifié des valeurs, alors on hydrate l'objet.
    {
      $this->hydrate($valeurs);
    }
  }
  
  /**
   * Méthode assignant les valeurs spécifiées aux attributs correspondant.
   * @param $donnees array Les données à assigner
   * @return void
   */
  public function hydrate($donnees)
  {
    foreach ($donnees as $attribut => $valeur)
    {
      $methode = 'set'.ucfirst($attribut);
      
      if (is_callable([$this, $methode]))
      {
        $this->$methode($valeur);
      }
    }
  }
    
  /**
   * Méthode permettant de savoir si  valide.
   * @return bool
   */
  public function isValid()
  {
    return true;
  }
  
  
  // SETTERS //
    
  public function setId($id)
  {
    $this->id = (int) $id;
  }
  /**** Actual lamps  ****/
  public function setActual_lamp_model($actual_lamp_model)
  { 
      $this->actual_lamp_model = $actual_lamp_model;   
  }
                             			
  public function setActual_lamp_qty ($actual_lamp_qty)
  {   
      $this->actual_lamp_qty = $actual_lamp_qty;
  }
  
  public function setActual_lamp_power($actual_lamp_power)
  {  
      $this->actual_lamp_power = $actual_lamp_power;   
  }
  
  public function setActual_lamp_hours($actual_lamp_hours)
  {
    $this->actual_lamp_hours = $actual_lamp_hours;
  }
  
  public function setActual_lamp_days($actual_lamp_days)
  {
    $this->actual_lamp_days = $actual_lamp_days;
  }
  
  
  public function setActualLampUnitPriceRegular($actualLampUnitPriceRegular)
  {
    $this->actualLampUnitPriceRegular = $actualLampUnitPriceRegular;
  }
  
  public function setActualLampFx($actualLampFx)
  {
    $this->actualLampFx = $actualLampFx;
  }
  
  public function setActualLampOperCostRegular($actualLampOperCostRegular)
  {
    $this->actualLampOperCostRegular = $actualLampOperCostRegular;
  }
                     
   /**** DEL ****/ 
     
  public function setDel_model($del_model)
  { 
      $this->del_model = $del_model;   
  }
                             			
  public function setDel_qty ($del_qty)
  {   
      $this->del_qty = $del_qty;
  }
  
  public function setDel_power($del_power)
  {  
      $this->del_power = $del_power;   
  }
  
  public function setDel_hours($del_hours)
  {
    $this->del_hours = $del_hours;
  }
  
  public function setDel_days($del_days)
  {
    $this->del_days = $del_days;
  }
  
   
   public function setLedOperCost($LedOperCost)
  {
    $this->LedOperCost = $LedOperCost;
  }
  
   public function setLedGlobalAnnualEconomy($LedGlobalAnnualEconomy)
  {
    $this->LedGlobalAnnualEconomy = $LedGlobalAnnualEconomy;
  }
  
  public function setLedUnitPriceLed($LedUnitPriceLed)
  {
    $this->LedUnitPriceLed = $LedUnitPriceLed;
  }
  
  public function setLedFx($LedFx)
  {
    $this->LedFx = $LedFx;
  }
  
   public function setTot_cons($tot_cons)
  {
    $this->tot_cons = $tot_cons;
  }
   
  public function setTot_cons_del($tot_cons_del)
  {
    $this->tot_cons_del = $tot_cons_del;
  }
  
  public function setTot_ann_economy($tot_ann_economy)
  {
    $this->tot_ann_economy = $tot_ann_economy;
  }
  

  // GETTERS //
			
  public function erreurs()
  {
    return $this->erreurs;
  }
 
  public function id()
  {
    return $this->id;
  }
  /**** Actual lamps  ****/
  public function actual_lamp_model()
  {
    return $this->actual_lamp_model;
  }
  
  public function actual_lamp_qty()
  {
    return $this->actual_lamp_qty;
  }
  
  public function actual_lamp_power()
  {
    return $this->actual_lamp_power;
  }
  
  public function actual_lamp_hours()
  {
    return $this->actual_lamp_hours;
  }
  
  public function actual_lamp_days()
  {
    return $this->actual_lamp_days;
  }
  
  public function actualLampUnitPriceRegular()
  {
    return $this->actualLampUnitPriceRegular;
  }
  
  public function actualLampFx()
  {
    return $this->actualLampFx;
  }
  
  public function actualLampOperCostRegular()
  {
    return $this->actualLampOperCostRegular;
  }
  
   
  public function tot_cons()
  {
    return $this->tot_cons;
  }
  
  public function tot_cons_del()
  {
    return $this->tot_cons_del;
  }
  
  public function tot_ann_economy()
  {
    return $this->tot_ann_economy;
  }
  
  /**** DEL ****/
  public function del_model()
  {
    return $this->del_model;
  }
  
  public function del_qty()
  {
    return $this->del_qty;
  }
  
  public function del_power()
  {
    return $this->del_power;
  }
  
  public function del_hours()
  {
    return $this->del_hours;
  }
  
  public function del_days()
  {
    return $this->del_days;
  }

  public function LedOperCost()
  {
    return $this->LedOperCost;
  }
  
  public function LedGlobalAnnualEconomy()
  {
    return $this->LedGlobalAnnualEconomy;
  }
  
  public function LedUnitPriceLed()
  {
    return $this->LedUnitPriceLed;
  }
  
  public function LedFx()
  {
    return $this->LedFx;
  }
  
  
  //  Calculus Functions //
  public static function actual_lamp_total_annu_consump($actual_lamp_qty, $actual_lamp_power, $actual_lamp_hours, $actual_lamp_days)
  {
	  return number_format((float)($actual_lamp_qty * $actual_lamp_power * $actual_lamp_hours * $actual_lamp_days)/1000, 2, '.', '');
	  
  }
  
  public static function del_total_annu_consump($del_qty,$del_power, $del_hours, $del_days)
  {
	  return number_format((float)($del_qty * $del_power * $del_hours * $del_days)/1000, 2, '.', '');	  
  }
  
  
  public static function total_annual_econ_del_vs_actual($tot_ann_actu,$tot_ann_del)
  {
	  return number_format((float)($tot_ann_actu-$tot_ann_del), 2, '.', '');
  }
  
  public static function operational_cost_actual_lamp($taux_hyd,$tot_ann_consu,$unit_price_ac_lam,$fx_ac_lam,$qty)
  {
	  return number_format((float)( ($taux_hyd*$tot_ann_consu)+($unit_price_ac_lam*$fx_ac_lam*$qty)), 2, '.', '');
  }
 
  
  public static function operational_cost_del($taux_hyd,$tot_ann_consu_del,$unit_price_del,$fx_del,$qty_del)
  {
	  return number_format((float)( ($taux_hyd*$tot_ann_consu_del)+($unit_price_del*$fx_del*$qty_del)), 2, '.', '');
  }
  public static function global_annual_economy($op_cost_actu,$op_cost_sel)
  {
	  return number_format((float)($op_cost_actu - $op_cost_sel), 2, '.', '');
  }
  
  // ***  Common variables  ***//  
  public static function sum_actu_tot_comsum($value)
  {
	  return number_format((float)self::$sum_actu_tot_comsum+$value, 2, '.', '');
  } 
  public static function sum_del_tot_consum($value)
  {
	  return number_format((float)self::$sum_del_tot_consum+$value, 2, '.', '');
  }
  public static function sum_tot_ann_econ($value)
  {
	  return number_format((float)self::$sum_tot_ann_econ+$value, 2, '.', '');
  }
  public static function sum_glob_annu_econ($value)
  {
	  return number_format((float)self::$sum_glob_annu_econ+$value, 2, '.', '');
  }
  
  public static function changeHydroRate($value)
  {
	  self::$TAUX_HYDRO = $value;
  }
 
  
} // end of class SubmissionCalculus