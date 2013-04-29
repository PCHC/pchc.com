UPDATE pchc_options SET option_value = replace(option_value, 'http://localhost:8888/pchc', 'http://web.pchc.local') WHERE option_value LIKE '%http://localhost:8888/pchc%';
