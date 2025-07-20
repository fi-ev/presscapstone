<table class="w-full table-auto">
    <thead>
        <tr><th scope="col" colspan="11"></tr>
        <tr><th scope="col" colspan="11"></tr>
        <tr><th scope="col" colspan="11"></tr>
        <tr><th scope="col" colspan="11"></tr>
        <tr><th scope="col" colspan="11"></tr>
        <tr><th scope="col" colspan="11"></tr>
        <tr><th scope="col" colspan="11"></tr>
        <tr><th scope="col" colspan="11"></tr>
        <tr><th scope="col" colspan="11"></tr>
        <tr>
            <th scope="col" colspan="11" style="text-align: center; font-size: 14pt; font-weight: strong;" class="font-bold">QUALIFICATION MATRIX</th>
        </tr>
        <tr>
            <th scope="col" colspan="11" style="text-align: center; font-size: 14pt; font-weight: strong;" >DOLE-REGIONAL OFFICE NO. XI</th>
        </tr>
        <tr>
            <th scope="col" colspan="11" style="text-align: center; font-size: 12pt; font-weight: strong;">ITEM NO. ABC</th>
        </tr>
        <tr><th scope="col" colspan="11"></tr>
        <tr><th scope="col" colspan="11"></tr>
        <tr>
            <th scope="col" colspan="11"style="text-decoration: underline;"><b><u>Qualification Standards:</u></b></th>
        </tr>
        <tr>
            <th scope="col" colspan="11"><b>Education: 
                {{ $vacancy->position->education }}
            </b></th>
        </tr>
        <tr>
            <th scope="col" colspan="11"><b>Experience: 
                    {{ $vacancy->position->work_experience }}
            </b></th>
        </tr>
        <tr>
            <th scope="col" colspan="11"><b>Training: 
                @foreach($vacancy->position->getTrainings() as $training)
                    {{ $training }}; 
                @endforeach
            </b></th>
        </tr>
        <tr>
            <th scope="col" colspan="11"><b>Eligibility: 
                @foreach($vacancy->position->getEligibilities() as $eligibility)
                    {{ $eligibility }}; 
                @endforeach
            </b></th>
        </tr>
        <tr><th scope="col" colspan="11"></tr>
        <tr>
            <th rowspan="3" style="text-align: center; vertical-align: top; width: 30%; border: 1px solid black;"><b>#</b></th>
            <th rowspan="3" style="text-align: center; vertical-align: top; width: 400%; border: 1px solid black;"><b>NAME / POSITION / OFFICE / <br>AGE / STATUS / ELIGIBILITY / IPCR</b></th>
            <th colspan="2" style="text-align: center; vertical-align: top; width: 300%; border: 1px solid black;"><b>EDUCATION</b></th>
            <th rowspan="2" style="text-align: center; vertical-align: top; width: 300%; border: 1px solid black;"><b>TRAINING</b></th>
            <th rowspan="2" style="text-align: center; vertical-align: top; width: 400%; border: 1px solid black;"><b>OUTSTANDING ACCOMPLISHMENTS</b></th>
            <th colspan="2" style="text-align: center; vertical-align: top; width: 300%; border: 1px solid black;"><b>EXPERIENCE</b></th>
            <th rowspan="2" style="text-align: center; vertical-align: top; width: 200%; border: 1px solid black;"><b>INTERVIEW</b></th>
            <th rowspan="2" style="text-align: center; vertical-align: top; width: 200%; border: 1px solid black;"><b>EXAM</b></th>
            <th rowspan="2" style="text-align: center; vertical-align: top; width: 200%; border: 1px solid black;"><b>TOTAL</b></th>
        </tr>
    </thead>
    <tbody class="border">
        <tr>
            <th style="text-align: center; vertical-align: top; width: 300%; border: 1px solid black;"><b>Relevant</b></th>
            <th style="text-align: center; vertical-align: top; width: 300%; border: 1px solid black;"><b>Additional Degree</b></th>
            <th style="text-align: center; vertical-align: top; width: 200%; border: 1px solid black;"><b>Minimum Relevant</b></th>
            <th style="text-align: center; vertical-align: top; width: 200%; border: 1px solid black;"><b>Excess Relevant</b></th>
        </tr>
        <tr>
            <th style="text-align: center; vertical-align: top; width: 300%; border: 1px solid black;"><b>15</b></th>
            <th style="text-align: center; vertical-align: top; width: 300%; border: 1px solid black;"><b>5</b></th>
            <th style="text-align: center; vertical-align: top; width: 400%; border: 1px solid black;"><b>15</b></th>
            <th style="text-align: center; vertical-align: top; width: 300%; border: 1px solid black;"><b>5</b></th>
            <th style="text-align: center; vertical-align: top; width: 200%; border: 1px solid black;"><b>15</b></th>
            <th style="text-align: center; vertical-align: top; width: 200%; border: 1px solid black;"><b>5</b></th>
            <th style="text-align: center; vertical-align: top; width: 200%; border: 1px solid black;"><b>20</b></th>
            <th style="text-align: center; vertical-align: top; width: 200%; border: 1px solid black;"><b>20</b></th>
            <th style="text-align: center; vertical-align: top; width: 200%; border: 1px solid black;"><b>100</b></th>
        </tr>
        @foreach($vacancy->applications as $applicant)
            <tr>
                <td class="px-4 py-2" style="vertical-align: top; text-align: center; border: 1px solid black;">{{ $loop->iteration }}</td>
                <td class="px-4 py-2" style="vertical-align: top; border: 1px solid black;">
                    <p class="font-bold">{{ $applicant->applicant_profile->full_name }}</p>
                    <p class="text-xs">
                        {{ $applicant->applicant_profile->age($applicant->created_at) }} Years Old<br>
                        Birthdate: {{ $applicant->applicant_profile->birthdate->format('F j, Y') }}<br>
                        Status: {{ $applicant->applicant_profile->civil_status }}<br>
                        Eligibility: 
                        @foreach ($applicant->applicant_eligibility as $eligibility)
                            {{ $eligibility->type_eligibility->name }}<br>
                        @endforeach    
                        <br><br>
                        Email: {{ $applicant->applicant_profile->email }}<br>
                        Mobile: {{ $applicant->applicant_profile->mobile_no }}<br>
                        <br>
                        Position Sought: {{ $vacancy->position->title }}<br>
                    </p>
                </td>
                <td class="px-4 py-2" style="vertical-align: top; border: 1px solid black;">
                    @foreach($applicant->applicant_education as $education)
                        {{ $education->min_education_info() }}
                    @endforeach
                </td>
                <td class="px-4 py-2" style="vertical-align: top; border: 1px solid black;">
                    @foreach($applicant->applicant_education as $education)
                        {{ $education->addtl_education_info() }}
                    @endforeach
                </td>
                <td class="px-4 py-2" style="vertical-align: top; border: 1px solid black;">
                    @foreach($applicant->applicant_training as $training)
                        {{ $training->activity_title }} ({{ $training->hours_no }} Hours)<br>
                    @endforeach
                </td>
                <td class="px-4 py-2" style="vertical-align: top; border: 1px solid black;">
                    @foreach($applicant->applicant_other as $other)
                        {{ $other->recognition_info() }}<br>
                    @endforeach
                </td>
                <td class="px-4 py-2" style="vertical-align: top; border: 1px solid black;">
                    @php
                        $latestWork = $applicant->applicant_work_experience->sortByDesc('end_date')->first();
                        $remainingWork = $applicant->applicant_work_experience->sortByDesc('end_date')->slice(1);
                    @endphp

                    {{ $latestWork->position }} / {{ $latestWork->company }} 
                    <br>From {{ $latestWork->start_date->format('F j, Y') }} 
                    to {{ $latestWork->end_date->format('F j, Y') }} 
                    ({{ $latestWork->start_date->diffInYears($latestWork->end_date) < 1 
                        ? round($latestWork->start_date->diffInMonths($latestWork->end_date),1) . ' months' 
                        : round($latestWork->start_date->diffInYears($latestWork->end_date),1) . ' years' }})
                </td>
                <td class="px-4 py-2" style="vertical-align: top; border: 1px solid black;">
                    @foreach($remainingWork as $work)
                        {{ $work->position }} / {{ $work->company }} 
                        <br>From {{ $work->start_date->format('F j, Y') }} 
                        to {{ $work->end_date->format('F j, Y') }} 
                        ({{ $work->start_date->diffInYears($work->end_date) < 1 
                            ? round($work->start_date->diffInMonths($work->end_date),1) . ' months' 
                            : round($work->start_date->diffInYears($work->end_date),1) . ' years' }})<br><br>
                    @endforeach
                </td>
                <td class="px-4 py-2" style="vertical-align: top; border: 1px solid black;"></td>
                <td class="px-4 py-2" style="vertical-align: top; border: 1px solid black;"></td>
                <td class="px-4 py-2" style="vertical-align: top; border: 1px solid black;"></td>
            </tr>
        @endforeach
    </tbody>
</table>