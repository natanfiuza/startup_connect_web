<?php
namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UpdateUserProfileData
{
    /**
     * Validate and update the user's profile data.
     */
    public function update($user, array $input): void
    {
        Validator::make($input, [
            'startup_name'     => ['nullable', 'string', 'max:255'],
            'sector_id'        => ['nullable', 'integer', Rule::exists('sectors', 'id')],
            'funding_stage_id' => ['nullable', 'integer', Rule::exists('funding_stages', 'id')],
            'country'          => ['nullable', 'string', 'max:255'],
            'state'            => ['nullable', 'string', 'max:255'],
            'city'             => ['nullable', 'string', 'max:255'],
            'bio'              => ['nullable', 'string'],
        ])->validateWithBag('updateProfileData');

        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'startup_name'     => $input['startup_name'],
                'sector_id'        => $input['sector_id'],
                'funding_stage_id' => $input['funding_stage_id'],
                'country'          => $input['country'],
                'state'            => $input['state'],
                'city'             => $input['city'],
                'bio'              => $input['bio'],
            ]
        );
    }
}
