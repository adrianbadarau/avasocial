<?php
/**
 * Created by PhpStorm.
 * User: adrianbadarau
 * Date: 14/05/16
 * Time: 16:48
 */

namespace App\HelperClasses;


class TwitterBuilder
{
    public static function generateShareButton($link,$buttonText="Tweet",$prePopulateBeforLink="Check%20this%20out%20%20")
    {
        $button =
<<<HTML
        <a  class="twitter-share-button"
            href="https://twitter.com/intent/tweet?text={$prePopulateBeforLink}{$link}"
            data-size="large">
                {$buttonText}
        </a>
HTML;
        return $button;
    }
}