<?php namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Menampilkan daftar kursus.
     */
    public function index()
    {
        $courses = Course::latest()->get();

        return view('courses.index', compact('courses'));
    }

    /**
     * Menampilkan formulir tambah kursus.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Menyimpan kursus baru.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|string|max:20|unique:courses,code',
            'name' => 'required|string|max:120',
            'description' => 'nullable|string',
            'fee' => 'required|integer|min:0',
            'quota' => 'required|integer|min:1|max:500',
            'start_date' => 'required|date',
            'status' => 'required|in:draft,open,closed',
        ], [
            // Kode Kursus
            'code.required' => 'Kode kursus wajib diisi.',
            'code.string' => 'Kode kursus harus berupa teks.',
            'code.max' => 'Kode kursus maksimal 20 karakter.',
            'code.unique' => 'Kode kursus sudah digunakan. Silakan gunakan kode lain.',

            // Nama Kursus
            'name.required' => 'Nama kursus wajib diisi.',
            'name.string' => 'Nama kursus harus berupa teks.',
            'name.max' => 'Nama kursus maksimal 120 karakter.',

            // Deskripsi
            'description.string' => 'Deskripsi harus berupa teks.',

            // Biaya
            'fee.required' => 'Biaya kursus wajib diisi.',
            'fee.integer' => 'Biaya kursus harus berupa angka bulat.',
            'fee.min' => 'Biaya kursus tidak boleh kurang dari Rp0.',

            // Kuota
            'quota.required' => 'Kuota peserta wajib diisi.',
            'quota.integer' => 'Kuota peserta harus berupa angka bulat.',
            'quota.min' => 'Kuota peserta minimal 1 orang.',
            'quota.max' => 'Kuota peserta maksimal 500 orang.',

            // Tanggal Mulai
            'start_date.required' => 'Tanggal mulai wajib diisi.',
            'start_date.date' => 'Tanggal mulai tidak valid.',

            // Status
            'status.required' => 'Status kursus wajib dipilih.',
            'status.in' => 'Status kursus hanya boleh Draft, Open, atau Closed.',
        ]);

        Course::create($data);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Kursus berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail kursus.
     */
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    /**
     * Menampilkan formulir edit kursus.
     */
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    /**
     * Memperbarui data kursus.
     */
    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'name' => 'required|string|max:120',
            'description' => 'nullable|string',
            'fee' => 'required|integer|min:0',
        ], [
            'name.required' => 'Nama kursus wajib diisi.',
            'name.string' => 'Nama kursus harus berupa teks.',
            'name.max' => 'Nama kursus maksimal 120 karakter.',
            'description.string' => 'Deskripsi harus berupa teks.',
            'fee.required' => 'Biaya kursus wajib diisi.',
            'fee.integer' => 'Biaya kursus harus berupa angka bulat.',
            'fee.min' => 'Biaya kursus tidak boleh kurang dari Rp0.',
        ]);

        $course->update($data);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Kursus berhasil diperbarui.');
    }

    /**
     * Menghapus data kursus.
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()
            ->route('courses.index')
            ->with('success', 'Kursus berhasil dihapus.');
    }
}
