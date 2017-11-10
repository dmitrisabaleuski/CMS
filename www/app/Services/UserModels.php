<?php

namespace App\Services;

use App\Model\user\UserEntityInterface;
use Illuminate\Database\Eloquent\Collection;

class UserModels
{
    private $userId;

    public function __construct(int $userId)
    {
        $this->userId = $userId;

        return $this;
    }

    public function get(string $modelClass) : Collection
    {
        if (!class_exists($modelClass) || !((new $modelClass) instanceof UserEntityInterface)) {
            throw new \Exception('Class invalid');
        }

        return (new $modelClass)->select()->where($modelClass::getUserFieldName(), '=', $this->userId)->get();
    }

}