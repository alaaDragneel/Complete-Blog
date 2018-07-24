<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingsController extends Controller
{
    protected $createdData = [
        'site_name' => 'Complete Blog',
        'contact_number' => '01096901954',
        'contact_email' => 'moaalaa16@gmail.com',
        'address' => 'Imbaba, Giza, Cairo',
        'about' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab itaque eius recusandae veniam dolor vero, optio impedit, ipsum ipsa unde illum omnis maxime assumenda accusantium alias hic. Autem, dignissimos repudiandae!',
    ];

    protected $searchBy = ['id' => 1];

    public function __construct() {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.settings.index', ['setting' => Setting::firstOrCreate($this->searchBy, $this->createdData)]);
    }

    public function update()
    {
        $validated = request()->validate([
            'site_name'         => 'required',
            'contact_email'     => 'required|email',
            'contact_number'    => 'required|numeric',
            'address'           => 'required',
            'about'             => 'required',
        ]);
        
        Setting::updateOrCreate($this->searchBy, $validated);

        cache()->forget(Setting::CACHE_KEY);

        flash('Settings Updated Successfully')->success()->important();
            
        return redirect()->route('admin.settings.index');
    }
}
