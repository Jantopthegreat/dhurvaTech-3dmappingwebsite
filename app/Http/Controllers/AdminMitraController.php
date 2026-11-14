<?php

namespace App\Http\Controllers;

use App\Http\Requests\MitraRequest;
use App\Models\Mitra;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminMitraController extends Controller
{
    public function index(): View
    {
        return view('admin.mitra.index', [
            'mitra' => Mitra::latest()->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('admin.mitra.create');
    }

    public function store(MitraRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('mitra', 'public');
        }

        $mitra = Mitra::create($data);

        return redirect()
            ->route('admin.mitra.edit', $mitra)
            ->with('status', 'Mitra berhasil ditambahkan.');
    }

    public function edit(Mitra $mitra): View
    {
        return view('admin.mitra.edit', compact('mitra'));
    }

    public function update(MitraRequest $request, Mitra $mitra): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($mitra->image) {
                Storage::disk('public')->delete($mitra->image);
            }
            $data['image'] = $request->file('image')->store('mitra', 'public');
        } else {
            unset($data['image']);
        }

        $mitra->update($data);

        return redirect()
            ->route('admin.mitra.index')
            ->with('status', 'Mitra berhasil diperbarui.');
    }

    public function destroy(Mitra $mitra): RedirectResponse
    {
        if ($mitra->image) {
            Storage::disk('public')->delete($mitra->image);
        }

        $mitra->delete();

        return redirect()
            ->route('admin.mitra.index')
            ->with('status', 'Mitra berhasil dihapus.');
    }
}
