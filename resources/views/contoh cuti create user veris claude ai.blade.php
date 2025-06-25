<?php

// Tambahkan method-method ini ke dalam CutiController Anda

// class CutiController extends Controller
// {
//     // Method untuk menampilkan daftar cuti
//     public function index(Request $request)
//     {
//         $query = DB::table('cutis')
//             ->select([
//                 'cutis.*',
//                 'users.name as nama_pegawai' // Asumsi ada table users dengan relasi
//             ])
//             ->leftJoin('users', 'cutis.nip', '=', 'users.nip')
//             ->orderBy('cutis.created_at', 'desc');

//         // Filter berdasarkan user yang login (jika bukan admin)
//         if (!auth()->user()->hasRole('admin')) {
//             $query->where('cutis.nip', auth()->user()->nip);
//         }

//         // Apply filters jika ada
//         if ($request->has('status') && $request->status != '') {
//             $query->where('cutis.status', $request->status);
//         }

//         if ($request->has('tahun') && $request->tahun != '') {
//             $query->whereYear('cutis.tanggal_mulai', $request->tahun);
//         }

//         if ($request->has('jenis_cuti')