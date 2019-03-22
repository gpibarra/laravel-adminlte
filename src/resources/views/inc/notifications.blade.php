<?php
if (config('laraveladminlte.view_notifications') && Route::has('notifications.show')) {
    $objUser = \Auth::user();
    $colNotifications = [];
    $intCantNotif = 0;
    //$intCantNotifTot = 0;
    if ($objUser) {
        if (method_exists($objUser,'unreadNotifications') && Schema::hasTable('notifications')) {
            $colNotifications=$objUser->unreadNotifications()->orderBy('created_at','DESC')->take(10)->get();
            $intCantNotif=$objUser->unreadNotifications()->count();
        }
        // if (method_exists($objUser,'notifications')) {
        //     $intCantNotifTot=$objUser->notifications()->count();
        // }
    }
}
?>
@if (config('laraveladminlte.view_notifications') && Route::has('notifications.show'))
    <li class="dropdown notifications-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <i class="fa fa-bell-o"></i>
          @if($intCantNotif > 0)
          <span class="label label-warning">{{ $intCantNotif }}</span>
          @endif
        </a>
        <ul class="dropdown-menu">
          @if($intCantNotif > 0)
          <li class="header"><strong>Tenes {{ $intCantNotif }} notificaciones pendientes!</strong></li>
          <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
              @foreach ($colNotifications as $notification)
              <li>
                <a target="_blank" href="{{ route('notifications.show',$notification->id)}}" title="{{ $notification->data['event'] }}">
                  <i class="fa fa-users text-aqua"></i>
                  {{ $notification->data['short_event'] }}
                </a>
              </li>
              @endforeach
            </ul>
          </li>
          @else
          <li class="header"><strong>Sin notificaciones pendientes!</strong></li>
          @endif
          @if($intCantNotif > 0)
          <li class="footer"><a target="_blank" href="{{ route('notifications.index') }}"><strong>Ver todas las NO leídas!</strong></a></li>
          @endif
          {{-- @if($intCantNotifTot > 0) --}}
          <li class="footer"><a target="_blank" href="{{ route('notifications.index') }}?type=all"><strong>Ver todas!</strong></a></li>
          {{-- @endif --}}
    
        </ul>
      </li>
@endif
