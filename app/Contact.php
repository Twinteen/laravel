<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 11/22/2016
 * Time: 4:13 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $fillable = [
                            'contact_name', 'contact_surname', 'contact_telephone',
                            'contact_text', 'contact_birthday'
                          ];

    protected $table = 'contacts';

    protected $primaryKey = 'contact_id';

    public $timestamps = false;

}