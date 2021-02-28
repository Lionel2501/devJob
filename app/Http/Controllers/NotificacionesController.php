<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        return 'desde notificaciones';
    }

    public function notificacion(Request $request)
    {
        //
        $notificaciones = auth()->user()->unreadNotifications;
        $oldNotifs = auth()->user()->notifications;

        auth()->user()->unreadNotifications->markAsRead();

        return view('notificaciones.index',
        compact('notificaciones', $notificaciones, 'oldNotifs', $oldNotifs));
    }
}
