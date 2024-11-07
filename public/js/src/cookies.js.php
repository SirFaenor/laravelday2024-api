<?php
require __DIR__ .'/../../../vendor/autoload.php';
$laravel_app = require __DIR__ .'/../../../bootstrap/app.php';
$laravel_app->boot();

/* Imposta il cookie, se click su "OK"
------------------------------------------------------------------------------------------ */

use App\Facades\LangManager;

if(!empty($_GET['c']) && $_GET['c'] == 1) :
    $r = setcookie('cookie_alert',1,time()+(60*60*24*365),'/');
    echo 1;
    exit;
endif;


/* Se non c'è il cookie mostra il messaggio
------------------------------------------------------------------------------------------ */ 
if (empty($_COOKIE["cookie_alert"])) :
?>
jQuery(document).ready(function($) {
    
    var $_popup = $("<div>");
    var $_popup_bg = $("<div>");
    var $_popup_close = $("<a>");
    var $_popup_content = $("<div>");
    var txt = '<?php LangManager::echoT("alert_cookies"); ?>';

    $_popup.css({
        position: "fixed"
        ,zIndex: "100000"
        ,top: 0
        ,left: 0
        ,width: '100%'
        //,height: '100px'
    });
    $_popup.css("-webkit-text-size-adjust" ,"none");
    

    $_popup_bg.css({
        position: "absolute"
        ,top: 0
        ,left: 0
        ,zIndex: 1
        ,height: '100%'
        ,width: '100%'
        ,background: '#3e3e3e'
        ,opacity: 2
    });
    
    $_popup_close
        .text("OK")
        .css({
            color: '#666666'
            ,display: 'inline-block'
            ,fontSize: '13px'
            ,cursor: 'pointer'
            ,background: '#000000'
            ,color: '#FFFFFF'
            ,padding: '3px 5px'
            ,marginLeft: 10
            ,marginTop: 3
        }).on('click', function(e){
            e.preventDefault();
            $.get('<?= URL::to("js/src/cookies.js.php?c=1") ?>', function(datda){
                $_popup.remove();              
            })
        });
    
    $_popup_content.css({
        position: "relative"
        ,zIndex: 2
        ,color: '#ffffff'
        ,padding: '15px 20px 10px 10px'
        ,fontSize: '13px'
        ,lineHeight: '15px'
        ,textAlign: "center"
        ,margin: '0 auto'
        ,maxWidth: '950px'
    }).html(txt).append($_popup_close);
    
    $_popup_content.find("a").css({
        color : "#ffffff"
    });

    $(document).find('a:not(.cookie_banner_noclose)').on('click',function(e){
       if ($_popup.length) {
            $.get('<?= URL::to("js/src/cookies.js.php?c=1") ?>', function(){
                $_popup.remove();
            });
        }
    });
   


    $_popup_bg.appendTo($_popup);
    $_popup_content.appendTo($_popup);
    $_popup.appendTo("body");

});
<?php
endif;
?>