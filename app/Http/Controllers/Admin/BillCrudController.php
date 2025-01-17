<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BillRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class BillCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class BillCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Bill::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/bill');
        CRUD::setEntityNameStrings('bill', 'bills');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column([
            'label' => 'Bill Date',
            'name' => 'bill_date',
            'type' => 'date'
        ]);

        CRUD::column([
            'label' => 'Due Date',
            'name' => 'due_date',
            'type' => 'date'
        ]);
        
        CRUD::column([
            'label' => 'Total Amount',
            'name' => 'total_amount',
            'type' => 'number'
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

        CRUD::column([  // Select
            'label'     => "Reading",
            'type'      => 'select',
            'name'      => 'reading_id', // the db column for the foreign key
            'entity'    => 'MonthlyReading',
            'model'     => "App\Models\MonthlyReading", // related model
            'attribute' => 'reading_date', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::column([   // select_from_array
            'name'        => 'status',
            'label'       => 'Status',
            'type'        => 'select_from_array',
            'options'     => ['unpaid' => 'Unpaid', 'paid' => 'Paid','overdue' => 'OverDue'],
            'allows_null' => false,
            'default'     => 'one',
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
        CRUD::setValidation(BillRequest::class);
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

        CRUD::field([
            'label' => 'Total Amount',
            'name' => 'total_amount',
            'type' => 'number'
        ]);

        CRUD::field([  // Select
            'label'     => "Reading",
            'type'      => 'select',
            'name'      => 'reading_id', // the db column for the foreign key
            'entity'    => 'MonthlyReading',
            'model'     => "App\Models\MonthlyReading", // related model
            'attribute' => 'reading_date', // foreign key attribute that is shown to user
            'options'   => (function ($query) {
                 return $query->orderBy('id', 'Desc')->get();
             })
        ]);

        CRUD::field([   // select_from_array
            'name'        => 'status',
            'label'       => 'Status',
            'type'        => 'select_from_array',
            'options'     => ['unpaid' => 'Unpaid', 'paid' => 'Paid','overdue' => 'OverDue'],
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
