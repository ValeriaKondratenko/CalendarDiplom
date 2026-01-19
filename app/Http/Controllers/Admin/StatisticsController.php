<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Carbon\Carbon;

use function collect;

class StatisticsController
{
    public function __invoke(int $year)
    {
        $events = Event::selectRaw('EXTRACT(MONTH FROM "date_event") as month, count(*) as cnt')
            ->whereYear('date_event', $year)
            ->groupBy('month')
            ->get()
            ->mapWithKeys(fn($item) => [$item->month => $item->cnt]);

        $months = collect(range(1, 12))
            ->flip()
            ->mapWithKeys(
                fn(int $item, int $key) => [Carbon::create()->month($key)->monthName => $events[$key] ?? 0]
            )
            ->toArray();

        return response()->json([
            'months' => $months,
            'year' => $year,
        ]);
    }
}
