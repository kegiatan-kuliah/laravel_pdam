{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Customers" icon="la la-user" :link="backpack_url('customer')" />
<x-backpack::menu-item title="Water meters" icon="la la-tachometer-alt" :link="backpack_url('water-meter')" />
<x-backpack::menu-item title="Monthly readings" icon="la la-clipboard" :link="backpack_url('monthly-reading')" />
<x-backpack::menu-item title="Bills" icon="la la-handshake" :link="backpack_url('bill')" />