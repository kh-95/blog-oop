<?php 


class Validator {



function  Clean($input){
      
      $value = trim($input);
      $value = htmlspecialchars($value);
      $value = stripcslashes($value);
      return $value;  
    
  } 
 


  function validate($input,$flag,$lenght = 50){
   
    $status = true;

    switch ($flag) {
      case 1:
          # code...
          if(empty($input)){
             $status = false;
          }
          break;
       // validate title --string--
       case 2:
          if(!is_string($input)){

            $status=false;
          }
          break;
   
        case 3: 
            if(!strlen($input) > 50){
                $status = false;
            }
            break;
            
case 4:
  if(!filter_var($input,FILTER_VALIDATE_INT)){

    $status=false;
  }
  break;


   
  case 5 : 
    $allowed_ex = ["png","jpg"];
    if(!in_array($input, $allowed_ex)){
       $status = false;
    }
     break;
  
      }
     return $status;
    
  }
  
 
}
  
  
  ?>