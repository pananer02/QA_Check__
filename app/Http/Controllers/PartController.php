<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Part;
use Illuminate\Support\Facades\Log;

class PartController extends Controller
{
    public function index()
    {
        $Part = Part::orderBy('order')->get(); // เรียงลำดับตาม order
        return view('check_line.mangemente.Part.index', compact('Part'));
    }

    // อัปเดตข้อมูล OrderPart
    public function updateOrderPart(Request $request)
    {
        try {
            $order = $request->order; // รับข้อมูลที่ถูกลากมาใหม่

            foreach ($order as $index => $id) {
                Part::where('id', $id)->update(['order' => $index + 1]); // อัปเดตลำดับในฐานข้อมูล
            }

            return response()->json(['success' => true, 'message' => 'Order updated successfully'], 200);
        } catch (\Exception $e) {
            Log::error('Order Update Failed: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Update failed'], 500);
        }
    }

    // สร้างข้อมูล Part
    public function store(Request $request)
    {
        try {
            $request->validate([
                'detail' => 'required|string|max:255',
            ]);

            // คำนวณ order ล่าสุด
            $maxOrder = Part::max('order');
            $newOrder = $maxOrder ? $maxOrder + 1 : 1;

            // สร้าง Part ใหม่
            Part::create([
                'detail' => $request->detail,
                'order' => $newOrder, // กำหนด order ใหม่
            ]);

            return redirect()->back()->with('status', 'success')->with('message', 'เพิ่มส่วนพื้นที่สำเร็จ🥳🥳');
        } catch (\Exception $e) {
            Log::error('Part Creation Failed: ' . $e->getMessage());
            return redirect()->back()->with('status', 'error')->with('message', 'เพิ่มส่วนพื้นที่ไม่สำเร็จ😢😢: ' . $e->getMessage());
        }
    }

    // อัปเดตข้อมูล Part
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'detail' => 'required|string|max:255',
            ]);

            $part = Part::findOrFail($id);
            $part->update([
                'detail' => $request->detail,
            ]);
            return redirect()->back()->with('status', 'success')->with('message', 'อัพเดทส่วนพื้นที่สำเร็จ🥳🥳');
        } catch (\Exception $e) {
            Log::error('Part Creation Failed: ' . $e->getMessage());
            return redirect()->back()->with('status', 'error')->with('message', 'อัพเดทพื้นที่ไม่สำเร็จ😢😢: ' . $e->getMessage());
        }
    }

    // ลบข้อมูล Part
    public function destroy($id)
    {
        try {
            $part = Part::findOrFail($id);
            $part->delete();

            return redirect()->back()->with('status', 'success')->with('message', 'ลบส่วนพื้นที่สำเร็จ🥳🥳');
        } catch (\Exception $e) {
            Log::error('Part Creation Failed: ' . $e->getMessage());
            return redirect()->back()->with('status', 'error')->with('message', 'ลบส่วนพื้นที่ไม่สำเร็จ😢😢: ' . $e->getMessage());
        }
    }
}
