http://timeago.yarp.com/







 timeago
a jQuery plugin

What?
Timeago is a jQuery plugin that makes it easy to support automatically updating fuzzy timestamps (e.g. "4 minutes ago" or "about 1 day ago"). Download, view the examples, and enjoy.

You opened this page 5 minutes ago. (This will update every minute. Wait for it.)

This page was last modified 3 months ago.

Ryan was born 37 years ago.

Why?
Timeago was originally built for use with Yarp.com to timestamp comments.

Avoid timestamps dated "1 minute ago" even though the page was opened 10 minutes ago; timeago refreshes automatically.
You can take full advantage of page caching in your web applications, because the timestamps aren't calculated on the server.
You get to use microformats like the cool kids.
How?
First, load jQuery and the plugin:
<script src="jquery.min.js" type="text/javascript"></script>
<script src="jquery.timeago.js" type="text/javascript"></script>
Now, let's attach it to your timestamps on DOM ready:
jQuery(document).ready(function() {
  jQuery("abbr.timeago").timeago();
});
This will turn all abbr elements with a class of timeago and an ISO 8601 timestamp in the title:
<abbr class="timeago" title="2008-07-17T09:24:17Z">July 17, 2008</abbr>
into something like this:
<abbr class="timeago" title="July 17, 2008">7 years ago</abbr>
which yields: 7 years ago. As time passes, the timestamps will automatically update.

You can also use it programmatically:
jQuery.timeago(new Date());             //=> "less than a minute ago"
jQuery.timeago("2008-07-17");           //=> "7 years ago"
jQuery.timeago(jQuery("abbr#some_id")); //=> "7 years ago"     // [title="2008-07-20"]
To support timestamps in the future, use the allowFuture setting:
jQuery.timeago.settings.allowFuture = true;
To disable timestamps in the past, use the allowPast setting. This setting is set to true by default. When set to false, if the time is in the past then instead of displaying a message like "5 minutes ago" a static message will be displayed. The staic message displayed can be configured with the strings.inPast setting:
jQuery.timeago.settings.strings.inPast = "time has elapsed";
jQuery.timeago.settings.allowPast = false;
Excusez-moi?
Yes, timeago has locale/i18n/language support. Here are some configuration examples. Please submit a GitHub pull request for corrections or additional languages.

Where?
Download the "stable" release.

The code is hosted on GitHub: http://github.com/rmm5t/jquery-timeago. Go on, live on the edge.

Who?
Timeago was built by Ryan McGeary (@rmm5t) while standing on the shoulders of giants. John Resig wrote about a similar approach. The verbiage was based on the distance_of_time_in_words ActionView helper in Ruby on Rails.

When?
Timeago was conceived 7 years ago. (Yup, that's powered by timeago too)

What else?
HTML5 has a new time tag and timeago supports it too.

<time class="timeago" datetime="2008-07-17T09:24:17Z">July 17, 2008</time>
Attach timeago like so:
jQuery(document).ready(function() {
  jQuery("time.timeago").timeago();
});
Are you concerned about time zone support? Don't be. Timeago handles this too. As long as your timestamps are in ISO 8601 format and include a full time zone designator (±hhmm), everything should work out of the box regardless of the time zone that your visitors live in.

Huh?
Need a Rails helper to make those fancy microformat abbr tags? Fine, here ya go:
def timeago(time, options = {})
  options[:class] ||= "timeago"
  content_tag(:abbr, time.to_s, options.merge(:title => time.getutc.iso8601)) if time
end
Do you use Timeago?
Great! Please add your site to the list of Sites that use Timeago.