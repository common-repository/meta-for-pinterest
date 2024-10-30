=== MetaPin ===
Contributors: ilektronx
Tags: pinterest, meta
Donate link: http://ilektronx.com/metapin/
Requires at least: 4.0.0
Tested up to: 5.4.1
Stable tag: 1.0.2
License: GPLv2
License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html

Lame name, awesome and simple functionality. Meta for Pinterest adds fields for meta data used by Pinterest in  tags to generate pins.

== Description ==
MetaPin was written to do one thing, and hopefully do that one thing well. That one thing? Add metadata to img tags that Pinterest can use to get relevant information about the image. This allows you to change the image that gets pinned, restrict pinning of an image, ensure that all pins will be consolidated to the correct pin on Pinterest, specify the URL that is pinned, and provide rich pin descriptions without spamming your alt or title attributes.

MetaPin allows you to change the pin attributes for every instance of an image. This means that you'll be able to use an image on multiple posts, say one an item description and category aggregation page, and configure different pin descriptions for each instance of that same image.

The MetaPin plugin is very simple, and you'll only see a panel show up when you edit an image inserted into a post either with the block editor or classic editor. You will see the fields for each of the configurable items listed below.

The following data is added to instances of images embedded in posts:

= data-pin-description =

Pin description allows you to add hashtags and more wordy pin descriptions without spamming your alt attribute for your images. This can help with SEO and ensure that all the images on a page generate the same pin description

= data-pin-url =

The URL provided here will change which URL the pin created from this image will point to. This could, for example, be used to add UTM tags to pins to be able to track how many clicks you get on your pins because somebody pinned an image from your site.

= data-pin-id =

The Pin ID is less straightforward. Each pin has a unique ID, and this allows you to ensure that when an image is pinned that it counts as the same image as the one with the pin ID that was provided.

= data-pin-media =

The media URL provided here allows you to "force" or encourage a user to pin a different image or media than the one that they chose. This allows you to have a long pinnable image that shows up on the pin that is never loaded on the page that you want them to pin.

= data-pin-nopin =

Simply put, this attribute tells pinterest not to allow pinning of this image.

All of these attributes are just metadata that a pinning client that doesn't conform to Pinterest's guidelines may choose to ignore.

== Installation ==
Since this doesn't modify anything in the database, installation and removal are low risk. The block editor version does store attributes on an image item, but it should work when switching between the classic and block editor.

== Screenshots ==

1. Accessing the meta fields with the Classic Editor
2. Classic Editor Fields
3. Block Editor Fields
