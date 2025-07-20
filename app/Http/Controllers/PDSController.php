<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PDSController extends Controller
{
    // applicant view
    public function index(Request $request)
    {
        $user = Auth::user();

        $readonly = false;
        $applicationId = null;
        $userId = null;
        $activeTab = $request->get('activeTab', 'tab1');
        $accordionProfileOpen = $request->get('accordionProfileOpen', false);
        $accordionFamilyOpen = $request->get('accordionFamilyOpen', false);
        $accordionEducationOpen = $request->get('accordionEducationOpen', false);
        $accordionEligibilityOpen = $request->get('accordionEligibilityOpen', false);
        $accordionWorkOpen = $request->get('accordionWorkOpen', false);
        $accordionVolunteerOpen = $request->get('accordionVolunteerOpen', false);
        $accordionTrainingOpen = $request->get('accordionTrainingOpen', false);
        $accordionOtherOpen = $request->get('accordionOtherOpen', false);
        
        if ($user->isApplicant()) {
            return view('applicant.pds.index', compact([
                                'activeTab',
                                'readonly',
                                'applicationId',
                                'userId',
                                'accordionProfileOpen',
                                'accordionFamilyOpen',
                                'accordionEducationOpen',
                                'accordionEligibilityOpen',
                                'accordionWorkOpen',
                                'accordionVolunteerOpen',
                                'accordionTrainingOpen',
                                'accordionOtherOpen',
                                ]));
        } 

        abort(403, 'You are unauthorized.');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    // submitted view
    public function show(Request $request, string $encodedUserId, string $encodedApplicationId)
    {
        $user = Auth::user();
        $readonly = true;
        $applicationId = hashid_decode($encodedApplicationId)[0] ?? null;
        $userId = hashid_decode($encodedUserId)[0] ?? null;
        $activeTab = $request->get('activeTab', 'tab1');
        $accordionProfileOpen = $request->get('accordionProfileOpen', false);
        $accordionFamilyOpen = $request->get('accordionFamilyOpen', false);
        $accordionEducationOpen = $request->get('accordionEducationOpen', false);
        $accordionEligibilityOpen = $request->get('accordionEligibilityOpen', false);
        $accordionWorkOpen = $request->get('accordionWorkOpen', false);
        $accordionVolunteerOpen = $request->get('accordionVolunteerOpen', false);
        $accordionTrainingOpen = $request->get('accordionTrainingOpen', false);
        $accordionOtherOpen = $request->get('accordionOtherOpen', false);
        
        if ($user->isHR() || ($user->id === $userId)) {
            return view('applicant.pds.index', compact([
                                'readonly',
                                'applicationId',
                                'userId',
                                'activeTab',
                                'accordionProfileOpen',
                                'accordionFamilyOpen',
                                'accordionEducationOpen',
                                'accordionEligibilityOpen',
                                'accordionWorkOpen',
                                'accordionVolunteerOpen',
                                'accordionTrainingOpen',
                                'accordionOtherOpen',
                                ]));
        } 

        abort(403, 'You are unauthorized.');
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
