<?php

namespace App\Services;


Class NotificationService
{

    static function CREATED($message = null)
    {
        return  notyf()->success($message ?? __('Created Successfully'));

    }

    static function UPDATED($message = null)
    {
        return  notyf()->success($message ?? __('Updated Successfully'));

    }

    static function DELETED($message = null)
    {
        return  notyf()->success($message ?? __('Deleted Successfully'));

    }

    static function ERROR($message = null)
    {
        return  notyf()->error($message ?? __('Something Went Wrong'));

    }

} // End  Class
