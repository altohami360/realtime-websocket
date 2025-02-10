<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
            <span id="notification-count"></span>
        </h2>
    </x-slot>
    <div class="pt-12 px-4 flex flex-row gap-3">
        <div class="w-full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-bold mb-2">Online Users (<span id="admin-online-users-count"
                                                                           class="text-md">0</span>)</h3>
                    <ul class="list-disc pl-4 text-green-600" id="admin-online-users">
                        <li>Mohammed altohami</li>
                        <li>lorem ipsum</li>
                        <li>lorem ipsum</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="w-full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        <h3 class="text-xl mb-2 ">
                            New Users Registered
                            (<span id="admin-new-users-count">0</span>)
                        </h3>
                        <form action="{{ route('admin.notifications.clear') }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-blue-500 underline hover:text-blue-800 text-md">clear
                                all
                            </button>
                        </form>
                    </div>
                    <ul class="list-disc pl-4" id="admin-new-users">
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @vite(['resources/js/adminNewUserRegistered.js'])
    @vite(['resources/js/adminOnlineUsers.js'])

</x-app-layout>
