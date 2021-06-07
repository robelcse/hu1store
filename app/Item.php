<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $fillable = ['title','details','image','price','reg_price','provider','type'];
}