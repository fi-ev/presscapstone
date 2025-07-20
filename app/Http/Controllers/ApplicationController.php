<?php

namespace App\Http\Controllers;

use App\Models\ApplicantAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Application;
use App\Models\ApplicantProfile;
use App\Models\ApplicantFamily;
use App\Models\ApplicantChild;
use App\Models\ApplicantEducation;
use App\Models\ApplicantEligibility;
use App\Models\ApplicantWorkExperience;
use App\Models\ApplicantVolunteerWork;
use App\Models\ApplicantTraining;
use App\Models\ApplicantOtherInformation;
use App\Models\ApplicantQuestion;
use Exception;

class ApplicationController extends Controller
{
    public function index()
    {
        if (!Auth::check()) abort(403);

        if (Auth::user()->isHR())
            return view('hr.applications.index');
        else if (Auth::user()->isApplicant())
            return view('applicant.applications.index');
        
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            if (!Auth::user()->isApplicant()) abort(403);

            // if already applied
            $applied = Application::where('user_id', $request->user_id)
                            ->where('vacancy_id', $request->vacancy_id)
                            ->exists();
            if ($applied) {
                flashMessage('You have already applied for this position.', 'error', 'create');
                return redirect()->route('vacancies.card');
            }

             // validate and create
             $rules = [
                'user_id' => 'required|string',
                'vacancy_id' => 'required|integer',
            ];
            $validator = Validator::make($request->all(), $rules);
            $validatedData = $validator->validated();

            // update here the application id column of all applicant tables
            DB::transaction(function () use ($validatedData) {

                $application = Application::create($validatedData);

                $prevProfile = ApplicantProfile::where('is_latest', 1)
                                ->where('user_id', Auth::user()->id)
                                ->first();
                $newProfile = $prevProfile->replicate();
                $newProfile->version += 1;
                $newProfile->is_latest = 1;
                $newProfile->save();
                $prevProfile->application_id = $application->id;
                $prevProfile->is_latest = 0;
                $prevProfile->save();

                $prevFamily = ApplicantFamily::where('is_latest', 1)
                                ->where('user_id', Auth::user()->id)
                                ->first();
                $newFamily = $prevFamily->replicate();
                $newFamily->version += 1;
                $newFamily->is_latest = 1;
                $newFamily->save();
                $prevFamily->application_id = $application->id;
                $prevFamily->is_latest = 0;
                $prevFamily->save();

                $prevChildren = ApplicantChild::where('is_latest', 1)
                                ->where('user_id', Auth::user()->id)
                                ->get();
                if ($prevChildren) 
                {
                    foreach ($prevChildren as $prevChild) {  
                        $newChild = $prevChild->replicate();
                        $newChild->version += 1;
                        $newChild->is_latest = 1;
                        $newChild->save();
                        $prevChild->application_id = $application->id;
                        $prevChild->is_latest = 0;
                        $prevChild->save();
                    }
                }

                $prevEducations = ApplicantEducation::where('is_latest', 1)
                                ->where('user_id', Auth::user()->id)
                                ->get();
                if ($prevEducations)
                {
                    foreach ($prevEducations as $prevEducation) {  
                        $newEducation = $prevEducation->replicate();
                        $newEducation->version += 1;
                        $newEducation->is_latest = 1;
                        $newEducation->save();
                        $prevEducation->application_id = $application->id;
                        $prevEducation->is_latest = 0;
                        $prevEducation->save();
                    }
                }

                $prevEligibilities = ApplicantEligibility::where('is_latest', 1)
                                    ->where('user_id', Auth::user()->id)
                                    ->get();
                if ($prevEligibilities)
                {
                    foreach ($prevEligibilities as $prevEligibility) {   
                        $newEligibility = $prevEligibility->replicate();
                        $newEligibility->version += 1;
                        $newEligibility->is_latest = 1;
                        $newEligibility->save();
                        $prevEligibility->application_id = $application->id;
                        $prevEligibility->is_latest = 0;
                        $prevEligibility->save();
                    }
                }

                $prevWorkExperiences = ApplicantWorkExperience::where('is_latest', 1)
                                        ->where('user_id', Auth::user()->id)
                                        ->get();
                if ($prevWorkExperiences)
                {
                    foreach ($prevWorkExperiences as $prevWorkExperience) {    
                        $newWorkExperience = $prevWorkExperience->replicate();
                        $newWorkExperience->version += 1;
                        $newWorkExperience->is_latest = 1;
                        $newWorkExperience->save();
                        $prevWorkExperience->application_id = $application->id;
                        $prevWorkExperience->is_latest = 0;
                        $prevWorkExperience->save();
                    }
                }

                $prevVolunteerWorks = ApplicantVolunteerWork::where('is_latest', 1)
                                        ->where('user_id', Auth::user()->id)
                                        ->get();
                if ($prevVolunteerWorks)
                {
                    foreach ($prevVolunteerWorks as $prevVolunteerWork) {
                        $newVolunteerWork = $prevVolunteerWork->replicate();
                        $newVolunteerWork->version += 1;
                        $newVolunteerWork->is_latest = 1;
                        $newVolunteerWork->save();
                        $prevVolunteerWork->application_id = $application->id;
                        $prevVolunteerWork->is_latest = 0;
                        $prevVolunteerWork->save();
                    }
                }

                $prevTrainings = ApplicantTraining::where('is_latest', 1)
                                ->where('user_id', Auth::user()->id)
                                ->get();
                if ($prevTrainings)
                {
                    foreach ($prevTrainings as $prevTraining) {
                        $newTraining = $prevTraining->replicate();
                        $newTraining->version += 1;
                        $newTraining->is_latest = 1;
                        $newTraining->save();
                        $prevTraining->application_id = $application->id;
                        $prevTraining->is_latest = 0;
                        $prevTraining->save();
                    }
                }

                $prevOtherInformations = ApplicantOtherInformation::where('is_latest', 1)
                                        ->where('user_id', Auth::user()->id)
                                        ->get();
                if ($prevOtherInformations)
                {
                    foreach ($prevOtherInformations as $prevOtherInformation) {
                        $newOtherInformation = $prevOtherInformation->replicate();
                        $newOtherInformation->version += 1;
                        $newOtherInformation->is_latest = 1;
                        $newOtherInformation->save();
                        $prevOtherInformation->application_id = $application->id;
                        $prevOtherInformation->is_latest = 0;
                        $prevOtherInformation->save();
                    }
                }

                $prevQuestions = ApplicantQuestion::where('is_latest', 1)
                                ->where('user_id', Auth::user()->id)
                                ->first();
                $newQuestions = $prevQuestions->replicate();
                $newQuestions->version += 1;
                $newQuestions->is_latest = 1;
                $newQuestions->save();
                $prevQuestions->application_id = $application->id;
                $prevQuestions->is_latest = 0;
                $prevQuestions->save();

                $prevAttachments = ApplicantAttachment::where('is_latest', 1)
                                    ->where('user_id', Auth::user()->id)
                                    ->get();
                if ($prevAttachments)
                {
                    foreach ($prevAttachments as $prevAttachment) {
                        $newAttachment = $prevAttachment->replicate();
                        $newAttachment->version += 1;
                        $newAttachment->is_latest = 1; 
                        $newAttachment->save();
                        $prevAttachment->application_id = $application->id;
                        $prevAttachment->is_latest = 0;
                        $prevAttachment->save(); 
                    }
                }
            });

            session()->flash('message', 'You have successfully submitted your application!');
            session()->flash('message-type', 'success');
            session()->flash('action-type', 'create');
            return redirect()->route('vacancies.card');

        } catch (Exception $e) { 
            session()->flash('message', 'Failed to submit application.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'create');
            return redirect()->route('vacancies.card');
        }
    }

    
    public function show(string $encodedId)
    {
        if (!Auth::user()) abort(403);     // logged in as any user

        $id = hashid_decode($encodedId)[0] ?? null;

        $application = Application::with('user',
                                                    'vacancy',
                                                    'vacancy.position',
                                                    'applicant_profile',
                                                    'attachment')
                        ->where('id',$id)
                        ->first();
        $filepath = '/uploads/attachments/';

        if ($application == null) abort(404);   // nonexistent id
        if (Auth::user()->isApplicant() && $application->user->id!=Auth::user()->id) abort(403);  // other applicants are not allowed

        return view('hr.applications.show' , [
                    'application' => $application,
                    'filepath' => $filepath,
                    ]);
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
        try {
            $application = Application::findOrFail($id);
            $application->status = "Withdrawn";
            $application->delete();

            session()->flash('message', 'Application withdrawn successfully!');
            session()->flash('message-type', 'success');
            session()->flash('action-type', 'delete');
            return redirect()->route('vacancies.card');


        } catch (Exception $e) { 
            session()->flash('message', 'Failed to withdraw application.');
            session()->flash('message-type', 'error');
            session()->flash('action-type', 'delete');
            return redirect()->route('vacancies.card');
        }
    }
}
