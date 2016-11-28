<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactForm extends FormRequest
{

    protected $primaryKey = 'contact_id';
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('contact');

        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'contact_name' => 'required|max:60',
                    'contact_surname' => 'required|max:60',
                    'contact_telephone' => 'required|max:20|regex:/^(\+?\d+)?\s*(\(\d+\))?[\s-]*([\d-]*)$/|unique:contacts,contact_telephone',
                    'contact_birthday' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'contact_name' => 'required|max:60',
                    'contact_surname' => 'required|max:60',
                    'contact_telephone' => 'required|max:20|regex:/^(\+?\d+)?\s*(\(\d+\))?[\s-]*([\d-]*)$/|unique:contacts,contact_telephone,' . $id . ',contact_id',
                    'contact_birthday' => 'required',
                ];
            }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'contact_name.required' => 'Name is required',
            'contact_surname.required'  => 'Surname is required',
            'contact_telephone.required' => 'Telephone is required',
            'contact_birthday.required'  => 'Birthday date is required',
            'contact_name.max' => 'Name is too long(60)',
            'contact_surname.max'  => 'Surname is too long(60)',
            'contact_telephone.max' => 'Telephone is too long(20)',
            'contact_telephone.regex' => 'Telephone must be numeric',
            'contact_telephone.unique' => 'Such telephone already exists',

        ];
    }
}
