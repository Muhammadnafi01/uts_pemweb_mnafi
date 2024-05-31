<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBarangRequest;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\Barang;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BarangController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('barang_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $barangs = Barang::with(['media'])->get();

        return view('admin.barangs.index', compact('barangs'));
    }

    public function create()
    {
        abort_if(Gate::denies('barang_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.barangs.create');
    }

    public function store(StoreBarangRequest $request)
    {
        $barang = Barang::create($request->all());

        if ($request->input('image', false)) {
            $barang->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $barang->id]);
        }

        return redirect()->route('admin.barangs.index');
    }

    public function edit(Barang $barang)
    {
        abort_if(Gate::denies('barang_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.barangs.edit', compact('barang'));
    }

    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        $barang->update($request->all());

        if ($request->input('image', false)) {
            if (! $barang->image || $request->input('image') !== $barang->image->file_name) {
                if ($barang->image) {
                    $barang->image->delete();
                }
                $barang->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($barang->image) {
            $barang->image->delete();
        }

        return redirect()->route('admin.barangs.index');
    }

    public function show(Barang $barang)
    {
        abort_if(Gate::denies('barang_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.barangs.show', compact('barang'));
    }

    public function destroy(Barang $barang)
    {
        abort_if(Gate::denies('barang_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $barang->delete();

        return back();
    }

    public function massDestroy(MassDestroyBarangRequest $request)
    {
        $barangs = Barang::find(request('ids'));

        foreach ($barangs as $barang) {
            $barang->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('barang_create') && Gate::denies('barang_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Barang();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
