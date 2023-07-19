<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CampaignUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(){
        return [
            'campaign_name' => 'required',
            'campaign_initdate' => 'date|required',
            'campaign_enddate' => 'date|required',
            'fechaentregatienda' => 'date',
            'campaign_state' => 'required',
            // 'fechainstal1'=>['nullable','date',Rule::requiredIf($request->montaje1!='')],
            // 'fechainstal2'=>['nullable','date',Rule::requiredIf($request->montaje2!='')],
            // 'fechainstal3'=>['nullable','date',Rule::requiredIf($request->montaje3!='')],
            // 'montaje1'=>['nullable',Rule::requiredIf($request->fechainstal1!='')],
            // 'montaje2'=>['nullable',Rule::requiredIf($request->fechainstal2!='')],
            // 'montaje3'=>['nullable',Rule::requiredIf($request->fechainstal3!='')],
        ];
    }

    public function messages(): array{
        return [
            'fechainstal1.requiredIf' => 'bla',
            // 'body.required' => 'A message is required',
        ];
    }

}
