<?php
// use_f.php for use_f in /home/levy_a/projet/PiscinePHP/Jour05
// 
// Made by Alexandre LEVY
// Login   <levy_a@etna-alternance.net>
// 
// Started on  Fri Nov 22 11:37:45 2013 Alexandre LEVY
// Last update Wed Nov 27 14:46:27 2013 Alexandre LEVY
//

include 'build.php';

function aff_table($tab)
{
  $i = 0;

  while (isset($tab[$i]))
    {
      echo $tab[$i];
      $i++;
    }
}

function cut_tab($string)
{
  $i = 0;
  $j = 0;

  while (isset($string[$i]))
    {
      if ($string[$i] == " " || $string[$i] == "\t")
	$j++;
      else
	$tab[$j] = $tab[$j].$string[$i];
      $i++;
    }
  return ($tab);
}

function find_build($array, $tab)
{
  $i = 0;
  $a = 0;
  while (isset($tab[$i]))
    {
      $j = 0;
	while (isset($array[$j]))
	  {
	    if ($array[$j] == $tab[$i])
	      {
		$a++;
		call_user_func('f_'. $array[$j], $tab);
	      }
	    $j++;
	  }
      $i++;
    }
  if ($a == 0)
    echo $tab[0].": Command not found\n";
}


function search_c($type)
{
  if (is_dir(realpath($type)))
    return ("/");
  else if (is_link(realpath($type)))
    return ("@");
  else if (is_executable(realpath($type)))
    return ("*");
  else
    return ;
}