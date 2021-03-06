<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface EloquentRepositoryInterface
 * @package App\Repositories
 */

interface InviteRepositoryInterface
{
    public function all(): Collection;

    public function create(array $attributes);
}
