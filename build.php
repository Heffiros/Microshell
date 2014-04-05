<?php
// build.php for build in /home/levy_a/projet/PiscinePHP/Jour05
// 
// Made by Alexandre LEVY
// Login   <levy_a@etna-alternance.net>
// 
// Started on  Fri Nov 22 13:41:54 2013 Alexandre LEVY
// Last update Wed Nov 27 14:47:43 2013 Alexandre LEVY
//

$var = "";
function f_exit($tab)
{
  exit(0);
}
function f_echo($tab)
{
  $i = 1;

  while (isset($tab[$i]))
    {
      echo $tab[$i]." ";
      $i++;
    }
  echo "\n";
}

function f_pwd($tab = NULL)
{
  echo getcwd()."\n";
}

function f_cat($tab)
{
  $i = 1;

  while (isset($tab[$i]))
    {
      if ($tab[$i])
	{
	  if (file_exists($tab[$i]) == true)
	    {
	      if (is_readable($tab[$i]) == true)
		{
		  if (is_dir($tab[$i]) == false)
		    {
		      $var = fopen($tab[$i], "r");
		      if ($var == NULL)
			echo "cat: ".$tab[$i].": Cannot open file\n";
		      else
			{
			  $content = fread($var, filesize($tab[$i]));
			  echo $content;
			  fclose ($var);
			}
		    }
		  else
		    echo "cat: ".$tab[$i].": Is a directory\n";
		}
	      else
		echo "cat: ".$tab[$i].": Permission denied\n";
	    }
	  else
	    echo "cat: ".$tab[$i].": No such file or directory\n";
	  $argc--;
	  $i++;
	}
      else
	echo "cat: Invalide arguments\n";
    }
}

function f_env($tab)
{
  foreach ($_ENV as $key=>$value)
    {
      echo $key;
      echo "=".$value."\n";
    }
}

function f_setenv($tab)
{
  if (isset($tab[1]) && isset($tab[2]))
    $_ENV[$tab[1]] = $tab[2];
  else
    echo "setenv: Invalid arguments\n";
}


function f_unsetenv($tab)
{
  if (isset($tab[1]))
    unset($_ENV[$tab[1]]);
  else
    echo "setenv: Invalid arguments\n";
}

function f_cd($tab)
{
  global $var;

  if (empty($tab[1]))
    $tab[1] = $_ENV['HOME'];
  if (is_dir($tab[1]))
    {
      if ($tab[1] != "-")
	{
	  $var = getcwd();
	  chdir($tab[1]);
	}
      else
	chdir($var);
    }
  else
    echo  "cd: ".$tab[1].": Not a directory\n";
}

function f_ls($tab)
{
  if (!$tab[1])
    $tab[1] = getcwd();
  if (is_dir($tab[1]))
    {
      if (is_readable($tab[1]))
	{
	  $var = opendir($tab[1]);
	  while ($content = readdir($var))
	    {
	        $c = search_c($content);
		if ($content[0] != ".")
		  {
		    echo $content;
		    echo $c."\n";
		  }
	    }
	  closedir($var);
	}
      else
	"ls: ".$tab[1].": Permission denied";
    }
  else
    echo  "ls: ".$tab[1].": Not a directory\n";
}