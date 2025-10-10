<?php declare(strict_types=1);

use \Illuminate\Support\Str;

if (!function_exists('customTitle')) {
    function customTitle($breadcrumb)
    {
        $title = Str::limit($breadcrumb->title, 16, '...');

        if(isset($breadcrumb->icon) && !empty($breadcrumb->icon)){
            $title='<i class="'. $breadcrumb->icon . '"></i>&nbsp;&nbsp;' . $title;
        }

        echo $title;
    }
}
