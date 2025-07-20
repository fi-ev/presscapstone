<?php

namespace App\Livewire\Emails;

use App\Models\Template;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Exception;

class AcceptanceEmail extends Component
{
    public $message;
    public $updated_at;
    public $activeTab;

    public function submit()
    {
        $this->validate([
            'message' => 'required|string',
        ]);

        try {
            if (!Auth::user()->isHR()) abort(403);

            $template = Template::where('type', 'Acceptance')->first();
            $template->update([
                'message' => $this->message,
            ]);
            session()->flash('message', 'Acceptance email template updated successfully!');
            session()->flash('message-type', 'success');
            session()->flash('action-type', 'update');
        
            return redirect()->route('templates.index', ['activeTab' => 'tab3']);
        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to save acceptance email template .');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'create');

            return redirect()->route('templates.index', ['activeTab' => 'tab3']);
        }
    }
    public function mount($activeTab)
    {
        $template = Template::where('type', 'Acceptance')->first();
        $this->activeTab = $activeTab;
        $this->message = $template->message;
        $this->updated_at = $template->updated_at->format('F j, Y g:i A');
    }

    public function render()
    {
        return view('livewire.emails.acceptance-email');
    }
}
