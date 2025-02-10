<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-3">
                    <div class="md:col-span-1">
                        <x-chat-messages/>
                    </div>
                    <div class="md:col-span-2">
                        <x-chat-box/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @vite(['resources/js/online.js'])
</x-app-layout>
