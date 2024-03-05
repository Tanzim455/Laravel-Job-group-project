<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'title'=>'required|min:10',
             'qualification'=>'required_if:apply_url,null|min:3',
            'description'=>'required_if:apply_url,null|min:100',
            'min_salary'=>'required',
            'max_salary'=>'required',
             'min_experience'=>'required_if:apply_url,null|integer',
             'max_experience'=>'required_if:apply_url,null|integer',
             'expiration_date'=>'required|date|after_or_equal:today',
             'apply_url'=>'url',
             'job_location'=>'required_if:apply_url,null',
             'job_location_type'=>'required|in:remote,onsite,hybrid',
             'category_id'=>'required|integer',
             
        ];
    }
}
