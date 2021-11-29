<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class ToDo extends Model
{
    use HasFactory;

    protected $table = 'todos';

    protected $guarded = array('id');

    public static $rules = array(
        'content' => 'required|min:0|max:20'
    );

}
