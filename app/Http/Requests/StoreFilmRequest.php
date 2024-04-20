<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFilmRequest extends FormRequest
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
            'title' => 'required|max:255',
            'pathtoimage' => 'required|image',
            'pathtovideo' => 'required|file',
            'genre' => 'required|string',
            'year' => 'required|date_format:Y',
            'rating' => 'required|numeric',
            'duration' => 'required|string',
            'director' => 'required|string',
            'actors' => 'required|string',
            'country' => 'required|string',
            'language' => 'required|string',
            'subtitles' => 'required|string',
            'quality' => 'required|string',
            'size' => 'required|string',
            'trailer' => 'required|url',
            'download' => 'required|url',
            'watch' => 'required|url',
            'description' => 'required',
        ];
    }
}