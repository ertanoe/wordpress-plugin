# weclapp-wordpress-plugin

This plugin integrates weclapp functionality into WordPress CMS

<h5>Campaign management</h5>
Adds the possibility to display campaigns and allow automatic campaign registration. It integrates the following two elements into your webpage:


* a list of upcoming campaings of a chosen type scheduled in your weclapp account under CRM -> campaigns
* a display of a submit form enabling visitors of your website to participate in one or more campaigns with one single registration (this feature can be deactivated using the Shortcode parameter <code>displayformular=0</code>)

If a user is not in your contact, lead, or customer list in weclapp then then the participant will be added to your contacts (contact type can be set in the Plugin Settings 
under "Create new persons as").

Participants trying to register repeatedly will be informed about their already existing participation. 

Additional features: 

* success messages can be configured under the plugin settings
* multiple formulars or lists on one page 

Here is a sample how the usage of the plugin looks like:
https://www.weclapp.com/de/webinare/

<h5>More functionality will be added in the future</h5>

<h5>Supported languages</h5>
<ul>
<li>German</li>
<li>English</li>
<li>French</li>
<li>Spanish</li>
<li>Turkish</li>
<li>Polsky</li>
</ul>

If you encounter translation mistakes, feel free to inform us at the following email-address: support@weclapp.com

<h4> Example usage </h4>

To use this feature, just place the Shortcode <code>[weclapp]</code> into a chosen post. 

By default webinar is the campaign type. 
If you like to use another campaign type, use the Shortcode parameter <code>type</code>. It is also possible to disable the formular using the Shortcode parameter <code>displayformular=0 </code>. 

For instance, if you like to list all upcoming events without a formular:

<code> [weclapp type="Event" displayformular="No"] </code>

Use the following names for the campaign types:
* Event
* Webinar
* Exposition 
* Publicrelation
* Advertisement
* Bulkmail
* Email
* Telemarketing
* Other

Multiple formulars on one page (with different campaign types respectively) can easily be created by placing multiple Shortcodes on it.

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

1.1 Shortcode parameters added and settings modified
  

