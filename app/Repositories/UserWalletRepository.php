<?php


namespace App\Repositories;


use App\Models\UserWallet;
use Illuminate\Database\Eloquent\Collection;

class UserWalletRepository extends BaseRepository implements UserWalletRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param UserWallet $model
     */
    public function __construct(UserWallet $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->getAll();
    }

    /**
     * @return int
     */
    public function addWallet($userId, $amount): int
    {
        return $this->model::where('user_id', $userId)->increment('amount', $amount);
    }

    public function create(array $attributes)
    {
        // TODO: Implement create() method.
    }
}
