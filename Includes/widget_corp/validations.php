<?php 
 
  function has_presence($value)
   {
    if(isset($value) && $value !=='')
    {return true;}
    else
    {return false;}
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

   function validate_maximum_length($max_lengths_assoc)
   {
       
   }

 
?>