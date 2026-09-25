<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ActivityController extends Controller
{
    // Menampilkan daftar semua kegiatan
    public function index(): View
    {
        $activities = Activity::query()->orderBy('activity_date')->get();
        return view('activities.index', compact('activities'));
    }

    // Menampilkan form tambah kegiatan baru
    public function create(): View
    {
        return view('activities.create');
    }

    // Menyimpan data kegiatan baru ke database
    public function store(StoreActivityRequest $request): RedirectResponse
    {
        Activity::create($request->validated());
        return redirect()->route('activities.index')
            ->with('success', 'Kegiatan berhasil ditambahkan!');
    }

    // Menampilkan detail satu kegiatan (Route Model Binding)
    public function show(Activity $activity): View
    {
        return view('activities.show', compact('activity'));
    }

    // Menampilkan form edit kegiatan (Route Model Binding)
    public function edit(Activity $activity): View
    {
        return view('activities.edit', compact('activity'));
    }

    // Menyimpan perubahan data kegiatan ke database (Route Model Binding)
    public function update(UpdateActivityRequest $request, Activity $activity): RedirectResponse
    {
        $activity->update($request->validated());
        return redirect()->route('activities.index')
            ->with('success', 'Kegiatan berhasil diperbarui!');
    }

    // Menghapus kegiatan dari database (Route Model Binding)
    public function destroy(Activity $activity): RedirectResponse
    {
        $activity->delete();
        return redirect()->route('activities.index')
            ->with('success', 'Kegiatan berhasil dihapus!');
    }
}
