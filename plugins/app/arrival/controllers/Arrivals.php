<?php namespace App\Arrival\Controllers;

use Backend\Classes\Controller;
use App\Arrival\Models\Arrival;
use BackendMenu;

class Arrivals extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class
    ];

    public $formConfig = 'config_form.yaml';

    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('App.Arrival', 'arrival', 'arrivals');
    }
    public function createArrival()
    {
        $arrivalModel = new Arrival();
        $arrivalModel->name = 'New Arrival'; 

        event('app.arrival.create', $arrivalModel);

        $arrivalModel->save();


        \Flash::success('Arrival created successfully');
    }

    

}
