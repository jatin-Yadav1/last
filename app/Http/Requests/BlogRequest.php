<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'slug' => 'required|string|unique:blogs,slug|max:255',
            'keywords' => 'nullable|string',
            'seo_image' => 'nullable|url|max:255',
            'canonical_url' => 'nullable|url|max:255',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string',
            'og_image' => 'nullable|url|max:255',
            'og_url' => 'nullable|url|max:255',
            'twitter_card_type' => 'nullable|string|max:50',
            'twitter_image' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'robots' => 'nullable|string|max:50',
            'tags' => 'nullable|string',
            'structured_data' => 'nullable|json',
            'seo_score' => 'nullable|numeric|min:0|max:100',
        ];
    }

    /**
     * Get custom messages for validation errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'The blog title is required.',
            'description.required' => 'The blog description is required.',
            'slug.required' => 'The slug is required and must be unique.',
            'slug.unique' => 'The slug has already been taken.',
            'seo_image.url' => 'The SEO image must be a valid URL.',
            'structured_data.json' => 'The structured data must be a valid JSON string.',
            'seo_score.numeric' => 'The SEO score must be a number between 0 and 100.',
        ];
    }
}
