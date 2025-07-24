<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class DatabaseHelper
{
    public static function formatDate($column, $format)
    {
        $driver = config('database.default');
        $connection = config("database.connections.{$driver}.driver");

        switch ($connection) {
            case 'mysql':
                return DB::raw("DATE_FORMAT({$column}, '{$format}')");
            case 'sqlite':
                return DB::raw("strftime('{$format}', {$column})");
            case 'pgsql':
                return DB::raw("to_char({$column}, '{$format}')");
            default:
                return $column;
        }
    }

    public static function getMonthlyData($model, $dateColumn = 'created_at')
    {
        $driver = config('database.default');
        $connection = config("database.connections.{$driver}.driver");

        switch ($connection) {
            case 'mysql':
                return $model::selectRaw("DATE_FORMAT({$dateColumn}, '%Y-%m') as month, COUNT(*) as count")
                    ->groupBy('month')
                    ->orderBy('month')
                    ->get();
            case 'sqlite':
                return $model::selectRaw("strftime('%Y-%m', {$dateColumn}) as month, COUNT(*) as count")
                    ->groupBy('month')
                    ->orderBy('month')
                    ->get();
            default:
                return $model::selectRaw("EXTRACT(YEAR FROM {$dateColumn}) || '-' || LPAD(EXTRACT(MONTH FROM {$dateColumn}), 2, '0') as month, COUNT(*) as count")
                    ->groupBy('month')
                    ->orderBy('month')
                    ->get();
        }
    }
}
