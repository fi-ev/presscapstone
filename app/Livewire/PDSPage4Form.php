<?php

namespace App\Livewire;

use App\Models\ApplicantQuestion;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Exception;

class PDSPage4Form extends Component
{
    public $editQuestion;
    public $consanguinity_third;
    public $consanguinity_fourth;
    public $consanguinity_details;
    public $admin_offense;
    public $admin_offense_details;
    public $criminal_court;
    public $criminal_court_details;
    public $criminal_court_filed;
    public $criminal_court_status;
    public $convicted_crime;
    public $convicted_crime_details;
    public $service_separated;
    public $service_separated_details;
    public $candidate;
    public $candidate_details;
    public $campaign;
    public $campaign_details;
    public $immigrant;
    public $immigrant_details;
    public $ip;
    public $ip_details;
    public $pwd;
    public $pwd_details;
    public $solo_parent;
    public $solo_parent_details;
    public $reference1_name;
    public $reference1_address;
    public $reference1_contact_no;
    public $reference2_name;
    public $reference2_address;
    public $reference2_contact_no;
    public $reference3_name;
    public $reference3_address;
    public $reference3_contact_no;
    public $govt_id;
    public $govt_id_no;
    public $govt_id_issuance;
    public $disabled;

    public function mount($userId, $readonly)
    {
        $id = Auth::user()->id;
        if (Auth::user()->isApplicant() && !$readonly) {
            $user = $id;
        } else if (Auth::user()->isHR() || ($id === $userId && $readonly)) {
            $user = $userId;
            $this->disabled = true;
        }

        $this->editQuestion= ApplicantQuestion::where('user_id', $user)
            ->where('is_latest', 1)
            ->first();
        $this->consanguinity_third = $this->editQuestion->consanguinity_third;
        $this->consanguinity_fourth = $this->editQuestion->consanguinity_fourth;
        $this->consanguinity_details = $this->editQuestion->consanguinity_details;
        $this->admin_offense = $this->editQuestion->admin_offense;
        $this->admin_offense_details = $this->editQuestion->admin_offense_details;
        $this->criminal_court = $this->editQuestion->criminal_court;
        $this->criminal_court_details = $this->editQuestion->criminal_court_filed;
        $this->criminal_court_filed = $this->editQuestion->criminal_court_status;
        $this->criminal_court_status = $this->editQuestion->criminal_court_status;
        $this->convicted_crime = $this->editQuestion->convicted_crime;
        $this->convicted_crime_details = $this->editQuestion->convicted_crime_details;
        $this->service_separated = $this->editQuestion->service_separated;
        $this->service_separated_details = $this->editQuestion->service_separated_details;
        $this->candidate = $this->editQuestion->candidate;
        $this->candidate_details = $this->editQuestion->candidate_details;
        $this->campaign = $this->editQuestion->campaign;
        $this->campaign_details = $this->editQuestion->campaign_details;
        $this->immigrant = $this->editQuestion->immigrant;
        $this->immigrant_details = $this->editQuestion->immigrant_details;
        $this->ip = $this->editQuestion->ip;
        $this->ip_details = $this->editQuestion->ip_details;
        $this->pwd = $this->editQuestion->pwd;
        $this->pwd_details = $this->editQuestion->pwd_details;
        $this->solo_parent = $this->editQuestion->solo_parent;
        $this->solo_parent_details = $this->editQuestion->solo_parent_details;
        $this->reference1_name = $this->editQuestion->reference1_name;
        $this->reference1_address = $this->editQuestion->reference1_contact_no;
        $this->reference1_contact_no = $this->editQuestion->reference1_contact_no;
        $this->reference2_name = $this->editQuestion->reference2_name;
        $this->reference2_address = $this->editQuestion->reference2_address;
        $this->reference2_contact_no = $this->editQuestion->reference2_contact_no;
        $this->reference3_name = $this->editQuestion->reference3_name;
        $this->reference3_address = $this->editQuestion->reference3_address;
        $this->reference3_contact_no = $this->editQuestion->reference3_contact_no;
        $this->govt_id = $this->editQuestion->govt_id;
        $this->govt_id_no = $this->editQuestion->govt_id_no;
        $this->govt_id_issuance = $this->editQuestion->govt_id_issuance;
    }

    public function updatedConsanguinityThird($value)
    {
        $this->checkConsanguinityConditions();
    }

    public function updatedConsanguinityFourth($value)
    {
        $this->checkConsanguinityConditions();
    }

    public function updatedAdminOffense($value)
    {
        $this->checkAdminOffenseConditions();
    }

    public function updatedCriminalCourt($value)
    {
        $this->checkCriminalCourtConditions();
    }

    public function updatedConvictedCrime($value)
    {
        $this->checkConvictedCrimeConditions();
    }

    public function updatedServiceSeparated($value)
    {
        $this->checkServiceSeparatedConditions();
    }

    public function updatedCandidate($value)
    {
        $this->checkCandidateConditions();
    }

    public function updatedCampaign($value)
    {
        $this->checkCampaignConditions();
    }

    public function updatedImmigrant($value)
    {
        $this->checkImmigrantConditions();
    }

    public function updatedIp($value)
    {
        $this->checkIpConditions();
    }

    public function updatedPwd($value)
    {
        $this->checkPwdConditions();
    }

    public function updatedSoloParent($value)
    {
        $this->checkSoloParentConditions();
    }

    protected function checkConsanguinityConditions()
    {
        if ($this->consanguinity_third === '1' || $this->consanguinity_fourth === '1') {
            if ($this->consanguinity_details === 'N/A') {
                $this->consanguinity_details = '';
            }
        } elseif ($this->consanguinity_third === '0' && $this->consanguinity_fourth === '0') {
            $this->consanguinity_details = 'N/A';
        }
    }

    protected function checkAdminOffenseConditions()
    {
        if ($this->admin_offense === '1') {
            if ($this->admin_offense_details === 'N/A') {
                $this->admin_offense_details = '';
            }
        } elseif ($this->admin_offense === '0' && $this->admin_offense === '0') {
            $this->admin_offense_details = 'N/A';
        }
    }

    protected function checkCriminalCourtConditions()
    {
        if ($this->criminal_court === '1') {
            if ($this->criminal_court_details === 'N/A') {
                $this->criminal_court_details = '';
                $this->criminal_court_filed = '';
                $this->criminal_court_status = '';
            }
        } elseif ($this->criminal_court === '0' && $this->criminal_court === '0') {
            $this->criminal_court_details = 'N/A';
            $this->criminal_court_filed = 'N/A';
            $this->criminal_court_status = 'N/A';
        }
    }

    protected function checkConvictedCrimeConditions()
    {
        if ($this->convicted_crime === '1') {
            if ($this->convicted_crime_details === 'N/A') {
                $this->convicted_crime_details = '';
            }
        } elseif ($this->convicted_crime === '0' && $this->convicted_crime === '0') {
            $this->convicted_crime_details = 'N/A';
        }
    }
    
    protected function checkServiceSeparatedConditions()
    {
        if ($this->service_separated === '1') {
            if ($this->service_separated_details === 'N/A') {
                $this->service_separated_details = '';
            }
        } elseif ($this->service_separated === '0' && $this->service_separated === '0') {
            $this->service_separated_details = 'N/A';
        }
    }

    protected function checkCandidateConditions()
    {
        if ($this->candidate === '1') {
            if ($this->candidate_details === 'N/A') {
                $this->candidate_details = '';
            }
        } elseif ($this->candidate === '0' && $this->candidate === '0') {
            $this->candidate_details = 'N/A';
        }
    }

    protected function checkCampaignConditions()
    {
        if ($this->campaign === '1') {
            if ($this->campaign_details === 'N/A') {
                $this->campaign_details = '';
            }
        } elseif ($this->campaign === '0' && $this->campaign === '0') {
            $this->campaign_details = 'N/A';
        }
    }

    protected function checkImmigrantConditions()
    {
        if ($this->immigrant === '1') {
            if ($this->immigrant_details === 'N/A') {
                $this->immigrant_details = '';
            }
        } elseif ($this->immigrant === '0' && $this->immigrant === '0') {
            $this->immigrant_details = 'N/A';
        }
    }

    protected function checkIpConditions()
    {
        if ($this->ip === '1') {
            if ($this->ip_details === 'N/A') {
                $this->ip_details = '';
            }
        } elseif ($this->ip === '0' && $this->ip === '0') {
            $this->ip_details = 'N/A';
        }
    }

    protected function checkPwdConditions()
    {
        if ($this->pwd === '1') {
            if ($this->pwd_details === 'N/A') {
                $this->pwd_details = '';
            }
        } elseif ($this->pwd === '0' && $this->pwd === '0') {
            $this->pwd_details = 'N/A';
        }
    }

    protected function checkSoloParentConditions()
    {
        if ($this->solo_parent === '1') {
            if ($this->solo_parent_details === 'N/A') {
                $this->solo_parent_details = '';
            }
        } elseif ($this->solo_parent === '0' && $this->solo_parent === '0') {
            $this->solo_parent_details = 'N/A';
        }
    }

    public function submit()
    {
        $this->validate([
            'consanguinity_third' => 'required|in:1,0',
            'consanguinity_fourth' => 'required|in:1,0',
            'consanguinity_details' => 'required|string|max:255',
            'admin_offense' => 'required|in:1,0',
            'admin_offense_details' => 'required|string|max:255',
            'criminal_court' => 'required|in:1,0',
            'criminal_court_details' => 'required|string|max:255',
            'criminal_court_filed' => 'required|string|max:255',
            'criminal_court_status' => 'required|string|max:255',
            'convicted_crime' => 'required|in:1,0',
            'convicted_crime_details' => 'required|string|max:255',
            'service_separated' => 'required|in:1,0',
            'service_separated_details' => 'required|string|max:255',
            'candidate' => 'required|in:1,0',
            'candidate_details' => 'required|string|max:255',
            'campaign' => 'required|in:1,0',
            'campaign_details' => 'required|string|max:255',
            'immigrant' => 'required|in:1,0',
            'immigrant_details' => 'required|string|max:255',
            'ip' => 'required|in:1,0',
            'ip_details' => 'required|string|max:255',
            'pwd' => 'required|in:1,0',
            'pwd_details' => 'required|string|max:255',
            'solo_parent' => 'required|in:1,0',
            'solo_parent_details' => 'required|string|max:255',
            'reference1_name' => 'required|string|max:255',
            'reference1_address' => 'required|string|max:255',
            'reference1_contact_no' => 'required|string|max:50',
            'reference2_name' => 'required|string|max:255',
            'reference2_address' => 'required|string|max:255',
            'reference2_contact_no' => 'required|string|max:50',
            'reference3_name' => 'required|string|max:255',
            'reference3_address' => 'required|string|max:255',
            'reference3_contact_no' => 'required|string|max:50',
            'govt_id' => 'required|string|max:255',
            'govt_id_no' => 'required|string|max:255',
            'govt_id_issuance' => 'required|string|max:255',
        ], [
            '*.required' => 'This field is required.',
        ]);

        try {
            if (!Auth::user()->isApplicant()) abort(403);

            if($this->editQuestion)
            {
                $question = ApplicantQuestion::find($this->editQuestion->id);
                $question->update([
                    'user_id' => Auth::user()->id,
                    'consanguinity_third' => $this->consanguinity_third,
                    'consanguinity_fourth' => $this->consanguinity_fourth,
                    'consanguinity_details' => $this->consanguinity_details,
                    'admin_offense' => $this->admin_offense,
                    'admin_offense_details' => $this->admin_offense_details,
                    'criminal_court' => $this->criminal_court,
                    'criminal_court_details' => $this->criminal_court_filed,
                    'criminal_court_filed' => $this->criminal_court_status,
                    'criminal_court_status' => $this->criminal_court_status,
                    'convicted_crime' => $this->convicted_crime,
                    'convicted_crime_details' => $this->convicted_crime_details,
                    'service_separated' => $this->service_separated,
                    'service_separated_details' => $this->service_separated_details,
                    'candidate' => $this->candidate,
                    'candidate_details' => $this->candidate_details,
                    'campaign' => $this->campaign,
                    'campaign_details' => $this->campaign_details,
                    'immigrant' => $this->immigrant,
                    'immigrant_details' => $this->immigrant_details,
                    'ip' => $this->ip,
                    'ip_details' => $this->ip_details,
                    'pwd' => $this->pwd,
                    'pwd_details' => $this->pwd_details,
                    'solo_parent' => $this->solo_parent,
                    'solo_parent_details' => $this->solo_parent_details,
                    'reference1_name' => $this->reference1_name,
                    'reference1_address' => $this->reference1_contact_no,
                    'reference1_contact_no' => $this->reference1_contact_no,
                    'reference2_name' => $this->reference2_name,
                    'reference2_address' => $this->reference2_address,
                    'reference2_contact_no' => $this->reference2_contact_no,
                    'reference3_name' => $this->reference3_name,
                    'reference3_address' => $this->reference3_address,
                    'reference3_contact_no' => $this->reference3_contact_no,
                    'govt_id' => $this->govt_id,
                    'govt_id_no' => $this->govt_id_no,
                    'govt_id_issuance' => $this->govt_id_issuance
                ]);
                session()->flash('message', 'information updated successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'update');
            }
            else 
            {
                $latestVersion = ApplicantQuestion::orderBy('version', 'desc')->pluck('version')->first() ?? 1;
                ApplicantQuestion::create([
                    'user_id' => Auth::user()->id,
                    'consanguinity_third' => $this->consanguinity_third,
                    'consanguinity_fourth' => $this->consanguinity_fourth,
                    'consanguinity_details' => $this->consanguinity_details,
                    'admin_offense' => $this->admin_offense,
                    'admin_offense_details' => $this->admin_offense_details,
                    'criminal_court' => $this->criminal_court,
                    'criminal_court_details' => $this->criminal_court_filed,
                    'criminal_court_filed' => $this->criminal_court_status,
                    'criminal_court_status' => $this->criminal_court_status,
                    'convicted_crime' => $this->convicted_crime,
                    'convicted_crime_details' => $this->convicted_crime_details,
                    'service_separated' => $this->service_separated,
                    'service_separated_details' => $this->service_separated_details,
                    'candidate' => $this->candidate,
                    'candidate_details' => $this->candidate_details,
                    'campaign' => $this->campaign,
                    'campaign_details' => $this->campaign_details,
                    'immigrant' => $this->immigrant,
                    'immigrant_details' => $this->immigrant_details,
                    'ip' => $this->ip,
                    'ip_details' => $this->ip_details,
                    'pwd' => $this->pwd,
                    'pwd_details' => $this->pwd_details,
                    'solo_parent' => $this->solo_parent,
                    'solo_parent_details' => $this->solo_parent_details,
                    'reference1_name' => $this->reference1_name,
                    'reference1_address' => $this->reference1_contact_no,
                    'reference1_contact_no' => $this->reference1_contact_no,
                    'reference2_name' => $this->reference2_name,
                    'reference2_address' => $this->reference2_address,
                    'reference2_contact_no' => $this->reference2_contact_no,
                    'reference3_name' => $this->reference3_name,
                    'reference3_address' => $this->reference3_address,
                    'reference3_contact_no' => $this->reference3_contact_no,
                    'govt_id' => $this->govt_id,
                    'govt_id_no' => $this->govt_id_no,
                    'govt_id_issuance' => $this->govt_id_issuance,
                    'version' => $latestVersion
                ]);
                session()->flash('message', 'New information created successfully!');
                session()->flash('message-type', 'success');
                session()->flash('action-type', 'create');
            }

            return redirect()->route('pds.index', ['activeTab' => 'tab4']);
        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to save informationrmation.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'create');

            return redirect()->route('pds.index', ['activeTab' => 'tab4']);
        }
    }
    
    public function render()
    {
        return view('livewire.p-d-s-page4-form');
    }
}
