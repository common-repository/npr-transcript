<?php
/*
  NPR Transcript (Wordpress Plugin)
  Copyright (C) 2012 Tony Asch
  Contact me at http://nductiv.com
  v 1.01

  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

if ($_POST['npr_hidden'] == 'Y') {
    //Form data sent
    $npr_api_key = $_POST['npr_api_key'];
    update_option('npr_api_key', $npr_api_key);
    ?>
    <div class="updated"><p><strong><?php echo('Options saved.'); ?></strong></p></div>
    <?php
} else {
    $npr_api_key = get_option('npr_api_key');
}
?>

<div class="wrap">
    <?php echo "<h2>" . 'NPR Transcript Options' . "</h2>"; ?>

    <form name="npr_form" method="post" action="<?php echo str_replace('%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <input type="hidden" name="npr_hidden" value="Y">
        <?php echo "<h4>" . 'NPR API Key Settings' . "</h4>"; ?>
        <p><?php echo("NPR API Key: "); ?><input type="text" name="npr_api_key" value="<?php echo $npr_api_key; ?>" size="60"><?php echo('<a target="_blank" href="http://www.npr.org/templates/reg/"> from NPR site registration</a>'); ?></p>
        <p class="submit">
            <input type="submit" name="Submit" value="<?php echo('Update Options') ?>" />
        </p>
    </form>
    <p>The NPR-Transcript Wordpress Plugin will not run without an API key from National Public Radio. Obtaining an API key is free when you register with NPR (see above link.)</p>
    <p>Use of NPR content is restricted by <a target="_blank" href="http://www.npr.org/api/apiterms.php">NPR's Terms and Conditions</a>. Please review these to ensure your usage is in compliance
        with NPR's requirements. National Public Radio is quite generous and the WordPress community should respect their T&Cs.</p>
    <hr />
    <h2>Donate</h2>
    <p>If you find this plugin useful, please <a style="color:red;" target="_blank" href="http://www.npr.org/stations/donate/?ps=stbn">donate generously to your local National Public Radio station.</a></p>
    If there's any love left over, buy me a cup of coffee to sip while I listen to NPR:<form style="display:inline;" action="https://www.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="9GUAZYVD556FC">
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif"  style="margin-bottom:-8px;" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>
    <p>&nbsp;</p>
    <hr />
    <h2>Documentation</h2>
    <h4>Usage:</h4>
    <p>Place the shortcode <strong>[npr-transcript story=<i>storynum</i>]</strong> into any post or page. <i>storynum</i> can be found on the NPR website inside the URL for a particular story
        as shown in the diagram below where the <i>storynum</i> is <strong>150002308.</strong></p>
    <p><img style="margin-left:50px;" src="<?php echo get_bloginfo('url'); ?>/wp-content/plugins/npr-transcript/screenshot-1.jpg"/></p>
    <h4>Optional Parameters:</h4>
    <ul style="margin-left:50px;">
        <li><strong>class</strong> = css class of the <strong>p</strong> tags in transcript text. If not specified, defaults to <i>npr_para</i></li>
        <li><strong>lp_class</strong> = css class of the <strong>p</strong> tag in link back to the NPR story at the bottom of the transcript. NPR T&C asks that this link always be present and the plugin automatically inserts the link within a p tag. If not specified, the default class is <i>npr_lp</i>.</li>
        <li><strong>l_class</strong> = css class of the <strong>a</strong>> tag in link back to the NPR story at the bottom of the transcript. If not specified this class defaults to <i>npr_l</i></li>
        <li><strong>link_phrase</strong> = text of the link back to the NPR story at the bottom of the transcript. If not specified this text defaults to <i>Listen on NPR.ORG</i></li>
    </ul>
    <h4>Example:</h4>
    <p>An example using all the options might look like: <strong><pre>[npr-transcript story=150002308 class=myTranscriptClass lp_class=myLinkParaClass l_class=myLinkClass link_phrase="Give it a listen..."]</pre></strong></p>
    <p>Of course, you will need to define these classes (or the 3 default classes: <i>npr_para, npr_lp, and npr_l</i> in your theme's CSS, or the transcript and link will appear in whatever styling your theme applies to <strong>p</strong> and <strong>a</strong> tags.</p>
    <h4>Sample HTML output:</h4>
    <p>The HTML that this plugin outputs looks something like this:
    <xmp>
        <p class="npr_para">KASELL: Kate, you had three correct answers, so I'll be doing the message on your voicemail or answering machine.</p>
        <p class="npr_para">SAGAL: Well done.</p>
        <p class="npr_para">(APPLAUSE)</p>
        <p class="npr_para">BREEN: Thank you.</p>
        <p class="npr_para">SAGAL: Kate, thank you so much for playing.</p>
        <p class="npr_para">BREEN: All right, thank you.</p>
        <p class="npr_para">SAGAL: Bye-bye.</p>
        <p class="npr_para">BREEN: Bye.</p>
        <p class="npr_para">(SOUNDBITE OF MUSIC) Transcript provided by NPR, Copyright National Public Radio.</p>
        <p class="npr_lp"><a class="npr_l" target="_blank" href="http://www.npr.org/2012/05/26/153730322/whos-carl-this-time">Listen on NPR.ORG</a></p>
    </xmp>
</div>
