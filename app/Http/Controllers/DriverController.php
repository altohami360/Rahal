<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Http\Requests\StoreDriverRequest;
use App\Http\Requests\UpdateDriverRequest;
use App\Models\Car;
use App\Models\CarType;
use App\Models\Color;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\Service;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use function PHPUnit\Framework\isNull;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $drivers = Driver::with('gender')->withCount('trips')->when(request()->is_active, function ($query){
        //     request()->is_active == 'not' ? $value = 0 : $value = 1;
        //     return $query->where('is_active', $value);
        // })->get();
        // dd($drivers);

        return view('admin.drivers.index');
    }

    
    public function data()
    {
        $drivers = Driver::with('gender')->withCount('trips')->when(request()->is_active, function ($query){
            request()->is_active == 'not' ? $value = 0 : $value = 1;
            return $query->where('is_active', $value);
        })->get();

        // dd($drivers);

        return DataTables::of($drivers)
            ->addColumn('record_select', 'admin.drivers.data_table.record_select')
            ->addColumn('balance', 'admin.drivers.data_table.balance')
            ->addColumn('actions', 'admin.drivers.data_table.actions')
            ->addColumn('is_active', function (Driver $driver){
                return view('admin.drivers.data_table.is_active', compact('driver'));
            })
            ->addColumn('gender', fn(Driver $driver) => $driver->gender->gender)
            // ->addColumn('service', fn(Driver $driver) => $driver->service->service)
            ->rawColumns(['record_select','balance', 'actions', 'is_active'])
            ->toJson();

    }// end of data

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nationalities = Nationality::all();
        $services = Service::all();
        $cars = CarType::all();
        $genders = Gender::all();
        $colors = Color::all();
        return view('admin.drivers.create', compact('nationalities', 'services', 'cars', 'genders', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDriverRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDriverRequest $request)
    {

        //car
        $car = new Car();
        $car->car_type_id =                 $request->car_type_id;
        $car->model =                       $request->model;
        $car->plate_number =                $request->plate_number;
        $car->color_id =                    $request->color_id;
        $car->car_insurance_image =         $this->checkImageRequest($request->file('car_insurance_image'), 'cars/insurance');
        $car->car_image_front =             $this->checkImageRequest($request->file('car_image_front'), 'cars/front');
        $car->car_image_back =              $this->checkImageRequest($request->file('car_image_back'), 'cars/back');
        $car->car_image_right =             $this->checkImageRequest($request->file('car_image_right'), 'cars/right');
        $car->car_image_left =              $this->checkImageRequest($request->file('car_image_left'), 'cars/left');
        $car->save();
        
        $car_id = $car->id;

        $driver = new Driver();
        $driver->name =                      $request->name;
        $driver->personal_ID =               $request->personal_ID;
        $driver->phone =                     $request->phone;
        $driver->email =                     $request->email;
        $driver->gender_id =                 $request->gender_id;
        $driver->birthday =                  $request->birthday;
        $driver->nationality_id =            $request->nationality_id;
        $driver->service_id =                $request->service_id;
        $driver->car_id =                    $car_id;
        $driver->image =                     $this->checkImageRequest($request->file('image'), 'drivers/driver');
        $driver->identification_card_image = $this->checkImageRequest($request->file('identification_card_image'), 'drivers/card');

        $driver->save();

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('drivers.index');

    }

    public function checkImageRequest($request, $prefex=null)
    {
        
        if ($request) {
            $exe = $request->getClientOriginalExtension();
            $image_name = ($prefex==null) ? 
                                time() . '.' . $exe : 
                                $prefex .'/'. time() . '.' . $exe;

            // dd($image_name);
            move_uploaded_file($request, public_path('uploads/images/') . $image_name);
        } else {
            $image_name = $prefex .'/default.png';
        }
        return $image_name;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        $car = Car::findOrFail($driver->car_id);
        return view('admin.drivers.show', compact('driver', 'car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        $driver_car = Car::findOrFail($driver->car_id);
        $nationalities = Nationality::all();
        $services = Service::all();
        $cars = CarType::all();
        $genders = Gender::all();
        $colors = Color::all();

        return view('admin.drivers.edit', compact('driver', 'driver_car', 'nationalities', 'services', 'cars', 'genders', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDriverRequest  $request
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDriverRequest $request, Driver $driver)
    {
        // dd($driver->car_id);
        
        //car
        $car = Car::findOrFail($driver->car_id);

        $car->car_type_id =                 $request->car_type_id;
        $car->model =                       $request->model;
        $car->color_id =                    $request->color_id;
        $car->car_insurance_image =         $this->checkImageRequest($request->file('car_insurance_image'), 'cars/insurance');
        $car->car_image_front =             $this->checkImageRequest($request->file('car_image_front'), 'cars/front');
        $car->car_image_back =              $this->checkImageRequest($request->file('car_image_back'), 'cars/back');
        $car->car_image_right =             $this->checkImageRequest($request->file('car_image_right'), 'cars/right');
        $car->car_image_left =              $this->checkImageRequest($request->file('car_image_left'), 'cars/left');
        $car->update();
        
        $car_id = $car->id;

        // $driver = new Driver();
        $driver->name =                      $request->name;
        $driver->personal_ID =               $request->personal_ID;
        $driver->phone =                     $request->phone;
        $driver->email =                     $request->email;
        $driver->gender_id =                 $request->gender_id;
        $driver->birthday =                  $request->birthday;
        $driver->nationality_id =            $request->nationality_id;
        $driver->service_id =                $request->service_id;
        $driver->is_active =                 $request->is_active? true : false;
        $driver->car_id =                    $car_id;
        $driver->image =                     $this->checkImageRequest($request->file('image'), 'drivers/driver');
        $driver->identification_card_image = $this->checkImageRequest($request->file('identification_card_image'), 'drivers/card');

        $driver->update();

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('drivers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();
    }
}
