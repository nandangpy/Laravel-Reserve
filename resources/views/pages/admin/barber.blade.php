@extends('layouts.public')

@section('content')
    <div class="row mt-4">
        <div class="col">
            @if (session('msg'))
                <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
                    {{ session('msg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('barber.create') }}" class="btn btn-primary mb-4"><i class="fas fa-plus-circle"></i>
                        Tambah Outlet</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tbody>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama barber</th>
                                    <th>Alamat</th>
                                    {{-- <th>Link Google Maps</th> --}}
                                    <th class="text-center">Aksi</th>
                                </tr>
                                @if (!empty($barber))
                                    @foreach ($barber as $data)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $data->nama_barber }}
                                            </td>
                                            <td>
                                                {{ $data->alamat }}
                                            </td>
                                            {{-- <td>
                                                {{ $data->link }}
                                            </td> --}}
                                            {{-- @php
                                                $detail = DB::table('detail_transaksi')
                                                    ->where('id_barber', $data->id_barber)
                                                    ->first();
                                            @endphp --}}
                                            <td class="d-flex justify-content-center p-0">
                                                <form action="{{ route('barber.destroy', $data->id_barber) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('barber.show', $data->id_barber) }}"
                                                        class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i></a>
                                                    <a href="{{ route('barber.edit', $data->id_barber) }}"
                                                        class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                                    @if (empty($detail))
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                                    @else
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else

                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
