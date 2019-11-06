<?php

namespace App\Http\Controllers;

use App\Data;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDataRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Notification;
use App\Notifications\NewItem;
use App\Notifications\UpdatedItem;
use App\Notifications\HourlyReport;


class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Data::all();
        return view('home', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDataRequest $request)
    {
        $data = new Data();
        $data->title = $request->input('title');
        $data->description = $request->input('description');
        $data->save();

        $user = Auth::user();
        $details = [
            'greeting' => 'Hi '.Auth::user()->name,
            'body' => 'Yout Item '.$data->title.' has been created Successfully',
            'thanks' => 'Thank you for using HQRentalApp!',
            'actionText' => 'View Item',
            'actionURL' => url('/data/'.$data->id),
            'item_id' => $data->id
        ];

        Notification::send($user, new NewItem($details));

        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        return view('Data.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data)
    {
        return view('Data.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDataRequest $request, Data $data)
    {
        $data->fill($request->all());
        $data->save();

        $user = Auth::user();
        $details = [
            'greeting' => 'Hi '.Auth::user()->name,
            'body' => 'Yout Item '.$data->title.' has been updated Successfully',
            'thanks' => 'Thank you for using HQRentalApp!',
            'actionText' => 'View Item',
            'actionURL' => url('/data/'.$data->id),
            'item_id' => $data->id
        ];

        Notification::send($user, new UpdatedItem($details));

        return redirect()->route('data.show', compact('data')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data)
    {
        $data->delete();

        return redirect()->route('home')->with('status', 'Item update Successfully');
    }

    /**
     * method for send email notifications.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function sendNewItemNotification(Data $data)
    {
        $details = [
            'greeting' => 'Hi '.Auth::user()->name,
            'body' => 'This is a notification from HQRentalApp',
            'thanks' => 'Thank you for using HQRentalApp!',
            'actionText' => 'View My Site',
            'actionURL' => url('/data/'.$data),
            'order_id' => 101
        ];

        Notification::send($data, new NewItem($details));

        return redirect()->route('data.show',[$data])->with('status', 'Item update Successfully'); 
    }

    /**
     * method for send email notifications.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function sendUpdateItemNotification()
    {
        $user = Auth::user();
        $details = [
            'greeting' => 'Hi '.Auth::user()->name,
            'body' => 'This is a notification from HQRentalApp',
            'thanks' => 'Thank you for using HQRentalApp!',
            'actionText' => 'View My Site',
            'actionURL' => url('/'),
            'item_id' => 101
        ];

        Notification::send($user, new NewItem($details));

        // return redirect()->route('data.index',[$data->id])->with('status', 'Item update Successfully'); 
        return redirect()->route('home');

    }

    /**
     * method for email hourly notification schedule.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function hourlyReport()
    {
        $count = \DB::table('data')->where('created_at', '>=', \Carbon\Carbon::now()->subHour())->count();
        $user = Auth::user();
        $details = [
            'greeting' => 'Hi '.Auth::user()->name,
            'body' => 'in the last hour has been created '.$count.' Items Successfully',
            'thanks' => 'Thank you for using HQRentalApp!',
            'actionText' => 'View Items',
            'actionURL' => url('/data')
        ];
        Notification::send($user, new HourlyReport($details));

        // return redirect()->route('data.index',[$data->id])->with('status', 'Item update Successfully'); 
        return redirect()->route('home');

    }
}
