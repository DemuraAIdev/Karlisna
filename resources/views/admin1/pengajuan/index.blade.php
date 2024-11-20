@extends('layouts.admin')

@section('content')
    <h1>Daftar Pengajuan Pinjaman</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nominal Pinjaman</th>
                <th>Jangka Waktu</th>
                <th>Status Admin1</th>
                <th>Status Admin2</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengajuanPinjaman as $pengajuan)
                <tr>
                    <td>{{ $pengajuan->id }}</td>
                    <td>{{ $pengajuan->nominal_pinjaman }}</td>
                    <td>{{ $pengajuan->jangka_waktu }} bulan</td>
                    <td>{{ $pengajuan->status_admin1 }}</td>
                    <td>{{ $pengajuan->status_admin2 }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('admin1.pengajuan.edit', $pengajuan->id) }}" class="btn btn-warning">Edit</a>
                        
                        <!-- Approve Button (Only for Admin1) -->
                        @if ($pengajuan->status_admin1 == 'Menunggu Persetujuan Admin1')
                            <form action="{{ route('admin1.pengajuan.approve', $pengajuan->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">Setujui</button>
                            </form>
                        
                            <!-- Reject Button (Only for Admin1) -->
                            <form action="{{ route('admin1.pengajuan.reject', $pengajuan->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger">Tolak</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection