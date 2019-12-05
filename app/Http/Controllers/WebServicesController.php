<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Traits\RegisterTraits;
Use Exception;
Use Log;

class WebServicesController extends Controller
{
    use RegisterTraits;


}
