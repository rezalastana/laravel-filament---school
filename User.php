<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Storage;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser, HasAvatar
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'avatar_url',
        'name',
        'email',
        'password',
        'kecamatan_id',
        'kelurahan_id',
        'puskesmas_id',
        'sekolah_id',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        $user = Auth::user();
        $roles = $user->getRoleNames();

        /* // Cek peran pengguna setelah login berhasil
        if ($user->hasRole('superadmin')) {
            // Jika pengguna adalah superadmin, arahkan ke halaman dashboard superadmin
            return redirect()->route('dashboard.superadmin');
        } elseif ($user->hasRole('admin sekolah')) {
            // Jika pengguna adalah admin sekolah, arahkan langsung ke halaman panel Filament
            return redirect()->route('dashboard.sekolah');
        } elseif ($user->hasRole('admin puskesmas')) {
            // Jika pengguna adalah admin puskesmas, arahkan ke halaman dashboard puskesmas
            return redirect()->route('dashboard.puskesmas');
        } */

        if ($panel->getId() === 'admin' && $roles->contains('superadmin')) {
            return true;
        } else if ($panel->getId() === 'sekolah' && $roles->contains('sekolah')) {
            return true;
        } else if ($panel->getId() === 'puskesmas' && $roles->contains('puskesmas')) {
            return true;
        } else {
            return false;
        }
    }

    protected $append = ['fullname'];
    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }
    public function kelurahan(): BelongsTo
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id');
    }
    public function sekolah(): BelongsTo
    {
        return $this->belongsTo(Sekolah::class, 'sekolah_id');
    }
    public function puskesmas(): BelongsTo
    {
        return $this->belongsTo(Puskesmas::class, 'puskesmas_id');
    }
    public function getFullnameAttribute()
    {
        return $this->nama . ' - ' . $this->kecamatan->nama . ' - ' . $this->kelurahan->nama;
    }
    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url ? Storage::url($this->avatar_url) : null;
    }
    public function deleteOldImage()
    {
        if ($this->avatar_url) {
            Storage::disk('public')->delete($this->avatar_url);
        }
    }
    public function setAvatarUrlAttribute($value)
    {
        if (!empty($this->attributes['avatar_url'])) {
            $this->deleteOldImage();
        }

        $this->attributes['avatar_url'] = $value;
    }

}
