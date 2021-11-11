<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LayoutRequest extends FormRequest
{
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
        return [
            'mail' => 'required',
            // 'header_logo' => 'required',
            // 'footer_logo' => 'required',
            'footer_desc1' => 'required',
            'phone_no' => 'required',
            'location' => 'required',
            'footer_desc2' => 'required',
            'footer_desc3' => 'required',
            'become_member_desc' => 'required',
            'twit_link' => 'required',
            'fb_link' => 'required',
            'google_link' => 'required',
            'linkedin_link' => 'required',
            'youtube_link' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'mail.required' => 'Please enter mail',
            'header_logo.required' => 'Please select header image',
            'footer_logo.required' => 'Please select footer image ',
            'footer_desc1.required' => 'Please enter description',
            'phone_no.required' => 'Please enter phone no',
            'location.required' => 'Please enter location',
            'footer_desc2.required' => 'Please enter description',
            'footer_desc3.required' => 'Please enter description',
            'become_member_desc.required' => 'Please enter member description',
            'twit_link.required' => 'Please enter twitter link',
            'fb_link.required' => 'Please enter facebook line',
            'google_link.required' => 'Please enter google link',
            'linkedin_link.required' => 'Please enter linkedin link',
            'youtube_link.required' => 'Please enter youtube link',
        ];
    }
}
