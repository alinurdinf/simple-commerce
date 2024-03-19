<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        if (Request()->ajax()) {
            $result = User::all();
            return DataTables::of($result)
                ->addColumn('action', function ($item) {
                    return '<button type="button" class="btn btn-success  rounded-pill btn-sm mx-2 mb-1 edit-user" data-toggle="modal" data-target="#editUser" data-id="' . $item->id . '"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-warning btn-sm rounded-pill" onclick="deleteUser(' . $item->id . ')"><i class="fa fa-trash"></i></button>';
                })
                ->editColumn('is_active', function ($item) {
                    $status = $item->is_active ? 'Aktif' : 'Tidak Aktif';
                    $badge = $item->is_active ? 'badge-success' : 'badge-danger';
                    return '<div class="badge ' . $badge . '">' . $status . '</div>';
                })
                ->rawColumns(['action', 'is_active'])
                ->make();
        }
        return view('user.index');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        try {
            DB::beginTransaction();
            $password = Str::random(12);
            if ($input['user_id'] == null) {
                $input['user_id'] = 0;
                Validator::make($input, [
                    'name' => ['required', 'string', 'max:255'],
                    'phone' => ['required', 'string', 'max:255', Rule::unique(User::class)],
                    'email' => [
                        'required',
                        'string',
                        'email',
                        'max:255',
                        Rule::unique(User::class),
                    ],
                ])->validate();

                $maildata = [
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'password' => $password,
                ];

                Mail::to($input['email'])->send(new \App\Mail\UserRegisterNotification($maildata));
            }

            User::updateOrCreate(
                ['id' => $input['user_id']],
                [
                    'name' => $input['name'],
                    'phone' => $input['phone'],
                    'email' => $input['email'],
                    'password' => Hash::make($password),
                    'is_active' => $input['is_active'] ?? true,
                ]
            );
            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'User has been created'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function edit($id)
    {
        $id = base64_decode($id);
        $user = User::find($id);
        return response()->json($user);
    }

    public function destroy($id)
    {
        $id = base64_decode($id);
        User::find($id)->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'User has been deleted'
        ]);
    }
}
