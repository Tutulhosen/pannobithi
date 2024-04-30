<x-user.layout>
    <x-user.home.hero :hero="$hero" />
    <x-user.home.feature />
    {{-- <x-user.home.flashsale /> --}}
    <x-user.home.recentlyadded :data="$data" />
</x-user.layout>
