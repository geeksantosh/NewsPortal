<?php

function formatDate($postingdate){
  return date('F j, Y, g:i a', strtotime($postingdate));
}

?>