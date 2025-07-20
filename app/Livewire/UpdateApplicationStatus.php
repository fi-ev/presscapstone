<?php

namespace App\Livewire;

use App\Models\Template;
use App\Models\Application;
use App\Models\Email;
use App\Mail\SendNotice;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Exception;

class UpdateApplicationStatus extends Component
{
    public $isLoadingRejection = false;
    public $isLoadingInvitation = false;
    public $isLoadingAcceptance = false;
    public $applicationId = null;
    public $application = null;
    public $fullName = '';
    public $lastName = '';
    public $email = '';
    public $isOpenView = false;
    public $position;
    public $content;
    public $type;

    public function mount($applicationId = null)
    {
        if ($applicationId) {
            $this->applicationId = $applicationId;
            $this->application = Application::with('user', 'vacancy.position')->where('id', $applicationId)->first();
            $this->fullName = $this->application->user->full_name_simple;
            $this->lastName = $this->application->user->last_name;
            $this->email = $this->application->user->email;
        }
    }

    public function sendRejectionEmail()
    {
        $this->isLoadingRejection = true;

        try {
            $subject = "Subject: Your Application for " . $this->position;
        
            $this->application->status = 'Rejected';
            $this->application->save();
            $applicationId = $this->application->id;

            $email = new Email();
            $email->application_id = $applicationId;
            $email->email_type = 'Rejection';
            $email->email_content = $this->content;
            $email->hr_id = Auth::user()->id;
            $email->save();

            Mail::to($this->email)->send(new SendNotice($subject, $this->fullName, $this->content));

            session()->flash('message', 'Rejection email sent successfully!');
            session()->flash('message-type', 'success');
            session()->flash('action-type', 'send');
            
        } catch (Exception $e) {
            session()->flash('message', 'Failed to send rejection email.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'send');
        }

        return redirect()->to('vacancies/' . hashid_encode($this->application->vacancy_id) . '/notices');
    }

    public function sendInvitationEmail()
    {
        $this->isLoadingInvitation = true;

        try {
            $subject = "Subject: Your Application for " . $this->position;

            $this->application->status = 'Invited';
            $this->application->save();
            $applicationId = $this->application->id;

            $email = new Email();
            $email->application_id = $applicationId;
            $email->email_type = 'Invitation';
            $email->email_content = $this->content;
            $email->hr_id = Auth::user()->id;
            $email->save();

            Mail::to($this->email)->send(new SendNotice($subject, $this->fullName, $this->content));

            session()->flash('message', 'Invitation email sent successfully!');
            session()->flash('message-type', 'success');
            session()->flash('action-type', 'send');
            
        } catch (Exception $e) {
            session()->flash('message', 'Failed to send invitation email.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'send');
        }

        return redirect()->to('vacancies/' . hashid_encode($this->application->vacancy_id) . '/notices');
        
    }

    public function sendAcceptanceEmail()
    {
        $this->isLoadingAcceptance = true;

        try {
            $subject = "Subject: Your Application for " . $this->position;

            $this->application->status = 'Accepted';
            $this->application->save();
            $applicationId = $this->application->id;

            $email = new Email();
            $email->application_id = $applicationId;
            $email->email_type = 'Acceptance';
            $email->email_content = $this->content;
            $email->hr_id = Auth::user()->id;
            $email->save();
            
            Mail::to($this->email)->send(new SendNotice($subject, $this->fullName, $this->content));

            session()->flash('message', 'Acceptance email sent successfully!');
            session()->flash('message-type', 'success');
            session()->flash('action-type', 'send');

        } catch (Exception $e) {
            session()->flash('message', 'Failed to send acceptance email.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'send');

        }

        return redirect()->to('vacancies/' . hashid_encode($this->application->vacancy_id) . '/notices');
    }

    public function openViewModal($type)
    {
        $this->type = $type;
        $template = Template::where('type', $type)->first();
        $this->position = $this->application->vacancy->position->title;

        if (!$template) {
            session()->flash('message', 'Email template not found.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'send');
            return;
        }

        $messageTemplate = $template->message;

        $this->content = str_replace(
            ['[name]', '[position]', '[newline]'],
            [$this->fullName, $this->position, '<br/>'], // replace placeholders with actual data
            $messageTemplate
        );

        $this->isOpenView = true;
    }

    public function closeViewModal()
    {
        $this->isOpenView = false;
    }
    public function render()
    {
        return view('livewire.update-application-status');
    }
}
