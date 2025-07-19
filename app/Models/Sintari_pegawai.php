<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Sintari_pegawai extends Model
{
    use HasFactory;

    protected $table = 'sintari_pegawais';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nip',
        'nama',
        'jabatan',
        'opd',
        'tanggal_lahir',
        'tmt_pensiun',
    ];

    protected $appends = ['tmt_pensiun_otomatis', 'sisa_pensiun', 'status_pensiun'];

    public function getTmtPensiunOtomatisAttribute()
    {
        if (!$this->tanggal_lahir) {
            return null;
        }

        $usia_pensiun = 58;
        $tanggal_lahir = Carbon::parse($this->tanggal_lahir);
        $tmt = $tanggal_lahir->copy()->addYears($usia_pensiun)->startOfMonth()->addMonth();

        return $tmt->format('Y-m-d');
    }

    public function getSisaPensiunAttribute()
    {
        if (!$this->tmt_pensiun_otomatis) {
            return '-';
        }

        $tmt = Carbon::parse($this->tmt_pensiun_otomatis);
        $now = Carbon::now();

        if ($now->gt($tmt)) {
            return 'Sudah Pensiun';
        }

        $diff = $now->diff($tmt);
        return $diff->y . ' tahun ' . $diff->m . ' bulan';
    }

    public function getStatusPensiunAttribute()
    {
        if (!$this->tmt_pensiun_otomatis) {
            return 'Belum Ada Tanggal';
        }

        $tmt = Carbon::parse($this->tmt_pensiun_otomatis);
        $now = Carbon::now();

        if ($now->gt($tmt)) {
            return 'Sudah Pensiun';
        } elseif ($now->diffInMonths($tmt) <= 12) {
            return 'Akan Pensiun';
        } else {
            return 'Aktif';
        }
    }
}
