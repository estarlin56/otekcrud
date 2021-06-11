<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
	protected $table = 'clients';
    use HasFactory;


     protected $fillable = [
        'first_name', 'second_name', 'telephone_number', 'email'
    ];	
}
