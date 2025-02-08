<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
            <span id="notification-count"></span>
        </h2>
    </x-slot>
    <div class="pt-12 flex flex-row">
        <div class="w-full sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-bold mb-2">Online Users (<span class="text-md">0</span>)</h3>
                    <ul class="list-disc pl-4 text-green-600" id="admin-online-users">
                        <li>Mohammed altohami</li>
                        <li>lorem ipsum</li>
                        <li>lorem ipsum</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="w-full sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-bold mb-2">New Users Registered (<span class="text-md">0</span>)
                    </h3>
                    <ul class="list-disc pl-4" id="admin-new-users">
                        <li>Mohammed altohami</li>
                        <li>lorem ipsum</li>
                        <li>lorem ipsum</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @vite(['resources/js/websocket.js'])

    <script>
        

    </script>

</x-app-layout>
