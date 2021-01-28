<?php

use App\contentschools;
use App\feeWeeksOptions;
use App\multiPromotions;
use App\permission;

function setting($name)
{
    if (App\generalSetting::where('option', '=', $name)->count() > 0) {
        return App\generalSetting::where('option', $name)->get()[0]->value;
    }
}
function langTitle($lang){
    $title = 'title'.$lang;
    return $title;
}


function getValueOfOptionMainPage($name)
{
    if (App\mainpages::where('option', '=', $name)->count() > 0) {
        return App\mainpages::where('option', $name)->get()[0]->value;
    }
}

function getValueOfOptionMainPageEnAR($lang, $name)
{
    if (App\mainpages::where('option', '=', $name . $lang)->count() > 0) {
        return App\mainpages::where('option', $name . $lang)->get()[0]->value;
    }
}


function getValueOfOptionFooter($name)
{
    if (App\footer::where('option', '=', $name)->count() > 0) {
        return App\footer::where('option', $name)->get()[0]->value;
    }
}

function getPermissionUser($type, $column, $userId)
{
    # code...
    $data = permission::where('userId', $userId)->get();
    foreach ($data as $value) {
        # code...

        if ($value->type == "$type") {
            if ($value->$column == "on") {
                $true = 1;
                return $true;
            } else {
                $true = 0;
                return $true;
            }
        }
    }
}
/**
 * Count Of this School Content
 */
function dataContentValueOfColumn($id, $Column)
{
    if (App\contentschools::where('school', '=', $id)->count() !== 0) {
        // return 1;
        $data = contentschools::where('school', $id)->first();
        return $data->$Column;
    } else {
    }
}

/**
 * Get Fee Week
 */
function getValueWeekOption($optionId, $week)
{
    # code...
    if (feeWeeksOptions::where('week', '=', $week)->where('option', $optionId)->count() !== 0) {
        // return 1;
        $data = feeWeeksOptions::where('week', '=', $week)->where('option', $optionId)->first();
        return $data->fee;
    } else {
    }
}



/**
 * Get First Title Promotions in MultiPromotions
 */

function getMultiPromotionsFirstTitleEn($id)
{
    # code...
    if (multiPromotions::where('promotion', '=', $id)->count() !== 0) {
        // return 1;
        $data = multiPromotions::where('promotion', '=', $id)->first();
        return $data->titleEn;
    } else {

    }
}








function getLangName($name)
{
    if (App\languages::where('name', '=', $name)->count() > 0) {
        return App\languages::where('name', $name)->get()[0]->name;
    }
}
function getLangIcon($name)
{
    if (App\languages::where('name', '=', $name)->count() > 0) {
        return App\languages::where('name', $name)->get()[0]->icon;
    }
}





function getNamePagesFooterEn($name)
{
    if (App\languages::where('titleEn', '=', $name)->count() > 0) {
        return App\languages::where('titleEn', $name)->get()[0]->titleEn;
    }
}
function getNamePagesFooterAr($name)
{
    if (App\languages::where('titleAr', '=', $name)->count() > 0) {
        return App\languages::where('titleAr', $name)->get()[0]->titleAr;
    }
}
function getSlugPagesFooterEn($name)
{
    if (App\languages::where('slugEn', '=', $name)->count() > 0) {
        return App\languages::where('slugEn', $name)->get()[0]->slugEn;
    }
}
function getSlugPagesFooterAr($name)
{
    if (App\languages::where('slugAr', '=', $name)->count() > 0) {
        return App\languages::where('slugAr', $name)->get()[0]->slugAr;
    }
}
