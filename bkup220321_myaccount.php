<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>

        <?php if ($sf_user->getAttribute("reseller")): ?>
        <link rel="shortcut icon" href="<?php echo $sf_user->getAttribute("reseller")->getFaviconUrl(); ?>" type="image/x-icon" />
        <?php endif; ?>

        <meta name="description" content="Static &amp; Dynamic Tables" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- basic styles -->
        <link href="/css/myaccount/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/css/myaccount/font-awesome.min.css" />

        <!--[if IE 7]>
          <link rel="stylesheet" href="/css/myaccount/font-awesome-ie7.min.css" />
        <![endif]-->

        <!-- page specific plugin styles -->
        <!-- fonts -->
        <link rel="stylesheet" href="/css/myaccount/ace-fonts.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="/css/myaccount/ace.min.css" />
        <link rel="stylesheet" href="/css/myaccount/ace-rtl.min.css" />
        <link rel="stylesheet" href="/css/myaccount/ace-skins.min.css" />
        <link rel="stylesheet" href="/css/myaccount/toastr.min.css" />

        <!--[if lte IE 8]>
          <link rel="stylesheet" href="/css/myaccount/ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->
        <!-- ace settings handler -->
        <script src="/js/myaccount/ace-extra.min.js"></script>

        <!-- basic scripts -->
        <!--[if !IE]> -->
        <script type="text/javascript">
            window.jQuery || document.write("<script src='/js/myaccount/jquery-2.0.3.min.js'>"+"<"+"/script>");
        </script>
        <!-- <![endif]-->

        <script src="/js/myaccount/toastr.min.js"></script>

        <script type="text/javascript">
            window.GE = <?php echo json_encode(RestUtils::generateWindowGE($sf_user)) ?>;
        </script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="/js/myaccount/html5shiv.js"></script>
        <script src="/js/myaccount/respond.min.js"></script>
        <![endif]-->
        <!-- build:css(.tmp) styles/main.css -->
        <link rel="stylesheet" href="/css/myaccount/main.css">
        <!-- endbuild -->
    </head>
    <body class="navbar-fixed">
        <div class="navbar navbar-default navbar-fixed-top" id="navbar">
            <script type="text/javascript">
                try{ace.settings.check('navbar' , 'fixed')}catch(e){}
            </script>

            <div class="navbar-container" id="navbar-container">
                <div class="navbar-header pull-left">
                    <a href="<?php echo url_for('main/index') ?>" class="navbar-brand">
                        <small>
                            <?php echo $sf_user->getAttribute("reseller")->getDisplayName(); ?>
                        </small>
                    </a><!-- /.brand -->
                </div><!-- /.navbar-header -->

                <div class="navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                        <!-- TODO put in component for cart? -->
                        <!-- BEGIN CART! -->
                        <li id="cart-toggle" class="grey">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="icon-shopping-cart"></i>
                                <span class="badge badge-grey cart-total"></span>
                            </a>

                            <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close dropdown-clean" id="cart">
                                <li class="dropdown-header">
                                    <i class="icon-shopping-cart"></i>
                                    <span class="cart-total"></span> Items in cart
                                </li>

                                <li>
                                    <a href="/#!/registration/checkout">
                                        Click to Checkout
                                        <i class="icon-arrow-right blue"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END CART! -->

                        <!-- TODO put in component for messages? -->
                        <!-- BEGIN MESSAGES! -->
                        <?php $customer = $sf_user->getAttribute("customer"); 
                        $c = new Criteria;
                        $c->add(CustomerMessageCenterPeer::CM_READ, 0);
                        ?>                        
                        <li class="<?php //function not found ? //echo count($customer->getCustomerMessageCenters($c)) > 0 ? 'green': 'gray';?>">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="icon-envelope"></i>
                                <?php /* <span class="badge badge-success">?</span> */ ?>   <?php //echo $customer->getCountCustomerMessageCenters() ?>
                            </a>

                            <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                                <li class="dropdown-header">
                                    <i class="icon-envelope-alt"></i>
                                    Messages
                                </li>


                                <li>
                                    <a href="/main/myMessages">
                                        See all messages
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END MESSAGES! -->

                        <!-- TODO put in component for userbox? -->
                        <!-- BEGIN USERBOX! -->
                        <li class="light-blue">
                            <?php $customer = $sf_user->getAttribute("customer"); ?>
                            <?php if ($customer != null): ?>
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <?php /* <img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo" /> */ ?>
                                <span class="user-info">
                                    <small>Welcome,</small>
                                    <?php
                                    echo $customer->getScreenName();
                                    ?>
                                </span>

                                <i class="icon-caret-down"></i>
                            </a>
                            <?php endif; ?>

                            <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

                                <li>
                                    <a href="/main/accountInfo">
                                        <i class="icon-user"></i>
                                        Account Info
                                    </a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <a href="/main/logout">
                                        <i class="icon-off"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USERBOX! -->
                    </ul><!-- /.ace-nav -->
                </div><!-- /.navbar-header -->
            </div><!-- /.container -->
        </div>

        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try{ace.settings.check('main-container' , 'fixed')}catch(e){}
            </script>

            <div class="main-container-inner">
                <a class="menu-toggler" id="menu-toggler" href="#">
                    <span class="menu-text"></span>
                </a>

                <div class="sidebar sidebar-fixed" id="sidebar">
                    <script type="text/javascript">
                        try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
                    </script>

                    <div class="sidebar-shortcuts" id="sidebar-shortcuts" style="display:none">
                        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                            <button class="btn btn-success">
                                <i class="icon-signal"></i>
                            </button>

                            <button class="btn btn-info">
                                <i class="icon-pencil"></i>
                            </button>

                            <button class="btn btn-warning">
                                <i class="icon-group"></i>
                            </button>

                            <button class="btn btn-danger">
                                <i class="icon-cogs"></i>
                            </button>
                        </div>

                        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                            <span class="btn btn-success"></span>
                            <span class="btn btn-info"></span>
                            <span class="btn btn-warning"></span>
                            <span class="btn btn-danger"></span>
                        </div>
                    </div>

                    <!-- #sidebar-shortcuts -->
                    <?php include_component('main', 'myaccountMenu', array('page' => strtolower($sf_params->get("action")))); ?>

                    <div class="sidebar-collapse" id="sidebar-collapse">
                        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
                    </div>

                    <script type="text/javascript">
                        try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
                    </script>
                </div>

                <div class="main-content">
                    <!-- TODO put in component for breadbrumb? -->
                    <!-- BEGIN BREADCRUMB! -->
                    <div class="breadcrumbs" id="breadcrumbs">
                        <script type="text/javascript">
                            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                        </script>

                        <ul class="breadcrumb">
                            <li>
                                <i class="icon-home home-icon"></i>
                                <a href="<?php echo url_for("main/dashboard"); ?>">Home</a>
                            </li>
                            <?php
                                $breadcrumb = ucwords(strtolower($sf_params->get("action")));
                                switch ($breadcrumb) {
                                    case 'Accountinfo':
                                        echo '<li>My Account</li>';
                                        $breadcrumb = 'Account Info';
                                        break;
                                    case 'Registrationinfo':
                                        echo '<li>My Account</li>';
                                        $breadcrumb = 'Contacts';
                                        break;
                                    case 'Mypreferences':
                                        echo '<li>My Account</li>';
                                        $breadcrumb = 'Security';
                                        break;
                                    case 'Mynameservers':
                                        echo '<li>My Account</li>';
                                        $breadcrumb = 'Default Name Servers';
                                        break;
                                    case 'Myloginhist':
                                        echo '<li>My Account</li>';
                                        $breadcrumb = 'Login History';
                                        break;
                                    case 'Mydomains':
                                        $breadcrumb = 'Domains';
                                        break;
                                    case 'Myorders':
                                        $breadcrumb = 'Orders';
                                        break;
                                    case 'Orderdetailpage':
                                        echo '<li>Orders</li>';
                                        $breadcrumb = 'Detail';
                                        break;
                                    case 'Myinvoices':
                                        $breadcrumb = 'Invoices';
                                        break;
                                    case 'Mymessages':
                                        $breadcrumb = 'Messages';
                                        break;
                                    default:
                                        break;
                                }
                            ?>
                            <li class="active"><?php echo $breadcrumb; ?></li>
                        </ul><!-- .breadcrumb -->

                        <!--
                        <div class="nav-search" id="nav-search">
                            <form class="form-search">
                                <span class="input-icon">
                                    <input type="text" placeholder="Domain Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                                    <i class="icon-search nav-search-icon"></i>
                                </span>
                            </form>
                        </div>--><!-- #nav-search -->




<!-- GTranslate: https://gtranslate.io/ -->
<!--<div style="display:inline-block;float:right;">-->
<div style="display:none;float:right;">
<a href="#" onclick="doGTranslate('en|zh-CN');return false;" title="Chinese (Simplified)" class="gflag nturl" style="background-position:-300px -0px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Chinese (Simplified)" /></a><a href="#" onclick="doGTranslate('en|en');return false;" title="English" class="gflag nturl" style="background-position:-0px -0px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="English" /></a><a href="#" onclick="doGTranslate('en|fr');return false;" title="French" class="gflag nturl" style="background-position:-200px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="French" /></a><a href="#" onclick="doGTranslate('en|de');return false;" title="German" class="gflag nturl" style="background-position:-300px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="German" /></a><a href="#" onclick="doGTranslate('en|it');return false;" title="Italian" class="gflag nturl" style="background-position:-600px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Italian" /></a><a href="#" onclick="doGTranslate('en|ja');return false;" title="Japanese" class="gflag nturl" style="background-position:-700px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Japanese" /></a><a href="#" onclick="doGTranslate('en|ko');return false;" title="Korean" class="gflag nturl" style="background-position:-0px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Korean" /></a><a href="#" onclick="doGTranslate('en|ru');return false;" title="Russian" class="gflag nturl" style="background-position:-500px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Russian" /></a><a href="#" onclick="doGTranslate('en|es');return false;" title="Spanish" class="gflag nturl" style="background-position:-600px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Spanish" /></a>

<style type="text/css">
<!--
a.gflag {vertical-align:middle;font-size:16px;padding:1px 0;background-repeat:no-repeat;background-image:url(//gtranslate.net/flags/16.png);}
a.gflag img {border:0;}
a.gflag:hover {background-image:url(//gtranslate.net/flags/16a.png);}
#goog-gt-tt {display:none !important;}
.goog-te-banner-frame {display:none !important;}
.goog-te-menu-value:hover {text-decoration:none !important;}
body {top:0 !important;}
#google_translate_element2 {display:none!important;}
-->
</style>

 <select onchange="doGTranslate(this);"><option value="">Select Language</option><option value="en|af">Afrikaans</option><option value="en|sq">Albanian</option><option value="en|ar">Arabic</option><option value="en|hy">Armenian</option><option value="en|az">Azerbaijani</option><option value="en|eu">Basque</option><option value="en|be">Belarusian</option><option value="en|bg">Bulgarian</option><option value="en|ca">Catalan</option><option value="en|zh-CN">Chinese (Simplified)</option><option value="en|zh-TW">Chinese (Traditional)</option><option value="en|hr">Croatian</option><option value="en|cs">Czech</option><option value="en|da">Danish</option><option value="en|nl">Dutch</option><option value="en|en">English</option><option value="en|et">Estonian</option><option value="en|tl">Filipino</option><option value="en|fi">Finnish</option><option value="en|fr">French</option><option value="en|gl">Galician</option><option value="en|ka">Georgian</option><option value="en|de">German</option><option value="en|el">Greek</option><option value="en|ht">Haitian Creole</option><option value="en|iw">Hebrew</option><option value="en|hi">Hindi</option><option value="en|hu">Hungarian</option><option value="en|is">Icelandic</option><option value="en|id">Indonesian</option><option value="en|ga">Irish</option><option value="en|it">Italian</option><option value="en|ja">Japanese</option><option value="en|ko">Korean</option><option value="en|lv">Latvian</option><option value="en|lt">Lithuanian</option><option value="en|mk">Macedonian</option><option value="en|ms">Malay</option><option value="en|mt">Maltese</option><option value="en|no">Norwegian</option><option value="en|fa">Persian</option><option value="en|pl">Polish</option><option value="en|pt">Portuguese</option><option value="en|ro">Romanian</option><option value="en|ru">Russian</option><option value="en|sr">Serbian</option><option value="en|sk">Slovak</option><option value="en|sl">Slovenian</option><option value="en|es">Spanish</option><option value="en|sw">Swahili</option><option value="en|sv">Swedish</option><option value="en|th">Thai</option><option value="en|tr">Turkish</option><option value="en|uk">Ukrainian</option><option value="en|ur">Urdu</option><option value="en|vi">Vietnamese</option><option value="en|cy">Welsh</option><option value="en|yi">Yiddish</option></select><div id="google_translate_element2"></div>
<script type="text/javascript">
function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
</script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


<script type="text/javascript">
/* <![CDATA[ */
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
/* ]]> */
</script>
</div>






                    </div>
                    <!-- END BREADCRUMB! -->

                    <!-- PAGE CONTENT BEGINS///////////////////////////////////////////////////////////////////////////// -->
                    <div id="content">
                    <?php echo $sf_content ?>
                    </div>
                    <!-- PAGE CONTENT ENDS///////////////////////////////////////////////////////////////////////////// -->

                </div><!-- /.main-content -->
            </div><!-- /.main-container-inner -->

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="icon-double-angle-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->

        <!--[if IE]>
        <script type="text/javascript">
         window.jQuery || document.write("<script src='/js/myaccount/jquery-1.10.2.min.js'>"+"<"+"/script>");
        </script>
        <![endif]-->

        <script type="text/javascript">
            if("ontouchend" in document) document.write("<script src='/js/myaccount/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>
        <script src="/js/myaccount/bootstrap.min.js"></script>
        <script src="/js/myaccount/typeahead-bs2.min.js"></script>

        <!-- page specific plugin scripts -->

        <script src="/js/myaccount/jquery.dataTables.min.js"></script>
        <script src="/js/myaccount/jquery.dataTables.bootstrap.js"></script>

        <!-- ace scripts -->

        <script src="/js/myaccount/ace-elements.min.js"></script>
        <script src="/js/myaccount/ace.min.js"></script>

        <!-- inline scripts related to this page -->

        <script type="text/javascript">
            function updateCart() {
                var cart = amplify.store('cartStorage');
                $('.cart-total').html(cart.items.length);
                $('#cart li:not(:first-child):not(:last-child)').remove();

                if (cart.items.length > 0) {
                    $('#cart li:last-child').show();
                    cart.items.forEach(function(item, index) {
                        if (item.productType.name == "funds") {
                            $('#cart li:first-child').after(
                                '<li>'+
                                    '<div class="item">'+
                                        '<div class="clearfix">'+
                                            '<span class="pull-right">'+
                                                '<a href="#" onclick="removeItem(' + index + '); return false;">'+
                                                    '<i class="icon-remove pink bigger-120"></i>'+
                                                '</a>'+
                                            '</span>'+
                                            '<span class="pull-left lighter bigger-130">' + item.productType.name + '</span>'+
                                        '</div>'+
                                        '<div class="space-3"></div>'+
                                        '<div class="clearfix">'+
                                            '<span class="text-muted lighter pull-left">' + item.productType.name + '</span>'+
                                            '<span class="bolder pull-right">$' + item.price[item.productType.name] + '</span>'+
                                        '</div>'+
                                    '</div>'+
                                '</li>');                        
                        } else {
                            $('#cart li:first-child').after(
                                '<li>'+
                                    '<div class="item">'+
                                        '<div class="clearfix">'+
                                            '<span class="pull-right">'+
                                                '<a href="#" onclick="removeItem(' + index + '); return false;">'+
                                                    '<i class="icon-remove pink bigger-120"></i>'+
                                                '</a>'+
                                            '</span>'+
                                            '<span class="pull-left lighter bigger-130">' + item.domainName + '.' + item.TLDName + '</span>'+
                                        '</div>'+
                                        '<div class="space-3"></div>'+
                                        '<div class="clearfix">'+
                                            '<span class="text-muted lighter pull-left">' + item.productType.name + ' (' + item.years[item.productType.name] + ' years)</span>'+
                                            '<span class="bolder pull-right">$' + item.price[item.productType.name][item.years[item.productType.name]] + '</span>'+
                                        '</div>'+
                                    '</div>'+
                                '</li>');
                        }
                    });
                } else {
                    $('#cart li:last-child').hide();
                }
            }

            function removeItem(index) {
                var cart = amplify.store('cartStorage');
                cart.items.splice(index, 1);
                amplify.store('cartStorage', cart);
                updateCart();
            }

            jQuery(function($) {
                var oTable1 = $('#sample-table-2').dataTable( {
                "aoColumns": [
                  { "bSortable": false },
                  null, null,null, null, null,
                  { "bSortable": false }
                ] } );
                
                
                $('table th input:checkbox').on('click' , function(){
                    var that = this;
                    $(this).closest('table').find('tr > td:first-child input:checkbox')
                    .each(function(){
                        this.checked = that.checked;
                        $(this).closest('tr').toggleClass('selected');
                    });
                        
                });
            
            
                $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
                function tooltip_placement(context, source) {
                    var $source = $(source);
                    var $parent = $source.closest('table')
                    var off1 = $parent.offset();
                    var w1 = $parent.width();
            
                    var off2 = $source.offset();
                    var w2 = $source.width();
            
                    if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
                    return 'left';
                }
            });

            $(document).ready(function(){
                updateCart();

                var cart = amplify.store('cartStorage');
                if(<? echo ($sf_user->hasAttribute("just_activated"))? 'true':'false'; ?> && cart.items.length > 0) {
                    document.location = "/#!/registration/checkout";
                }
            });
        </script>

        <script src="/js/myaccount/main.js"></script>
        <script src="/js/myaccount/contacts.js"></script>
    </body>
</html>
