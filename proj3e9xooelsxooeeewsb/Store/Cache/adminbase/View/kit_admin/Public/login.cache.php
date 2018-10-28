<?php if (!class_exists('\Cml\View')) die('Access Denied');?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>login-<?php echo \Cml\Config::get("system_name");?></title>
    <link rel="stylesheet" href="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("adminbase/kit_admin/plugins/font-awesome/css/font-awesome.min.css");?>">
    <style>
        html{font-family:sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;}body{margin:0;}article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav,section,summary{display:block;}audio,canvas,progress,video{display:inline-block;vertical-align:baseline;}audio:not([controls]){display:none;height:0;}[hidden],template{display:none;}a{background-color:transparent;}a:active,a:hover{outline:0;}abbr[title]{border-bottom:1px dotted;}b,strong{font-weight:bold;}dfn{font-style:italic;}h1{font-size:2em;margin:0.67em 0;}mark{background:#ff0;color:#000;}small{font-size:80%;}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline;}sup{top:-0.5em;}sub{bottom:-0.25em;}img{border:0;}svg:not(:root){overflow:hidden;}figure{margin:1em 40px;}hr{-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box;height:0;}pre{overflow:auto;}code,kbd,pre,samp{font-family:monospace,monospace;font-size:1em;}button,input,optgroup,select,textarea{color:inherit;font:inherit;margin:0;}button{overflow:visible;}button,select{text-transform:none;}button,html input[type="button"],input[type="reset"],input[type="submit"]{-webkit-appearance:button;cursor:pointer;}button[disabled],html input[disabled]{cursor:default;}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0;}input{line-height:normal;}input[type="checkbox"],input[type="radio"]{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;padding:0;}input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{height:auto;}input[type="search"]{-webkit-appearance:textfield;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box;}input[type="search"]::-webkit-search-cancel-button,input[type="search"]::-webkit-search-decoration{-webkit-appearance:none;}fieldset{border:1px solid #c0c0c0;margin:0 2px;padding:0.35em 0.625em 0.75em;}legend{border:0;padding:0;}textarea{overflow:auto;}optgroup{font-weight:bold;}table{border-collapse:collapse;border-spacing:0;}td,th{padding:0;}
        body {
            font-family: "Open Sans", sans-serif;
            height: 100vh;
            background: url("<?php echo \Cml\Tools\StaticResource::parseResourceUrl("adminbase/kit_admin/images/bg.jpg");?>") 50% fixed;
            background-size: cover;
        }

        @keyframes spinner {
            0% {
                transform: rotateZ(0deg);
            }
            100% {
                transform: rotateZ(359deg);
            }
        }
        * {
            box-sizing: border-box;
        }

        .wrapper {
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            min-height: 100%;
            padding: 20px;
            background: rgba(4, 40, 68, 0.85);
        }

        .login {
            border-radius: 2px 2px 5px 5px;
            padding: 10px 20px 20px 20px;
            width: 90%;
            max-width: 320px;
            background: #ffffff;
            position: relative;
            padding-bottom: 80px;
            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.3);
        }
        .login.loading button {
            max-height: 100%;
            padding-top: 50px;
        }
        .login.loading button .spinner {
            opacity: 1;
            top: 40%;
        }
        .login.error button {
            font-weight:bold;
            background-color: #ed980f;
            opacity: 0.8;
        }
        .login.error button .spinner {
            display:none;

        }
        .login input {
            display: block;
            padding: 15px 10px;
            margin-bottom: 10px;
            width: 100%;
            border: 1px solid #ddd;
            transition: border-width 0.2s ease;
            border-radius: 2px;
            color: #ccc;
        }
        .login input + i.fa {
            color: #fff;
            font-size: 1em;
            position: absolute;
            margin-top: -47px;
            opacity: 0;
            left: 0;
            transition: all 0.1s ease-in;
        }
        .login.ok button {
            background-color: #8bc34a;
        }
        .login.ok button .spinner {
            border-radius: 0;
            border-top-color: transparent;
            border-right-color: transparent;
            height: 20px;
            animation: none;
            transform: rotateZ(-45deg);
        }
        .login input:focus {
            outline: none;
            color: #444;
            border-color: #2196F3;
            border-left-width: 35px;
        }
        .login input:focus + i.fa {
            opacity: 1;
            left: 30px;
            transition: all 0.25s ease-out;
        }
        .login a {
            font-size: 0.8em;
            color: #2196F3;
            text-decoration: none;
        }
        .login .title {
            color: #444;
            font-size: 1.2em;
            font-weight: bold;
            margin: 10px 0 30px 0;
            border-bottom: 1px solid #eee;
            padding-bottom: 20px;
        }
        .login button {
            width: 100%;
            height: 100%;
            padding: 10px 10px;
            background: #2196F3;
            color: #fff;
            display: block;
            border: none;
            margin-top: 20px;
            position: absolute;
            left: 0;
            bottom: 0;
            max-height: 60px;
            border: 0px solid rgba(0, 0, 0, 0.1);
            border-radius: 0 0 2px 2px;
            transform: rotateZ(0deg);
            transition: all 0.1s ease-out;
            border-bottom-width: 7px;
        }
        .login button .spinner {
            display: block;
            width: 40px;
            height: 40px;
            position: absolute;
            border: 4px solid #ffffff;
            border-top-color: rgba(255, 255, 255, 0.3);
            border-radius: 100%;
            left: 50%;
            top: 0;
            opacity: 0;
            margin-left: -20px;
            margin-top: -20px;
            animation: spinner 0.6s infinite linear;
            transition: top 0.3s 0.3s ease, opacity 0.3s 0.3s ease, border-radius 0.3s ease;
            box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.2);
        }
        .login:not(.loading) button:hover {
            box-shadow: 0px 1px 3px #2196F3;
        }
        .login:not(.loading) button:focus {
            border-bottom-width: 4px;
        }
        .login input.code {width:50%; display: inline-block;}
        .login img.code {width:45%; display: inline-block;vertical-align: middle}

        footer {
            display: block;
            padding-top: 50px;
            text-align: center;
            color: #ddd;
            font-weight: normal;
            text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.2);
            font-size: 0.8em;
        }
        footer a, footer a:link {
            color: #fff;
            text-decoration: none;
        }

    </style>
</head>

<body>

<div class="wrapper">
    <form class="login">
        <p class="title">Log in</p>
        <input type="text" placeholder="<?php echo ($showField && isset($showField['username'])) ? $showField['username'] : '请输入用户名';?>" autofocus name="username"/>
        <i class="fa fa-user"></i>
        <input type="password" placeholder="Password" name="password" />
        <i class="fa fa-key"></i>

        <img src="<?php \Cml\Http\Response::url('cml_calc_veryfy_code');?>" width="138" height="36" class="code">
        <input type="text" name="code" class="code">
        <button type="submit">
            <i class="spinner"></i>
            <span class="state">Log in</span>
        </button>
    </form>
    <footer><a target="blank" href="http://cmlphp.com">cmlphp</a></footer>
    </p>
</div>
<script src="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("adminbase/kit_admin/plugins/layui/layui.js");?>"></script>
<script>
    layui.config({
        base: '<?php echo \Cml\Tools\StaticResource::parseResourceUrl("adminbase/kit_admin/build/js/");?>'
    });
</script>

<script src="<?php echo \Cml\Tools\StaticResource::parseResourceUrl("adminbase/kit_admin/js/login.js");?>"></script>
<script>
    var login_url = "<?php \Cml\Http\Response::url('adminbase/Public/checkLogin');?>", jump_url = "<?php \Cml\Http\Response::url('adminbase/System/Index/index');?>", veri_code_url="<?php \Cml\Http\Response::url('cml_calc_veryfy_code');?>";
</script>

</body>
</html>
