<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mx-auto p-4">

                    <!-- Flexbox for alignment -->
                    <div class="flex justify-start mb-4">
                        <label for="text" class="block mb-2 text-xl font-medium text-gray-900">บันทึกเอ็นซีพี / NCP
                            Report</label>
                    </div>

                    <form>
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <label for="text" class="block mb-2 text-sm font-medium text-gray-900">เลขที่เอ็นซีพี NPC:</label>
                                <input type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="text" class="block mb-2 text-sm font-medium text-gray-900">วัน/เดือน/ปี:</label>
                                <input type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <label for="text" class="block mb-2 text-sm font-medium text-gray-900">ชื่อสินค้า:</label>
                                <input type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="text" class="block mb-2 text-sm font-medium text-gray-900">รหัสสินค้า:</label>
                                <input type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <label for="text" class="block mb-2 text-sm font-medium text-gray-900">LOT (Sub Lot):</label>
                                <input type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="text" class="block mb-2 text-sm font-medium text-gray-900">จำนวนบกพร่อง:</label>
                                <input type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mt-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900">สถานะ:</label>
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center">
                                    <input id="check1" type="checkbox" value="ตรวจเมื่อ"
                                        class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                    <label for="check1" class="ml-2 text-sm font-medium text-gray-900">ตรวจเมื่อ</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="check2" type="checkbox" value="รับมอบ"
                                        class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                    <label for="check2" class="ml-2 text-sm font-medium text-gray-900">รับมอบ</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="check3" type="checkbox" value="ขณะเก็บรักษา"
                                        class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                    <label for="check3" class="ml-2 text-sm font-medium text-gray-900">ขณะเก็บรักษา</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="check4" type="checkbox" value="ส่งมอบ"
                                        class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                    <label for="check4" class="ml-2 text-sm font-medium text-gray-900">ส่งมอบ</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-12">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">หน่วยงานผู้รับผิดชอบ:</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <br>
                        <div class="col-12">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">รายละเอียดข้อบกพร่อง:</label>
                            <textarea rows="4"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>
                        </div>
                        <br>
                        <div class="col-12">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">ผู้ตรวจพบ:</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="col-12 col-lg-6 mt-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900">การดำเนินการ ฝ่ายประกันคุณภาพ:</label>
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center">
                                    <input id="check1" type="checkbox" value="ไม่ยอมรับ"
                                        class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                    <label for="check1" class="ml-2 text-sm font-medium text-gray-900">ไม่ยอมรับ</label>
                                </div>
  
                                <div class="flex items-center">
                                    <input id="check2" type="checkbox" value="กักของ"
                                        class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                    <label for="check2" class="ml-2 text-sm font-medium text-gray-900">กักของ</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="check3" type="checkbox" value="รอดำเนินการแก้ไข"
                                        class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                    <label for="check3" class="ml-2 text-sm font-medium text-gray-900">รอดำเนินการแก้ไข</label>
                                </div>

                            </div>
                        </div>
                        <br>
                    </form>


                </div>
            </div>
        </div>

</x-app-layout>
