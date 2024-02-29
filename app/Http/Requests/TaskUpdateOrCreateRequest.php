<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateOrCreateRequest extends FormRequest
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
            'title' => 'required|min:5',
            'description' => 'required|min:50',
            'deadline' => 'required|date',
            'status' => 'required|in:todo,backlog,in_progress,in_review,closed'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Поле обязательно для заполнения',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'deadline' => Carbon::parse($this->deadline),
        ]);
    }
}
