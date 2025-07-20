<?php

namespace App\Livewire;

use App\Models\ApplicantOtherInformation;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;


class OtherInformationDynamicFields extends Component
{
    public $skillFields = [];
    public $recognitionFields = [];
    public $membershipFields = [];
    public $disabled;

    public function addSkillField()
    {
        $this->skillFields[] = [
            'id' => null,
            'information' => '',
        ];
    }

    public function removeSkillField($index)
    {
        if (isset($this->skillFields[$index])) {
            unset($this->skillFields[$index]);
            $this->skillFields = array_values($this->skillFields);
        }
    }

    public function addRecognitionField()
    {
        $this->recognitionFields[] = [
            'id' => null,
            'information' => '',
        ];
    }

    public function removeRecognitionField($index)
    {
        if (isset($this->recognitionFields[$index])) {
            unset($this->recognitionFields[$index]);
            $this->recognitionFields = array_values($this->recognitionFields);
        }
    }

    public function addMembershipField()
    {
        $this->membershipFields[] = [
            'id' => null,
            'information' => '',
        ];
    }

    public function removeMembershipField($index)
    {
        if (isset($this->membershipFields[$index])) {
            unset($this->membershipFields[$index]);
            $this->membershipFields = array_values($this->membershipFields);
        }
    }

    public function saveSkills()
    {
        $this->validate([
            'skillFields.*.information' => 'required|string|max:255',
        ], [
            'skillFields.*.information.required' => 'Input is required.',
        ]);

        try {
            $currentSkills = ApplicantOtherInformation::where('user_id', Auth::user()->id)
                ->where('type', 'skills')
                ->where('is_latest', 1)
                ->pluck('information')
                ->toArray();
                
            $latestVersion = ApplicantOtherInformation::where('type', 'skills')
                 ->orderBy('version', 'desc')
                 ->value('version') ?? 1; 

            $currentInformationInFields = array_column($this->skillFields, 'information');

            $removedSkills = array_diff($currentSkills, $currentInformationInFields);

            if (!empty($removedSkills)) {
                 ApplicantOtherInformation::where('user_id', Auth::user()->id)
                    ->where('type', 'skills')
                    ->where('is_latest', 1) 
                    ->whereIn('information', $removedSkills)
                    ->delete();
            }

            foreach ($this->skillFields as $skill) {
                 if ($skill['information'] === '') {
                     continue;
                 }

                ApplicantOtherInformation::updateOrCreate(
                    [
                        'user_id' => Auth::user()->id,
                        'type' => 'skills',
                        'information' => $skill['information'],
                        'version' => $latestVersion, 
                        'is_latest' => 1, 
                    ],
                    [
                        'updated_at' => now(),
                        'created_at' => now()
                    ]
                );
            }


            Session()->flash('message', 'Skill info updated successfully!');
            Session()->flash('message-type', 'success');
            Session()->flash('action-type', 'update');

            return redirect()->route('pds.index', ['activeTab' => 'tab3', 'accordionOtherOpen' => true]);

        } catch (Exception $e) {
            Log::error("Error saving skills: " . $e->getMessage());
            Session()->flash('message', 'Failed to update skill info. ' . $e->getMessage());
            Session()->flash('message-type', 'error');
            Session()->flash('action-type', 'update');

            return redirect()->route('pds.index', ['activeTab' => 'tab3', 'accordionOtherOpen' => true]);
        }
    }

    public function saveRecognitions()
    {
        $this->validate([
            'recognitionFields.*.information' => 'required|string|max:255',
        ], [
            'recognitionFields.*.information.required' => 'Input is required.',
        ]);

        try {
             $currentRecognitions = ApplicantOtherInformation::where('user_id', Auth::user()->id)
                ->where('type', 'recognitions')
                ->where('is_latest', 1)
                ->pluck('information')
                ->toArray();

            $latestVersion = ApplicantOtherInformation::where('type', 'recognitions')
                ->orderBy('version', 'desc')
                ->value('version') ?? 1;

            $currentInformationInFields = array_column($this->recognitionFields, 'information');

            $removedRecognitions = array_diff($currentRecognitions, $currentInformationInFields);

            if (!empty($removedRecognitions)) {
                ApplicantOtherInformation::where('user_id', Auth::user()->id)
                   ->where('type', 'recognitions')
                   ->where('is_latest', 1)
                   ->whereIn('information', $removedRecognitions)
                   ->delete();
            }

            foreach ($this->recognitionFields as $recognition) {
                if ($recognition['information'] === '') {
                    continue;
                }
                ApplicantOtherInformation::updateOrCreate(
                    [
                        'user_id' => Auth::user()->id,
                        'type' => 'recognitions',
                        'information' => $recognition['information'],
                        'version' => $latestVersion,
                        'is_latest' => 1,
                    ],
                    [
                        'updated_at' => now(),
                        'created_at' => now()
                    ]
                );
            }

            Session()->flash('message', 'Recognition info updated successfully!');
            Session()->flash('message-type', 'success');
            Session()->flash('action-type', 'update');
            return redirect()->route('pds.index', ['activeTab' => 'tab3', 'accordionOtherOpen' => true]);

        } catch (Exception $e) {
             Log::error("Error saving recognitions: " . $e->getMessage());
            Session()->flash('message', 'Failed to update recognition info. ' . $e->getMessage());
            Session()->flash('message-type', 'error');
            Session()->flash('action-type', 'update');

            return redirect()->route('pds.index', ['activeTab' => 'tab3', 'accordionOtherOpen' => true]);
        }
    }

    public function saveMemberships()
    {
        $this->validate([
            'membershipFields.*.information' => 'required|string|max:255',
        ], [
            'membershipFields.*.information.required' => 'Input is required.',
        ]);

        try {
            $currentMemberships = ApplicantOtherInformation::where('user_id', Auth::user()->id)
                ->where('type', 'memberships')
                ->where('is_latest', 1)
                ->pluck('information')
                ->toArray();

            $latestVersion = ApplicantOtherInformation::where('type', 'memberships')
                ->orderBy('version', 'desc')
                ->value('version') ?? 1;

            $currentInformationInFields = array_column($this->membershipFields, 'information');

            $removedMemberships = array_diff($currentMemberships, $currentInformationInFields);

             if (!empty($removedMemberships)) {
                ApplicantOtherInformation::where('user_id', Auth::user()->id)
                   ->where('type', 'memberships')
                   ->where('is_latest', 1)
                   ->whereIn('information', $removedMemberships)
                   ->delete();
            }


            foreach ($this->membershipFields as $membership) {
                 if ($membership['information'] === '') {
                    continue;
                }
                ApplicantOtherInformation::updateOrCreate(
                    [
                        'user_id' => Auth::user()->id,
                        'type' => 'memberships',
                        'information' => $membership['information'],
                        'version' => $latestVersion,
                        'is_latest' => 1,
                    ],
                    [
                        'updated_at' => now(),
                        'created_at' => now()
                    ]
                );
            }

            Session()->flash('message', 'Membership info updated successfully!');
            Session()->flash('message-type', 'success');
            Session()->flash('action-type', 'update');
            return redirect()->route('pds.index', ['activeTab' => 'tab3', 'accordionOtherOpen' => true]);

        } catch (Exception $e) {
             Log::error("Error saving memberships: " . $e->getMessage());
            Session()->flash('message', 'Failed to update membership info. ' . $e->getMessage());
            Session()->flash('message-type', 'error');
            Session()->flash('action-type', 'update');

            return redirect()->route('pds.index', ['activeTab' => 'tab3', 'accordionOtherOpen' => true]);
        }
    }


    public function mount($userId, $readonly)
    {
        $user = Auth::user()->id;
        if (Auth::user()->isHR() || (Auth::user()->id === $userId && $readonly)) {
             $user = $userId;
             $this->disabled = true;
        } else if (!Auth::user()->isApplicant() && Auth::user()->id !== $userId) {
             abort(403, 'Unauthorized action.');
        }


        $this->skillFields = ApplicantOtherInformation::where('user_id', $user)
                            ->where('type', 'skills')
                            ->where('is_latest', 1)
                            ->get(['id','information'])
                            ->toArray();

        if (empty($this->skillFields)) {
             $this->addSkillField();
        }


        $this->recognitionFields = ApplicantOtherInformation::where('user_id', $user)
                            ->where('type', 'recognitions')
                            ->where('is_latest', 1)
                            ->get(['id','information'])
                            ->toArray();

        if (empty($this->recognitionFields)) {
             $this->addRecognitionField();
        }


        $this->membershipFields = ApplicantOtherInformation::where('user_id', $user)
                            ->where('type', 'memberships')
                            ->where('is_latest', 1)
                            ->get(['id','information'])
                            ->toArray();

        if (empty($this->membershipFields)) {
             $this->addMembershipField();
        }

    }

    public function render()
    {
        return view('livewire.other-information-dynamic-fields');
    }
}