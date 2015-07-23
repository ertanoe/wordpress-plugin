# weclapp-wordpress-plugin

This plugin integrates weclapp functionality into WordPress CMS

<h5>Campaign management</h5>
Adds the possibility to display campaigns and allow automatic webinar registration. It integrates the following two elements into your webpage:


* a list upcoming webinars scheduled in your weclapp account under CRM -> campaigns (campaign type webinar)
* a display a submit form enabling visitors of your website to participate in one or more webinars with one single registration (this feature can be deactivated under Settings -> weclapp in WordPress)

If a user is not in your contact, lead, or customer list in weclapp then then the participant will be added to your contacts (contact type can be set in the Plugin Settings 
under "Create new persons as").
Participants trying to register repeatedly will be informed about their already existing participation.
To use this feature, just place the Shortcode [weclappWebinar] into a chosen post.

Here is a sample how the usage of the plugin looks like:
https://www.weclapp.com/de/webinare/

<h5>More functionality will be added in the future</h5>

<h5>Supported languages</h5>
<ul>
<li>German</li>
<li>English</li>
<li>Turkish</li>
<li>Polsky</li>
</ul>

<h4>Installation</h4>
<ul>
<li><a href="https://github.com/ertanoe/wordpress-plugin/archive/master.zip">Download Plugin</a></li>
<li>Upload plugin under Plugins -> Add new.</li>
<li>Activate the plugin through the 'Plugins' menu in WordPress</li>
<li>Setup your plugin (API data in weclapp can be found under the user settings)</li>
<ul> 
  <li>Enter your API Token</li>
  <li>Enter your domain name e.g. your_domain_name.weclapp.com (without "https://")</li>
</ul>
</ul>
<h4>Changelog</h4>

1.0 Initial version with campaign support

