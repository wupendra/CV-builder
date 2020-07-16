<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::prefix('admins')->group(function() {
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

//Admin Routes Start.........................................................
Route::group(array('prefix' => 'admins','namespace' => 'backend','middleware'=>'auth:admin'), function(){
	//dashboard
	Route::get('/', 'AdminController@adminDashboard')->name('admin.dashboard');
	//admin CRUD
	Route::resource('admin', 'AdminController');
	//theme CRUD
	Route::resource('theme', 'ThemeController');
    //theme ajax search route
    Route::post('search-theme' , ['uses' => 'AjaxController@searchThemes','as'   => 'search.theme.name']);
    //change status of theme
    Route::get('change-active-theme/{theme}' , ['uses' => 'AjaxController@changeActiveTheme','as'   => 'change.active.theme']);

	Route::resource('sitesetting', 'SitesettingController');
	Route::get('admin-profile','AdminController@viewProfile')->name('backend.view.profile');
    Route::get('admin-edit-profile','AdminController@editProfile')->name('backend.edit.profile');
    Route::post('admin-edit-profile','AdminController@postEditProfile')->name('backend.edit.profile');

});
//Admin Route End...............................................................

//Frontend Route Start...............................................................
Route::get('/', 'HomeController@index')->name('home');
Route::get('/themes', 'ThemeController@index')->name('frontend.theme.list');
Route::get('/mycv', 'UserController@index')->name('frontend.user.dashboard');
Route::get('/settings', 'UserController@userSettings')->name('frontend.user.settings');
Route::post('/visibility-settings', 'UserController@storeUserSettings')->name('frontend.visibility.submit');
Route::post('/change-user-password', 'UserController@postChangePassword')->name('frontend.change.password');
Route::get('/profile/{user}', 'UserController@viewProfile')->name('frontend.view.profile');
//check username for new user
Route::post('check-user-username', 'AjaxController@checkUserUsername')->name('frontend.check.username');

//CV ajax routes
Route::post('/cv-forms-personal', 'AjaxController@loadPersonalForm')->name('frontend.personal.form');
Route::post('/cv-store-personal', 'AjaxController@storePersonalForm')->name('frontend.personal.store');
Route::post('/cv-data-personal', 'AjaxController@loadPersonalData')->name('frontend.personal.data');
Route::post('/cv-profile-picture', 'AjaxController@uploadProfilePicture')->name('frontend.profile.picture');
Route::post('/cv-forms-work', 'AjaxController@loadWorkForm')->name('frontend.work.form');
Route::post('/cv-store-work', 'AjaxController@storeWorkForm')->name('frontend.work.store');
Route::post('/cv-work-delete', 'AjaxController@deleteWork')->name('frontend.work.delete');

Route::post('/cv-forms-profile', 'AjaxController@loadProfileForm')->name('frontend.profile.form');
Route::post('/cv-store-profile', 'AjaxController@storeProfileForm')->name('frontend.profile.store');
Route::post('/cv-profile-delete', 'AjaxController@deleteProfile')->name('frontend.profile.delete');

Route::post('/cv-forms-education', 'AjaxController@loadEducationForm')->name('frontend.education.form');
Route::post('/cv-store-education', 'AjaxController@storeEducationForm')->name('frontend.education.store');
Route::post('/cv-education-delete', 'AjaxController@deleteEducation')->name('frontend.education.delete');

Route::post('/cv-forms-skill', 'AjaxController@loadSkillForm')->name('frontend.skill.form');
Route::post('/cv-store-skill', 'AjaxController@storeSkillForm')->name('frontend.skill.store');
Route::post('/cv-skill-delete', 'AjaxController@deleteSkill')->name('frontend.skill.delete');

Route::post('/cv-forms-award', 'AjaxController@loadAwardForm')->name('frontend.award.form');
Route::post('/cv-store-award', 'AjaxController@storeAwardForm')->name('frontend.award.store');
Route::post('/cv-award-delete', 'AjaxController@deleteAward')->name('frontend.award.delete');

Route::post('/cv-forms-language', 'AjaxController@loadLanguageForm')->name('frontend.language.form');
Route::post('/cv-store-language', 'AjaxController@storeLanguageForm')->name('frontend.language.store');
Route::post('/cv-language-delete', 'AjaxController@deleteLanguage')->name('frontend.language.delete');

Route::post('/cv-forms-volunteer', 'AjaxController@loadVolunteerForm')->name('frontend.volunteer.form');
Route::post('/cv-store-volunteer', 'AjaxController@storeVolunteerForm')->name('frontend.volunteer.store');
Route::post('/cv-volunteer-delete', 'AjaxController@deleteVolunteer')->name('frontend.volunteer.delete');

Route::post('/cv-forms-interest', 'AjaxController@loadInterestForm')->name('frontend.interest.form');
Route::post('/cv-store-interest', 'AjaxController@storeInterestForm')->name('frontend.interest.store');
Route::post('/cv-interest-delete', 'AjaxController@deleteInterest')->name('frontend.interest.delete');

Route::post('/cv-forms-publication', 'AjaxController@loadPublicationForm')->name('frontend.publication.form');
Route::post('/cv-store-publication', 'AjaxController@storePublicationForm')->name('frontend.publication.store');
Route::post('/cv-publication-delete', 'AjaxController@deletePublication')->name('frontend.publication.delete');

Route::post('/cv-forms-reference', 'AjaxController@loadReferenceForm')->name('frontend.reference.form');
Route::post('/cv-store-reference', 'AjaxController@storeReferenceForm')->name('frontend.reference.store');
Route::post('/cv-reference-delete', 'AjaxController@deleteReference')->name('frontend.reference.delete');

//user theme preview
Route::get('/theme-preview/{theme}', 'ThemeController@themePreview')->name('frontend.theme.preview');
//theme selection
Route::get('/theme-selection', 'ThemeController@selectTheme')->name('frontend.theme.selection');
Route::post('/theme-selection', 'ThemeController@postSelectTheme')->name('frontend.theme.selection');

//cv pdf download
Route::get('generate-cv/{theme}','UserController@generateCv')->name('frontend.generate.pdf');

//terms and policy
Route::get('terms-and-conditions','HomeController@TermsNConditon')->name('frontend.terms.conditon');
Route::get('privacy-policy','HomeController@privacyPolicy')->name('frontend.privacy.policy');
//Frontend Route End...............................................................

//......Social Login Start..................
Route::get('login/{provider}',          'Auth\SocialAccountController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\SocialAccountController@handleProviderCallback');
//......Social Login Start..................

//.........Test Route......
Route::get('test-theme', function() { return view('frontend.theme.themes.elegant', ['name' => 'test']); });