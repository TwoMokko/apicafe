<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //TODO дописать
            'name'                  => 'required|max:255|unique:games,name,'.$this->game->id,
            'description'           => 'required',
            'photo'                 => 'required',
            'people_count_min'      => 'required',
            'people_count_max'      => 'required',
            'time_count_min'        => 'required',
            'time_count_max'        => 'required',
            'age'                   => 'required',
            'rules'                 => 'required',
            'is_published'          => 'required',
        ];
    }

    public function messages()
    {
        return [
          'name.unique' => 'Игра с таким названием уже добавлена.'
        ];
    }
}
