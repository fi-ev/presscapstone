<?php

namespace App\Livewire;

use App\Models\ApplicantAttachment;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Exception;

class AttachmentsUpload extends Component
{
    use WithFileUploads;
    public $files;
    public $attachments;
    public $applicationLetter;
    public $passportPhoto;
    public $notarizedPDS;
    public $workExperienceSheet;
    public $performanceRating;
    public $diploma;
    public $eligibilityCert;
    public $trainingCert;
    public $others;

    public function submit()
    {
        $userId = Auth::user()->id;
        $existingAttachments = ApplicantAttachment::where('user_id', $userId)
                                                  ->where('is_latest', 1)
                                                  ->pluck('model')
                                                  ->toArray();

        $this->validate([
            'applicationLetter' => in_array('applicationLetter', $existingAttachments) ? 'nullable|file|mimes:pdf|max:2048' : 'required|file|mimes:pdf|max:2048',
            'passportPhoto' => in_array('passportPhoto', $existingAttachments) ? 'nullable|image|mimes:jpg,png|mimetypes:image/jpeg,image/png|max:2048' : 'required|image|mimes:jpg,png|mimetypes:image/jpeg,image/png|max:2048',
            'notarizedPDS' => in_array('notarizedPDS', $existingAttachments) ? 'nullable|file|mimes:pdf|max:2048' : 'required|file|mimes:pdf|max:2048',
            'workExperienceSheet' => in_array('workExperienceSheet', $existingAttachments) ? 'nullable|file|mimes:pdf|max:2048' : 'required|file|mimes:pdf|max:2048',
            'performanceRating' => in_array('performanceRating', $existingAttachments) ? 'nullable|file|mimes:pdf|max:2048' : 'nullable|file|mimes:pdf|max:2048',
            'diploma' => in_array('diploma', $existingAttachments) ? 'nullable|file|mimes:pdf|max:2048' : 'required|file|mimes:pdf|max:2048',
            'eligibilityCert' => in_array('eligibilityCert', $existingAttachments) ? 'nullable|file|mimes:pdf|max:2048' : 'required|file|mimes:pdf|max:2048',
            'trainingCert' => in_array('trainingCert', $existingAttachments) ? 'nullable|file|mimes:pdf|max:2048' : 'required|file|mimes:pdf|max:2048',
            'others' => in_array('Others', $existingAttachments) ? 'nullable|file|mimes:zip|max:10240' : 'nullable|file|mimes:zip|max:10240',
        ]);

        try {
            $modelTitles = [
                'applicationLetter' => 'Application Letter',
                'passportPhoto' => 'Passport Photo',
                'notarizedPDS' => 'Notarized PDS',
                'workExperienceSheet' => 'Work Experience Sheet',
                'performanceRating' => 'Performance Rating',
                'diploma' => 'Diploma / Transcript of Records',
                'eligibilityCert' => 'Certificate of Eligibility',
                'trainingCert' => 'Training Certificates',
                'others' => 'Others'
            ];
            
            $filepath = '/private/uploads/attachments/' . $userId . '/';
            $newAttachments = [];
            foreach ($this->files as $file) {
                $field = $file['model'];

                if ($this->$field) {
                    $this->$field->store($filepath . $file['path']);  

                    $newAttachments[] = [
                        'model' => $file['model'],
                        'filename' => $this->$field->getClientOriginalName(),
                        'path' => $file['path'] . '/' . $this->$field->hashName(),
                    ];
                }
            }

            $latestVersion = ApplicantAttachment::max('version') ?? 1;
            foreach ($newAttachments as $attachment) {
                ApplicantAttachment::updateOrCreate([
                'user_id' => $userId, 'model' => $attachment['model'], 'version' => $latestVersion],
                [
                    'user_id' => $userId,
                    'type' => $modelTitles[$attachment['model']] ?? 'null',
                    'model' => $attachment['model'],
                    'filename' => $attachment['filename'],
                    'path' => $attachment['path'],
                    'version' => $latestVersion,
                    'is_latest' => 1,
                ]);
            }

            session()->flash('message', 'Files uploaded successfully!');
            session()->flash('message-type', 'success');
            session()->flash('action-type', 'create');
        } 
        catch (Exception $e) 
        {
            session()->flash('message', 'Failed to upload files.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'create');
        }
    }

    public function render()
    {
        $userId = Auth::user()->id;
        $filePath = 'uploads/attachments';

        $this->files = [
            ['label' => 'Application Letter', 'required' => 'true', 'model' => 'applicationLetter', 'path' => 'application-letter', 'helpText' => 'One PDF file only, Max 2 MB'],
            ['label' => 'Passport-sized Photo', 'required' => 'true', 'model' => 'passportPhoto', 'path' => 'passport-photo', 'helpText' => 'PNG or JPG only, Max 2 MB'],
            ['label' => 'Notarized Personal Data Sheet', 'required' => 'true', 'model' => 'notarizedPDS', 'path' => 'pds', 'helpText' => 'One PDF file only, Max 2 MB'],
            ['label' => 'Work Experience Sheet', 'required' => 'true', 'model' => 'workExperienceSheet', 'path' => 'work-experience', 'helpText' => 'One PDF file only, Max 2 MB'],
            ['label' => 'Performance Rating (For Government Employees)', 'required' => 'false', 'model' => 'performanceRating', 'path' => 'performance-rating', 'helpText' => 'One PDF file only, Max 2 MB'],
            ['label' => 'Transcript of Records / Diploma', 'required' => 'true', 'model' => 'diploma', 'path' => 'diploma', 'helpText' => 'One PDF file only, Max 2 MB'],
            ['label' => 'Eligibility Certificate', 'required' => 'true', 'model' => 'eligibilityCert', 'path' => 'eligibility-certificate', 'helpText' => 'One PDF file only, Max 2 MB'],
            ['label' => 'Training Certificate', 'required' => 'true', 'model' => 'trainingCert', 'path' => 'training-certificate', 'helpText' => 'One PDF file only, Max 2 MB'],
            ['label' => 'Others', 'required' => 'false', 'model' => 'others', 'path' => 'others', 'helpText' => 'Zipped, Max 10 MB'],
        ];
        
        $this->attachments = ApplicantAttachment::where('user_id', $userId)
                ->where('is_latest', 1)
                ->get(['path', 'filename', 'model'])
                ->toArray();

        return view('livewire.attachments-upload', [
            'userId' => $userId,
            'filePath' => $filePath,
            'files' => $this->files,
            'attachments' => $this->attachments,
        ]);
    }
}
