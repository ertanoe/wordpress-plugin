# wordpress-plugin
weclapp integration for wordpress

This plugin integrates weclapp functionality into wordpress CMS

== Description ==

Add Campagin registration to support
Automatic webinar registration. It integrates the following two elements into your webpage:


* a list upcoming webinars scheduled in your weclapp account under CRM -> campaigns (campaign type webinar)
* a formular enabling visitors of your website to participate in one or more webinars with one single registration

If a user is not in your contact, lead, or customer list, he will be added to your contacts (contact type can be set in the Plugin Settings 
under "Unknown persons place as").
Participants trying to register repeatedly will be informed about their already existing participation.
To use this feature, just place the Shortcode [weclappWebinar] into a chosen post.

Here you can see an example, how this looks like:
https://www.weclapp.com/de/webinare/

== Installation ==

1. Upload plugin under Plugins -> Add new.
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Setup your plugin (can be found in weclapp under account name in the top right corner -> Settings)
3.1 Enter your API Token
3.2 Enter your domain name e.g. your_domain_name.weclapp.com (without "https://")

== Changelog ==

1.0 Initial version with campaign support only

