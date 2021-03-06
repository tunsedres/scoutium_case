<?php


namespace App\Repositories;


use App\Models\User;
use App\Models\UserInvitation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class InviteRepository extends BaseRepository implements InviteRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param UserInvitation $model
     */
    public function __construct(UserInvitation $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    public function create($attributes): Model
    {
        $attributes['code'] = $this->createInvitationCode();
        $attributes['created_by'] = auth()->id();

        return $this->model->create($attributes);
    }

    private function createInvitationCode()
    {
        do {
            $code = Str::random(15);
        }
        while ($this->model::where('code', $code)->first());

        return $code;
    }
}
