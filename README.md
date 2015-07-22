# wordpress-plugin
weclapp integration for wordpress

This plugin integrates weclapp functionality into wordpress CMS

<h4>Description</h4>

Add Campagin registration to support
Automatic webinar registration. It integrates the following two elements into your webpage:


* a list upcoming webinars scheduled in your weclapp account under CRM -> campaigns (campaign type webinar)
* a formular enabling visitors of your website to participate in one or more webinars with one single registration

If a user is not in your contact, lead, or customer list, he will be added to your contacts (contact type can be set in the Plugin Settings 
under "Unknown persons place as").
Participants trying to register repeatedly will be informed about their already existing participation.
To use this feature, just place the Shortcode [weclappWebinar] into a chosen post.

Here you can see an example how this looks like:
https://www.weclapp.com/de/webinare/

<h4>Installation</h4>

1. <a href="https://github.com/ertanoe/wordpress-plugin/archive/master.zip">Download Plugin</a>
2. Upload plugin under Plugins -> Add new.
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Setup your plugin (can be found in weclapp under account name in the top right corner -> Settings)
4.1 Enter your API Token
4.2 Enter your domain name e.g. your_domain_name.weclapp.com (without "https://")

<h4>Changelog</h4>

1.0 Initial version with campaign support

