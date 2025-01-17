<x-app-layout>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-800">ส่วนพื้นที่</h2>
        <button type="button" onclick="openAuthenticationModal()"
            class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-dark dark:hover:bg-gray-700 me-2 mb-2">
            <svg class="w-[24px] h-[24px] text-gray-800 dark:text-dark w-6 h-5 me-2 -ms-1" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            สร้างส่วนพื้นที่
        </button>
    </div>
    <ul id="sortable" class="list-group border-0 shadow-sm">
        @foreach ($Part as $part)
            <li class="list-group-item border-0 shadow-sm" data-id="{{ $part->id }}">
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
                    <a href="{{ route('Areas.show', ['Area' => $part->id]) }}"
                        class="rounded-none bg-gray-50 border text-left border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5">
                         {{ $part->detail }}
                     </a>
                    <!-- ปุ่มแก้ไข -->
                    <button class="inline-flex items-center bg-gray-100 border border-gray-300 px-3"
                        onclick="openEditPartModal({ id: {{ $part->id }}, detail: '{{ $part->detail }}' })">
                        <svg class="w-[24px] h-[24px] text-green-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M14 4.182A4.136 4.136 0 0 1 16.9 3c1.087 0 2.13.425 2.899 1.182A4.01 4.01 0 0 1 21 7.037c0 1.068-.43 2.092-1.194 2.849L18.5 11.214l-5.8-5.71 1.287-1.31.012-.012Zm-2.717 2.763L6.186 12.13l2.175 2.141 5.063-5.218-2.141-2.108Zm-6.25 6.886-1.98 5.849a.992.992 0 0 0 .245 1.026 1.03 1.03 0 0 0 1.043.242L10.282 19l-5.25-5.168Zm6.954 4.01 5.096-5.186-2.218-2.183-5.063 5.218 2.185 2.15Z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <!-- ปุ่มลบ -->
                    <form action="{{ route('Part.destroy', $part->id) }}" method="POST"
                        id="delete-form-{{ $part->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="openDeleteModal({{ $part->id }}, '{{ $part->detail }}')"
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
                    <h3 class="text-xl font-semibold text-gray-900">เพิ่มส่วนพื้นที่</h3>
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
                    <form class="space-y-4" method="POST" action="{{ route('Part.store') }}">
                        @csrf
                        <!-- Name -->
                        <div>
                            <label for="detail"
                                class="block mb-2 text-sm font-medium text-gray-900">ชื่อส่วนพื้นที่</label>
                            <input type="text" name="detail" id="detail"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ old('detail') }}" required autofocus />
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
    <!-- Modal สำหรับแก้ไข -->
    <div id="edit-Part-modal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <div class="flex items-center justify-between p-2 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">แก้ไขส่วนพื้นที่</h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        onclick="closeEditPartModal()">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-2 md:p-2">
                    <form id="edit-Part-form" class="space-y-4" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="edit-detail"
                                class="block mb-2 text-sm font-medium text-gray-900">ส่วนพื้นที่</label>
                            <input type="text" name="detail" id="edit-detail"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Enter name" required />
                        </div>
                        <br>
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">บันทึก</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="popup-modal" tabindex="-1"
        class="hidden fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50"
        onclick="closeModal()">
        <div class="relative p-4 w-full max-w-md max-h-full bg-white rounded-lg shadow dark:bg-gray-700"
            onclick="event.stopPropagation()">
            <button type="button"
                class="absolute top-3 right-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                onclick="closeModal()">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-2 md:p-2 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">คุณต้องลบ ส่วนพื้นที่?<p
                        class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400"><span id="delete-detail"
                            class="font-semibold"></span></p>
                    <div class="flex justify-center space-x-4">
                        <button type="button" id="confirm-delete-btn"
                            class="text-white bg-red-600 hover:bg-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            ใช่
                        </button>
                        <button type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700"
                            onclick="closeModal()">ไม่</button>
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
    <script>
        function openEditPartModal(part) {
            // Set form action to the appropriate URL
            const form = document.getElementById('edit-Part-form');
            form.action = `{{ url('Part') }}/${part.id}`;

            // Fill in the form with the user's data
            document.getElementById('edit-detail').value = part.detail;

            // Display the modal
            document.getElementById('edit-Part-modal').classList.remove('hidden');
        }

        function closeEditPartModal() {
            // Hide the modal
            document.getElementById('edit-Part-modal').classList.add('hidden');
        }

        // Optional: Close modal if clicked outside of the modal content
        document.getElementById('edit-Part-modal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeEditPartModal();
            }
        });
    </script>
    <script>
        // ฟังก์ชันเปิด Modal สำหรับการลบ
        function openDeleteModal(partId, partDetail) {
            // ตั้งค่าข้อมูลใน Modal
            document.getElementById('delete-detail').innerText = partDetail;

            // เปิดโมดัล
            document.getElementById('popup-modal').classList.remove('hidden');

            // ตั้งค่าฟังก์ชันในการส่งฟอร์มลบ
            document.getElementById('confirm-delete-btn').onclick = function() {
                // ส่งฟอร์มการลบ
                document.getElementById('delete-form-' + partId).submit();
            };
        }

        // ฟังก์ชันปิด Modal สำหรับการลบ
        function closeModal() {
            // ซ่อนโมดัล
            document.getElementById('popup-modal').classList.add('hidden');
        }
    </script>
    {{-- <script>
        function openDeleteModal(part) {
            // Set form action to the appropriate URL
            const form = document.getElementById('delete-Part-form');
            form.action = `{{ url('Part') }}/${part.id}`;

            // Fill in the form with the user's data
            document.getElementById('delete-detail').innerText = part.detail;

            // Display the modal
            document.getElementById('popup-modal').classList.remove('hidden');
        }

        function closeModal() {
            // Hide the modal
            document.getElementById('popup-modal').classList.add('hidden');
        }

        // Optional: Close modal if clicked outside of the modal content
        document.getElementById('popup-modal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeModal();
            }
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            $("#sortable").sortable({
                handle: ".drag-handle",
                update: function(event, ui) {
                    var sortedIDs = $("#sortable").sortable("toArray", {
                        attribute: "data-id"
                    });

                    $.ajax({
                        url: "{{ route('part.updateOrder') }}",
                        type: "POST",
                        data: {
                            order: sortedIDs,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            console.log(response);
                        }
                    });
                }
            });
        });
    </script>
</x-app-layout>
