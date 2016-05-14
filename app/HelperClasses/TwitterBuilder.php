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
        <script>window.twttr = (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0],
            t = window.twttr || {};
          if (d.getElementById(id)) return t;
          js = d.createElement(s);
          js.id = id;
          js.src = "https://platform.twitter.com/widgets.js";
          fjs.parentNode.insertBefore(js, fjs);
         
          t._e = [];
          t.ready = function(f) {
            t._e.push(f);
          };
         
          return t;
        }(document, "script", "twitter-wjs"));</script>
        <a  class="twitter-share-button"
            href="https://twitter.com/intent/tweet?text={$prePopulateBeforLink}{$link}"
            data-size="large">
                {$buttonText}
        </a>
HTML;
        return $button;
    }
}