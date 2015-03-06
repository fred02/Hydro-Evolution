<?php
/**
 * 
 * @author 
 * @version 2.0
 */
class Submission
{
  protected $errors = [],
            $id,
            $id_SubmissionCalculus,
            $client_name,
			$repName,
            $adress,
            $phone_number,           
			$contact,
			$project_num,
			$contratNumber;
     
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
   * Méthode permettant de savoir si la news est valide.
   * @return bool
   */
  public function isValid()
  {
    return !(empty($this->client_name) || empty($this->adress) || empty($this->phone_number) || empty($this->repName) );
  }
  
  
  // SETTERS //
  
  public function setId($id)
  {
    $this->id = (int) $id;
  }
  
  public function setIdSubmissionCalculus($SubmissionCalculus)
  { 
      $this->SubmissionCalculus = $SubmissionCalculus;   
  }
                             			
  public function setClient_name ($client_name)
  {   
      $this->client_name = $client_name;
  }
  
  public function setAdress($adress)
  {  
      $this->adress = $adress;   
  }
  
  public function setPhone_number($phone_number)
  {
    $this->phone_number = $phone_number;
  }
  
  public function setRepName($repName)
  {
    $this->repName = $repName;
  }
  
  public function setContact($contact)
  {
    $this->contact = $contact;
  }
  
  public function setProject_num($project_num)
  {
    $this->project_num = $project_num;
  }
  public function setContratNumber($contratNumber)
  {
    $this->contratNumber = $contratNumber;
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
  
  public function id_SubmissionCalculus()
  {
    return $this->id_SubmissionCalculus;
  }
  
  public function client_name()
  {
    return $this->client_name;
  }
  
  public function contact()
  {
    return $this->contact;
  }
  
  public function repName()
  {
	return $this->repName;
  }
  
  public function adress()
  {
    return $this->adress;
  }
  
  public function phone_number()
  {
    return $this->phone_number;
  }
  
  
  public function project_num()
  {
    return $this->project_num;
  }
  
  public function contratNumber()
  {
    return $this->contratNumber;
  }
  
}