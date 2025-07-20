<?php

namespace App\Livewire\Emails;

use App\Models\Template;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Exception;

class InvitationEmail extends Component
{
    public $invitation_message;
    public $updated_at;
    public $activeTab;
    
    public function submit()
    {
        $this->validate([
            'invitation_message' => 'required|string',
        ]);

        try {
            if (!Auth::user()->isHR()) abort(403);

            $template = Template::where('type', 'Invitation')->first();
            $template->update([
                'message' => $this->invitation_message,
            ]);
            session()->flash('message', 'Invitation email template updated successfully!');
            session()->flash('message-type', 'success');
            session()->flash('action-type', 'update');
        
            return redirect()->route('templates.index', ['activeTab' => 'tab2']);
        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to save invitation email template .');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'create');

            return redirect()->route('templates.index', ['activeTab' => 'tab2']);
        }
    }
    public function mount($activeTab)
    {
        $template = Template::where('type', 'Invitation')->first();
        $this->activeTab = $activeTab;
        $this->invitation_message = $template->message;
        $this->updated_at = $template->updated_at->format('F j, Y g:i A');
    }

    public function render()
    {
        return view('livewire.emails.invitation-email');
    }
}
