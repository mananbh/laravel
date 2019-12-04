<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Traits\RegisterTraits;

class WebServicesController extends Controller
{
    //
    use RegisterTraits;

}
