<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Areas;
use App\Models\Part;
use Illuminate\Support\Facades\Log;

class AreaController extends Controller
{
    // ลบข้อมูล Part
    public function show($id)
    {
        $Areas = Areas::where('part_id', $id)
            ->orderBy('order')
            ->get(['detail', 'status']);

        $Part = Part::where('id', $id)
            ->pluck('detail')
            ->first();

        return view('check_line.mangemente.Areas.index', compact('Areas', 'id', 'Part'));
    }
    // ฟังก์ชันสำหรับอัปเดตลำดับ Area
    public function updateOrderArea(Request $request)
    {
        $order = $request->order; // รับข้อมูลที่ถูกลากมาใหม่

        foreach ($order as $index => $id) {
            Areas::where('id', $id)->update(['order' => $index + 1]); // อัปเดตลำดับในฐานข้อมูล
        }

        return response()->json(['success' => true]);
    }

    // ฟังก์ชันสำหรับสร้าง Area ใหม่
    public function store(Request $request)
    {
        try {
            $request->validate([
                'detail' => 'required|string|max:255',
                'part_id' => 'required',

            ]);

            Areas::create([
                'detail' => $request->detail,
                'status' => 'ใช้งาน',
                'part_id' => $request->part_id,
            ]);

            return redirect()->back()->with('status', 'success')->with('message', 'เพิ่มพื้นที่ Chiller สำเร็จ🥳🥳');
        } catch (\Exception $e) {
            Log::error('Area Creation Failed: ' . $e->getMessage());
            return redirect()->back()->with('status', 'error')->with('message', 'เพิ่มพื้นที่ Chiller ไม่สำเร็จ😢😢: ' . $e->getMessage());
        }
    }

    // ฟังก์ชันสำหรับอัปเดตข้อมูล Area
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'detail' => 'required|string|max:255',
                'status' => 'required|string',
                'part_id' => 'required',
            ]);

            $area = Areas::findOrFail($id);
            $area->update([
                'detail' => $request->detail,
                'status' => $request->status,
                'part_id' => $request->part_id,
            ]);

            return redirect()->back()->with('status', 'success')->with('message', 'อัพเดทพื้นที่ Chiller สำเร็จ🥳🥳');
        } catch (\Exception $e) {
            Log::error('Part Creation Failed: ' . $e->getMessage());
            return redirect()->back()->with('status', 'error')->with('message', 'อัพเดทพื้นที่ Chiller สำเร็จ😢😢: ' . $e->getMessage());
        }
    }

    // ฟังก์ชันสำหรับลบข้อมูล Area
    public function destroy($id)
    {
        try {
            $area = Areas::findOrFail($id);
            $area->delete();

            return redirect()->back()->with('status', 'success')->with('message', 'ลบพื้นที่ Chiller สำเร็จ🥳🥳');
        } catch (\Exception $e) {
            Log::error('Part Creation Failed: ' . $e->getMessage());
            return redirect()->back()->with('status', 'error')->with('message', 'ลบพื้นที่ Chiller สำเร็จ😢😢: ' . $e->getMessage());
        }
    }
}
