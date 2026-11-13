<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicesRequest;
use App\Models\Services;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminServicesController extends Controller
{
    public function index(): View
    {
        $services = Services::latest()->paginate(10);

        return view('admin.services.index', compact('services'));
    }

    public function create(): View
    {
        return view('admin.services.create');
    }

    public function store(ServicesRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        $service = Services::create($data);

        return redirect()
            ->route('admin.services.edit', $service)
            ->with('status', 'Layanan berhasil ditambahkan.');
    }

    public function edit(Services $service): View
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(ServicesRequest $request, Services $service): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $data['image'] = $request->file('image')->store('services', 'public');
        } else {
            unset($data['image']); // jangan timpa gambar lama dengan null
        }

        $service->update($data);

        return redirect()
            ->route('admin.services.index')
            ->with('status', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Services $service): RedirectResponse
    {
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('status', 'Layanan berhasil dihapus.');
    }
}