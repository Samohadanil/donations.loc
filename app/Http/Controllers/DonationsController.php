<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonationsRequest;
use App\Http\Resources\DeskResource;
use App\Models\Donations;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DonationsController extends Controller
{
    public function showpage() {
        // Все пожертвования
        $donation = Donations::orderBy('id','desc')->paginate(10);

        // Статистика
        $topDonationName = Donations::sumTopDonation()->name;
        $topDonationSum = Donations::sumTopDonation()->donation;
        $amount = Donations::sum('donation');
        $month = Donations::sumMonth();
        $day = Donations::sumDay();

        // график
        $donationChart = Donations::orderBy('created_at')->get()->groupBy(function($donations)
        {
                return Carbon::parse($donations->created_at)->format('d.m');
            });

        $chartArray = [];
        array_push($chartArray, ["Month", "Sum"]);
        foreach ($donationChart as $k => $chart) {
            foreach ($chart as $sum) {
                $s[] = $sum->donation;
            }
            array_push($chartArray, [$k, array_sum($s)]);
        }
        return view('general', [
            'donation' => $donation,
            'topDonationName' => $topDonationName,
            'topDonationSum' => $topDonationSum,
            'amount' => $amount,
            'month' => $month,
            'day' => $day,
            'chartArray' => $chartArray
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('donations');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\ $request
     * @return \Illuminate\Http\Response
     */
    public function store(DonationsRequest $request)
    {
        $amount = Donations::sum('donation');
        $topDonationName = Donations::sumTopDonation()->name;
        $topDonationSum = Donations::sumTopDonation()->donation;
        $month = Donations::sumMonth();
        $day = Donations::sumDay();

        //schedule
        $donationChart = Donations::orderBy('created_at')->get()->groupBy(function($donations)
        {
            return Carbon::parse($donations->created_at)->format('d.m');
        });

        $chartArray = [];
        array_push($chartArray, ["Month", "Sum"]);
        foreach ($donationChart as $k => $chart) {
            foreach ($chart as $sum) {
                $s[] = $sum->donation;
            }
            array_push($chartArray, [$k, array_sum($s)]);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'donation' => $request->donation,
            'msg' => $request->message,
            'date' => Carbon::now()->toDateTimeString(),
            'newAmount' => $amount,
            'topDonationName' => $topDonationName,
            'topDonationSum' => $topDonationSum,
            'month' => $month,
            'day' => $day,
            'chartArray' => $chartArray,
        ];

        event(new PusherEventController($data));
        return redirect()->back()->with('status', 'Add Donations!');
    }
}
