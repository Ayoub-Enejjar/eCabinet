<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Symfony\Component\HttpFoundation\Request;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable ,HasApiTokens ;
//

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'profile_photo_path',
        'specialiste',
        'telephone_pro' ,
        'date_naissance',
        'adresse',
        'telephone',
        'numero_securite_sociale',
        'groupe_sanguin',
        'antecedents_medicaux',
        'allergies',
        'diplome',
        'appearance_mode',
        'signature_path',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the URL to the user's profile photo.
     *
     * @return string
     */
    public function getProfilePhotoUrlAttribute()
    {
        if (!$this->profile_photo_path) {
            return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4FF';
        }

        // Base64 Data URL ou URL externe — retourner directement
        if (str_starts_with($this->profile_photo_path, 'data:') ||
            str_starts_with($this->profile_photo_path, 'http')) {
            return $this->profile_photo_path;
        }

        // Ancien chemin local (compatibilité)
        return asset('storage/' . $this->profile_photo_path);
    }

    /**
     * Get the URL to the user's signature (handles base64 and legacy local paths).
     */
    public function getSignatureUrlAttribute()
    {
        if (!$this->signature_path) {
            return null;
        }

        // Base64 Data URL ou URL externe — retourner directement
        if (str_starts_with($this->signature_path, 'data:') ||
            str_starts_with($this->signature_path, 'http')) {
            return $this->signature_path;
        }

        // Ancien chemin local (compatibilité)
        return asset('storage/' . $this->signature_path);
    }

    //relations
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function doctorAvailabilities()
    {
        return $this->hasMany(DoctorAvailability::class);
    }
}
