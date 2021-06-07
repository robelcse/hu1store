<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
	protected $table = 'gifts';
	//public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['amount','theme','details'];
}