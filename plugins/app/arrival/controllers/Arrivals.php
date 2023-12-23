<?php namespace App\Arrival\Controllers;

use Backend\Classes\Controller;
use App\Arrival\Models\Arrival;

/**
 * Arrivals Backend Controller
 */
class Arrivals extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class
    ];

    /**
     * @var string formConfig file
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string listConfig file
     */
    public $listConfig = 'config_list.yaml';

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();
    }
    public function createArrival()
    {
        // Example: Create a new arrival model
        $arrivalModel = new Arrival();
        $arrivalModel->name = 'New Arrival'; // Set properties accordingly
        // ...

        // Trigger the arrival creation event
        event('app.arrival.create', $arrivalModel);

        // Save the arrival model
        $arrivalModel->save();

        // Additional logic for creating arrivals
        // ...

        \Flash::success('Arrival created successfully');

        // Redirect or return a response as needed
    }

    

}
