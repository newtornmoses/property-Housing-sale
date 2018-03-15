<?php

 function cartPrice($price)
{
   return '$'.$price.'.00';
}




function cartDollar($price)
{
   return '$'.$price;
}

function tax($price)
{
    return $price.'%';
}