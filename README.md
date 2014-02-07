# PCHC.com

Design & development of PCHC.com's main theme and child themes.

## What's this, now?

PCHC.com is developed in WordPress and has several themes to go along with it -- the main master theme, and many child themes based on the master for PCHC's sub-websites, such as PCHC Pediatrics and Eastern Maine AIDS Network.

## If it's WordPress, where are all the other files?

This repository just hosts the theme files and a few custom plugins. Since core files should never be modified, there's no need to have them sitting around in the repository -- besides, there's can be some sensitive config information that shouldn't be public. If something on the website breaks major-hardcore, these are the most important, irreplacable files.

## I see it's here, but how does the website get updated?

WebHooks! Whenever an update is pushed to the GitHub repository, it hits an address on PCHC.com with a POST request, which then executes a `git pull` in its own repository (on the master branch, by the way). So, changes are almost instantaneous. Easy peasy, lemon squeezy.

## I've got questions! HELP!

Get in touch with Chris Violette at PCHC. He's the one running the show on the website.
