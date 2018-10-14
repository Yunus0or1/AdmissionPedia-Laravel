<?php



Route::get('/', 'PageController@homepage');

Route::get('/aboutus', 'PageController@aboutus');

Route::get('/formfirstpage', 'PageController@formfirstpage');

Route::get('/input', 'PageController@create');

Route::post('/input', ['as'=>'student.store', 'uses' => 'PageController@initial']);

//Initial input of curriculum
Route::get('entryScience/{hsc_year}/{ssc_year}',['as' => 'datapassScience', 'uses' => 'PageController@science']);
Route::get('entryCommerce/{hsc_year}/{ssc_year}', ['as' => 'datapassCommerce', 'uses' =>'PageController@commerce']);
Route::get('entryHumanities/{hsc_year}/{ssc_year}', ['as' => 'datapassHumanities', 'uses' =>'PageController@humanities']);


//Input of GPA and then redirect to University Show page
Route::post('entryS', ['as'=>'gpa.science', 'uses' => 'ScienceController@checkScience']);
Route::post('entryC', ['as'=>'gpa.commerce', 'uses' => 'CommerceController@checkCommerce']);
Route::post('entryH', ['as'=>'gpa.humanities', 'uses' => 'HumanitiesController@checkHumanities']);


//Unit finding
Route::get('entry/{univ_id}/{student_id}/{group}', 'PageController@checkUnit');

Route::get('science_unit/{univ_id}/{student_id}/{group}',['as' => 'science_unit_finding', 'uses' => 'ScienceController@science_unit_finding']);
Route::get('commerce_unit/{univ_id}/{student_id}/{group}', ['as' => 'commerce_unit_finding', 'uses' =>'CommerceController@commerce_unit_finding']);
Route::get('humanities_unit/{univ_id}/{student_id}/{group}', ['as' => 'humanities_unit_finding', 'uses' =>'HumanitiesController@humanities_unit_finding']);


//Department finding
Route::get('entrydept/{unit_id}/{student_id}/{group}', 'PageController@checkDept');

Route::get('science_dept/{univ_id}/{student_id}/{group}',['as' => 'science_dept_finding', 'uses' => 'ScienceController@science_dept_finding']);
Route::get('commerce_dept/{univ_id}/{student_id}/{group}', ['as' => 'commerce_dept_finding', 'uses' =>'CommerceController@commerce_dept_finding']);
Route::get('humanities_unit/{univ_id}/{student_id}/{group}', ['as' => 'humanities_dept_finding', 'uses' =>'HumanitiesController@humanities_dept_finding']);

	
//why unselected

Route::get('rejected/{univ_id}/{student_id}','PageController@rejected');




//outOfDate

Route::get('outofdate/{univ_id}/{group_id}','PageController@outofdate');


// Foreigner student GRE gets input here

Route::get('gre_score/','GREcontroller@gre_score');
Route::post('gre_score/','GREcontroller@gre_university');
Route::get('foreigner/{univ_id}','GREcontroller@gre_unit');






//From here the community of students starts

Route::get('/register', 'RegistrationController@register');
Route::post('/register', ['as'=>'registrationcomplete', 'uses' => 'RegistrationController@registrationcomplete']);


Route::get('/activate/{user_email}/{code}', 'RegistrationController@activate');

Route::get('/login', 'LoginController@login');
Route::post('/login', ['as'=>'loggedin', 'uses' => 'LoginController@loggedin']);
Route::post('/logout', ['as'=>'loggedout', 'uses' => 'LoginController@logout']);

Route::get('/community', 'CommunityController@community')->middleware('authcustom');

Route::get('/profile', 'CommunityController@profile')->middleware('authcustom');
Route::post('/profile', 'CommunityController@profileEdit')->middleware('authcustom');

Route::get('/subscription', 'CommunityController@subscription')->middleware('authcustom');

Route::post('/yes_subscription', 'CommunityController@yes_subscription');
Route::get('/no_subscription', 'CommunityController@no_subscription')->middleware('authcustom');



Route::get('/askquestion', 'CommunityController@askquestion')->middleware('authcustom');
Route::post('/askquestion', 'CommunityController@askingquestion')->middleware('authcustom');

Route::get('/detailsofquestion/{question_id}/', 'CommunityController@detailsofquestion')->middleware('authcustom');
Route::post('/reply', 'CommunityController@reply')->middleware('authcustom');

Route::get('/allyourquestions/', 'CommunityController@allyourquestions')->middleware('authcustom');

// Add New admin or member
Route::get('/addmember', 'RegistrationController@addmember')->middleware('authcustom');
Route::post('/addmember', ['as'=>'registerNewMember', 'uses' => 'RegistrationController@registerNewMember']);

//Subscription

Route::get('/subscription', 'CommunityController@subscription')->middleware('authcustom');
Route::get('/subscription/add/{user_id}/{university_id}','CommunityController@addSubscription');
Route::get('/subscription/delete/{user_id}/{university_id}','CommunityController@deleteSubscription');

//Awarness by admin

Route::get('alert', 'CommunityController@sendAwarness')->middleware('authcustom');
Route::post('alert', 'CommunityController@sendEmail')->middleware('authcustom');

//changing breaking news

Route::get('breakingNews', 'PageController@breakingNews')->middleware('authcustom');
Route::post('breakingNews', 'PageController@breakingNewsSent')->middleware('authcustom');
Route::get('removenews', 'PageController@removenews')->middleware('authcustom');


// universityInformation Controller works here

Route::get('/adduniversity', 'universityInformation@adduniversity')->middleware('authcustom');
Route::post('/adduniversity', 'universityInformation@addeduniversity')->middleware('authcustom');
Route::get('/edituniversity', 'universityInformation@edituniversity')->middleware('authcustom');
Route::post('/edituniversity', 'universityInformation@selecteduniversity')->middleware('authcustom');
Route::post('/edituniversitydetails', 'universityInformation@edituniversitydetails')->middleware('authcustom');
Route::post('/updateuniversitydetails', 'universityInformation@updateuniversitydetails')->middleware('authcustom');


Route::get('/editunit', 'universityInformation@edituniversity')->middleware('authcustom');
Route::post('/editunit', 'universityInformation@editunit')->middleware('authcustom');
Route::post('/updateunitdetails', 'universityInformation@updateunitdetails')->middleware('authcustom');


Route::get('/addsubject/{unit_id}/{editing_type_syllabus}', 'universityInformation@addsubject')->middleware('authcustom');
Route::post('/addsubject', 'universityInformation@subject_added')->middleware('authcustom');

Route::get('/updatedept/{dept_id}/', 'universityInformation@updatedept')->middleware('authcustom');
Route::post('/updatedept', 'universityInformation@dept_updated')->middleware('authcustom');








