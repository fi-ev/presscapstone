<?php

use App\Models\User;
use Laravel\Jetstream\Http\Livewire\UpdateProfileInformationForm;
use Livewire\Livewire;

test('current profile information is available', function () {
    $this->actingAs($user = User::factory()->create());

    $component = Livewire::test(UpdateProfileInformationForm::class);

    expect($component->state['first_name'])->toEqual($user->);
    expect($component->state['last_name'])->toEqual($user->last_name);
    expect($component->state['email'])->toEqual($user->email);
    expect($component->state['mobile_no'])->toEqual($user->mobile_no);
});

test('profile information can be updated', function () {
    $this->actingAs($user = User::factory()->create());

    Livewire::test(UpdateProfileInformationForm::class)
        ->set('state', ['first_name' => 'Test', 'last_name' => 'Name', 'email' => 'test@example.com', 'mobile_no' => '09999999999'])
        ->call('updateProfileInformation');

    expect($user->fresh())
        ->first_name->toEqual('Test')
        ->last_name->toEqual('Name')
        ->email->toEqual('test@example.com')
        ->mobile_no->toEqual('09999999999');
});
