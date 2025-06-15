<?php

namespace App\Http\Controllers\Portal;

use App\Constants\ErrorType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserSkillRequest;
use App\Models\UserSkill;
use App\Services\UserSkillService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class UserSkillController extends Controller
{
    protected $skillService;
    protected $userId;

    public function __construct(UserSkillService $skillService)
    {
        $this->skillService = $skillService;
        $this->userId = Auth::check() ? Auth::id() : user_id();
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $skills = $this->skillService->list(Auth::id());
            $query = UserSkill::query();
            $query->where('user_id', $this->userId);

            if (isset($request->status)) {
                $query->where('status', $request->status);
            }
            if (!empty($request->search['value'])) {
                $search = $request->search['value'];
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('level', 'like', "%{$search}%");
                });
            }

            return DataTables::of($query->latest())
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    $checked = $row->status ? 'checked' : '';
                    $editUrl = route('skill.ajax.update');
                    // $editUrl = route('skills.update', $row->id);
                    return '
                        <div class="form-check form-switch">
                            <input class="form-check-input toggle-status" type="checkbox" data-action="' . $editUrl . '" data-data="' . $row . '" data-id="' . $row->id . '" ' . $checked . '>
                        </div>
                    ';
                })
                ->addColumn('created_at', function ($row) {
                    return timeAgo($row->created_at);
                })
                ->addColumn('action', function ($row) {
                    $editId = $row->id;
                    $deleteUrl = route('skills.destroy', $row->id);

                    return '
        <div class="dropdown dropstart">
            <a class="btn btn-icon btn-ghost btn-sm rounded-circle"
                href="#!"
                role="button"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false">
                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
            </a>

            <div class="dropdown-menu">
                <!-- Edit Button -->
                <a class="dropdown-item d-flex align-items-center edit-item" 
                    href="javascript:void(0)" 
                    data-id="' . $editId . '">
                    <i class="fa fa-edit me-2" aria-hidden="true"></i> Edit
                </a>

                <!-- Delete Button -->
                <a class="dropdown-item d-flex align-items-center text-danger delete-item" 
                    href="javascript:void(0)" 
                    data-title="Delete Skill"
                    data-content="Are you sure you want to delete this skill?"
                    data-action="' . $deleteUrl . '"
                    data-table-id="skillsTable">
                    <i class="fa fa-trash-o me-2" aria-hidden="true"></i> Delete
                </a>
            </div>
        </div>
    ';
                })
                ->rawColumns(['created_at', 'action', 'status'])
                ->make(true);
        }

        return view('portal.skills.index');
    }

    public function create()
    {
        return view('portal.skills.create');
    }

    public function store(StoreUserSkillRequest $request)
    {
        try {
            $data = $request->validated();
            $data['user_id'] = $this->userId;

            $this->skillService->create($data);

            // flash()->success('Skill created successfully!');
            return $this->successResponse("Skill created successfully!");
        } catch (Exception $e) {
            Log::error('Skill creation failed', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'request_data' => $request->all(),
            ]);

            // flash()->error('An error occurred while creating the skill. Please try again.');
            return $this->errorResponse("An error occurred while creating the skill. Please try again.", 'ERROR', Response::HTTP_UNPROCESSABLE_ENTITY, new \stdClass());
        }
    }

    public function edit(UserSkill $skill)
    {
        try {
            return $this->successResponse("Skill fetched successfully!", $skill);
        } catch (Exception $e) {
            Log::error('Skill fetch failed', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                // Removed 'request_data' because $request is not available here
            ]);

            return $this->errorResponse(
                "An error occurred while fetching the skill. Please try again.",
                'ERROR',
                Response::HTTP_UNPROCESSABLE_ENTITY,
                new \stdClass()
            );
        }
    }

    public function update(StoreUserSkillRequest $request, UserSkill $skill)
    {
        try {
            $data = $request->validated();
            $this->skillService->update($skill, $data);
            return $this->successResponse("Skill updated successfully!");
        } catch (Exception $e) {
            Log::error('Skill update failed', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'request_data' => $request->all(),
            ]);
            return $this->errorResponse("An error occurred while updating the skill. Please try again.", 'ERROR', Response::HTTP_UNPROCESSABLE_ENTITY, new \stdClass());
        }
    }

    public function destroy($id)
    {
        try {
            $skill = $this->skillService->find($id);
            if (!$skill) {
                return $this->errorResponse("Skill not found.","ERROR", Response::HTTP_NOT_FOUND);
            }

            $this->skillService->delete($skill);

            return $this->successResponse("Skill deleted successfully.", [], null);
        } catch (Exception $e) {
            // You can create a custom ExceptionHandler later if needed
            Log::error('Skill deletion failed', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'stack' => $e->getTraceAsString(), // optional for deeper debugging
            ]);

            return $this->errorResponse("Something went wrong while deleting the skill.", "ERROR", Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy1($id)
    {
        try {
            $skill = $this->skillService->find($id);

            if (!$skill) {
                return $this->errorResponse("Skill not found.", ErrorType::NOT_FOUND, Response::HTTP_NOT_FOUND);
            }

            $this->skillService->delete($skill);

            return $this->successResponse("Skill deleted successfully.");
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->errorResponse("Database error occurred.", ErrorType::DATABASE_ERROR, Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Throwable $e) {
            Log::error('Skill deletion failed', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
            return $this->errorResponse("Something went wrong while deleting the skill.", ErrorType::INTERNAL_SERVER_ERROR, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function createAndUpdate(Request $request)
    {
        $id = (!empty($request->id)) ? $request->id : null;
        $skill = $id ? UserSkill::findOrFail($id) : new UserSkill();
        return view('portal.skills.create-and-update', compact('skill')); //create-and-update
    }
    public function ajaxUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'     => 'required|exists:user_skills,id',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        // Step 2: Business Logic in Try-Catch
        try {
            $validated = $validator->validated();
            $skill = $this->skillService->find($validated['id']);
            $skill->status = $validated['status'];
            $skill->save();
            return $this->successResponse("Skill status updated successfully.");
        } catch (\Exception $e) {
            // Step 3: Log Error Details
            Log::error('Skill update failed', [
                'message'      => $e->getMessage(),
                'file'         => $e->getFile(),
                'line'         => $e->getLine(),
                'request_data' => $request->all(),
            ]);

            return response()->json([
                'message' => 'An error occurred while updating skill status.',
            ], 500);
        }
    }
}
