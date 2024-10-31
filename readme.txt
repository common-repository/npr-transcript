=== NPR Transcription ===
Contributors: nductiv
Donate link: http://nductiv.com/
Tags: National Public Radio, NPR, Transcription
Requires at least: 3.0
Tested up to: 3.4
Stable tag: /trunk/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

National Public Radio offers free transcriptions of its radio shows.
NPR Transcription plugin offers a shortcode to insert these into pages/posts.

== Description ==

National Public Radio offers free transcriptions of most of its radio shows.
The NPR Transcription plugin offers a simple shortcode syntax for inserting these
transcriptions into Wordpress pages and posts, either with theme based styling
or custom styling.

The NPR-Transcript Wordpress Plugin will not run without an API key from National Public Radio.
Obtaining an API key is free when you [Register with NPR] (http://www.npr.org/templates/reg/ "register with NPR")

Use of NPR content is restricted by NPR's [Terms and Conditions] (http://www.npr.org/api/apiterms.php "NPR Terms and Conditions").
Please review these to ensure your usage is in compliance with NPR's requirements.
National Public Radio is quite generous and the WordPress community should respect their T&Cs.

Usage:

Place the shortcode [npr-transcript story=storynum] into any post or page. storynum can be found on the NPR website inside the URL for a particular story as shown in the attached screen shot where the storynum is 150002308.

Optional Parameters:

    class = css class of the p tags in transcript text. If not specified, defaults to npr_para
    lp_class = css class of the p tag in link back to the NPR story at the bottom of the transcript. NPR T&C asks that this link always be present and the plugin automatically inserts the link within a p tag. If not specified, the default class is npr_lp.
    l_class = css class of the a> tag in link back to the NPR story at the bottom of the transcript. If not specified this class defaults to npr_l
    link_phrase = text of the link back to the NPR story at the bottom of the transcript. If not specified this text defaults to Listen on NPR.ORG

Example:

An example using all the options might look like:

[npr-transcript story=150002308 class=myTranscriptClass lp_class=myLinkParaClass l_class=myLinkClass link_phrase="Give it a listen..."]

Of course, you will need to define these classes (or the 3 default classes: npr_para, npr_lp, and npr_l in your theme's CSS, or the transcript and link will appear in whatever styling your theme applies to p and a tags.
Sample HTML output:

The HTML that this plugin outputs looks something like this:
&lt;p class="npr_para"&gt;KASELL: Kate, you had three correct answers, so I'll be doing the message on your voicemail or answering machine.&lt;/p&gt; 
&lt;p class="npr_para"&gt;SAGAL: Well done.&lt;/p&gt; 
&lt;p class="npr_para"&gt;(APPLAUSE)&lt;/p&gt; 
&lt;p class="npr_para"&gt;BREEN: Thank you.&lt;/p&gt; 
&lt;p class="npr_para"&gt;SAGAL: Kate, thank you so much for playing.&lt;/p&gt; 
&lt;p class="npr_para"&gt;BREEN: All right, thank you.&lt;/p&gt; 
&lt;p class="npr_para"&gt;SAGAL: Bye-bye.&lt;/p&gt; 
&lt;p class="npr_para"&gt;BREEN: Bye.&lt;/p&gt; 
&lt;p class="npr_para"&gt;(SOUNDBITE OF MUSIC) Transcript provided by NPR, Copyright National Public Radio.&lt;/p&gt; 
&lt;p class="npr_lp"&gt;&lt;a class="npr_l" target="_blank" href="http://www.npr.org/2012/05/26/153730322/whos-carl-this-time"&gt;Listen on NPR.ORG&lt;/a&gt;&lt;/p&gt;

== Installation ==

1. Use the standard Wordpress Installer to upload and unzip the plugin
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Register at NPR.ORG to get a free API Key
1. Enter the API key into the NPR Transcript Settings

== Frequently Asked Questions ==

= What usage does NPR allow for their transcripts  =

See: [NPR Terms and Conditions] (http://www.npr.org/api/apiterms.php "NPR API usage restrictions")

== Screenshots ==

1. How to find the NPR Story ID number


== Changelog ==

= 1.01 =
* Fix glitch causing plugin to appear twice in Plugin Admin
* Remove API key from WP database when plugin is installed

= 1.0 =
* Initial Release.

== Upgrade Notice ==

= 1.01 =
Fix glitch causing plugin to appear twice in Plugin Admin
Remove API key from WP database when plugin is installed
