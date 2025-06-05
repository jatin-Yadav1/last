<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\SocialLink;

class ResumeController extends Controller
{
    public function download()
    {
        $socialLinks = SocialLink::where('user_id', user_id())->get();

        $pdf = Pdf::loadView('home.resume.pdf', compact('socialLinks'));
        $pdf->setPaper('A4', 'portrait');
	    $pdf->render();
        // return $pdf->download('cv-erprakash.pdf');
        // View in browser instead of download
        return $pdf->stream('cv-erprakash.pdf');

        // return view('home.resume.pdf', compact('socialLinks'));
    }
}
