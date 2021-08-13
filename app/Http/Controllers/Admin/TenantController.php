<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{

    public function selectTenant(Request $request)
    {

        $logins = DB::table('logins')
                    ->where('user_id', '=', auth()->user()->id)
                    ->join('tenants', 'tenants.id', '=', 'logins.tenant_id')
                    ->select('logins.*', 'tenants.*')
                    ->get();

        if ($logins->count() == 1) {
            session()->put('tenant_id', $logins->first()->tenant_id);
            session()->put('tenant', $logins->first()->tenant->name);
            return redirect()->route('admin.dashboard.index');
        }

        return view('admin.tenants.select', ['logins' => $logins]);
    }

    public function setTenant(Request $request, $id)
    {
        $tenant = Tenant::findOrFail($id);

        session()->put('tenant_id', $id);
        session()->put('tenant', $tenant->name);
        return redirect()->route('admin.dashboard.index');
    }
}
