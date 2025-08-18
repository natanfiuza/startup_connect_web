<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
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
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
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
            'password'          => 'hashed',
        ];
    }
    /**
     * Get all of the posts for the User.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    /**
     * Get the profile associated with the user.
     *
     * @return <\App\Models\Profile>
     *
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    /**
     * Os usuários que este usuário segue (following).
     */
    public function following()
    {
        return $this->belongsToMany(User::class, 'connections', 'follower_id', 'following_id');
    }

    /**
     * Os usuários que seguem este usuário (followers).
     */
    public function followers()
    {
        return $this->belongsToMany(User::class, 'connections', 'following_id', 'follower_id');
    }
}
