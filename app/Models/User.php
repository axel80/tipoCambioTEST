<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Modules\System\HumanResources\Vacancy;
use App\Models\Modules\System\Process\PanicReport;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'last_login_at',
        'last_login_ip',
        'profile_photo_path',
        'remember_token_app',
        'recovery_token_app',
        'password_app',
        'interview',
        'username',
        'name',
        'email',
        'password',
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


    public function vacanciesUserCreated(): HasMany
    {
        return $this->hasMany(Vacancy::class, 'user_create_id');
    }

    public function vacanciesUserValidated(): HasMany
    {
        return $this->hasMany(Vacancy::class, 'user_validate_id');
    }

    public function vacanciesUserApproved(): HasMany
    {
        return $this->hasMany(Vacancy::class, 'user_approve_id');
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    public function panicReport(){
        return $this->hasMany(PanicReport::class);
    }
}
