{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('home') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('users') }}"><i class="nav-icon la la-users"></i> Users</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('location') }}"><i class="nav-icon la la-street-view"></i> Location</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('destinations') }}"><i class="nav-icon la la-shipping-fast"></i> Destinations</a></li>
{{-- <li class="nav-item"><a class="nav-link" href="{{ backpack_url('events') }}"><i class="nav-icon la la-untappd"></i> Events</a></li> --}}
