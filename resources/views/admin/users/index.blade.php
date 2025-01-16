<x-app-layout>
    @if (auth()->user() && auth()->user()->role_id == 1)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="container mx-auto p-4">
                        <!-- Flexbox for alignment -->
                        <div class="flex justify-end mb-4">
                            {{-- <x-secondary-button class="me-3">
                            {{ __('เพิ่ม User') }}
                        </x-secondary-button> --}}
                            <x-button type="button" onclick="openAuthenticationModal()">
                                {{ __('เพิ่ม User') }}
                            </x-button>
                            {{-- <button type="button" data-modal-target="authentication-modal"
                            data-modal-toggle="authentication-modal"
                            class="text-white bg-[#050708] hover:bg-[#050708]/90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#050708]/50 dark:hover:bg-[#050708]/30 me-2 mb-2">
                            เพิ่ม User
                        </button> --}}
                        </div>
                        <div class="overflow-x-auto">
                            <table id="example" class="dataTable table-auto min-w-full text-sm text-black">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role_name }}</td>
                                            <td class="text-right">
                                                <!-- ปุ่มแก้ไข -->
                                                <div class="flex justify-end ml-auto">
                                                    <button class="mr-3"
                                                        onclick="openEditUserModal({ id: {{ $user->id }}, name: '{{ $user->name }}', email: '{{ $user->email }}', role: '{{ $user->role_id }}' })">
                                                        <svg class="w-6 h-6 text-gray-800 dark:text-green-600"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" fill="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path fill-rule="evenodd"
                                                                d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </button>

                                                    <form action="{{ route('UsersManage.destroy', $user->id) }}"
                                                        method="POST" class="inline-block"
                                                        id="delete-form-{{ $user->id }}" onsubmit="return false;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="text-red-500 hover:underline"
                                                            onclick="openDeleteModal({{ $user->id }})">
                                                            <svg class="w-6 h-6 text-red-500 hover:text-red-600"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                width="24" height="24" fill="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd"
                                                                    d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>

<!-- modal create -->
<div id="authentication" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">Register Account</h3>
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
            <div class="p-4 md:p-2">
                <form class="space-y-4" method="POST" action="{{ route('UsersManage.store') }}">
                    @csrf
                    <!-- Name -->
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Your Full Name" value="{{ old('name') }}" required autofocus />
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="name@company.com" value="{{ old('email') }}" required />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password" id="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="password" required />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirm
                            Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Re-enter your password" required />
                    </div>

                    <!-- Role Selection -->
                    <div>
                        <label for="edit-role" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                        <select id="edit-role" name="role_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Register Account
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal แก้ไขข้อมูล -->
<div id="edit-user-modal" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">Edit User</h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    onclick="closeEditUserModal()">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5">
                <form id="edit-user-form" class="space-y-4" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="edit-name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                        <input type="text" name="name" id="edit-name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Enter name" required />
                    </div>
                    <div>
                        <label for="edit-email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" name="email" id="edit-email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Enter email" required />
                    </div>
                    <div>
                        <label for="edit-role" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                        <select id="edit-role" name="role_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" @if (old('role_id', $user->role_id) == $role->id) selected @endif>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Save
                        Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Modal Delete -->
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
        <div class="p-4 md:p-5 text-center">
            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">คุณต้องลบ user?</h3>
            <div class="flex justify-center space-x-4">
                <button type="button"
                    class="text-white bg-red-600 hover:bg-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center"
                    onclick="confirmDelete()">
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
    function openEditUserModal(user) {
        // Set form action to the appropriate URL
        const form = document.getElementById('edit-user-form');
        form.action = `{{ url('UsersManage') }}/${user.id}`;

        // Fill in the form with the user's data
        document.getElementById('edit-name').value = user.name;
        document.getElementById('edit-email').value = user.email;
        document.getElementById('edit-role').value = user.role;

        // Display the modal
        document.getElementById('edit-user-modal').classList.remove('hidden');
    }

    function closeEditUserModal() {
        // Hide the modal
        document.getElementById('edit-user-modal').classList.add('hidden');
    }

    // Optional: Close modal if clicked outside of the modal content
    document.getElementById('edit-user-modal').addEventListener('click', function(event) {
        if (event.target === this) {
            closeEditUserModal();
        }
    });
</script>

<script>
    // ฟังก์ชันเปิด Modal สำหรับการลบ
    function openDeleteModal(userId) {
        document.getElementById('popup-modal').classList.remove('hidden');
        // หากต้องการส่งข้อมูลเพิ่มเติม เช่น userId ไปยังฟอร์มการลบ
        document.getElementById('delete-form-' + userId).onsubmit = function() {
            // ทำการลบ user โดยการส่งฟอร์ม
            this.submit();
        };
    }

    // ฟังก์ชันปิด Modal สำหรับการลบ
    function closeModal() {
        document.getElementById('popup-modal').classList.add('hidden');
    }

    // ฟังก์ชันยืนยันการลบ
    function confirmDelete() {
        document.getElementById('delete-form-' + {{ $user->id }}).submit();
    }
</script>
