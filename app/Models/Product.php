<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    function getPrice()
{
    $price=$this->price/100;
    return number_format($price*100,2,',',' ')." €";
}



}
