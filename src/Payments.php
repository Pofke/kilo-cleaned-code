<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    public function addBalance($sum)
    {
        return $this->getBalance()->addSum($sum);
    }

    public function getBalance()
    {
        return $this->getBalance()->sum;
    }

    public function getPaymentsStatistics($userDetails)
    {
        return self::where('user_id', $userDetails->getId())
            ->groupBy('created_at')
            ->get();
    }
}
