<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\WaterMeterRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class WaterMeterCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class WaterMeterCrudController extends CrudController
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
        CRUD::setModel(\App\Models\WaterMeter::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/water-meter');
        CRUD::setEntityNameStrings('water meter', 'water meters');
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
            'label'     => "Meter Number",
            'type'      => 'text',
            'name'      => 'meter_number', // the db column for the foreign key
        ]);

        CRUD::column([  // Select
            'label'     => "Installation Date",
            'type'      => 'date',
            'name'      => 'installation_date', // the db column for the foreign key
        ]);

        CRUD::column([  // Select
            'label'     => "Customer",
            'type'      => 'select',
            'name'      => 'customer_id', // the db column for the foreign key
            'entity'    => 'Customer',
            'model'     => "App\Models\Customer", // related model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::column([   // select_from_array
            'name'        => 'status',
            'label'       => 'Status',
            'type'        => 'select_from_array',
            'options'     => ['active' => 'Active', 'inactive' => 'InActive','maintenance' => 'Maintenance'],
            'allows_null' => false,
            'default'     => 'one',
        ]);
    }

    protected function setupShowOperation()
    {
        CRUD::column([  // Select
            'label'     => "Meter Number",
            'type'      => 'text',
            'name'      => 'meter_number', // the db column for the foreign key
        ]);

        CRUD::column([  // Select
            'label'     => "Installation Date",
            'type'      => 'date',
            'name'      => 'installation_date', // the db column for the foreign key
        ]);

        CRUD::column([  // Select
            'label'     => "Customer",
            'type'      => 'select',
            'name'      => 'customer_id', // the db column for the foreign key
            'entity'    => 'Customer',
            'model'     => "App\Models\Customer", // related model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::column([   // select_from_array
            'name'        => 'status',
            'label'       => 'Status',
            'type'        => 'select_from_array',
            'options'     => ['active' => 'Active', 'inactive' => 'InActive','maintenance' => 'Maintenance'],
            'allows_null' => false,
            'default'     => 'one',
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
        CRUD::setValidation(WaterMeterRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field([  // Select
            'label'     => "Customer",
            'type'      => 'select',
            'name'      => 'customer_id', // the db column for the foreign key
            'entity'    => 'Customer',
            'model'     => "App\Models\Customer", // related model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::field([   // select_from_array
            'name'        => 'status',
            'label'       => 'Status',
            'type'        => 'select_from_array',
            'options'     => ['active' => 'Active', 'inactive' => 'InActive','maintenance' => 'Maintenance'],
            'allows_null' => false,
            'default'     => 'one',
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
