<x-filament-panels::page>
    <x-filament::section icon="tabler-brand-instagram">
        <x-slot name="heading">
            {{ __('Feed integration') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Link the Instagram account used by the feed or renew its access token.') }}
        </x-slot>

        <form
            action="{{ route('admix.instagram.redirect') }}"
            target="_blank"
            rel="noopener noreferrer"
            method="get"
        >
            @csrf

            <x-filament::button
                color="gray"
                :icon="\Filament\Support\Icons\Heroicon::ArrowPath"
                tag="button"
                type="submit"
            >
                {{ __('Renew Instagram token') }}
            </x-filament::button>
        </form>
    </x-filament::section>
</x-filament-panels::page>
