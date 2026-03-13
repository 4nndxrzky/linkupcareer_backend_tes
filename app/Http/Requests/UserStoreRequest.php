<?php
namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name'          => ['required', 'string', 'max:255'],
            'employee_id'   => ['required', 'string', 'unique:users,employee_id'],
            'email'         => ['required', 'string', 'email', 'unique:users,email'],
            'password'      => ['required', 'string', 'min:6'],
            'position'      => ['required', 'string', 'max:255'],
            'status'        => ['required', 'in:intern,staff'],
            'date_of_birth' => ['required', 'date', 'date_format:Y-m-d'],
        ];
    }
}
