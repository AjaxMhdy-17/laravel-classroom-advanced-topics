<?php

namespace App\Http\Controllers;

use App\Models\ScheduledClass;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create()
    {
        $scheduledClasses = ScheduledClass::upcoming()
        ->with(['classType', 'teacher'])
        ->notBooked('student',function($query){ 
            $query->where('user_id' , auth()->user()->id);
        })
        ->oldest()->get();
        return view('student.book', [
            'scheduledClasses' => $scheduledClasses
        ]);
    }

    public function store(Request $request)
    {
        auth()->user()->booking()->syncWithoutDetaching($request->book_id);
        return redirect()->route('booking.index');
    }

    public function index(Request $request)
    {
        $bookings = auth()->user()->booking()->upcoming()->with('classType')->get();
        return view('student.upcoming', [
            'bookings' => $bookings
        ]);
    }



    public function destroy(string $id)
    {

        auth()->user()->booking()->detach($id);
        return back();
    }
}
