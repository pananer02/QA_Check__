<x-app-layout>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-800">
            พื้นที่ Chiller
            <p class="font-bold text-gray-800 inline">{{ $Part }}</p>
        </h2>

        <button type="button" onclick="openAuthenticationModal()"
            class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-dark dark:hover:bg-gray-700 me-2 mb-2">
            <svg class="w-[24px] h-[24px] text-gray-800 dark:text-dark w-6 h-5 me-2 -ms-1" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            สร้างพื้นที่ Chiller
        </button>
    </div>
    <ul id="sortable" class="list-group border-0 shadow-sm">
        @foreach ($Areas as $area)
            <li class="list-group-item border-0 shadow-sm" data-id="{{ $area->id }}">
                <div class="flex border-0 shadow-sm">
                    <span
                        class="drag-handle inline-flex items-center px-3 text-sm text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-md">
                        <svg class="w-[18px] h-[18px] text-gray-800 dark:text-black" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 20V7m0 13-4-4m4 4 4-4m4-12v13m0-13 4 4m-4-4-4 4" />
                        </svg>
                    </span>
                    <a href="{{ route('Areas.index', ['id' => $area->id]) }}"
                        class="rounded-none bg-gray-50 border text-left border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5">
                        {{ $area->detail }}
                    </a>
                    <!-- ปุ่มแก้ไข -->
                    <button class="inline-flex items-center bg-gray-100 border border-gray-300 px-3"
                        onclick="openEditPartModal({ id: {{ $area->id }}, detail: '{{ $area->detail }}' })">
                        <svg class="w-[24px] h-[24px] text-green-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M14 4.182A4.136 4.136 0 0 1 16.9 3c1.087 0 2.13.425 2.899 1.182A4.01 4.01 0 0 1 21 7.037c0 1.068-.43 2.092-1.194 2.849L18.5 11.214l-5.8-5.71 1.287-1.31.012-.012Zm-2.717 2.763L6.186 12.13l2.175 2.141 5.063-5.218-2.141-2.108Zm-6.25 6.886-1.98 5.849a.992.992 0 0 0 .245 1.026 1.03 1.03 0 0 0 1.043.242L10.282 19l-5.25-5.168Zm6.954 4.01 5.096-5.186-2.218-2.183-5.063 5.218 2.185 2.15Z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <!-- ปุ่มลบ -->
                    <form action="{{ route('Part.destroy', $area->id) }}" method="POST"
                        id="delete-form-{{ $area->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="openDeleteModal({{ $area->id }}, '{{ $area->detail }}')"
                            class="inline-flex items-center text-red-500 bg-gray-100 border border-gray-300 rounded-md px-3 py-2 hover:text-red-600">
                            <svg class="w-6 h-6 text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
    <div id="authentication" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <div class="flex items-center justify-between p-2 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">เพิ่มพื้นที่ Chiller<p
                            class="font-bold text-gray-800 inline">{{ $Part }}</p>
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        onclick="closeAuthenticationModal()">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-2 md:p-2">
                    <form class="space-y-4" method="POST" action="{{ route('Areas.store') }}">
                        @csrf
                        <!-- Name -->
                        <div>
                            <label for="detail" class="block mb-2 text-sm font-medium text-gray-900">ชื่อพื้นที่
                                Chiller</label>
                            <input type="text" name="detail" id="detail"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ old('detail') }}" required autofocus />
                            <input hidden type="text" name="status" id="status" value="ใช้งาน">
                            <input hidden type="text" name="part_id" id="part_id" value="{{ $id }}">
                        </div>
                        <br>
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            เพิ่ม
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // ฟังก์ชันเปิด Authentication Modal
        function openAuthenticationModal() {
            // แสดง modal
            document.getElementById('authentication').classList.remove('hidden');
        }

        // ฟังก์ชันปิด Authentication Modal
        function closeAuthenticationModal() {
            // ซ่อน modal
            document.getElementById('authentication').classList.add('hidden');
        }

        // ปิด modal เมื่อคลิกที่พื้นหลัง
        document.getElementById('authentication').addEventListener('click', function(event) {
            // ถ้าคลิกที่พื้นหลัง (overlay) ให้ปิด modal
            if (event.target === this) {
                closeAuthenticationModal();
            }
        });
    </script>
</x-app-layout>
