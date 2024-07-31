<?php

namespace App\Http\Requests\Api;
use Illuminate\Support\Facades\Log;
use App\Models\Subjects;
use Illuminate\Support\Facades\Auth;



class ApiRequest {

  public function getSubjects() {
    

    //Log::info(Subjects->select('name')->where('id_stu', '=', '')->get());
    $user = Auth::guard('student')->check();
    return  $user;
  }
}