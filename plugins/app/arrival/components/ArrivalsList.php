<?php namespace App\Arrival\Components;

use Cms\Classes\ComponentBase;
use App\Arrival\Models\Arrival;

/**
 * ArrivalsList Component
 */
class ArrivalsList extends ComponentBase
{
    public $arrivals;

    public function componentDetails()
    {
        return [
            'name' => 'ArrivalsList Component',
            'description' => 'Displays a list of arrivals.'
        ];
    }

    public function onRun()
    {
        // Retrieve arrivals from the database
        $this->arrivals = Arrival::all();
    }
}
