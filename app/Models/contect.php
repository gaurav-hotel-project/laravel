<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contect extends Model
{
    use HasFactory;
    protected $primaryKey = 'name',

     $fillable = ['name','email','phone','message'];


   
    }

