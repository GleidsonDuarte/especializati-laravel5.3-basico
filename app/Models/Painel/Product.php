<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	//Permite que as tuplas sejam preenchidas pela function create
    protected $fillable = [
    	'name', 'number', 'active', 'category', 'description'
    ];

    /*
    Não permite que as tuplas sejam preenchidas pela function create
    protected $guarded = ['admin'];
    */
}