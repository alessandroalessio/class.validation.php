<?php

/**
 * Validate
 * Class to valideate:
 *    - String
 *    - Numeric
 *    - Email
 *    - URL
 * 
 * @package 1.2
 * @author www.acktel.com
 *         www.a2area.it
 * @copyright Alessandro Alessio
 * @version 2013
 * @access public
 */

class Validate {

   # Language
   public $lg_attenzione = "Attenzione ";
   public $lg_obbligatorio = " &egrave; un campo obbligatorio";
   public $lg_almeno_di = " deve essere almeno di ";
   public $lg_meno_di = " deve essere meno di";
   public $lg_non_valido = " non valido/a";
   public $lg_caratteri = " caratteri";

   /**
    * Validate::__construct()
    * 
    * @return
    */
   function __construct($language){
      // Redefined properties by language
      switch ($language) {
         case "ENG":
            $this->lg_attenzione = "Attention ";
            $this->lg_obbligatorio = " is a required field";
            $this->lg_almeno_di = " must be at least ";
            $this->lg_meno_di = " must be less than ";
            $this->lg_non_valido = " not valid";
            $this->lg_caratteri = " characters";
         break;
         case "FRA":
            $this->lg_attenzione = "Attention ";
            $this->lg_obbligatorio = " est un domaine exigent";
            $this->lg_almeno_di = " doit &ecirc;tre au moins ";
            $this->lg_meno_di = " doit &ecirc;tre inf&egrave;rieure ";
            $this->lg_non_valido = " pas valide";
            $this->lg_caratteri = " caract&egrave;res";
         break;
         case "DEU":
            $this->lg_attenzione = "Aandacht ";
            $this->lg_obbligatorio = " een require veld";
            $this->lg_almeno_di = " moet op zijn minst ";
            $this->lg_meno_di = " moet minder dan ";
            $this->lg_non_valido = " ongeldig";
            $this->lg_caratteri = " tekens";
         break;
         case "ESP":
            $this->lg_attenzione = "Atenci&ograve;n ";
            $this->lg_obbligatorio = " es un campo requieren";
            $this->lg_almeno_di = " debe tener al menos ";
            $this->lg_meno_di = " debe ser menor que ";
            $this->lg_non_valido = " no es v&agrave;lido";
            $this->lg_caratteri = " personajes";
         break;
      }
   }

   /**
    * Validate::String()
    * Validation generic string
    * 
    * @param mixed $value
    * @param mixed $name
    * @param bool $mandatory
    * @param integer $min_len
    * @param integer $max_len
    * @return
    */
   function String($value, $name, $mandatory=false, $min_len=0, $max_len=255) {
      $mandatory = $this->strtobool($mandatory);
      if ( ($mandatory===true) && (strlen( trim($value) )==0) ) {
         return $this->lg_attenzione.$name.$this->lg_obbligatorio."<br />";
         break;
      } else {
         if (strlen($value)>0) {
            if (strlen($value)<$min_len) {
               return $this->lg_attenzione.$name.$this->lg_almeno_di.($min_len+1).$this->lg_caratteri."<br />";
               break;
            } elseif (strlen($value)>$max_len) {
               return $this->lg_attenzione.$name.$this->lg_meno_di.$max_len.$this->lg_caratteri."<br />";
               break;
            }
         }
      }
   }

   /**
    * Validate::Numeric()
    * Validation numeric
    * 
    * @param mixed $value
    * @param bool $mandatory
    * @param integer $min_len
    * @param integer $max_len
    * @return
    */
   function Numeric($value, $name, $mandatory=false, $min_len=0, $max_len=255) {
      $mandatory = $this->strtobool($mandatory);
      if ( ($mandatory===true) && (strlen( trim($value) )==0) ) {
         return $this->lg_attenzione.$name.$this->lg_obbligatorio."<br />";
         break;
      } else {
         if (strlen($value)>0) {
            if (strlen($value)<=$min_len) {
               return $this->lg_attenzione.$name.$this->lg_almeno_di.($min_len+1).$this->lg_caratteri."<br />";
               break;
            } elseif (strlen($value)>$max_len) {
               return $this->lg_attenzione.$name.$this->lg_meno_di.$max_len.$this->lg_caratteri."<br />";
               break;
            } else {
               if (!is_numeric($value)) {
                  return $this->lg_attenzione.$name.$this->lg_non_valido."<br />";
                  break;
               }
            }
         }
      }
   }

   /**
    * Validate::Email()
    * Validations email adresses
    * 
    * @param mixed $value
    * @param mixed $name
    * @param bool $mandatory
    * @param integer $min_len
    * @param integer $max_len
    * @return
    */
   function Email($value, $name="E-mail", $mandatory=false, $min_len=0, $max_len=255){
      $mandatory = $this->strtobool($mandatory);
      if ( ($mandatory===true) && (strlen( trim($value) )==0) ) {
         return $this->lg_attenzione.$name.$this->lg_obbligatorio."<br />";
         break;
      } else {
         if (strlen($value)>0) {
            if (strlen($value)<=$min_len) {
               return $this->lg_attenzione.$name.$this->lg_almeno_di.($min_len+1).$this->lg_caratteri."<br />";
               break;
            } elseif (strlen($value)>$max_len) {
               return $this->lg_attenzione.$name.$this->lg_meno_di.$max_len.$this->lg_caratteri."<br />";
               break;
            } else {
               $validate = filter_var($value, FILTER_VALIDATE_EMAIL);
               if (!$validate) {
                  return $this->lg_attenzione.$name.$this->lg_non_valido."<br />";
                  break;
               }
            }
         }
      }
   }

   /**
    * Validate::URL()
    * Validation URL
    * 
    * @param mixed $value
    * @param mixed $name
    * @param bool $mandatory
    * @param integer $min_len
    * @param integer $max_len
    * @return
    */
   function URL($value, $name="Sito internet", $mandatory=false, $min_len=0, $max_len=255) {
      $mandatory = $this->strtobool($mandatory);
      if ( ($mandatory===true) && (strlen( trim($value) )==0) ) {
         return $this->lg_attenzione.$name.$this->lg_obbligatorio."<br />";
         break;
      } else {
         if (strlen($value)>0) {
            if (strlen($value)<=$min_len) {
               return $this->lg_attenzione.$name.$this->lg_almeno_di.($min_len+1).$this->lg_caratteri."<br />";
               break;
            } elseif (strlen($value)>$max_len) {
               return $this->lg_attenzione.$name.$this->lg_meno_di.$max_len.$this->lg_caratteri."<br />";
               break;
            } else {
               $pattern = "#^(http|https)://[a-z0-9-_.]+\.[a-z]{2,4}$#i";
               if (!preg_match($pattern, $value)) {
                  return $this->lg_attenzione.$name.$this->lg_non_valido."<br />";
                  break;
               }
            }
         }
      }
   }

   /**
    * Validate::Date()
    * Validation Date in format d/m/y
    * 
    * @param mixed $value
    * @param mixed $name
    * @param mixed $delimiter
    * @param bool $mandatory
    * @return
    */
   function Date($value, $name="Data", $delimiter="/", $mandatory=false) {
      $mandatory = $this->strtobool($mandatory);
      if ( ($mandatory===true) && (strlen( trim($value) )==0) ) {
         return $this->lg_attenzione.$name.$this->lg_obbligatorio."<br />";
         break;
      } else {
         list($d, $m, $y) = explode($delimiter, $value);
         if (!checkdate($m, $d, $y)) {
            return $this->lg_attenzione.$name.$this->lg_non_valido."<br />";
            break;
         }
      }
   }

   /**
    * Validate::strtobool()
    * Convert string to boolean
    * 
    * @param mixed $value
    * @return boolean
    */
   private function strtobool($value) {
      if (is_string($value)) {
         if ($value=="true") {
            $response = true;
         } elseif ($value=="false") {
            $response = false;
         }
      } else {
         $response = $value;
      }
      return $response;
   }

}
?>