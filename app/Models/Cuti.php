<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Cuti extends Model
{
    use HasFactory;

    protected $table = 'cutis';

    protected $fillable = [
        'nip',
        'nama_pegawai',
        'nomor_surat',
        'tanggal_surat',
        'tanggal_mulai',
        'tanggal_selesai',
        'alasan_cuti',
        'jumlah_hari',
        'file_pendukung',
        'status'
    ];

    protected $dates = [
        'tanggal_surat',
        'tanggal_mulai',
        'tanggal_selesai'
    ];

    // Status yang tersedia
    const STATUS_PENDING = 'PENDING';
    const STATUS_DISETUJUI = 'DISETUJUI';
    const STATUS_DITOLAK = 'DITOLAK';

    /**
     * Mendapatkan total cuti tahunan yang sudah digunakan dalam satu tahun
     */
    public static function getTotalCutiTahunan($nip, $tahun = null)
    {
        $tahun = $tahun ?? date('Y');
        
        return self::where('nip', $nip)
            ->whereYear('tanggal_mulai', $tahun)
            ->where('alasan_cuti', 'CUTI TAHUNAN')
            ->where('status', '!=', self::STATUS_DITOLAK)
            ->sum('jumlah_hari');
    }

    /**
     * Mendapatkan sisa kuota cuti tahunan
     */
    public static function getSisaKuotaCutiTahunan($nip, $tahun = null)
    {
        $total_terpakai = self::getTotalCutiTahunan($nip, $tahun);
        return 12 - $total_terpakai;
    }

    /**
     * Mengecek apakah masih bisa mengajukan cuti tahunan
     */
    public static function bisaAjukanCutiTahunan($nip, $jumlah_hari, $tahun = null)
    {
        $sisa_kuota = self::getSisaKuotaCutiTahunan($nip, $tahun);
        return $jumlah_hari <= $sisa_kuota;
    }

    /**
     * Mengecek apakah ada cuti yang bentrok dengan tanggal yang akan diajukan
     */
    public static function adaCutiBentrok($nip, $tanggal_mulai, $tanggal_selesai, $exclude_id = null)
    {
        $query = self::where('nip', $nip)
            ->where('status', '!=', self::STATUS_DITOLAK)
            ->where(function($q) use ($tanggal_mulai, $tanggal_selesai) {
                $q->whereBetween('tanggal_mulai', [$tanggal_mulai, $tanggal_selesai])
                  ->orWhereBetween('tanggal_selesai', [$tanggal_mulai, $tanggal_selesai])
                  ->orWhere(function($subQ) use ($tanggal_mulai, $tanggal_selesai) {
                      $subQ->where('tanggal_mulai', '<=', $tanggal_mulai)
                           ->where('tanggal_selesai', '>=', $tanggal_selesai);
                  });
            });

        if ($exclude_id) {
            $query->where('id', '!=', $exclude_id);
        }

        return $query->exists();
    }

    /**
     * Accessor untuk format tanggal Indonesia
     */
    public function getTanggalMulaiFormatAttribute()
    {
        return Carbon::parse($this->tanggal_mulai)->locale('id')->isoFormat('DD MMMM YYYY');
    }

    public function getTanggalSelesaiFormatAttribute()
    {
        return Carbon::parse($this->tanggal_selesai)->locale('id')->isoFormat('DD MMMM YYYY');
    }

    public function getTanggalSuratFormatAttribute()
    {
        return Carbon::parse($this->tanggal_surat)->locale('id')->isoFormat('DD MMMM YYYY');
    }

    /**
     * Accessor untuk badge status
     */
    public function getStatusBadgeAttribute()
    {
        switch ($this->status) {
            case self::STATUS_PENDING:
                return '<span class="badge bg-warning">Pending</span>';
            case self::STATUS_DISETUJUI:
                return '<span class="badge bg-success">Disetujui</span>';
            case self::STATUS_DITOLAK:
                return '<span class="badge bg-danger">Ditolak</span>';
            default:
                return '<span class="badge bg-secondary">Unknown</span>';
        }
    }

    /**
     * Scope untuk filter berdasarkan tahun
     */
    public function scopeByYear($query, $year)
    {
        return $query->whereYear('tanggal_mulai', $year);
    }

    /**
     * Scope untuk filter berdasarkan NIP
     */
    public function scopeByNip($query, $nip)
    {
        return $query->where('nip', $nip);
    }

    /**
     * Scope untuk cuti tahunan saja
     */
    public function scopeCutiTahunan($query)
    {
        return $query->where('alasan_cuti', 'CUTI TAHUNAN');
    }

    /**
     * Scope untuk cuti yang sudah disetujui atau pending (tidak ditolak)
     */
    public function scopeActive($query)
    {
        return $query->where('status', '!=', self::STATUS_DITOLAK);
    }
}