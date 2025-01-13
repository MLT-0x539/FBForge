<?php
# User agent checking methods
$fb_string = '/facebookexternal/i';                # facebookexternal shows in the facebook content scanner's user agent
$gplus_string = '/Feedfetcher-Google/i';       # googleplus shows up in the user agent as well.
# rDNS Lookup Methods
$host_websense = '/websense.com/i';         # Checking the rdns for websense filters
$host_fb = '/tfbnw.net/i';                              # Checking the rdns for tfbnw.net - facebook host
# Load the request properties
$u_agent = $_SERVER['HTTP_USER_AGENT'];
$u_ref     = $_SERVER['HTTP_REFERER'];
$u_host  = gethostbyaddr($_SERVER['REMOTE_ADDR']);
# If we're coming from or facebook or websense or google plus, 
if (preg_match($host_fb,$u_host) || preg_match($host_websense,$u_host) || preg_match($fb_string,$u_agent) || preg_match($gplus_string,$u_agent)) {
    # Display an image
    header('Content-Type: image/jpeg');
    @readfile ('/var/www/localhost/cute_kitten.jpeg');
} else {
    # Rickroll this unsuspecting user
    header('Location: http://www.youtube.com/watch?v=dQw4w9WgXcQ&ob=av3e');
}
?>
