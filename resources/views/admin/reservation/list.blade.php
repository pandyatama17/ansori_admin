@extends('layouts.pagewrapper')
@section('page')
<link rel="stylesheet" href="{{ asset('app-assets/css/pages/app-sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('app-assets/css/pages/app-contacts.css') }}">

<div class="sidebar-left sidebar-fixed left ">
  <div class="sidebar" style="margin-left:-10px">
    <div class="sidebar-content">
      
      <div id="sidebar-list" class="sidebar-menu list-group position-relative animate fadeLeft delay-1 pt-0" >
        <div class="sidebar-list-padding app-sidebar sidenav" id="contact-sidenav">
          <ul class="contact-list display-grid">
            <li class="sidebar-title white-text">Filters</li>
            <li class="active first"><a href="all" class="text-sub sortReservations" id="adminReservationListTrigger"><i class="material-icons mr-2"> calendar_month </i> All Reservations</a></li>
            <li><a href="today" class="text-sub sortReservations"><i class="material-icons mr-2"> today </i> Today</a></li>
            <li><a href="tomorrow" class="text-sub sortReservations"><i class="material-icons mr-2"> event </i> Tomorrow</a></li>
            <li><a href="upcoming" class="text-sub sortReservations"><i class="material-icons mr-2"> date_range </i> Upcoming</a></li>
            <li><a href="history" class="text-sub sortReservations"><i class="material-icons mr-2"> event_available </i> History</a></li>
        </ul>
        </div>
      </div>
      <a href="#" data-target="contact-sidenav" class="sidenav-trigger hide-on-large-only pt-5 mt-5"><i class="material-icons">menu</i> <span class="white-text"> Filters</span></a>
    </div>
  </div>
</div>
@if ($agent->isMobile())
<div class="clearfix pt-5 mt-4"></div>
@endif

<div class="content-area content-right @if($agent->isMobile()) pt-5 mt-5 @endif" id="content-list" style="height: 10%">
    <div class="app-wrapper @if($agent->isMobile()) pt-5 mt-5 @endif">
        <div class="datatable-search">
            <i class="material-icons mr-2 search-icon">search</i>
            <input type="text" placeholder="Search Reservation Date, time, or type" class="app-filter" id="global_filter">
        </div>
        <div id="button-trigger" class="card card card-default scrollspy border-radius-6 fixed-width">
            <div class="card-content p-0" id="reservationsTable">
                <table id="data-table-contact" class="display">
                    <thead>
                        <tr>
                            <th class="all">Reservation Date</th>
                            <th class="all">Time</th>
                            <th>Desk/Room</th>
                            <th class="all">User</th>
                            <th>Checked in</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $res)
                            @php
                                $date = \Carbon\Carbon::parse($res->datetime_start)->format('Y-m-d');
                                $date_end = \Carbon\Carbon::parse($res->datetime_end)->format('Y-m-d');
                                $cTime = \Carbon\Carbon::now();
                                $time_start = \Carbon\Carbon::parse($res->datetime_start)->format('H:i');
                                $time_end = \Carbon\Carbon::parse($res->datetime_end)->format('H:i');
                                $desk = \App\Models\Desk::find($res->desk_id)
                            @endphp
                            <tr>
                                <td>{{ $date }} </td>
                                <td>{{ $time_start }} - {{ $time_end }}</td>
                                <td>
                                    @switch($desk->zone_id)
                                        @case(1)
                                            <b class="black-text" style="font-weight: 1000">Desk {{ $desk->desk_name }}</b>
                                            @break
                                        @case(2)
                                            <b class="black-text" style="font-weight: 1000">Room {{ $desk->desk_name }}</b>
                                            @break
                                        @default                               
                                    @endswitch
                                </td>
                                <td class="">{{$res->user}}</td>                                
                                <td>
                                    @if ($res->start_time)
                                        {{ $res->start_time }}
                                    @else
                                        @if ($cTime->gt($date_end) || (!$res->start_time && \Carbon\Carbon::parse($res->datetime_start)->isSameDay($cTime)))
                                            @if (!$res->start_time)
                                                <a href="{{ route('check_in',$res->id) }}" class="waves-effect green-text checkInBtn" 
                                                    id="res-{{ $res->id }}"
                                                    data-desk="{{ $desk->desk_name }}"
                                                    data-date="{{ $date }}"
                                                    data-time="{{ $time_start }}"
                                                >
                                                    <i class="green-text material-icons left">assignment_turned_in</i> | Check In
                                                </a>
                                            @else
                                                <span class="badge red border-radius-6">Expired</span>
                                            @endif
                                        @else
                                            <span class="badge grey border-radius-6">not yet started</span>
                                            
                                        @endif
                                    @endif
                                    <br>
                                    <a href="{{route('adminDeleteReservation',$res->id)}}" class="waves-effect red-text deleteReservation" data-id={{$res->id}} data-desk="{{ $desk->desk_name }}" data-date="{{ $date }}" data-time="{{ $time_start }}" data-user="{{$res->user}}">
                                        <i class="material-icons left red-text">delete</i> | Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection