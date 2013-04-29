UPDATE pchc_options SET option_value = replace(option_value, 'http://localhost:8888', 'http://web.pchc.local') WHERE option_name = 'home' OR option_name = 'siteurl';
