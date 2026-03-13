<?php
namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'          => ['sometimes', 'required', 'string', 'max:255'],
            'employee_id'   => ['sometimes', 'required', 'integer', 'unique:users,employee_id,' . $this->user->id],
            'email'         => ['sometimes', 'required', 'string', 'email', 'unique:users,email,' . $this->user->id],
            'password'      => ['sometimes', 'required', 'string', 'min:6'],
            'position'      => ['sometimes', 'required', 'string', 'max:255'],
            'status'        => ['sometimes', 'required', 'in:intern,staff'],
            'date_of_birth' => ['sometimes', 'required', 'date', 'date_format:Y-m-d'],
        ];
    }
}
