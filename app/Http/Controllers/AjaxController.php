<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Location;
use App\User;
use App\Work;
use App\Profile;
use App\Education;
use App\Skill;
use App\Award;
use App\Language;
use App\Volunteer;
use App\Interest;
use App\Publication;
use App\Reference;
use App\Http\Controllers\backend\BaseController as Base;

class AjaxController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:web')->only(['loadPersonalForm']);
    }

    //Ajax check username of new user
    public function checkUserUsername(Request $request)
    {
    	$count = User::whereUsername($request->get('name'))->count();
        return response()->json($count);
    }

    //Ajax load personal form in cv page
    public function loadPersonalForm(Request $request)
    {
    	$user = Auth::guard('web')->user();
    	if(!$user->location()->exists())
    		$user->location = new Location;
        return response()->json(array('content'=>mb_convert_encoding(View::make('component.frontend.cv.forms.user-info',compact('user'))->render(), 'UTF-8', 'UTF-8')));
    }
    //Ajax store from the personal form in cv page
    public function storePersonalForm(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'about' => 'required|min:3|max:255',
            'phone' => 'nullable|min:7|max:20',
            'website' => 'nullable|url|min:3|max:255',
            'profession' => 'nullable|min:3|max:255',
            'street' => 'required|min:3|max:255',
            'postal_code' => 'required|min:1|max:15',
            'region' => 'nullable|min:1|max:30',
            'city' => 'required|min:3|max:100',
            'country_code' => 'required|min:2|max:5',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()]);
        }
        else{
	    	$user = Auth::guard('web')->user();
        	$user->summary = $request->get('about');
        	$user->phone = $request->get('phone');
        	$user->website = $request->get('website');
        	$user->label = $request->get('profession');
        	$user->save();
	        //Update or insert user location 
	    	Location::updateOrInsert(
	    			[
	    				'address'=>$request->get('street'), 
	    				'postal_code'=>$request->get('postal_code'),
	    				'region'=>$request->get('region'),
	    				'city'=>$request->get('city'),
	    				'country_code'=>$request->get('country_code')
	    			],
	    			['user_id'=>$user->id]
	    		);
        	return $this->loadPersonalData($request);
        }
    }

    //Ajax load persoanal data in CV page
    public function loadPersonalData(Request $request)
    {
    	$user = Auth::guard('web')->user();
    	if(!$user->location()->exists())
    		$user->location = new Location;
        return response()->json(array('content'=>mb_convert_encoding(View::make('component.frontend.cv.user-info',compact('user'))->render(), 'UTF-8', 'UTF-8')));
    }

    //Ajax profile picture upload in CV page
    public function uploadProfilePicture(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()]);
        }
        else{
	    	$user = Auth::guard('web')->user();
        	//checking if an User Image is present for the username if so making an unique file name
	        if($request->hasFile('image')){
	            $file           = $request->file('image');
	            $ext =$file->getClientOriginalExtension();
	            if (file_exists(public_path() . '/uploads/avatars/'.$user->username.'.'.$ext)) {
	                $image = Base::checkFile($user->username,$ext,public_path() . '/uploads/avatars/');
	            }
	            else{
	                $image = $user->username.'.'.$ext;
	            }
	            $file->move(public_path() . '/uploads/avatars/', $image);
	            if(!empty($user->picture)){
	                if (file_exists(public_path() . '/uploads/avatars/'.$user->picture)) {
	                    unlink(public_path().'/uploads/avatars/'.$user->picture);
	                }
	            }
	            $user->picture = $image;
	        }
	        $user->save();
        	return response()->json([$user->picture]);
        }
    }
    //Ajax load Work form in CV page
    public function loadWorkForm(Request $request)
    {
    	if(!empty($request->get('key')))
    	{
    		$key = str_replace('work-ref', '', $request->get('key'));
    		$user = Auth::guard('web')->user();
    		$work = $user->work()->findOrFail($key);
    	}
    	else
    	{
    		$work = new Work;
    	}
        return response()->json(array('content'=>mb_convert_encoding(View::make('component.frontend.cv.forms.user-work',compact('work'))->render(), 'UTF-8', 'UTF-8')));
    }

    //Ajax store data from Work form in cv page
    public function storeWorkForm(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'company_name' => 'required|min:3|max:255',
            'company_position' => 'required|min:3|max:255',
            'company_website' => 'nullable|url|min:7|max:255',
            'work_start_date' => 'required|date|before:today',
            'work_end_date' => 'nullable|date|after:work_start_date',
            'work_summary' => 'required|min:3|max:255',
            'work_highlight' => 'required|min:3',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()]);
        }
        else
        {
        	//return response()->json($request->all());
    		$user = Auth::guard('web')->user();
    		$key = str_replace('work-ref','', $request->get('key'));
	    	if(!empty($key))
	    	{
	    		$work = $user->work()->findOrFail((int)$key);
	    	}
	    	else
	    		$work = new Work;
    		$work->company = $request->get('company_name');
    		$work->position =$request->get('company_position');
    		$work->website = $request->get('company_website');
    		$work->start_date = $request->get('work_start_date');
    		$work->end_date = $request->get('work_end_date');
    		$work->summary = $request->get('work_summary');
    		$work->highlights = explode(PHP_EOL, $request->get('work_highlight'));
    		$work->user_id = $user->id;
    		$work->save();
	        return response()->json(array('content'=>mb_convert_encoding(View::make('component.frontend.cv.user-work-single',compact('work'))->render(), 'UTF-8', 'UTF-8')));
		}
    }
    //Ajax delete a existing Work
    public function deleteWork(Request $request)
    {
    	if(!empty($request->get('key')))
    	{
    		$key = str_replace('work-ref', '', $request->get('key'));
    		$user = Auth::guard('web')->user();
    		$work = $user->work()->findOrFail($key);
    		$work->delete();
    		return response()->json(true);
    	}
    	return response()->json(['error'=>'Sorry we couldnot locate the work.']);
        
    }

    //Ajax load Profile form in CV page
    public function loadProfileForm(Request $request)
    {
    	if(!empty($request->get('key')))
    	{
    		$key = str_replace('profile-ref', '', $request->get('key'));
    		$user = Auth::guard('web')->user();
    		$profile = $user->profiles()->findOrFail($key);
    	}
    	else
    	{
    		$profile = new Profile;
    	}
        return response()->json(array('content'=>mb_convert_encoding(View::make('component.frontend.cv.forms.user-profile',compact('profile'))->render(), 'UTF-8', 'UTF-8')));
    }

    //Ajax store data from Profile form in cv page
    public function storeProfileForm(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'profile_network' => 'required|min:2|max:255',
            'profile_username' => 'required|min:3|max:100',
            'profile_link' => 'required|url|min:7|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()]);
        }
        else
        {
        	//return response()->json($request->all());
    		$user = Auth::guard('web')->user();
	    	if(!empty($request->get('key')))
	    	{
	    		$key = str_replace('profile-ref','', $request->get('key'));
	    		$profile = $user->profiles()->findOrFail((int)$key);
	    	}
	    	else
	    		$profile = new Profile;
    		$profile->network = $request->get('profile_network');
    		$profile->username =$request->get('profile_username');
    		$profile->url = $request->get('profile_link');
    		$profile->user_id = $user->id;
    		$profile->save();
	        return response()->json(array('content'=>mb_convert_encoding(View::make('component.frontend.cv.user-profile-single',compact('profile'))->render(), 'UTF-8', 'UTF-8')));
		}
    }
    //Ajax delete a existing Profile
    public function deleteProfile(Request $request)
    {
    	if(!empty($request->get('key')))
    	{
    		$key = str_replace('profile-ref', '', $request->get('key'));
    		$user = Auth::guard('web')->user();
    		$profile = $user->profiles()->findOrFail($key);
    		$profile->delete();
    		return response()->json(true);
    	}
    	return response()->json(['error'=>'Sorry we couldnot locate the profile.']);
        
    }

    //Ajax load Education form in CV page
    public function loadEducationForm(Request $request)
    {
		$key = str_replace('education-ref', '', $request->get('key'));
    	if(!empty($key))
    	{
    		$user = Auth::guard('web')->user();
    		$education = $user->education()->findOrFail((int)$key);
    	}
    	else
    	{
    		$education = new Education;
    	}
        return response()->json(array('content'=>mb_convert_encoding(View::make('component.frontend.cv.forms.user-education',compact('education'))->render(), 'UTF-8', 'UTF-8')));
    }

    //Ajax store data from Education form in cv page
    public function storeEducationForm(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'institution_name' => 'required|min:3|max:255',//institution
            'education_level' => 'required|min:3|max:100',//study_type
            'course_area' => 'required|min:3|max:255',//area
            'education_start_date' => 'required|date|before:today',
            'education_end_date' => 'nullable|date|after:education_start_date',
            'education_gpa' => 'required|numeric|min:0.0|max:5.0',
            'edu_courses'=>'required|min:1',
        ]);
        if ($validator->fails()) {
        	if(empty($request->get('edu_courses')))
        	{
        		$validator->errors()->add('select_input_education', 'The courses cannot be empty.');
        	}
            return response()->json(['error'=>$validator->errors()]);
        }
        else
        {
        	//return response()->json($request->all());
    		$user = Auth::guard('web')->user();
    		$key = str_replace('education-ref','', $request->get('key'));
	    	if(!empty($key))
	    	{
	    		$education = $user->education()->findOrFail((int)$key);
	    	}
	    	else
	    		$education = new Education;
    		$education->institution = $request->get('institution_name');
    		$education->study_type =$request->get('education_level');
    		$education->area = $request->get('course_area');
    		$education->start_date = $request->get('education_start_date');
    		$education->end_date = $request->get('education_end_date');
    		$education->gpa = $request->get('education_gpa');
    		$education->courses = $request->get('edu_courses');
    		$education->user_id = $user->id;
    		$education->save();
	        return response()->json(array('content'=>mb_convert_encoding(View::make('component.frontend.cv.user-education-single',compact('education'))->render(), 'UTF-8', 'UTF-8')));
		}
    }
    //Ajax delete a existing Education
    public function deleteEducation(Request $request)
    {
    	if(!empty($request->get('key')))
    	{
    		$key = str_replace('education-ref', '', $request->get('key'));
    		$user = Auth::guard('web')->user();
    		$education = $user->education()->findOrFail($key);
    		$education->delete();
    		return response()->json(true);
    	}
    	return response()->json(['error'=>'Sorry we couldnot locate the education.']);
        
    }

    //Ajax load Skill form in CV page
    public function loadSkillForm(Request $request)
    {
		$key = str_replace('skill-ref', '', $request->get('key'));
    	if(!empty($key))
    	{
    		$user = Auth::guard('web')->user();
    		$skill = $user->skills()->findOrFail((int)$key);
    	}
    	else
    	{
    		$skill = new Skill;
    	}
        return response()->json(array('content'=>mb_convert_encoding(View::make('component.frontend.cv.forms.user-skill',compact('skill'))->render(), 'UTF-8', 'UTF-8')));
    }

    //Ajax store data from Skill form in cv page
    public function storeSkillForm(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'skill_name' => 'required|min:3|max:255',
            'skill_level' => 'required|min:3|max:100',
            'skill_keywords'=>'required|min:1',
        ]);
        if ($validator->fails()) {
        	if(empty($request->get('skill_keywords')))
        	{
        		$validator->errors()->add('select_input_skill', 'The keywords cannot be empty.');
        	}
            return response()->json(['error'=>$validator->errors()]);
        }
        else
        {
        	//return response()->json($request->all());
    		$user = Auth::guard('web')->user();
    		$key = str_replace('skill-ref','', $request->get('key'));
	    	if(!empty($key))
	    	{
	    		$skill = $user->skills()->findOrFail((int)$key);
	    	}
	    	else
	    		$skill = new Skill;
    		$skill->name = $request->get('skill_name');
    		$skill->level =$request->get('skill_level');
    		$skill->keywords = $request->get('skill_keywords');
    		$skill->user_id = $user->id;
    		$skill->save();
	        return response()->json(array('content'=>mb_convert_encoding(View::make('component.frontend.cv.user-skill-single',compact('skill'))->render(), 'UTF-8', 'UTF-8')));
		}
    }
    //Ajax delete a existing Skill
    public function deleteSkill(Request $request)
    {
    	if(!empty($request->get('key')))
    	{
    		$key = str_replace('skill-ref', '', $request->get('key'));
    		$user = Auth::guard('web')->user();
    		$skill = $user->skills()->findOrFail((int)$key);
    		$skill->delete();
    		return response()->json(true);
    	}
    	return response()->json(['error'=>'Sorry we couldnot locate the skill.']);
        
    }

    //Ajax load Award form in CV page
    public function loadAwardForm(Request $request)
    {
		$key = str_replace('award-ref', '', $request->get('key'));
    	if(!empty($key))
    	{
    		$user = Auth::guard('web')->user();
    		$award = $user->awards()->findOrFail((int)$key);
    	}
    	else
    	{
    		$award = new Award;
    	}
        return response()->json(array('content'=>mb_convert_encoding(View::make('component.frontend.cv.forms.user-award',compact('award'))->render(), 'UTF-8', 'UTF-8')));
    }

    //Ajax store data from Award form in cv page
    public function storeAwardForm(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'award_name' => 'required|min:3|max:255',
            'awarded_by' => 'required|min:3|max:255',
            'award_date'=>'required|date|before:today',
            'award_summary'=>'required|min:3|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()]);
        }
        else
        {
        	//return response()->json($request->all());
    		$user = Auth::guard('web')->user();
    		$key = str_replace('award-ref','', $request->get('key'));
	    	if(!empty($key))
	    	{
	    		$award = $user->awards()->findOrFail((int)$key);
	    	}
	    	else
	    		$award = new Award;
    		$award->title = $request->get('award_name');
    		$award->awarder =$request->get('awarded_by');
    		$award->date = $request->get('award_date');
    		$award->summary = $request->get('award_summary');
    		$award->user_id = $user->id;
    		$award->save();
	        return response()->json(array('content'=>mb_convert_encoding(View::make('component.frontend.cv.user-award-single',compact('award'))->render(), 'UTF-8', 'UTF-8')));
		}
    }
    //Ajax delete a existing Award
    public function deleteAward(Request $request)
    {
    	if(!empty($request->get('key')))
    	{
    		$key = str_replace('award-ref', '', $request->get('key'));
    		$user = Auth::guard('web')->user();
    		$award = $user->awards()->findOrFail((int)$key);
    		$award->delete();
    		return response()->json(true);
    	}
    	return response()->json(['error'=>'Sorry we couldnot locate the award.']);
        
    }

    //Ajax load Language form in CV page
    public function loadLanguageForm(Request $request)
    {
		$key = str_replace('language-ref', '', $request->get('key'));
    	if(!empty($key))
    	{
    		$user = Auth::guard('web')->user();
    		$language = $user->languages()->findOrFail((int)$key);
    	}
    	else
    	{
    		$language = new Language;
    	}
        return response()->json(array('content'=>mb_convert_encoding(View::make('component.frontend.cv.forms.user-language',compact('language'))->render(), 'UTF-8', 'UTF-8')));
    }

    //Ajax store data from Language form in cv page
    public function storeLanguageForm(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'language' => 'required|min:3|max:30',
            'language_fluency' => 'required|min:3|max:30',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()]);
        }
        else
        {
        	//return response()->json($request->all());
    		$user = Auth::guard('web')->user();
    		$key = str_replace('language-ref','', $request->get('key'));
	    	if(!empty($key))
	    	{
	    		$language = $user->languages()->findOrFail((int)$key);
	    	}
	    	else
	    		$language = new Language;
    		$language->language = $request->get('language');
    		$language->fluency =$request->get('language_fluency');
    		$language->user_id = $user->id;
    		$language->save();
	        return response()->json(array('content'=>mb_convert_encoding(View::make('component.frontend.cv.user-language-single',compact('language'))->render(), 'UTF-8', 'UTF-8')));
		}
    }
    //Ajax delete a existing Language
    public function deleteLanguage(Request $request)
    {
    	if(!empty($request->get('key')))
    	{
    		$key = str_replace('language-ref', '', $request->get('key'));
    		$user = Auth::guard('web')->user();
    		$language = $user->languages()->findOrFail((int)$key);
    		$language->delete();
    		return response()->json(true);
    	}
    	return response()->json(['error'=>'Sorry we couldnot locate the language.']);
        
    }

    //Ajax load Volunteer form in CV page
    public function loadVolunteerForm(Request $request)
    {
    	if(!empty($request->get('key')))
    	{
    		$key = str_replace('volunteer-ref', '', $request->get('key'));
    		$user = Auth::guard('web')->user();
    		$volunteer = $user->volunteer()->findOrFail($key);
    	}
    	else
    	{
    		$volunteer = new Volunteer;
    	}
        return response()->json(array('content'=>mb_convert_encoding(View::make('component.frontend.cv.forms.user-volunteer',compact('volunteer'))->render(), 'UTF-8', 'UTF-8')));
    }

    //Ajax store data from Volunteer form in cv page
    public function storeVolunteerForm(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'organization_name' => 'required|min:3|max:255',
            'organization_position' => 'required|min:3|max:255',
            'organization_website' => 'nullable|url|min:7|max:255',
            'volunteer_start_date' => 'required|date|before:today',
            'volunteer_end_date' => 'nullable|date|after:volunteer_start_date',
            'volunteer_summary' => 'required|min:3|max:255',
            'volunteer_highlight' => 'required|min:3',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()]);
        }
        else
        {
        	//return response()->json($request->all());
    		$user = Auth::guard('web')->user();
    		$key = str_replace('volunteer-ref','', $request->get('key'));
	    	if(!empty($key))
	    	{
	    		$volunteer = $user->volunteer()->findOrFail((int)$key);
	    	}
	    	else
	    		$volunteer = new Volunteer;
    		$volunteer->organization = $request->get('organization_name');
    		$volunteer->position =$request->get('organization_position');
    		$volunteer->website = $request->get('organization_website');
    		$volunteer->start_date = $request->get('volunteer_start_date');
    		$volunteer->end_date = $request->get('volunteer_end_date');
    		$volunteer->summary = $request->get('volunteer_summary');
    		$volunteer->highlights = explode(PHP_EOL, $request->get('volunteer_highlight'));
    		$volunteer->user_id = $user->id;
    		$volunteer->save();
	        return response()->json(array('content'=>mb_convert_encoding(View::make('component.frontend.cv.user-volunteer-single',compact('volunteer'))->render(), 'UTF-8', 'UTF-8')));
		}
    }
    //Ajax delete a existing Volunteer
    public function deleteVolunteer(Request $request)
    {
    	if(!empty($request->get('key')))
    	{
    		$key = str_replace('volunteer-ref', '', $request->get('key'));
    		$user = Auth::guard('web')->user();
    		$volunteer = $user->volunteer()->findOrFail($key);
    		$volunteer->delete();
    		return response()->json(true);
    	}
    	return response()->json(['error'=>'Sorry we couldnot locate the volunteer.']);
        
    }

    //Ajax load Interest form in CV page
    public function loadInterestForm(Request $request)
    {
		$key = str_replace('interest-ref', '', $request->get('key'));
    	if(!empty($key))
    	{
    		$user = Auth::guard('web')->user();
    		$interest = $user->interests()->findOrFail((int)$key);
    	}
    	else
    	{
    		$interest = new Interest;
    	}
        return response()->json(array('content'=>mb_convert_encoding(View::make('component.frontend.cv.forms.user-interest',compact('interest'))->render(), 'UTF-8', 'UTF-8')));
    }

    //Ajax store data from Interest form in cv page
    public function storeInterestForm(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'interest_name' => 'required|min:3|max:255',
            'interest_keywords'=>'required|min:1',
        ]);
        if ($validator->fails()) {
        	if(empty($request->get('interest_keywords')))
        	{
        		$validator->errors()->add('select_input_interest', 'The keywords cannot be empty.');
        	}
            return response()->json(['error'=>$validator->errors()]);
        }
        else
        {
        	//return response()->json($request->all());
    		$user = Auth::guard('web')->user();
    		$key = str_replace('interest-ref','', $request->get('key'));
	    	if(!empty($key))
	    	{
	    		$interest = $user->interests()->findOrFail((int)$key);
	    	}
	    	else
	    		$interest = new Interest;
    		$interest->name = $request->get('interest_name');
    		$interest->keywords = $request->get('interest_keywords');
    		$interest->user_id = $user->id;
    		$interest->save();
	        return response()->json(array('content'=>mb_convert_encoding(View::make('component.frontend.cv.user-interest-single',compact('interest'))->render(), 'UTF-8', 'UTF-8')));
		}
    }
    //Ajax delete a existing Interest
    public function deleteInterest(Request $request)
    {
    	if(!empty($request->get('key')))
    	{
    		$key = str_replace('interest-ref', '', $request->get('key'));
    		$user = Auth::guard('web')->user();
    		$interest = $user->interests()->findOrFail((int)$key);
    		$interest->delete();
    		return response()->json(true);
    	}
    	return response()->json(['error'=>'Sorry we couldnot locate the interest.']);
        
    }

    //Ajax load Publication form in CV page
    public function loadPublicationForm(Request $request)
    {
    	if(!empty($request->get('key')))
    	{
    		$key = str_replace('publication-ref', '', $request->get('key'));
    		$user = Auth::guard('web')->user();
    		$publication = $user->publications()->findOrFail($key);
    	}
    	else
    	{
    		$publication = new Publication;
    	}
        return response()->json(array('content'=>mb_convert_encoding(View::make('component.frontend.cv.forms.user-publication',compact('publication'))->render(), 'UTF-8', 'UTF-8')));
    }

    //Ajax store data from Publication form in cv page
    public function storePublicationForm(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'publication_name' => 'required|min:3|max:255',
            'publication_date' => 'required|date|before:today',
            'published_by' => 'required|min:3|max:255',
            'publication_website' => 'nullable|url|min:7|max:255',
            'publication_summary' => 'required|min:3|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()]);
        }
        else
        {
        	//return response()->json($request->all());
    		$user = Auth::guard('web')->user();
    		$key = str_replace('publication-ref','', $request->get('key'));
	    	if(!empty($key))
	    	{
	    		$publication = $user->publications()->findOrFail((int)$key);
	    	}
	    	else
	    		$publication = new Publication;
    		$publication->name = $request->get('publication_name');
    		$publication->release_date =$request->get('publication_date');
    		$publication->website = $request->get('publication_website');
    		$publication->publisher = $request->get('published_by');
    		$publication->summary = $request->get('publication_summary');
    		$publication->user_id = $user->id;
    		$publication->save();
	        return response()->json(array('content'=>mb_convert_encoding(View::make('component.frontend.cv.user-publication-single',compact('publication'))->render(), 'UTF-8', 'UTF-8')));
		}
    }
    //Ajax delete a existing Publication
    public function deletePublication(Request $request)
    {
    	if(!empty($request->get('key')))
    	{
    		$key = str_replace('publication-ref', '', $request->get('key'));
    		$user = Auth::guard('web')->user();
    		$publication = $user->publications()->findOrFail($key);
    		$publication->delete();
    		return response()->json(true);
    	}
    	return response()->json(['error'=>'Sorry we couldnot locate the publication.']);
        
    }

    //Ajax load Reference form in CV page
    public function loadReferenceForm(Request $request)
    {
        if(!empty($request->get('key')))
        {
            $key = str_replace('reference-ref', '', $request->get('key'));
            $user = Auth::guard('web')->user();
            $reference = $user->references()->findOrFail($key);
        }
        else
        {
            $reference = new Reference;
        }
        return response()->json(array('content'=>mb_convert_encoding(View::make('component.frontend.cv.forms.user-reference',compact('reference'))->render(), 'UTF-8', 'UTF-8')));
    }

    //Ajax store data from Reference form in cv page
    public function storeReferenceForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reference_name' => 'required|min:3|max:100',
            'reference_detail' => 'required|min:3|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()]);
        }
        else
        {
            //return response()->json($request->all());
            $user = Auth::guard('web')->user();
            $key = str_replace('reference-ref','', $request->get('key'));
            if(!empty($key))
            {
                $reference = $user->references()->findOrFail((int)$key);
            }
            else
                $reference = new Reference;
            $reference->name = $request->get('reference_name');
            $reference->reference =$request->get('reference_detail');
            $reference->user_id = $user->id;
            $reference->save();
            return response()->json(array('content'=>mb_convert_encoding(View::make('component.frontend.cv.user-reference-single',compact('reference'))->render(), 'UTF-8', 'UTF-8')));
        }
    }
    //Ajax delete a existing Reference
    public function deleteReference(Request $request)
    {
        if(!empty($request->get('key')))
        {
            $key = str_replace('reference-ref', '', $request->get('key'));
            $user = Auth::guard('web')->user();
            $reference = $user->references()->findOrFail($key);
            $reference->delete();
            return response()->json(true);
        }
        return response()->json(['error'=>'Sorry we couldnot locate the reference.']);
        
    }


}
