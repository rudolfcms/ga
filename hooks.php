<?php

use Rudolf\Component\Hooks;

Hooks\Filter::add('foot_after', function ($after) {
    $file = CONFIG_ROOT.'/plugins/google-analytics.php';
    if (!file_exists($file)) {
        return $after;die;
    }
    $config = include $file;

    $after[] = '
    <script>
      (function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,"script","//www.google-analytics.com/analytics.js","ga");
      ga("create", '.$config['ga_id'].', "auto");
      ga("send", "pageview");
    </script>';

    return $after;
});
