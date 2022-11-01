<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingHistory extends Model
{
    public function getBillingStatistics($userDetails)
    {
        return self::where('user_id', $userDetails->getId())
            ->groupBy('created_at')
            ->get();
    }
}
