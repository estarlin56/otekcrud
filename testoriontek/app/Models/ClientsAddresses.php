<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientsAddresses extends Model
{
	protected $table = 'clients_addresses';
    use HasFactory;

       protected $fillable = [
        'clients_id', 'country', 'city', 'street', 'postal_code', 'email'
    ];	
}
