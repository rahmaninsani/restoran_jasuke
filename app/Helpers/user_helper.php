<?php 

// Helper Function untuk mengecek apakah value nrp di session adalah nrp pelayan 
function is_pelayan()
{
  $nrp = session()->get('nrp');
  return (strpos($nrp, 'PYN') !== false) ? true : false;
}

// Helper Function untuk mengecek apakah value nrp di session adalah nrp koki 
function is_koki()
{
  $nrp = session()->get('nrp');
  return (strpos($nrp, 'KOK') !== false) ? true : false;
}

// Helper Function untuk mengecek apakah value nrp di session adalah nrp kasir 
function is_kasir()
{
  $nrp = session()->get('nrp');
  return (strpos($nrp, 'KSR') !== false) ? true : false;
}

?>