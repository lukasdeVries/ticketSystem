<?php

namespace App\Http\Controllers;
use App\Models\Ticket;

use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function scan($ticket_id) {
        $ticket = Ticket::findOrFail($ticket_id);
        if ($ticket->scanned_at) {
            return 'Ticket already redeemed';
        } else {
            $ticket->scanned_at = now();
            $ticket->save();
        }
    }
}
