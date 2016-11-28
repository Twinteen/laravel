<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 11/22/2016
 * Time: 4:13 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model{

/*    protected $contact_id;
    protected $contact_name;
    protected $contact_surname;
    protected $contact_telephone;
    protected $contact_text;
    protected $contact_birthday;*/

    protected $table = 'contacts';

    protected $primaryKey = 'contact_id';

    public $timestamps = false;

/*    protected $fillable = ['contact_name', 'contact_surname',
                           'contact_telephone', 'contact_text', 'contact_birthday'];*/
}