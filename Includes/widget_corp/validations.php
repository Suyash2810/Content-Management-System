<?php 
 
 $errors = array();

  function has_presence($value)
   {
    if(!isset($value) && $value ==='')
    {return false;}
    else
    {return true;}
   }

   function has_max_length($value,$max)
   {
       if(strlen($value)<$max)
       {return true;}
       else
       {return false;}
   }

   function has_min_length($value,$min)
   {
       if(strlen($value)>$min)
       {return true;}
       else
       {return false;}
   }

   function is_included($value,$array)
   {
       if(in_array($value,$array))
       {return true;}
       else
       {return false;}
   }

   function upperfirst($name)
   {
       $new_name = str_replace("_"," ",$name);
       $new_name = ucfirst($new_name);
       return $new_name;
   }

   function validate_maximum_length($max_lengths_assoc)
   {
       global $errors;

       foreach($max_lengths_assoc as $key => $maxi)
       {
         $value = trim($_POST[$key]);

          if(!has_max_length($value,$maxi))
            {
                 $errors[$key] = upperfirst($key) . " is too long.";
            }

       }
   }

   function validate_has_presences($has_presence_array)
   {
       global $errors;

       foreach($has_presence_array as $key)
       {
           $value = trim($_POST[$key]);
            if(has_presence($value) === false)
            {
                $errors[$key] = upperfirst($key) . "should not be blank.";
            }
       }
   }

   function print_errors($errors = array())
   {
      $output = "";

      if(!empty($errors))
      {
        $output .= "
         <div class=\"alert alert-danger alert-dissmissible\">
            <a class=\"close\" data-dismiss=\"alert\" href=\"#\">&times</a>
            <p class=\"text-center text-capitalize\"> 
             ";


          foreach($errors as $key => $value)
          {
              $output .= $key . " : " . $value . "<br>";
          }
      

        $output .= "</p>
                </div>";
      }
       return $output;
    }
 
?>