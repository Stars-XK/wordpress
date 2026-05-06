<?php

if (!defined('ABSPATH')) {
    exit;
}

function godmaincode_custom_login_styles() {
    ?>
    <style>
        body.login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        body.login::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.05'/%3E%3C/svg%3E");
        }
        
        #login {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 420px;
            position: relative;
            z-index: 1;
        }
        
        #login h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        
        #login h1 a {
            background: none;
            text-indent: 0;
            width: auto;
            height: auto;
            display: block;
        }
        
        #login h1 a img {
            max-width: 120px;
            height: auto;
            margin-bottom: 15px;
        }
        
        #login h1 a::after {
            content: "<?php echo esc_html(get_bloginfo('name')); ?>";
            display: block;
            font-size: 24px;
            font-weight: 700;
            color: #1f2937;
            margin-top: 10px;
        }
        
        .login form {
            background: transparent;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            padding: 24px;
            box-shadow: none;
        }
        
        .login form .input,
        .login form input[type="text"],
        .login form input[type="password"],
        .login form input[type="email"] {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #f9fafb;
        }
        
        .login form .input:focus,
        .login form input[type="text"]:focus,
        .login form input[type="password"]:focus,
        .login form input[type="email"]:focus {
            outline: none;
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
            background: white;
        }
        
        .login .button-primary {
            width: 100%;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            border: none;
            border-radius: 8px;
            padding: 14px 24px;
            font-size: 15px;
            font-weight: 600;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 16px rgba(99, 102, 241, 0.4);
        }
        
        .login .button-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 24px rgba(99, 102, 241, 0.5);
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
        }
        
        .login .button-primary:active {
            transform: translateY(0);
        }
        
        .login #nav,
        .login #backtoblog {
            text-align: center;
            margin-top: 20px;
        }
        
        .login #nav a,
        .login #backtoblog a {
            color: #6b7280;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }
        
        .login #nav a:hover,
        .login #backtoblog a:hover {
            color: #6366f1;
        }
        
        .login .message {
            background: rgba(16, 185, 129, 0.1);
            border-left: 4px solid #10b981;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 20px;
        }
        
        .login .error {
            background: rgba(239, 68, 68, 0.1);
            border-left: 4px solid #ef4444;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 20px;
        }
        
        .login #rememberme {
            margin-right: 8px;
        }
        
        .login label {
            color: #4b5563;
            font-size: 14px;
        }
        
        @media (max-width: 480px) {
            #login {
                margin: 20px;
                padding: 30px 20px;
            }
        }
    </style>
    <?php
}
add_action('login_enqueue_scripts', 'godmaincode_custom_login_styles');

function godmaincode_custom_login_logo_url() {
    return home_url();
}
add_filter('login_headerurl', 'godmaincode_custom_login_logo_url');

function godmaincode_custom_login_logo_title() {
    return get_bloginfo('name');
}
add_filter('login_headertitle', 'godmaincode_custom_login_logo_title');

function godmaincode_login_body_class($classes) {
    $classes[] = 'godmaincode-login';
    return $classes;
}
add_filter('login_body_class', 'godmaincode_login_body_class');