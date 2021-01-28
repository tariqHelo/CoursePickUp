<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web Routes for your application. These
| Routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\city;
use App\destination;
use App\nationalities;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Auth::Routes();

//{{ Header Links }}

//Services
Route::get('services', 'HomeController@allServices')->name('allServices');
//service By Slug
Route::get('service/{slug}', 'HomeController@serviceBySlug')->name('serviceBySlug');
//Articles
Route::get('articles', 'HomeController@allArticles')->name('allArticles');
//article By Slug
Route::get('article/{slug}', 'HomeController@articleBySlug')->name('articleBySlug');


//Search Data Gust
Route::get('/searchData', 'HomeController@searchData')->name('select-data');



//Home Of Guest
Route::get('/{lang}', 'HomeController@index');
Route::get('/home/{lang}', 'HomeController@index');

//Blog
Route::get('blog', 'HomeController@blog');

//Search Guest
Route::post('coursesSearch', 'HomeController@coursesSearch');

//course By Country
Route::get('courses/{cuntry}', 'HomeController@courseByCountry');

//course by Schools
Route::get('courses/{school}', 'HomeController@coursebySchool');

//course by Package
Route::get('courses/{package}', 'HomeController@courseByPackage');

//Study Articles || Article By slug
Route::get('blog/{slug}', 'HomeController@ArticleBySlug');

//About Us
Route::get('About-Us', 'HomeController@AboutUs');


//Footer Links
Route::get('page/{slug}', 'PagesController@findPage')->name('pageSlug');


Route::get('ajaxGetCitesByIdCountry/{id}', 'HomeController@getCites');
Route::get('ajaxGetSchoolsByCountry/{id}', 'HomeController@ajaxGetSchoolsByCountry');

Route::group(['prefix' => 'admin/dashbord', 'middleware' => 'auth'], function () {

  $courseSchools = \App\coursesSchool::query()->take(20)->get();
  $services = \App\services::query()->get();
  $nationalities = \App\nationalities::query()->where('status', 1)->get();
  $cities = \App\city::query()->where('status', 1)->get();
  $destinations = \App\destination::query()->where('status', 1)->get();
  $coursetypes = \App\CourseType::query()->where('status', 1)->get();
  \View::share(compact(['courseSchools', 'services', 'nationalities', 'cities', 'destinations', 'coursetypes']));


  Route::get('schools/city/{id?}', 'DashbordController@findSchoolByCity')->name('findSchoolByCity');

  Route::get('/', 'DashbordController@index')->name('HomeDashbord');
  Route::get('/home', 'DashbordController@index')->name('HomeDashbord1');

  /**
   * Group 1
   */

  //Leads  {id} => Type in the list <nav> || {lead} => id in the table
  Route::get('/leads/{id}', 'LeadsController@index')->name('leads');
  Route::post('/leads/{id}', 'LeadsController@store')->name('leadsStore');
  Route::get('/leads/{id}/create', 'LeadsController@create')->name('leadsCreate');
  Route::get('/leads/{id}/edit/{lead}', 'LeadsController@edit')->name('leadsEdit');
  Route::get('/leads/{id}/show/{lead}', 'LeadsController@show')->name('leadsShow');
  Route::post('/leads/{id}/update/{lead}', 'LeadsController@update')->name('leadsUpdate');
  Route::post('/leads/{id}/destroy/{lead}', 'LeadsController@destroy')->name('leadsDestroy');


  /**
   * Group 1
   */

  //Articels
  Route::resource('/articles', 'ArticlesController');

  //partner
  Route::resource('/partner', 'PartnerController');


  /**
   * Schools Group
   */
  //Schools
  Route::resource('/schools', 'SchoolsController');

  Route::get('school/{id}/accreditations/create', 'AccreditationController@create')->name('addAccreditations');
  Route::post('school/{id}/accreditations/store', 'AccreditationController@store')->name('storeAccreditations');
  Route::post('school/{id}/accreditations/update', 'AccreditationController@update')->name('updateAccreditations');
  Route::post('school/{id}/accreditations/delete', 'AccreditationController@destroy')->name('deleteAccreditations');

  //accreditations
  // Route::resource('/accreditations', 'AccreditationController');


  //Add Photo || view
  Route::get('/school/photo/{id}', 'SchoolsController@addPhotosView')->name('viewPhotosSchool');
  //Store Photo || Store
  Route::post('/school/photos/{id}', 'SchoolsController@addPhotosStore')->name('storePhotoSchool');
  Route::delete('/school/fielsSchool/delete/{id}', 'SchoolsController@deletePhoto')->name('deleteFileSchool');

  //Videos School
  //Add video || view
  Route::get('/school/videos/{id}', 'SchoolsController@viewVideosSchool')->name('viewVideosSchool');
  // Store Video || Store
  Route::post('/school/video/{id}', 'SchoolsController@addVideoStore')->name('addVideoStore');
  /**
   * Add Content to School
   */
  Route::get('/school/content/{id}', 'SchoolsController@viewContent')->name('viewContent');
  Route::post('/school/update/{id}', 'SchoolsController@schoolContent')->name('schoolContent');
  /**
   * ***
   */

  /**
   * Course school
   */
  Route::get('/school/courses/{id}', 'SchoolsController@viewCourses')->name('viewCourses');
  Route::post('/school/course/delete/{id}', 'SchoolsController@deleteCourseSchool')->name('deleteCourseSchool');
  Route::get('/school/courses/create/{id}', 'SchoolsController@viewCoursesCreate')->name('viewCoursesCreate');
  Route::post('/school/courses/store/{id}', 'SchoolsController@storeCourses')->name('storeCourses');
  Route::get('/school/courses/edit/{id}', 'SchoolsController@viewCoursesEdit')->name('viewCoursesEdit');
  Route::post('/school/courses/update/{id}', 'SchoolsController@coursesUpdate')->name('coursesUpdate');

  //Course Material
  Route::get('/school/courses/fee/material/{id}', 'SchoolsController@viewCoursesMaterialFee')->name('viewCoursesMaterialFee');
  Route::post('/school/courses/fee/material/store/{id}', 'SchoolsController@storeCoursesMaterialFee')->name('storeCoursesMaterialFee');

  //Course Fee
  Route::get('/school/courses/fee/{id}', 'SchoolsController@viewCourseFee')->name('viewCourseFee');
  Route::post('/school/courses/fee/store/{id}', 'SchoolsController@storeCourseFee')->name('storeCourseFee');

  //Ajax Delete Material
  Route::delete('/school/courses/delete/material/fee/{id?}', 'SchoolsController@deleteCoursesMaterialFee')->name('deleteCoursesMaterialFee');
  Route::delete('/school/courses/delete/fee/{id?}', 'SchoolsController@deleteCoursesFee')->name('deleteCoursesFee');

  /**
   * Course school
   */

  /**
   * Accommodation school
   */
  Route::get('/school/accom/{id}', 'SchoolsController@viewAccommodations')->name('viewAccommodations');
  Route::get('/school/accom/create/{id}', 'SchoolsController@viewAccommodationCreate')->name('viewAccommodationCreate');
  Route::post('/school/accom/store/{id}', 'SchoolsController@storeAccommodation')->name('storeAccommodation');
  Route::post('/school/accom/delete/{id}', 'SchoolsController@deleteAccommodation')->name('deleteAccommodation');
  Route::get('/school/accom/edit/{id}', 'SchoolsController@viewAccommodationEdit')->name('viewAccommodationEdit');
  Route::post('/school/accom/update/{id}', 'SchoolsController@AccommodationUpdate')->name('AccommodationUpdate');

  Route::get('/school/accom/options/{id}', 'SchoolsController@allAccommodationOptions')->name('allAccommodationOptions');
  Route::get('/school/addAccommodationOptions/{id}', 'SchoolsController@addAccommodationOptions')->name('addAccommodationOptions');
  Route::post('/school/addAccommodationOptions/store/{id}', 'SchoolsController@storeAccommodationOptions')->name('storeAccommodationOptions');
  Route::get('/school/edit/option/{id}', 'SchoolsController@viewAccommodationOptionsEdit')->name('viewAccommodationOptionsEdit');
  Route::put('/school/option/update/{id}', 'SchoolsController@updateAccommodationOptions')->name('updateAccommodationOptions');
  Route::post('/school/option/delete/{id}', 'SchoolsController@deleteAccommodationOption')->name('deleteAccommodationOption');

  Route::get('/school/accom/feesWeeksOptions/{id}', 'SchoolsController@viewFeesWeeksOptions')->name('viewFeesWeeksOptions');
  Route::post('/school/accom/feesWeeksOptions/store/{id}', 'SchoolsController@storeFeesWeeksOptions')->name('storeFeesWeeksOptions');
  Route::delete('school/accom/fwo/delete/{id?}', 'SchoolsController@deleteFeesWeeksOptions')->name('deleteFeesWeeksOptions');
  /**
   * Accommodation school
   */


  /**
   * Airport Pick-Up
   */

  Route::get('school/airportpickup/{id}', 'SchoolsController@viewAirportPickUp')->name('viewAirportPickUp');
  Route::get('school/airportpickup/create/{id}', 'SchoolsController@viewAirportPickUpCreate')->name('viewAirportPickUpCreate');
  Route::get('school/airportpickup/edit/{id}', 'SchoolsController@viewAirportPickUpEdit')->name('viewAirportPickUpEdit');
  Route::post('school/airportpickup/store/{id}', 'SchoolsController@storeAirportPickUp')->name('storeAirportPickUp');
  Route::post('school/airportpickup/update/{id}', 'SchoolsController@updateAirportPickUp')->name('updateAirportPickUp');
  Route::post('school/airportpickup/delete/{id}', 'SchoolsController@deleteAirportPickUp')->name('deleteAirportPickUp');

  /**
   * Airport Pick-Up
   */


  /**
   * Insurances
   */

  Route::get('school/insurances/{id}', 'SchoolsController@viewInsurances')->name('viewInsurances');
  Route::get('school/insurances/create/{id}', 'SchoolsController@viewInsurancesCreate')->name('viewInsurancesCreate');
  Route::get('school/insurances/edit/{id}', 'SchoolsController@viewInsurancesEdit')->name('viewInsurancesEdit');
  Route::post('school/insurances/store/{id}', 'SchoolsController@storeInsurances')->name('storeInsurances');
  Route::post('school/insurances/update/{id}', 'SchoolsController@updateInsurances')->name('updateInsurances');
  Route::post('school/insurances/delete/{id}', 'SchoolsController@deleteInsurances')->name('deleteInsurances');
  /**
   * Schools Group
   */

  /**
   *  School Promotions
   */
  // Route::get('school/promotion/{id}', 'SchoolsController@viewPromotion')->name('viewPromotion');
  // Route::get('school/promotion/create/{id}', 'SchoolsController@viewPromotionCreate')->name('viewPromotionCreate');
  // Route::get('school/promotion/edit/{id}', 'SchoolsController@viewPromotionEdit')->name('viewPromotionEdit');
  // Route::post('school/promotion/update/{id}', 'SchoolsController@updatePromotion')->name('updatePromotion');
  // Route::post('school/promotion/delete/{id}', 'SchoolsController@deletePromotion')->name('deletePromotion');


  /**
   *  School Promotions
   */


  //Packages
  Route::resource('/packages', 'PackagesController');
  //Promotion
  Route::resource('/promotion', 'PromotionController');
  Route::get('/promotion/create/{id}', 'PromotionController@create')->name('promotion.createById');
  Route::resource('multiPromotions', 'multiPromotionsController');


  /**
   * Route Group 2
   *
   */
  //Site Settings
  Route::resource('/sitesettings', 'SitesettingsController');

  //pages
  Route::resource('pages', 'PagesController');

  //Services
  Route::resource('services', 'ServicesController');

  //mainPage
  Route::get('mainpage', 'SitesettingsController@mainPageView')->name('mainpage');
  Route::post('mainpage/update', 'SitesettingsController@mainPageViewUpdate')->name('mainpageUpdate');

  //Footer
  Route::get('footer', 'SitesettingsController@footer')->name('footer');
  Route::post('footer/update', 'SitesettingsController@footerUpdate')->name('footerUpdate');

  /**
   * End Group 2
   *
   */
  /**
   * Route Group 3
   */
  //Core Settings
  Route::resource('/coresettings', 'CoresettingsController');
  //General Setting
  Route::get('/generalSetting', 'CoresettingsController@generalSettings')->name('generalSetting');
  //Update General Settings
  Route::post('/generalSetting/update', 'CoresettingsController@updateGeneralSettings')->name('updateGeneralSettings');

  //Core Languages
  Route::get('/languages', 'CoresettingsController@Languages')->name('languages');
  //Core Languages
  Route::get('/add/language', 'CoresettingsController@addLanguage');
  //Core Store Language
  Route::post('/store/language', 'CoresettingsController@postLanguage');
  //Deelte Language
  Route::delete('/delete/language/{id}', 'CoresettingsController@deleteLanguage')->name('deleteLanguage');
  //Deelte Language
  Route::get('/edit/language/{id}', 'CoresettingsController@editLanguage')->name('editLanguage');
  //Update Language
  Route::put('/update/language/{id}', 'CoresettingsController@updateLanguage')->name('updateLanguage');

  //destinations
  Route::resource('destinations', 'DestinationController');
  //Users
  Route::resource('/users', 'UsersController');

  //Currency
  Route::resource('/currency', 'CurrencyController');
  //Currency Update
  // Route::post('/currency/{id}/update', 'CurrencyController@update');

  //Visa
  Route::resource('/visa', 'VisaController');

  //cities
  Route::resource('/cities', 'CityController');

  //countries
  Route::resource('/countries', 'CountriesController');
  //Facilitie
  Route::resource('facilities', 'FacilitieController');
  //Room Type
  Route::resource('roomtype', 'RoomTypeController');
  //accommodations Type
  Route::resource('accommodationstype', 'AccommodationTypeController');
  //course Type
  Route::resource('coursetype', 'courseTypeController');
  //meal Type
  Route::resource('mealtype', 'MealTypeController');
  //nationality
  Route::resource('/nationality', 'NationalitiesController');
  //residence
  Route::resource('/residence', 'ResidencesController');

  //countries Files ... Images/Videos
  Route::get('/image/{id}/{type}', 'ImageCityController@index')->name('addFileCity');
  Route::post('/file/{id}/{type}', 'ImageCityController@store')->name('storeFile');
  //Update Files/Video Code
  Route::post('/file/update/{id}/{type}', 'ImageCityController@update')->name('updateImageCity');
  //Delete row ImageCity...
  Route::post('/image/delete/{id}', 'ImageCityController@destroy')->name('destroy.image');

  /**
   *
   * End Group 3
   *
   *//*---------------*\


     /**
      * Group Profile ...
      */
  //Profile...
  Route::get('/profile', 'UsersController@profile')->name('profile');
  //Change Profile .
  Route::post('/changeProfile', 'UsersController@changeProfile')->name('changeProfile');
  //Change Password .
  Route::post('/updatePassword', 'UsersController@updatePassword')->name('updatePassword');

  Route::get('/booking/requests', 'BookingController@requests')->name('booking.requests');
  Route::get('/booking/requests/unconfirmed', 'BookingController@requestsUnconfirmed')->name('booking.requests.unconfirmed');
  Route::get('/booking/requests/draft', 'BookingController@requestsDraft')->name('booking.requests.draft');
  Route::get('/booking/requests/{id}', 'BookingController@show')->name('booking.show');
  Route::get('/booking/requests/edit/{id}/{stage}', 'BookingController@edite')->name('booking.requests.edit');
  Route::post('/booking/requests/edit/{id}/{stage}', 'BookingController@update')->name('booking.requests.update');
  Route::delete('/booking/requests/{id}', 'BookingController@destroy')->name('booking.destroy');
});


Route::group(['prefix' => (new Mcamara\LaravelLocalization\LaravelLocalization)->setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
  Route::get('/', 'HomeController@index')->name('home');

  Route::view('/sa', 'about-us');
  Route::view('/sa2', 'blank_page');

  // Thanks
  Route::get('/thank-you', 'ThanksController@general')->name('thank_you');
  Route::get('/feedback/thank-you', 'ThanksController@feedback')->name('thank_you_feedback');
  Route::get('/newsletter/thank-you', 'ThanksController@newsletter')->name('thank_you_newsletter');
  Route::get('/contact/thank-you', 'ThanksController@contact')->name('thank_you_contact');
  Route::get('/partner/thank-you', 'ThanksController@partner')->name('thank_you_partner');

  Route::get('/schools/courses/{slug}', 'CoursesSchoolController@index')->name('school.course');




  Route::get('articles', 'ArticlesController@showPageArticles')->name('articles');
  Route::get('articles/{id}', 'ArticlesController@detailArticles')->name('detailArticles');
  Route::post('send/leads', 'ArticlesController@sendLeads')->name('sendLeads');


  Route::get('services', 'ServicesController@showPageServices')->name('services');
  Route::get('services/{id}', 'ServicesController@detailServices')->name('detailServices');
  Route::post('send/leads/services', 'ServicesController@sendLeads')->name('servicesSendLeads');

  Route::get('/howToBookYourCourse', 'PagesFrontEndSite@pageHowToBookYourCourse')->name('howToBookYourCourse');
  Route::post('send/leads/pageHowToBookYourCourse', 'PagesFrontEndSite@formSendLeadsHowBookCourse')->name('sendLeadsPageHowToBookYourCourse');

  Route::get('/who/we/are', 'PagesFrontEndSite@pageWhoWeAre')->name('whoWeAre');
  Route::get('/our/partners', 'PagesFrontEndSite@pageOurPartners')->name('ourPartners');
  Route::post('send/leads/pageOurPartners', 'PagesFrontEndSite@formSendLeadsOurPartners')->name('sendLeadsPageOurPartners');


  Route::get('/work/with/us', 'PagesFrontEndSite@pageWorkWithUs')->name('workWithUs');
  Route::post('send/leads/pageWorkWithUs', 'PagesFrontEndSite@formSendLeadsWorkWithUs')->name('sendLeadsPageWorkWithUs');

  Route::get('/refund/policy', 'PagesFrontEndSite@pageRefundPolicy')->name('refundPolicy');
  Route::get('/terms/conditions', 'PagesFrontEndSite@pageTermsConditions')->name('termsConditions');
  Route::get('/why/book/with/us', 'PagesFrontEndSite@pageWhyBookWithUs')->name('whyBookWithUs');
  Route::get('/cookies', 'PagesFrontEndSite@pageCookies')->name('cookies');
  Route::get('/policies', 'PagesFrontEndSite@pagePolicies')->name('policies');
  Route::get('/legal', 'PagesFrontEndSite@pageLegal')->name('legal');
  Route::get('/copyright', 'PagesFrontEndSite@pageCopyright')->name('copyright');
  Route::get('/about/us', 'PagesFrontEndSite@pageAboutUs')->name('aboutUs');

  Route::post('send/email', 'PagesFrontEndSite@formSendMail')->name('formSendMail');



  Route::get('/feed/backs', 'PagesFrontEndSite@pageFeedback')->name('feedBacks');
  Route::post('/send/leads/feed/backs', 'PagesFrontEndSite@formSendFeedBacks')->name('formSendFeedBacks');

  Route::get('/contact/us', 'PagesFrontEndSite@pageContactUs')->name('contactUs');
  Route::post('/send/leads/ContactUs', 'PagesFrontEndSite@formSendContactUs')->name('formSendContactUs');
  Route::get('/GetCityAgainstMainCatEdit/{id}', 'HomeController@GetCityAgainstMainCatEdit');

  Route::get('/currency/set/{currency}', 'CurrencyController@setCurrency')->name('setCurrency');

  Route::get('/search/{option}/{slug}', 'CoursesSchoolController@searchSet')->middleware('search.set');
  Route::get('/accommodationsOptions/{school}/{age}', 'CoursesSchoolController@getAccommodationsOptions')->name('GetAccommodationsOptions');

  Route::get('/GetCourses/{school}', 'CoursesSchoolController@GetCourses')->name('GetCourses');
  // Route::get('/GetCourseFee/{course}/{option}/{slug}', 'CoursesSchoolController@GetCourseFee')->name('GetCourseFee')->middleware('search.set');
  Route::get('/GetCourseFee/{course}/weeks/{weeks}/acc/{acc}/accweeks/{accweeks}', 'CoursesSchoolController@GetCourseFee')->name('GetCourseFee');
  Route::get('/GetSchoolPromotion/{school}/course/{course}/date/{date}/weeks/{weeks}/acc/{acc}/accweeks/{accweeks}', 'CoursesSchoolController@GetSchoolPromotion')->name('GetSchoolPromotion');

  // Route::post('/setBooking', 'CoursesSchoolController@setBooking')->name('setBooking');

  Route::post('/booking', 'BookingController@index')->name('booking');
  Route::get('/booking', 'BookingController@indexGet')->name('bookingGet');
  Route::post('/booking/set', 'BookingController@set')->name('setBooking');
  Route::get('/booking/confirmation/{booking_id}/{lang}', 'BookingController@confirmation')->name('booking.confirmation');

  Route::get('/invoice/{invoice}', 'BookingController@invoice')->name('invoice.download');


  Route::get('/clearSession', function () {
    \Session::flush();
    return route('home');
  });
});









/**
 * /////////////////////// Layouts || 1 DAY ... ×
 * Route Dashbord || 1
 * login
 * Home Dashbord
 * ///////////////////Leads   || 2   ×
 * Booking Form
 * Help Button
 * Artical Form
 * Work With Us Form
 * Our Patner  Form
 * Contact Us form
 * Feedback Form
 * FA&Q form
 * Newletter Email
 * Add Lead
 * ////////////// || .5  ×
 * Articels
 * ////////////// || .5 ×
 * Packages
 * ////////////// || 1
 * Promotion
 * ////////////// || 1
 * schools
 * Course
 * Course Type
 * Accomm....
 * Accomm.... options
 * Accomm.... type
 * Meal Type
 * Facilitie
 * Room Type
 * Material  Fee Type
 * //////////////Site Settings || 1   ×
 * Pages
 * Serbices
 * Main Page
 * Footer
 * //////////////Core Settings || .5    ×
 * General Settings
 * Site Languages
 * City
 * Contries
 * Visa
 * //////////////Users || 1            ×
 * Users
 * Add
 * /////////////////////////////Finishing || 1
 */
