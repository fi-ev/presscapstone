<?php

namespace App\Livewire;

use App\Models\ApplicantProfile;
use App\Models\ListCountry;
use App\Models\ListRegion;
use App\Models\ListProvince;
use App\Models\ListCity;
use App\Models\ListBarangay;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Log;

class ApplicantProfileForm extends Component
{
    public $editProfile;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $name_ext;
    public $birthdate;
    public $birthplace;
    public $sex;
    public $civil_status;
    public $height;
    public $weight;
    public $blood_type;
    public $gsis_no;
    public $pagibig_no;
    public $philhealth_no;
    public $sss_no;
    public $tin_no;
    public $employee_no;
    public $citizenship;
    public $dual_details;
    public $dual_country;
    public $residential_house_no;
    public $residential_street;
    public $residential_village;
    public $residential_barangay;
    public $residential_municity;
    public $residential_province;
    public $permanent_house_no;
    public $permanent_street;
    public $permanent_village;
    public $permanent_barangay;
    public $permanent_municity;
    public $permanent_province;
    public $phone_no;
    public $mobile_no;
    public $email;
    public $isChecked = false;
    public $disabled = false;
    public $selectedResidentialProvince;
    public $selectedResidentialMunicity;
    public $selectedResidentialBarangay;
    public $selectedPermanentProvince;
    public $selectedPermanentMunicity;
    public $selectedPermanentBarangay;

    public function mount($applicationId, $userId, $readonly)
    {
        $id = Auth::user()->id;
        if (Auth::user()->isApplicant() && !$readonly) {

            $this->editProfile= ApplicantProfile::where('user_id', $id)
                    ->where('is_latest', 1)
                    ->first();

        } else if (Auth::user()->isHR() || ($id === $userId && $readonly)) {
            $this->disabled = true;

            $this->editProfile= ApplicantProfile::where('user_id', $userId)
                    ->where('application_id', $applicationId)
                    ->first();
        }

        $this->first_name = $this->editProfile->first_name;
        $this->middle_name = $this->editProfile->middle_name;
        $this->last_name = $this->editProfile->last_name;
        $this->name_ext = $this->editProfile->name_ext;
        $this->birthdate = $this->editProfile->birthdate ? $this->editProfile->birthdate->format('Y-m-d') : null;
        $this->birthplace = $this->editProfile->birthplace;
        $this->sex = $this->editProfile->sex;
        $this->civil_status = $this->editProfile->civil_status;
        $this->height = $this->editProfile->height;
        $this->weight = $this->editProfile->weight;
        $this->blood_type = $this->editProfile->blood_type;
        $this->gsis_no = $this->editProfile->gsis_no;
        $this->pagibig_no = $this->editProfile->pagibig_no;
        $this->philhealth_no = $this->editProfile->philhealth_no;
        $this->sss_no = $this->editProfile->sss_no;
        $this->tin_no = $this->editProfile->tin_no;
        $this->employee_no = $this->editProfile->employee_no;
        $this->citizenship = $this->editProfile->citizenship;
        $this->dual_details = $this->editProfile->dual_details;
        $this->dual_country = $this->editProfile->dual_country;
        $this->residential_house_no = $this->editProfile->residential_house_no;
        $this->residential_street = $this->editProfile->residential_street;
        $this->residential_village = $this->editProfile->residential_village;
        $this->selectedResidentialProvince = $this->editProfile->residential_province;
        $this->selectedResidentialMunicity = $this->editProfile->residential_municity;
        $this->selectedResidentialBarangay = $this->editProfile->residential_barangay;
        $this->permanent_house_no = $this->editProfile->permanent_house_no;
        $this->permanent_street = $this->editProfile->permanent_street;
        $this->permanent_village = $this->editProfile->permanent_village;
        $this->selectedPermanentProvince = $this->editProfile->permanent_province;
        $this->selectedPermanentMunicity = $this->editProfile->permanent_municity;
        $this->selectedPermanentBarangay = $this->editProfile->permanent_barangay;
        $this->phone_no = $this->editProfile->phone_no;
        $this->mobile_no = $this->editProfile->mobile_no;
        $this->email = $this->editProfile->email; 
        

        if (
            $this->residential_house_no === $this->permanent_house_no &&
            $this->residential_street === $this->permanent_street &&
            $this->residential_village === $this->permanent_village &&
            $this->selectedResidentialProvince === $this->selectedPermanentProvince &&
            $this->selectedResidentialMunicity === $this->selectedPermanentMunicity &&
            $this->selectedResidentialBarangay === $this->selectedPermanentBarangay
            && 
                (
                    !empty($this->selectedResidentialProvince) ||
                    !empty($this->selectedResidentialMunicity) || 
                    !empty($this->selectedResidentialBarangay) ||
                    !empty($this->residential_house_no) ||
                    !empty($this->residential_street) ||
                    !empty($this->residential_village) ||
                    !empty($this->selectedPermanentProvince) ||
                    !empty($this->selectedPermanentMunicity) || 
                    !empty($this->selectedPermanentBarangay) ||
                    !empty($this->permanent_house_no) ||
                    !empty($this->permanent_street) ||
                    !empty($this->permanent_village) 

                )
        ) {
            $this->isChecked = true;
        }
    }

    #[Computed(persist: true, seconds: 3600)]
    public function countries()
    {
        return ListCountry::select('name')->orderBy('name')->pluck('name')->toArray();
    }

    #[Computed(persist: true, seconds: 3600)]
    public function provinces()
    {
        return ListProvince::with('region')
            ->orderBy('name')
            ->get()
            ->map(fn($province) => [
                'name' => $province->name,
                'label' => "{$province->name}, {$province->region->name}",
            ])
            ->toArray();
    }

    #[Computed]
    public function residentialCities()
    {
        if (empty($this->selectedResidentialProvince)) {
            return [];
        }

        $province = ListProvince::where('name', $this->selectedResidentialProvince)->first();

        if (!$province) {
            return [];
        }

        return ListCity::where('province_code', $province->code)
            ->orderBy('name')
            ->get()
            ->map(fn($city) => [
                'name' => $city->name,
                'label' => "{$city->name}",
            ])
            ->toArray();
    }

    #[Computed]
    public function residentialBarangays()
    {
        if (empty($this->selectedResidentialMunicity)) {
            return [];
        }

        $city = ListCity::where('name', $this->selectedResidentialMunicity)->first();

         if (!$city) {
            return [];
        }

        return ListBarangay::where('city_code', $city->code)
            ->orderBy('name')
            ->get()
             ->map(fn($barangay) => [
                'name' => $barangay->name,
                'label' => "{$barangay->name}",
            ])
            ->toArray();
    }

    #[Computed]
    public function permanentCities()
    {
        if (empty($this->selectedPermanentProvince)) {
           return [];
           Log::info('Permanent Province selected:', ['province' => "empty"]);
        }
       
        $province = ListProvince::where('name', $this->selectedPermanentProvince)->first();

        if (!$province) {
            return [];
        }

        return ListCity::where('province_code', $province->code)
            ->orderBy('name')
            ->get()
            ->map(fn($city) => [
                'name' => $city->name,
                'label' => "{$city->name}",
            ])
            ->toArray();
    }

    #[Computed]
    public function permanentBarangays()
    {
        if (empty($this->selectedPermanentMunicity)) {
            return [];
        }

        $city = ListCity::where('name', $this->selectedPermanentMunicity)->first();

         if (!$city) {
            return [];
        }

        return ListBarangay::where('city_code', $city->code)
            ->orderBy('name')
            ->get()
             ->map(fn($barangay) => [
                'name' => $barangay->name,
                'label' => "{$barangay->name}",
            ])
            ->toArray();
    }

    public function updatedSelectedResidentialProvince()
    {
        $this->selectedResidentialMunicity = null;
        $this->selectedResidentialBarangay = null;
        $this->residential_municity = null;
        $this->residential_barangay = null;

        if ($this->isChecked) {
            $this->selectedPermanentProvince = $this->selectedResidentialProvince;
            $this->updatedSelectedPermanentProvince();
        }
    }

    public function updatedSelectedResidentialMunicity()
    {
        $this->selectedResidentialBarangay = null;
        $this->residential_barangay = null;

        if ($this->isChecked) {
            $this->selectedPermanentMunicity = $this->selectedResidentialMunicity;
             $this->updatedSelectedPermanentMunicity();
        }
    }


    public function updatedSelectedPermanentProvince()
    {
        $this->selectedPermanentMunicity = null;
        $this->selectedPermanentBarangay = null;
        $this->permanent_municity = null;
        $this->permanent_barangay = null;

         if ($this->isChecked) {
             $this->isChecked = false;
         }
    }

    public function updatedSelectedPermanentMunicity()
    {
        $this->selectedPermanentBarangay = null;
        $this->permanent_barangay = null;

        if ($this->isChecked) {
             $this->isChecked = false;
         }
    }

    public function updatedResidentialHouseNo() { if ($this->isChecked) $this->permanent_house_no = $this->residential_house_no; }
    public function updatedResidentialStreet() { if ($this->isChecked) $this->permanent_street = $this->residential_street; }
    public function updatedResidentialVillage() { if ($this->isChecked) $this->permanent_village = $this->residential_village; }


    public function toggleCheckbox()
    {
        $this->isChecked = !$this->isChecked;

        if ($this->isChecked) {
            $this->permanent_house_no = $this->residential_house_no;
            $this->permanent_street = $this->residential_street;
            $this->permanent_village = $this->residential_village;
            $this->selectedPermanentProvince = $this->selectedResidentialProvince;
            $this->selectedPermanentMunicity = $this->selectedResidentialMunicity;
            $this->selectedPermanentBarangay = $this->selectedResidentialBarangay;

            $this->permanent_province = $this->residential_province;
            $this->permanent_municity = $this->residential_municity;
            $this->permanent_barangay = $this->residential_barangay;

        } else {
            $this->permanent_house_no = "";
            $this->permanent_street = "";
            $this->permanent_village = "";
            $this->selectedPermanentProvince = null;
            $this->selectedPermanentMunicity = null;
            $this->selectedPermanentBarangay = null;

            $this->permanent_province = null;
            $this->permanent_municity = null;
            $this->permanent_barangay = null;
        }
    }

    public function submit()
    {
        $this->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'name_ext' => 'required|string|max:255',
            'birthdate' => 'required|date|date_format:Y-m-d|before_or_equal:today',
            'birthplace' => 'required|string|max:255',
            'sex' => 'required|string|max:255',
            'civil_status' => 'required|string|max:255',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'blood_type' => 'required|string|max:3',
            'gsis_no' => 'required|string|max:255',
            'pagibig_no' => 'required|string|max:255',
            'philhealth_no' => 'required|string|max:255',
            'sss_no' => 'required|string|max:255',
            'tin_no' => 'required|string|max:255',
            'employee_no' => 'required|string|max:255',
            'citizenship' => 'required|string|max:255',
            'dual_details' => 'required|string|max:255',
            'dual_country' => 'required|string|max:255',
            'residential_house_no' => 'required|string|max:255',
            'residential_street' => 'required|string|max:255',
            'residential_village' => 'required|string|max:255',
            'selectedResidentialProvince' => 'required|string|max:255',
            'selectedResidentialMunicity' => 'required|string|max:255',
            'selectedResidentialBarangay' => 'required|string|max:255',
            'permanent_house_no' => 'required|string|max:255',
            'permanent_street' => 'required|string|max:255',
            'permanent_village' => 'required|string|max:255',
            'selectedPermanentProvince' => 'required|string|max:255',
            'selectedPermanentMunicity' => 'required|string|max:255',
            'selectedPermanentBarangay' => 'required|string|max:255',
            'phone_no' => 'required|string|max:255',
            'mobile_no' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        try {
            if (!Auth::user()->isApplicant()) abort(403);

            $profile = ApplicantProfile::find($this->editProfile->id);
            $latestVersion = ApplicantProfile::orderBy('version', 'desc')->pluck('version')->first() ?? 1;
            $profile->update([
                'user_id' => Auth::user()->id,
                'first_name' => $this->first_name,
                'middle_name' => $this->middle_name,
                'last_name' => $this->last_name,
                'name_ext' => $this->name_ext,
                'birthdate' => $this->birthdate,
                'birthplace' => $this->birthplace,
                'sex' => $this->sex,
                'civil_status' => $this->civil_status,
                'height' => $this->height,
                'weight' => $this->weight,
                'blood_type' => $this->blood_type,
                'gsis_no' => $this->gsis_no,
                'pagibig_no' => $this->pagibig_no,
                'philhealth_no' => $this->philhealth_no,
                'sss_no' => $this->sss_no,
                'tin_no' => $this->tin_no,
                'employee_no' => $this->employee_no,
                'citizenship' => $this->citizenship,
                'dual_details' => $this->dual_details,
                'dual_country' => $this->dual_country,
                'residential_house_no' => $this->residential_house_no,
                'residential_street' => $this->residential_street,
                'residential_village' => $this->residential_village,
                'residential_barangay' => $this->residential_barangay,
                'residential_municity' => $this->residential_municity,
                'residential_province' => $this->residential_province,
                'permanent_house_no' => $this->permanent_house_no,
                'permanent_street' => $this->permanent_street,
                'permanent_village' => $this->permanent_village,
                'permanent_barangay' => $this->permanent_barangay,
                'permanent_municity' => $this->permanent_municity,
                'permanent_province' => $this->permanent_province,
                'phone_no' => $this->phone_no,
                'mobile_no' => $this->mobile_no,
                'email' => $this->email,
                'version' => $latestVersion,
            ]);
            session()->flash('message', 'New profile information updated successfully!');
            session()->flash('message-type', 'success');
            session()->flash('action-type', 'create');

            return redirect()->route('pds.index', ['activeTab' => 'tab1', 'accordionProfileOpen' => true]);
        } catch (Exception $e) { 
            Session()->flash('message', 'Failed to save profile information.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'create');

            return redirect()->route('pds.index', ['activeTab' => 'tab1', 'accordionProfileOpen' => true]);
        }
    }

    public function render()
    {
        return view('livewire.applicant-profile-form');
    }
}
