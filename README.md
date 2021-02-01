# GromIT.SentMails

GromIT.SentMails is the plugin for capturing all emails sent by OctoberCMS based website. 

## Usage

After installation, the plugin will add the "Sent mails" item to the main menu. In this section, you can view all emails sent by the website.

## Tracking pixel

GromIT.SentMails gives you the ability to set tracking pixel in mail template.

Add the following code to the mail template.
```twig
<img src="{{ _mail_pixel}}" />
```

## Email web-version

You can add a link to the web version of the email.

Add the following code to the mail template.
```twig
<a href="{{ _mail_link }}">View this email in browser</a>
```