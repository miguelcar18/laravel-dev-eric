<?php
namespace Packages\Admin\Transformers\Api;

use League\Fractal;
use Packages\Admin\Models\User;

class UserTransformer extends Fractal\TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'email' => $user->email ?? 'N/A',
            'name' => $user->name,
            'registry_date' => $user->created_at->toW3cString(),
            //'account_validated' => $user->hasVerifiedEmail(),
            'implements_softdeletes' => $user->implements_softdeletes,
            'deleted_at' => empty($deleted_at = $user->deleted_at) ? false : $deleted_at->toW3cString(),
        ];
    }
}
