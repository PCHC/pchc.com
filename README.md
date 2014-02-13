# PCHC.com

Design & development of PCHC.com's main theme and child themes.

## What's this, now?

PCHC.com is developed in WordPress and has several themes to go along with it -- the main master theme, and many child themes based on the master for PCHC's sub-websites, such as PCHC Pediatrics and Eastern Maine AIDS Network.

## If it's WordPress, where are all the other files?

This repository just hosts the theme files and a few custom plugins. Since core files should never be modified, there's no need to have them sitting around in the repository -- besides, there's can be some sensitive config information that shouldn't be public. If something on the website breaks major-hardcore, these are the most important, irreplacable files.

## I see it's here, but how does the website get updated?

WebHooks! Whenever an update is pushed to the GitHub repository, it hits an address on PCHC.com with a POST request, which then executes a `git pull` in its own repository (on the master branch, by the way). So, changes are almost instantaneous. Easy peasy, lemon squeezy.

## What do I need to make things go smoothly?

First off, you'll need to know your way around [Git](http://git-scm.com/) and GitHub. [Try GitHub](http://try.github.io/) is a good crash-course in both.

Secondly, you'll need a general understanding of HTML, CSS, PHP, and [WordPress](http://wordpress.org/).

Thirdly, all the themes use [SASS](http://sass-lang.com/) stylesheets with [Compass](http://compass-style.org/), which do a lot of awesome things and then compile into a regular CSS file. You can either:

 * install SASS & Compass and run `compass watch` from a command line in the `SCSS` directory of the theme you're working on. This will watch for any changes to the `.scss` files and compile them into the corresponding `.css` files.
 * download a GUI application like [Scout](http://mhs.github.io/scout-app/) to do the command-line stuff for you

#### Tools of the trade:

Here's some of the stuff I use, but use whatevever works for you:

 * Text Editor -- [Sublime Text](http://www.sublimetext.com/)
 * GUI Git client -- [SourceTree](http://www.sourcetreeapp.com/)

## I've got questions! HELP!

Get in touch with Chris Violette at PCHC. He's the one running the show on the website.
