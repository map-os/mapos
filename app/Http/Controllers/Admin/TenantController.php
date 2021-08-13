<?php

namespace App\Http\Controllers\Admin;

use App\Models\Login;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TenantController extends Controller
{

    public function selectTenant(Request $request)
    {
        $tenants = Login::where('user_id', '=', auth()->user()->id)->get();

        if($tenants->count() == 1){
            session()->put('tenant_id', $tenants->first()->tenant_id);
            return redirect()->route('admin.dashboard.index');
        }
    }
}
