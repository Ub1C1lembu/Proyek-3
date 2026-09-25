<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreActivityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'         => ['required', 'string', 'min:5', 'max:100'],
            'description'   => ['nullable', 'string'],
            'activity_date' => ['required', 'date'],
            'category'      => ['required', 'string', 'max:50'],
            'status'        => ['required', Rule::in(['Planned', 'Ongoing', 'Done'])],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'         => 'Judul kegiatan wajib diisi.',
            'title.max'              => 'Judul kegiatan maksimal 100 karakter.',
            'activity_date.required' => 'Tanggal kegiatan wajib diisi.',
            'activity_date.date'     => 'Format tanggal tidak valid.',
            'category.required'      => 'Kategori wajib diisi.',
            'status.required'        => 'Status wajib dipilih.',
            'status.in'              => 'Status tidak valid.',
        ];
    }
}
