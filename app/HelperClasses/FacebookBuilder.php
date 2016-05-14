<?php
/**
 * Created by PhpStorm.
 * User: adrianbadarau
 * Date: 14/05/16
 * Time: 16:07
 */

namespace App\HelperClasses;


class FacebookBuilder
{
    public static function generateShareButton($link, $type = "icon")
    {
        $button =
<<<HTML
    	<!-- Load Facebook SDK for JavaScript -->
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    
        <!-- Your share button code -->
        <div class="fb-share-button" 
            data-href="{$link}" 
            data-layout="{$type}">
        </div>
HTML;

        return $button;
    }
}