<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     // ตรวจสอบสิทธิ์เข้าถึง: เฉพาะ admin เท่านั้นที่สามารถเข้าถึงได้
    //     $this->middleware('role:admin');
    // }

    public function index()
    {
        // ดึงรายชื่อผู้ใช้ทั้งหมด
        $users = User::join('roles', 'roles.id', '=', 'users.role_id')
        ->select('users.*', 'roles.name as role_name')
        ->get();
        $roles = DB::table('roles')->get();
        return view('admin.users.index', compact('users','roles'));
    }

    public function store(Request $request)
    {
        try {
            // Validation สำหรับข้อมูลที่ส่งเข้ามา
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:8',
                'role_id' => 'required',
            ]);

            // สร้างผู้ใช้ใหม่
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role_id' => $request->role_id,
            ]);

            return redirect()->back()->with('status', 'success')->with('message', 'User created successfully.');
        } catch (\Exception $e) {
            Log::error('User Creation Failed: ' . $e->getMessage());
            return redirect()->back()->with('status', 'error')->with('message', 'Creation failed: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // ดึงข้อมูลผู้ใช้จากฐานข้อมูล
            $user = User::findOrFail($id);

            // Validation ข้อมูล
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $id,
                'role_id' => 'required',
            ]);

            DB::beginTransaction();

            // อัปเดตข้อมูลผู้ใช้
            $user->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'role_id' => $validatedData['role_id'],
            ]);

            DB::commit();
            return redirect()->back()->with('status', 'success')->with('message', 'User updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Update User Failed: ' . $e->getMessage());
            return redirect()->back()->with('status', 'error')->with('message', 'Update failed: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            // ลบผู้ใช้
            $user = User::findOrFail($id);
            $user->delete();

            DB::commit();
            return redirect()->back()->with('status', 'success')->with('message', 'User deleted successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Delete User Failed: ' . $e->getMessage());
            return redirect()->back()->with('status', 'error')->with('message', 'Delete failed: ' . $e->getMessage());
        }
    }
}
