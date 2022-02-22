<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
/**
* Country Model
*/
class Country extends Model
{
	protected $table = "hb_country";
	public $timestamps = false;
	protected $guarded = [];

}