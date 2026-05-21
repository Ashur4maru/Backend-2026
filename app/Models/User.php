<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// We hebben hier de rol en alle nieuwe profielvelden aan de Fillable lijst toegevoegd
#[Fillable([
    'name', 
    'email', 
    'password', 
    'role', 
    'username', 
    'birthday', 
    'profile_photo', 
    'about_me'
])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

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
     * Controleer of de gebruiker een specifieke rol heeft.
     */
    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }
}