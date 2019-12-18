
<?php

class ModRelease {

  function checkManager()
  {
    $user = JFactory::getUser();
    $groups = $user->groups;

    if (in_array(6, $groups)) {
       return true;
    } elseif ($user->get('isRoot')) {
       return true;
    } else {
       return false;
    }
  }

  function refresh(){
    echo "<script>
              if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
                location.reload(true);
              }
            </script>";
  }

}
 ?>
