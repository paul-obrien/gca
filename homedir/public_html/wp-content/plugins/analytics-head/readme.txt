=== Analytics Head ===

Tags: Google, Analytics, Webmaster, Tools, Tracking, Code, Head, Section
Requires at least: 2.5
Tested up to: 3.5.2
Contributors: lukasznowicki
Stable tag: 0.5.4

This plugin adds tracking code for Google Analytics to your WordPress "head" section, so you can authorize your site in Google Webmaster Tools.

== Description ==

This plugin adds tracking code for Google Analytics to your WordPress site. Unlike other plugins, code is added to the "head" section, so you can authorize your site in Google Webmaster Tools.

There are many Google Analytics plugins for WordPress. I used a few of those myself and it worked well. The trouble began when I willed to use Google Webmaster's Tools.

It turned out that I can authenticate the ownership of the website using my Google Analytics account. Where's the catch? Google Webmaster's Tools expects that the code will be located at the <head> section and all the plugs have placed it at the very end of the page (apart from this case - very rightly).

Therefore, I created a plug-in called "Analytics Head", which places tracking code in the head section of the webpage.

== Installation ==

1. Upload `analytics-home` directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Provide your Google ID in the Settings - Analytics Head section
1. That's all folks, have fun :)

== Frequently Asked Questions ==

= How do I get Google Tracking code? =
Register at http://www.google.com/analytics/, add your site and then Google will provide you valid Google Analytics code (something like UA-xxxxxxxx-y)
= Why do I need this code in the head section? Google told me that the code should be put just before </html> tag =
It is for Google Webmaster Tools users. You can prove that your site is owned by you using Google code. However, in that case, Google will require that the code was placed in the "head" section of the site.
= Do I need to know how to use html, php or similar techniques? =
No.
= Is it free? =
Yes, it is under GPLv2 licence. However, you can donate me a few dollars if it makes you feel good. I certainly have nothing against it.

== Upgrade Notice ==

This is first public release, so you do not need to know anything. However, because of my sites, plugin tries to remove old version's setting while it is activated.

== Changelog ==

= 0.5.4 =
* Release date: 2013-07-22
* Status: Stable
* Compatibility: 3.x and previous
* Removed UTF leading info which can sometimes trigger 'Headers already sent' error.

= 0.5.3 =
* Release date: 2013-07-19
* Status: Stable
* Compatibility: 3.x and previous
* On some installations, even after providing Google ID, you can see message to provide it.
* Some minor bug-fixes and typo fixes.

= 0.5.2 =
* Release date: 2011-06-18
* Status: Stable
* Compatibility: 3.x and previous
* On some machines, plugin can fire "wordpress Fatal error" - like many other plugins as I read on the net. It is fixed now.

= 0.5.1 =
* Release date: 2011-06-14
* Status: Stable
* Compatibility: 3.x and previous
* Rewritten completely using OOP
* Some minor bug-fixes
* Removed trashy machine translations except polish (it isn't machine)

= 0.4.1	=
* Release date: 2011-06-11)
* Status: Release Candidate 1
* Added ability to change the language
* Added polish/german/french translations
* Changed the way of saving the settings

= 0.3 =
* Release date: 2011-05-20)
* Status: Beta
* Rewritten completely just for fun
* Some interface changes, no new functionality added

= 0.2 =
* Release date: 2011-04-09)
* Status: Alpha
* Added disabling for logged on admins

= 0.1 =
* Release date: 2011-04-08)
* Status: Prealpha