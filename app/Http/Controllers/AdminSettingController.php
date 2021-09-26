<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingAddRequest;
use App\Models\Setting;
use App\Traits\StorageDeleteModelTrail;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Support\Facades\Log;
use App\Traits\StorageDeleteModelTrait;

class AdminSettingController extends Controller
{
    private $setting;
    use StorageDeleteModelTrail;

    public function __construct( Setting $setting)
    {
        $this->setting = $setting;
    }
    public function index(){
        $settings = $this ->setting->latest()->paginate(5);
        return view('admin.setting.index',compact('settings'));
    }

    public function create(){
        return view('admin.setting.add');
    }
    public function store(SettingAddRequest $requets){
        $this->setting->create([
            'config_key'=>$requets->config_key,
            'config_value'=>$requets->config_value,
            'type'=>$requets->type,

        ]);
        return redirect()->route('setting.index');
    }
    public function edit($id){
        $settings = $this ->setting->find($id);
        return view('admin.setting.edit',compact('settings'));
    }
    public function update($id, Request $request){
        $this->setting->find($id)->update([
            'config_key'=>$request->config_key,
            'config_value'=>$request->config_value,

        ]);
        return redirect()->route('setting.index');
    }

    public function delete($id){
        return $this->deleteTrait($id, $this->setting);
    }
}
