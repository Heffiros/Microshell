#!/usr/bin/env php
<?php
// microshell.php for microshell in /home/levy_a/projet/PiscinePHP/Jour05
// 
// Made by Alexandre LEVY
// Login   <levy_a@etna-alternance.net>
// 
// Started on  Fri Nov 22 10:36:57 2013 Alexandre LEVY
// Last update Wed Nov 27 14:47:24 2013 Alexandre LEVY
//
require 'use_f.php';

input();

function create_key()
{
  $array = array("echo","ls","pwd","cat","env","setenv","unsetenv","cd","exit");
  return ($array);
}

function cut_input($input)
{
  $array = create_key();
  $tab = cut_tab($input);
  find_build($array, $tab);
}

function input()
{
  echo "$> ";
  while (($input = readline()) != false)
    {
      cut_input($input);
      echo "$> ";
    }
}

