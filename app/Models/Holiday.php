<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;

    protected $table = 'holidays';

    protected $fillable = [
        'name',
        'date',
    ];


    function calculateDaysBetweenDates($start_date, $end_date)
    {
        $start_date = strtotime($start_date);
        $date_fin = strtotime($end_date);

        $daysDiff = round(abs($end_date - $start_date) / 86400);

        return $daysDiff;

        if ($data['type'] === 'annual' && $daysDiff > $user->annual_balance) {
            return back()->withErrors(['error' => 'Vous n\'avez pas assez de jours de congé annuels disponibles.']);
        } elseif ($data['type'] === 'monthly' && $daysDiff > $user->monthly_balance) {
            return back()->withErrors(['error' => 'Vous n\'avez pas assez de jours de congé mensuels disponibles.']);
        }
        $user->updateBalance($data['type'], $daysDiff);
    }
    function calculateDaysBetweenDates1($start_date, $end_date)
    {
        $start_date = strtotime($start_date);
        $date_fin = strtotime($end_date);

        $daysDiff = round(abs($end_date - $start_date) / 86400);

        return ABS($daysDiff - 12 );}


        function calculateDaysBetweenDates2($start_date, $end_date)
        {
            $start_date = strtotime($start_date);
            $date_fin = strtotime($end_date);

            $daysDiff = round(abs($end_date - $start_date) / 86400);

            return ABS($daysDiff - 12 );}

           

}
