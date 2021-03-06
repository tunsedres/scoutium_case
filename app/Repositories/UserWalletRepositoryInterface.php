<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Collection;

/**
 * Interface EloquentRepositoryInterface
 * @package App\Repositories
 */

interface UserWalletRepositoryInterface
{
    public function all(): Collection;

    public function create(array $attributes);

}
