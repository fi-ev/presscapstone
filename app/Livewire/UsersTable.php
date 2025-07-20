<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password; 
use Illuminate\Support\Str;
use Exception;
use Carbon\Carbon;

class UsersTable extends Component
{
    use WithPagination;
    public $isOpenAdd = false;
    public $isOpenEdit = false;
    public $selected = [];
    public $search = '';
    public $selectAll = false;
    public $status = 'all';
    public $first_name;
    public $last_name;
    public $email;
    public $mobile_no;
    public $role;
    public $userId;
    public $editUser;
    public $password = '';
    public $isOpenResetPassword = false;
    public $resetPasswordUserId;
    public $customPassword = '';
    public $generatedPassword = '';
    protected $defaultValues = [
        'first_name' => '',
        'last_name' => '',
        'email' => '',
        'mobile_no' => '',
        'role' => '',
    ];

    public function openAddModal()
    {
        $this->fill($this->defaultValues);
        $this->customPassword = '';
        $this->generatedPassword = $this->generateRandomPassword();
        $this->isOpenAdd = true;
    }  

    public function openEditModal($id)
    {
        $this->editUser = User::findOrFail($id);

        $this->first_name = $this->editUser->first_name;
        $this->last_name = $this->editUser->last_name;
        $this->email = $this->editUser->email;
        $this->role = $this->editUser->roles->first()->name;

        $this->isOpenEdit = true;
        $this->isOpenAdd = false; 
    }

    public function closeAddModal()
    {
        $this->isOpenAdd = false;
    }    

    public function closeEditModal()
    {
        $this->isOpenEdit = false;
        $this->editUser = null;
    }

    public function openResetPasswordModal($id)
    {
        $this->resetPasswordUserId = $id;
        $this->customPassword = '';
        $this->isOpenResetPassword = true;
        $this->generatedPassword = $this->generateRandomPassword();
    }

    public function closeResetPasswordModal()
    {
        $this->customPassword = '';
        $this->generatedPassword = '';
        $this->isOpenResetPassword = false;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    // all that is selected from current page
    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selected = User::search($this->search)->pluck('id')->toArray();
        } else {
            $this->selected = [];
        }
    }

    // select all
    public function updatedSelected()
    {
        $totalItemsCount = User::search($this->search)->count();
        $this->selectAll = count($this->selected) === $totalItemsCount;
    }

    public function deleteSelected()
    {
        User::whereIn('id', $this->selected)->delete();
        $this->selected = [];
        $this->selectAll = false;

        session()->flash('message', 'Selected user(s) have been succesfully deleted.');
        session()->flash('message-type', 'success');
        session()->flash('action-type', 'delete');
    }

    public function toggleActive($userId)
    {
        $user = User::find($userId);
        if ($user) {
            $user->is_active = !$user->is_active;
            $user->save();
            
            session()->flash('message', 'User status has been changed.');
            session()->flash('message-type', 'success');
            session()->flash('action-type', 'update');
        }
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function submit()
    {
        $this->password = $this->customPassword ?: $this->generatedPassword;

        if($this->editUser) {
            $this->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email',
                'role' => 'required|string|max:255',
            ]);
        } else {
            $this->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email',
                'role' => 'required|string|max:255',
                'password' => 'required|string|min:8',
            ]);
        }

        try {
            if (!Auth::user()->isAdmin()) abort(403);

            $newPassword = $this->customPassword ?: $this->generatedPassword;

            if($this->editUser)
            {
                $user = User::find($this->editUser->id);
                $user->update([
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'email' => $this->email,
                    'password' => $this->password
                ]);

                $role = Role::where('name', $this->role)->first(); 
                if ($role) {
                    $user->syncRoles([$role]);
                }

                session()->flash('message', 'User updated successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'update');
            }
            else 
            {
                $newPassword = $this->password ? bcrypt($this->password) : null;

                $user = User::create([
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'email' => $this->email,
                    'password' => $newPassword,
                    'email_verified_at' => Carbon::now()
                ]);

                $role = Role::where('name', $this->role)->first(); 
                if ($role) {
                    $user->assignRole($role);
                }

                session()->flash('message', 'New user created successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'create');
            }

            return redirect()->route('users');
        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to add user.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'create');

            return redirect()->route('users');
        }
    }

    public function delete($id)
    {
        try {
            $user= User::findOrFail($id);
            if (auth()->id() === $user->id && auth()->user()->isAdmin()) {
                session()->flash('message', 'You cannot delete your own account.');
                session()->flash('message-type', 'error');
                session()->flash('action-type', 'delete');
            } else {
                $user->is_active = 0;
                $user->save();
                $user->delete();

                session()->flash('message', 'User deleted successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'delete');
            }

            return redirect()->route('users');
        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to delete user.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'delete');

            return redirect()->route('users');
        }
    }

    public function generateRandomPassword()
    {
        return Str::random(10); 
    }

    public function resetPassword()
    {
        try {
            $user = User::findOrFail($this->resetPasswordUserId);

            $newPassword = $this->customPassword ?: $this->generatedPassword;
            $user->password = Hash::make($newPassword);
            $user->force_password_change = true;
            $user->save();

            session()->flash('message', 'Password reset successfully!');
            session()->flash('message-type', 'success');
            session()->flash('action-type', 'reset-password');

            $this->resetPasswordUserId = null;
            $this->customPassword = '';
            $this->generatedPassword = '';
    
            return redirect()->route('users');
        } catch (Exception $e) {
            session()->flash('message', 'Failed to reset password.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'reset-password');

            return redirect()->route('users');
        }
    }

    public function remove2FA($id)
    {
        try {
            $user = User::findOrFail($id);

            $user->two_factor_secret = null;  
            $user->two_factor_recovery_codes = null; 
            $user->sms_two_factor_secret = null;
            $user->save();

            session()->flash('message', 'Two-factor authentication removed successfully!');
            session()->flash('message-type', 'success');
            session()->flash('action-type', 'remove-2fa');

            return redirect()->route('users');  
        } catch (Exception $e) {
            session()->flash('message', 'Failed to remove two-factor authentication.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'remove-2fa');

            return redirect()->route('users');
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Incorrect current password.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->force_password_change = false;
        $user->save();

        return redirect()->route('profile')->with('message', 'Password updated successfully.');
    }

    public function render()
    {
        return view('livewire.users-table', [
            'users' => User::query()
                ->with('roles')
                //->whereDoesntHave('roles', function($query) {
                //    $query->where('name', 'applicant');
                //})
                ->when($this->search, function($query) {
                    $query->where(function($q) {
                        $q->where('first_name', 'like', '%' . $this->search . '%')
                          ->orWhere('last_name', 'like', '%' . $this->search . '%')
                          ->orWhere('email', 'like', '%' . $this->search . '%');
                    });
                })
                ->when($this->status !== 'all', function($query) {
                    $query->where('is_active', $this->status);
                })
                ->paginate(10),
        ]);
        
    }


}
