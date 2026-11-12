<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    /**
     * Menentukan apakah pengguna boleh melakukan request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Aturan validasi penambahan kursus.
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'max:20', 'unique:courses,code'],
            'name' => ['required', 'string', 'max:120'],
            'description' => ['nullable', 'string'],
            'fee' => ['required', 'integer', 'min:0'],
            'quota' => ['required', 'integer', 'min:1', 'max:500'],
            'start_date' => ['required', 'date'],
            'status' => ['required', 'in:draft,open,closed'],
        ];
    }

    /**
     * Pesan kesalahan validasi.
     */
    public function messages(): array
    {
        return [
            'code.required' => 'Kode kursus wajib diisi.',
            'code.unique' => 'Kode kursus sudah digunakan.',
            'code.max' => 'Kode kursus maksimal 20 karakter.',

            'name.required' => 'Nama kursus wajib diisi.',
            'name.max' => 'Nama kursus maksimal 120 karakter.',

            'description.string' => 'Deskripsi harus berupa teks.',

            'fee.required' => 'Biaya kursus wajib diisi.',
            'fee.integer' => 'Biaya kursus harus berupa angka bulat.',
            'fee.min' => 'Biaya kursus minimal Rp0.',

            'quota.required' => 'Kuota peserta wajib diisi.',
            'quota.integer' => 'Kuota harus berupa angka.',
            'quota.min' => 'Kuota minimal 1 peserta.',
            'quota.max' => 'Kuota maksimal 500 peserta.',

            'start_date.required' => 'Tanggal mulai wajib diisi.',
            'start_date.date' => 'Tanggal mulai tidak valid.',

            'status.required' => 'Status kursus wajib dipilih.',
            'status.in' => 'Status hanya boleh Draft, Open, atau Closed.',
        ];
    }
}
