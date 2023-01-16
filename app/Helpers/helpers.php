<?php

use Illuminate\Support\Facades\Auth;

function permission_check($permission){
    if(!Auth::user()->hasPermissionTo($permission)){
        flash()->addWarning('you are not authorized for this page');
        return redirect()->back();
    }
}
