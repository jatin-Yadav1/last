<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\UserEducation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class UserEducationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $educations = UserEducation::where('user_id', Auth::id());

            return DataTables::of($educations)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    return $row->status ? 'Active' : 'Inactive';
                })
                // ->addColumn('updated_at', function ($row) {
                //     return timeAgo($row->updated_at);
                // })
                ->addColumn('created_at', function ($row) {
                    return timeAgo($row->created_at);
                })
                ->addColumn('action', function ($row) {
                    $editUrl = route('educations.edit', $row->id);
                    $deleteId = $row->id;

                    return '
                        <div class="dropdown ms-auto">
                            <a href="javascript:;" class="dropdown-toggle-nocaret more-options dropdown-toggle"
                               data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li> <a class="dropdown-item" href="' . $editUrl . '"><i class="bx bxs-edit"></i> Edit</a></li>
                                <li> <a class="dropdown-item btn-delete" href="javascript:;" data-id="' . $deleteId . '">  <i class="bx bx-trash"></i>  Delete</a></li>
                            </ul>
                        </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('portal.education.index');
    }

    public function create()
    {
        return view('portal.education.create');
    }
    public function edit($id)
    {
        $education = UserEducation::findOrFail($id);
        return view('portal.education.edit', compact('education'));
    }
}
