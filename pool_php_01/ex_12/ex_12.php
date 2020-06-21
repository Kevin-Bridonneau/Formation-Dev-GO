<?php

// source wikipedia vu que les 2 premier code marche mais passe pas a la moulinette
 $a1 = array('1', '2', '3');
 $a2 = array('a', 'b', 'c');
 $b1 = array('bbb', 'aaa', 'cc', 'bb', 'aa', 'c', 'b', 'a');
 $b2 = array('32', '31', '23', '22', '21', '13', '12', '11');
 
 function conway($n, $str = '1', $i = 0) {
     // $n : la ligne de la suite de conway à afficher
     // $i est passé en paramètre lors de la récursivité (appel à la fonction même)
     // On rend globales les variables $a1, $a2, $b1 et $b2, pour ne pas avoir à les définir à chaque fois.
     global $a1, $a2, $b1, $b2;
     if($i < $n) {
         return conway($n, str_replace($b1, $b2, str_replace($a1, $a2, $str)), ++$i);
     }
     else {
         return $str;
     }
 }
 
// modification du code
 function sequence($nbr)
 {
     if ($nbr < 0) 
     {
         exit; 
     }
     for ($i = 0 ; $i <= $nbr ; $i++)
     {
        echo conway($i, $str = '1', $x = 0)."\n"; 
     }
 }


 sequence(10);
?>