<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Event;
use App\models\Organisation;
use App\Models\Ticket;
use App\Models\Order;


class EventsController extends Controller
{

    /*
    maak een route en view wat hoort bij event aanmaken
    route 'events.create'
    view 'events.create'
    Eventscontroller -> create()

    */
    //verantwoordelijk voor het ophalen van alle events
    // en dit in een view doen
    public function index(){
        $events = Event::all();
        return view('events.index', [
            'events' => $events
        ]);
        // dd($events);
        // $event = Event::find(3);
        // $event = Event::where('title', '=', 'tyler')->get();
    }
    public function create(){
        $organisations = Organisation::all();
        return view('events.create', [
            'organisations' => $organisations
        ]);
    }
    public function store(Request $request){

        $request->validate([
            'title'             => 'required|max:255',
            'description'       => 'max:400',
            'start_date'        => 'required|date|after:today|before:end_date',
            'end_date'          => 'required|date|after:start_date',
            'amount_tickets'    => 'required|integer',
            'price_per_ticket'  => 'required|numeric',
            'city'              => 'required|max:255',
            'adres'             => 'required|max:255',
            'zipcode'           => 'required|max:20',
            'categorie'         => ''
        ]);
        
        Event::create($request->except('_token'));
        
        return redirect()->route('events.index')
        ->with('message', 'Event succesvol opgeslagen!');
    }

    public function show($id){
        //1 event ophalen uit de db op basis van $id
        // dat laten zien in een view 
        $event = Event::findOrFail($id);
        
        return view('events.show', [
            'event' => $event
        ]);
    }
    public function edit($id){
        $event = Event::findOrfail($id);
        $organisations = Organisation::all();
        

        return view('events.edit', [
            'event' => $event,
            'organisations' => $organisations
            
        ]);
    }
    public function destroy($id){
        Event::destroy($id);
        return back();
    }
    public function update(Request $request, $id){
        $event = Event::find($id);
        $event->update($request->all());
        return back()->with('message', 'event succesvol aangepast');
    }

    public function order($id){
        $event = Event::findOrFail($id);
        return view('events.order', [
            'event' => $event
        ]);
    }
    public function storeOrder(Request $request, $id) {
        $event = Event::findOrFail($id);
        $amountTicketsAvailable = $event->amount_tickets - $event->tickets()->count();

        // valideren 
        if($request->amount_tickets > $amountTicketsAvailable){
            return back()->with('message', 'er zijn niet voldoende tickets');
        }

        // order opslaan in database
        $order = Order::create([
            'customer_id'    => \Auth::user()->id,
            'status'         => 'Paid',
            'payment_method' => $request->payment_method
        ]);

        // tickets opslaan in database
        for ($i = 0; $i < $request->amount_tickets; $i++) {
            Ticket::create([
                'order_id' => $order->id,
                'event_id' => $id, // data uit url meegekregen
            ]);
    
        }

        // view returnen ('bedankt voor uw bestelling')
        return view('orders.confirmOrder', [
            'order' => $order
        ]);
    }


}
