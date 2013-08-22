UPDATE pchc_options SET option_value = replace(option_value, 'http://localhost:8888/web.pchc.local', 'http://web.pchc.local') WHERE option_value LIKE '%http://localhost:8888/web.pchc.local%';
UPDATE pchc_postmeta SET meta_value = replace(meta_value, 'http://localhost:8888/web.pchc.local', 'http://web.pchc.local') WHERE meta_value LIKE '%http://localhost:8888/web.pchc.local%';
UPDATE pchc_posts SET guid = replace(guid, 'http://localhost:8888/web.pchc.local', 'http://web.pchc.local') WHERE guid LIKE '%http://localhost:8888/web.pchc.local%';
