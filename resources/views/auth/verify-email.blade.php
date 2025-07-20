<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-200">
            {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
            </div>
        @endif

        <div class="mt-4 flex flex-col space-y-6">
    <!-- Top Section: Resend Verification -->
    <div class="flex justify-center">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-button type="submit" class="px-6 py-2 text-lg">
                {{ __('Resend Verification') }}
            </x-button>
        </form>
    </div>

    <!-- Bottom Section: Logout on the Left, Profile on the Right -->
    <div class="flex justify-between items-center">
        <!-- Logout Button (Left) -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-button title="Logout" type="submit" class="inline-flex items-center px-6 py-2 text-lg text-gray-50 font-semibold bg-red-800 hover:bg-red-700">
                Logout
            </x-button>
        </form>

        <!-- Profile Button (Right) -->
        <a href="{{ route('profile.show') }}" title="Profile">
            <x-button title="Profile" class="inline-flex items-center px-6 py-2 text-lg text-gray-600 font-semibold bg-blue-200 hover:bg-blue-100">
                Profile
            </x-button>
        </a>
    </div>
</div>


    </x-authentication-card>
</x-guest-layout>
