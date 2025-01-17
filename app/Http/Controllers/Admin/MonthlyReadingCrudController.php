<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MonthlyReadingRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class MonthlyReadingCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MonthlyReadingCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\MonthlyReading::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/monthly-reading');
        CRUD::setEntityNameStrings('monthly reading', 'monthly readings');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column([  // Select
            'label'     => "Water Meter",
            'type'      => 'select',
            'name'      => 'meter_id', // the db column for the foreign key
            'entity'    => 'WaterMeter',
            'model'     => "App\Models\WaterMeter", // related model
            'attribute' => 'meter_number', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::column([  // Select
            'label'     => "Reading Date",
            'type'      => 'date',
            'name'      => 'reading_date', // the db column for the foreign key
        ]);

        CRUD::column([  // Select
            'label'     => "Previous Reading",
            'type'      => 'number',
            'name'      => 'previous_reading', // the db column for the foreign key
        ]);

        CRUD::column([  // Select
            'label'     => "Current Reading",
            'type'      => 'number',
            'name'      => 'current_reading', // the db column for the foreign key
        ]);
        CRUD::column([  // Select
            'label'     => "Water Usage",
            'type'      => 'number',
            'name'      => 'water_usage', // the db column for the foreign key
        ]);
    }

    protected function setupShowOperation()
    {
        CRUD::column([  // Select
            'label'     => "Water Meter",
            'type'      => 'select',
            'name'      => 'meter_id', // the db column for the foreign key
            'entity'    => 'WaterMeter',
            'model'     => "App\Models\WaterMeter", // related model
            'attribute' => 'meter_number', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::column([  // Select
            'label'     => "Reading Date",
            'type'      => 'date',
            'name'      => 'reading_date', // the db column for the foreign key
        ]);

        CRUD::column([  // Select
            'label'     => "Previous Reading",
            'type'      => 'number',
            'name'      => 'previous_reading', // the db column for the foreign key
        ]);

        CRUD::column([  // Select
            'label'     => "Current Reading",
            'type'      => 'number',
            'name'      => 'current_reading', // the db column for the foreign key
        ]);
        CRUD::column([  // Select
            'label'     => "Water Usage",
            'type'      => 'number',
            'name'      => 'water_usage', // the db column for the foreign key
        ]);
        CRUD::column([
            'label' => 'Created',
            'name' => 'created_at',
            'type' => 'date',
            'format' => 'D MMM YYYY, HH:mm'
        ]);
        CRUD::column([
            'label' => 'Updated',
            'name' => 'updated_at',
            'type' => 'date',
            'format' => 'D MMM YYYY, HH:mm'
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(MonthlyReadingRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field([  // Select
            'label'     => "Water Meter",
            'type'      => 'select',
            'name'      => 'meter_id', // the db column for the foreign key
            'entity'    => 'WaterMeter',
            'model'     => "App\Models\WaterMeter", // related model
            'attribute' => 'meter_number', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::field([  // Select
            'label'     => "Previous Reading",
            'type'      => 'number',
            'name'      => 'previous_reading', // the db column for the foreign key
        ]);

        CRUD::field([  // Select
            'label'     => "Current Reading",
            'type'      => 'number',
            'name'      => 'current_reading', // the db column for the foreign key
        ]);
        CRUD::field([  // Select
            'label'     => "Water Usage",
            'type'      => 'number',
            'name'      => 'water_usage', // the db column for the foreign key
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
