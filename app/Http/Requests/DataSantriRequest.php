<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DataSantriRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'id' => 'required',
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'alamat' => 'required|string|max:255',
            'noTelp' => 'required|string|max:20',
            'jenis_kelamin' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string',
            'ibu' => 'required|string',
            'kelas_id' => 'required|id',
        ];
    }
}
