<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 11/28/2016
 * Time: 5:45 AM
 */
namespace database\seeds;

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->delete();
        DB::table('contacts')->insert([
            ['contact_name' => 'Bill','contact_surname' => 'Clinton','contact_telephone' => '388946665588',
                'contact_text' => 'Hello my name is Bill', 'contact_birthday' => '1956-06-13'],
            ['contact_name' => 'George','contact_surname' => 'Bush','contact_telephone' => '36728978822',
                'contact_text' => 'I hate Osama', 'contact_birthday' => '1952-12-05'],
            ['contact_name' => 'Barak','contact_surname' => 'Obama','contact_telephone' => '388944681388',
                'contact_text' => 'Dunno what to say', 'contact_birthday' => '1967-12-02'],
            ['contact_name' => 'Arny','contact_surname' => 'Iron','contact_telephone' => '077799513546',
                'contact_text' => 'Ill be back', 'contact_birthday' => '1962-08-07'],
            ['contact_name' => 'Tomek','contact_surname' => 'Cruz','contact_telephone' => '049464688464',
                'contact_text' => 'Mission impossible', 'contact_birthday' => '1959-01-24'],

        ]);
    }
}