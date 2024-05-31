@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.barang.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.barangs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.barang.fields.id') }}
                        </th>
                        <td>
                            {{ $barang->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.barang.fields.name') }}
                        </th>
                        <td>
                            {{ $barang->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.barang.fields.description') }}
                        </th>
                        <td>
                            {{ $barang->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.barang.fields.age') }}
                        </th>
                        <td>
                            {{ $barang->age }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.barang.fields.email') }}
                        </th>
                        <td>
                            {{ $barang->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.barang.fields.whatsap') }}
                        </th>
                        <td>
                            {{ $barang->whatsap }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.barang.fields.barang') }}
                        </th>
                        <td>
                            {{ $barang->barang }}
                        </td>
                    </tr>
                    
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.barangs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection