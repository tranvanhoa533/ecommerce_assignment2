<?php
/*------------------------------------------------------------------
[TREND - SHORTCODES - FOR VISUAL COMPOSER PLUGIN]

Project:    TREND – Multi-Purpose WooCommerce Template
Author:     ModelTheme
URL:        http://trendwp.modeltheme.com/

[Table of contents]

1. Recent Tweets
2. Google map
3. Contact Form
5. Testimonials
6. Services style 1
8. Subscribe form
9. Posts calendar
10. Jumbotron
11. Alert
12. Progress bars
13. Panels
14. Responsive YouTube Video
15. Featured post
16. Service style2
17. Skill counter
18. Pricing table
19. Heading with border
20. Clients slider
21. Testimonials Slider V2
22. Social icons
23. List group
24. Thumbnails custom content
25. Heading with bottom border
26. Call to Action
27. Section Title&Subtitle
28. Blog Posts
29. Masonry banners
30. Sale banner
31. Products by Category

-------------------------------------------------------------------*/

add_action('init','trend_vc_shortcodes');   
function trend_vc_shortcodes(){
#FontAwesome icons list
$fa_list = array(
  'fa fa-angellist' => 'fa fa-angellist',
  'fa fa-area-chart' => 'fa fa-area-chart',
  'fa fa-at' => 'fa fa-at',
  'fa fa-bell-slash' => 'fa fa-bell-slash',
  'fa fa-bell-slash-o' => 'fa fa-bell-slash-o',
  'fa fa-bicycle' => 'fa fa-bicycle',
  'fa fa-binoculars' => 'fa fa-binoculars',
  'fa fa-birthday-cake' => 'fa fa-birthday-cake',
  'fa fa-bus' => 'fa fa-bus',
  'fa fa-calculator' => 'fa fa-calculator',
  'fa fa-cc' => 'fa fa-cc',
  'fa fa-cc-amex' => 'fa fa-cc-amex',
  'fa fa-cc-discover' => 'fa fa-cc-discover',
  'fa fa-cc-mastercard' => 'fa fa-cc-mastercard',
  'fa fa-cc-paypal' => 'fa fa-cc-paypal',
  'fa fa-cc-stripe' => 'fa fa-cc-stripe',
  'fa fa-cc-visa' => 'fa fa-cc-visa',
  'fa fa-copyright' => 'fa fa-copyright',
  'fa fa-eyedropper' => 'fa fa-eyedropper',
  'fa fa-futbol-o' => 'fa fa-futbol-o',
  'fa fa-google-wallet' => 'fa fa-google-wallet',
  'fa fa-ils' => 'fa fa-ils',
  'fa fa-ioxhost' => 'fa fa-ioxhost',
  'fa fa-lastfm' => 'fa fa-lastfm',
  'fa fa-lastfm-square' => 'fa fa-lastfm-square',
  'fa fa-line-chart' => 'fa fa-line-chart',
  'fa fa-meanpath' => 'fa fa-meanpath',
  'fa fa-newspaper-o' => 'fa fa-newspaper-o',
  'fa fa-paint-brush' => 'fa fa-paint-brush',
  'fa fa-paypal' => 'fa fa-paypal',
  'fa fa-pie-chart' => 'fa fa-pie-chart',
  'fa fa-plug' => 'fa fa-plug',
  'fa fa-shekel' => 'fa fa-shekel',
  'fa fa-sheqel' => 'fa fa-sheqel',
  'fa fa-slideshare' => 'fa fa-slideshare',
  'fa fa-soccer-ball-o' => 'fa fa-soccer-ball-o',
  'fa fa-toggle-off' => 'fa fa-toggle-off',
  'fa fa-toggle-on' => 'fa fa-toggle-on',
  'fa fa-trash' => 'fa fa-trash',
  'fa fa-tty' => 'fa fa-tty',
  'fa fa-twitch' => 'fa fa-twitch',
  'fa fa-wifi' => 'fa fa-wifi',
  'fa fa-yelp' => 'fa fa-yelp',
  'fa fa-adjust' => 'fa fa-adjust',
  'fa fa-anchor' => 'fa fa-anchor',
  'fa fa-archive' => 'fa fa-archive',
  'fa fa-arrows' => 'fa fa-arrows',
  'fa fa-arrows-h' => 'fa fa-arrows-h',
  'fa fa-arrows-v' => 'fa fa-arrows-v',
  'fa fa-asterisk' => 'fa fa-asterisk',
  'fa fa-automobile' => 'fa fa-automobile',
  'fa fa-ban' => 'fa fa-ban',
  'fa fa-bank' => 'fa fa-bank',
  'fa fa-bar-chart' => 'fa fa-bar-chart',
  'fa fa-bar-chart-o' => 'fa fa-bar-chart-o',
  'fa fa-barcode' => 'fa fa-barcode',
  'fa fa-bars' => 'fa fa-bars',
  'fa fa-beer' => 'fa fa-beer',
  'fa fa-bell' => 'fa fa-bell',
  'fa fa-bell-o' => 'fa fa-bell-o',
  'fa fa-bolt' => 'fa fa-bolt',
  'fa fa-bomb' => 'fa fa-bomb',
  'fa fa-book' => 'fa fa-book',
  'fa fa-bookmark' => 'fa fa-bookmark',
  'fa fa-bookmark-o' => 'fa fa-bookmark-o',
  'fa fa-briefcase' => 'fa fa-briefcase',
  'fa fa-bug' => 'fa fa-bug',
  'fa fa-building' => 'fa fa-building',
  'fa fa-building-o' => 'fa fa-building-o',
  'fa fa-bullhorn' => 'fa fa-bullhorn',
  'fa fa-bullseye' => 'fa fa-bullseye',
  'fa fa-cab' => 'fa fa-cab',
  'fa fa-calendar' => 'fa fa-calendar',
  'fa fa-calendar-o' => 'fa fa-calendar-o',
  'fa fa-camera' => 'fa fa-camera',
  'fa fa-camera-retro' => 'fa fa-camera-retro',
  'fa fa-car' => 'fa fa-car',
  'fa fa-caret-square-o-down' => 'fa fa-caret-square-o-down',
  'fa fa-caret-square-o-left' => 'fa fa-caret-square-o-left',
  'fa fa-caret-square-o-right' => 'fa fa-caret-square-o-right',
  'fa fa-caret-square-o-up' => 'fa fa-caret-square-o-up',
  'fa fa-certificate' => 'fa fa-certificate',
  'fa fa-check' => 'fa fa-check',
  'fa fa-check-circle' => 'fa fa-check-circle',
  'fa fa-check-circle-o' => 'fa fa-check-circle-o',
  'fa fa-check-square' => 'fa fa-check-square',
  'fa fa-check-square-o' => 'fa fa-check-square-o',
  'fa fa-child' => 'fa fa-child',
  'fa fa-circle' => 'fa fa-circle',
  'fa fa-circle-o' => 'fa fa-circle-o',
  'fa fa-circle-o-notch' => 'fa fa-circle-o-notch',
  'fa fa-circle-thin' => 'fa fa-circle-thin',
  'fa fa-clock-o' => 'fa fa-clock-o',
  'fa fa-close' => 'fa fa-close',
  'fa fa-cloud' => 'fa fa-cloud',
  'fa fa-cloud-download' => 'fa fa-cloud-download',
  'fa fa-cloud-upload' => 'fa fa-cloud-upload',
  'fa fa-code' => 'fa fa-code',
  'fa fa-code-fork' => 'fa fa-code-fork',
  'fa fa-coffee' => 'fa fa-coffee',
  'fa fa-cog' => 'fa fa-cog',
  'fa fa-cogs' => 'fa fa-cogs',
  'fa fa-comment' => 'fa fa-comment',
  'fa fa-comment-o' => 'fa fa-comment-o',
  'fa fa-comments' => 'fa fa-comments',
  'fa fa-comments-o' => 'fa fa-comments-o',
  'fa fa-compass' => 'fa fa-compass',
  'fa fa-credit-card' => 'fa fa-credit-card',
  'fa fa-crop' => 'fa fa-crop',
  'fa fa-crosshairs' => 'fa fa-crosshairs',
  'fa fa-cube' => 'fa fa-cube',
  'fa fa-cubes' => 'fa fa-cubes',
  'fa fa-cutlery' => 'fa fa-cutlery',
  'fa fa-dashboard' => 'fa fa-dashboard',
  'fa fa-database' => 'fa fa-database',
  'fa fa-desktop' => 'fa fa-desktop',
  'fa fa-dot-circle-o' => 'fa fa-dot-circle-o',
  'fa fa-download' => 'fa fa-download',
  'fa fa-edit' => 'fa fa-edit',
  'fa fa-ellipsis-h' => 'fa fa-ellipsis-h',
  'fa fa-ellipsis-v' => 'fa fa-ellipsis-v',
  'fa fa-envelope' => 'fa fa-envelope',
  'fa fa-envelope-o' => 'fa fa-envelope-o',
  'fa fa-envelope-square' => 'fa fa-envelope-square',
  'fa fa-eraser' => 'fa fa-eraser',
  'fa fa-exchange' => 'fa fa-exchange',
  'fa fa-exclamation' => 'fa fa-exclamation',
  'fa fa-exclamation-circle' => 'fa fa-exclamation-circle',
  'fa fa-exclamation-triangle' => 'fa fa-exclamation-triangle',
  'fa fa-external-link' => 'fa fa-external-link',
  'fa fa-external-link-square' => 'fa fa-external-link-square',
  'fa fa-eye' => 'fa fa-eye',
  'fa fa-eye-slash' => 'fa fa-eye-slash',
  'fa fa-fax' => 'fa fa-fax',
  'fa fa-female' => 'fa fa-female',
  'fa fa-fighter-jet' => 'fa fa-fighter-jet',
  'fa fa-file-archive-o' => 'fa fa-file-archive-o',
  'fa fa-file-audio-o' => 'fa fa-file-audio-o',
  'fa fa-file-code-o' => 'fa fa-file-code-o',
  'fa fa-file-excel-o' => 'fa fa-file-excel-o',
  'fa fa-file-image-o' => 'fa fa-file-image-o',
  'fa fa-file-movie-o' => 'fa fa-file-movie-o',
  'fa fa-file-pdf-o' => 'fa fa-file-pdf-o',
  'fa fa-file-photo-o' => 'fa fa-file-photo-o',
  'fa fa-file-picture-o' => 'fa fa-file-picture-o',
  'fa fa-file-powerpoint-o' => 'fa fa-file-powerpoint-o',
  'fa fa-file-sound-o' => 'fa fa-file-sound-o',
  'fa fa-file-video-o' => 'fa fa-file-video-o',
  'fa fa-file-word-o' => 'fa fa-file-word-o',
  'fa fa-file-zip-o' => 'fa fa-file-zip-o',
  'fa fa-film' => 'fa fa-film',
  'fa fa-filter' => 'fa fa-filter',
  'fa fa-fire' => 'fa fa-fire',
  'fa fa-fire-extinguisher' => 'fa fa-fire-extinguisher',
  'fa fa-flag' => 'fa fa-flag',
  'fa fa-flag-checkered' => 'fa fa-flag-checkered',
  'fa fa-flag-o' => 'fa fa-flag-o',
  'fa fa-flash' => 'fa fa-flash',
  'fa fa-flask' => 'fa fa-flask',
  'fa fa-folder' => 'fa fa-folder',
  'fa fa-folder-o' => 'fa fa-folder-o',
  'fa fa-folder-open' => 'fa fa-folder-open',
  'fa fa-folder-open-o' => 'fa fa-folder-open-o',
  'fa fa-frown-o' => 'fa fa-frown-o',
  'fa fa-gamepad' => 'fa fa-gamepad',
  'fa fa-gavel' => 'fa fa-gavel',
  'fa fa-gear' => 'fa fa-gear',
  'fa fa-gears' => 'fa fa-gears',
  'fa fa-gift' => 'fa fa-gift',
  'fa fa-glass' => 'fa fa-glass',
  'fa fa-globe' => 'fa fa-globe',
  'fa fa-graduation-cap' => 'fa fa-graduation-cap',
  'fa fa-group' => 'fa fa-group',
  'fa fa-hdd-o' => 'fa fa-hdd-o',
  'fa fa-headphones' => 'fa fa-headphones',
  'fa fa-heart' => 'fa fa-heart',
  'fa fa-heart-o' => 'fa fa-heart-o',
  'fa fa-history' => 'fa fa-history',
  'fa fa-home' => 'fa fa-home',
  'fa fa-image' => 'fa fa-image',
  'fa fa-inbox' => 'fa fa-inbox',
  'fa fa-info' => 'fa fa-info',
  'fa fa-info-circle' => 'fa fa-info-circle',
  'fa fa-institution' => 'fa fa-institution',
  'fa fa-key' => 'fa fa-key',
  'fa fa-keyboard-o' => 'fa fa-keyboard-o',
  'fa fa-language' => 'fa fa-language',
  'fa fa-laptop' => 'fa fa-laptop',
  'fa fa-leaf' => 'fa fa-leaf',
  'fa fa-legal' => 'fa fa-legal',
  'fa fa-lemon-o' => 'fa fa-lemon-o',
  'fa fa-level-down' => 'fa fa-level-down',
  'fa fa-level-up' => 'fa fa-level-up',
  'fa fa-life-bouy' => 'fa fa-life-bouy',
  'fa fa-life-buoy' => 'fa fa-life-buoy',
  'fa fa-life-ring' => 'fa fa-life-ring',
  'fa fa-life-saver' => 'fa fa-life-saver',
  'fa fa-lightbulb-o' => 'fa fa-lightbulb-o',
  'fa fa-location-arrow' => 'fa fa-location-arrow',
  'fa fa-lock' => 'fa fa-lock',
  'fa fa-magic' => 'fa fa-magic',
  'fa fa-magnet' => 'fa fa-magnet',
  'fa fa-mail-forward' => 'fa fa-mail-forward',
  'fa fa-mail-reply' => 'fa fa-mail-reply',
  'fa fa-mail-reply-all' => 'fa fa-mail-reply-all',
  'fa fa-male' => 'fa fa-male',
  'fa fa-map-marker' => 'fa fa-map-marker',
  'fa fa-meh-o' => 'fa fa-meh-o',
  'fa fa-microphone' => 'fa fa-microphone',
  'fa fa-microphone-slash' => 'fa fa-microphone-slash',
  'fa fa-minus' => 'fa fa-minus',
  'fa fa-minus-circle' => 'fa fa-minus-circle',
  'fa fa-minus-square' => 'fa fa-minus-square',
  'fa fa-minus-square-o' => 'fa fa-minus-square-o',
  'fa fa-mobile' => 'fa fa-mobile',
  'fa fa-mobile-phone' => 'fa fa-mobile-phone',
  'fa fa-money' => 'fa fa-money',
  'fa fa-moon-o' => 'fa fa-moon-o',
  'fa fa-mortar-board' => 'fa fa-mortar-board',
  'fa fa-music' => 'fa fa-music',
  'fa fa-navicon' => 'fa fa-navicon',
  'fa fa-paper-plane' => 'fa fa-paper-plane',
  'fa fa-paper-plane-o' => 'fa fa-paper-plane-o',
  'fa fa-paw' => 'fa fa-paw',
  'fa fa-pencil' => 'fa fa-pencil',
  'fa fa-pencil-square' => 'fa fa-pencil-square',
  'fa fa-pencil-square-o' => 'fa fa-pencil-square-o',
  'fa fa-phone' => 'fa fa-phone',
  'fa fa-phone-square' => 'fa fa-phone-square',
  'fa fa-photo' => 'fa fa-photo',
  'fa fa-picture-o' => 'fa fa-picture-o',
  'fa fa-plane' => 'fa fa-plane',
  'fa fa-plus' => 'fa fa-plus',
  'fa fa-plus-circle' => 'fa fa-plus-circle',
  'fa fa-plus-square' => 'fa fa-plus-square',
  'fa fa-plus-square-o' => 'fa fa-plus-square-o',
  'fa fa-power-off' => 'fa fa-power-off',
  'fa fa-print' => 'fa fa-print',
  'fa fa-puzzle-piece' => 'fa fa-puzzle-piece',
  'fa fa-qrcode' => 'fa fa-qrcode',
  'fa fa-question' => 'fa fa-question',
  'fa fa-question-circle' => 'fa fa-question-circle',
  'fa fa-quote-left' => 'fa fa-quote-left',
  'fa fa-quote-right' => 'fa fa-quote-right',
  'fa fa-random' => 'fa fa-random',
  'fa fa-recycle' => 'fa fa-recycle',
  'fa fa-refresh' => 'fa fa-refresh',
  'fa fa-remove' => 'fa fa-remove',
  'fa fa-reorder' => 'fa fa-reorder',
  'fa fa-reply' => 'fa fa-reply',
  'fa fa-reply-all' => 'fa fa-reply-all',
  'fa fa-retweet' => 'fa fa-retweet',
  'fa fa-road' => 'fa fa-road',
  'fa fa-rocket' => 'fa fa-rocket',
  'fa fa-rss' => 'fa fa-rss',
  'fa fa-rss-square' => 'fa fa-rss-square',
  'fa fa-search' => 'fa fa-search',
  'fa fa-search-minus' => 'fa fa-search-minus',
  'fa fa-search-plus' => 'fa fa-search-plus',
  'fa fa-send' => 'fa fa-send',
  'fa fa-send-o' => 'fa fa-send-o',
  'fa fa-share' => 'fa fa-share',
  'fa fa-share-alt' => 'fa fa-share-alt',
  'fa fa-share-alt-square' => 'fa fa-share-alt-square',
  'fa fa-share-square' => 'fa fa-share-square',
  'fa fa-share-square-o' => 'fa fa-share-square-o',
  'fa fa-shield' => 'fa fa-shield',
  'fa fa-shopping-cart' => 'fa fa-shopping-cart',
  'fa fa-sign-in' => 'fa fa-sign-in',
  'fa fa-sign-out' => 'fa fa-sign-out',
  'fa fa-signal' => 'fa fa-signal',
  'fa fa-sitemap' => 'fa fa-sitemap',
  'fa fa-sliders' => 'fa fa-sliders',
  'fa fa-smile-o' => 'fa fa-smile-o',
  'fa fa-sort' => 'fa fa-sort',
  'fa fa-sort-alpha-asc' => 'fa fa-sort-alpha-asc',
  'fa fa-sort-alpha-desc' => 'fa fa-sort-alpha-desc',
  'fa fa-sort-amount-asc' => 'fa fa-sort-amount-asc',
  'fa fa-sort-amount-desc' => 'fa fa-sort-amount-desc',
  'fa fa-sort-asc' => 'fa fa-sort-asc',
  'fa fa-sort-desc' => 'fa fa-sort-desc',
  'fa fa-sort-down' => 'fa fa-sort-down',
  'fa fa-sort-numeric-asc' => 'fa fa-sort-numeric-asc',
  'fa fa-sort-numeric-desc' => 'fa fa-sort-numeric-desc',
  'fa fa-sort-up' => 'fa fa-sort-up',
  'fa fa-space-shuttle' => 'fa fa-space-shuttle',
  'fa fa-spinner' => 'fa fa-spinner',
  'fa fa-spoon' => 'fa fa-spoon',
  'fa fa-square' => 'fa fa-square',
  'fa fa-square-o' => 'fa fa-square-o',
  'fa fa-star' => 'fa fa-star',
  'fa fa-star-half' => 'fa fa-star-half',
  'fa fa-star-half-empty' => 'fa fa-star-half-empty',
  'fa fa-star-half-full' => 'fa fa-star-half-full',
  'fa fa-star-half-o' => 'fa fa-star-half-o',
  'fa fa-star-o' => 'fa fa-star-o',
  'fa fa-suitcase' => 'fa fa-suitcase',
  'fa fa-sun-o' => 'fa fa-sun-o',
  'fa fa-support' => 'fa fa-support',
  'fa fa-tablet' => 'fa fa-tablet',
  'fa fa-tachometer' => 'fa fa-tachometer',
  'fa fa-tag' => 'fa fa-tag',
  'fa fa-tags' => 'fa fa-tags',
  'fa fa-tasks' => 'fa fa-tasks',
  'fa fa-taxi' => 'fa fa-taxi',
  'fa fa-terminal' => 'fa fa-terminal',
  'fa fa-thumb-tack' => 'fa fa-thumb-tack',
  'fa fa-thumbs-down' => 'fa fa-thumbs-down',
  'fa fa-thumbs-o-down' => 'fa fa-thumbs-o-down',
  'fa fa-thumbs-o-up' => 'fa fa-thumbs-o-up',
  'fa fa-thumbs-up' => 'fa fa-thumbs-up',
  'fa fa-ticket' => 'fa fa-ticket',
  'fa fa-times' => 'fa fa-times',
  'fa fa-times-circle' => 'fa fa-times-circle',
  'fa fa-times-circle-o' => 'fa fa-times-circle-o',
  'fa fa-tint' => 'fa fa-tint',
  'fa fa-toggle-down' => 'fa fa-toggle-down',
  'fa fa-toggle-left' => 'fa fa-toggle-left',
  'fa fa-toggle-right' => 'fa fa-toggle-right',
  'fa fa-toggle-up' => 'fa fa-toggle-up',
  'fa fa-trash-o' => 'fa fa-trash-o',
  'fa fa-tree' => 'fa fa-tree',
  'fa fa-trophy' => 'fa fa-trophy',
  'fa fa-truck' => 'fa fa-truck',
  'fa fa-umbrella' => 'fa fa-umbrella',
  'fa fa-university' => 'fa fa-university',
  'fa fa-unlock' => 'fa fa-unlock',
  'fa fa-unlock-alt' => 'fa fa-unlock-alt',
  'fa fa-unsorted' => 'fa fa-unsorted',
  'fa fa-upload' => 'fa fa-upload',
  'fa fa-user' => 'fa fa-user',
  'fa fa-users' => 'fa fa-users',
  'fa fa-video-camera' => 'fa fa-video-camera',
  'fa fa-volume-down' => 'fa fa-volume-down',
  'fa fa-volume-off' => 'fa fa-volume-off',
  'fa fa-volume-up' => 'fa fa-volume-up',
  'fa fa-warning' => 'fa fa-warning',
  'fa fa-wheelchair' => 'fa fa-wheelchair',
  'fa fa-wrench' => 'fa fa-wrench',
  'fa fa-file' => 'fa fa-file',
  'fa fa-file-o' => 'fa fa-file-o',
  'fa fa-file-text' => 'fa fa-file-text',
  'fa fa-file-text-o' => 'fa fa-file-text-o',
  'fa fa-bitcoin' => 'fa fa-bitcoin',
  'fa fa-btc' => 'fa fa-btc',
  'fa fa-cny' => 'fa fa-cny',
  'fa fa-dollar' => 'fa fa-dollar',
  'fa fa-eur' => 'fa fa-eur',
  'fa fa-euro' => 'fa fa-euro',
  'fa fa-gbp' => 'fa fa-gbp',
  'fa fa-inr' => 'fa fa-inr',
  'fa fa-jpy' => 'fa fa-jpy',
  'fa fa-krw' => 'fa fa-krw',
  'fa fa-rmb' => 'fa fa-rmb',
  'fa fa-rouble' => 'fa fa-rouble',
  'fa fa-rub' => 'fa fa-rub',
  'fa fa-ruble' => 'fa fa-ruble',
  'fa fa-rupee' => 'fa fa-rupee',
  'fa fa-try' => 'fa fa-try',
  'fa fa-turkish-lira' => 'fa fa-turkish-lira',
  'fa fa-usd' => 'fa fa-usd',
  'fa fa-won' => 'fa fa-won',
  'fa fa-yen' => 'fa fa-yen',
  'fa fa-align-center' => ' fa fa-align-center',
  'fa fa-align-justify' => 'fa fa-align-justify',
  'fa fa-align-left' => 'fa fa-align-left',
  'fa fa-align-right' => 'fa fa-align-right',
  'fa fa-bold' => 'fa fa-bold',
  'fa fa-chain' => 'fa fa-chain',
  'fa fa-chain-broken' => 'fa fa-chain-broken',
  'fa fa-clipboard' => 'fa fa-clipboard',
  'fa fa-columns' => 'fa fa-columns',
  'fa fa-copy' => 'fa fa-copy',
  'fa fa-cut' => 'fa fa-cut',
  'fa fa-dedent' => 'fa fa-dedent',
  'fa fa-files-o' => 'fa fa-files-o',
  'fa fa-floppy-o' => 'fa fa-floppy-o',
  'fa fa-font' => 'fa fa-font',
  'fa fa-header' => 'fa fa-header',
  'fa fa-indent' => 'fa fa-indent',
  'fa fa-italic' => 'fa fa-italic',
  'fa fa-link' => 'fa fa-link',
  'fa fa-list' => 'fa fa-list',
  'fa fa-list-alt' => 'fa fa-list-alt',
  'fa fa-list-ol' => 'fa fa-list-ol',
  'fa fa-list-ul' => 'fa fa-list-ul',
  'fa fa-outdent' => 'fa fa-outdent',
  'fa fa-paperclip' => 'fa fa-paperclip',
  'fa fa-paragraph' => 'fa fa-paragraph',
  'fa fa-paste' => 'fa fa-paste',
  'fa fa-repeat' => 'fa fa-repeat',
  'fa fa-rotate-left' => 'fa fa-rotate-left',
  'fa fa-rotate-right' => 'fa fa-rotate-right',
  'fa fa-save' => 'fa fa-save',
  'fa fa-scissors' => 'fa fa-scissors',
  'fa fa-strikethrough' => 'fa fa-strikethrough',
  'fa fa-subscript' => 'fa fa-subscript',
  'fa fa-superscript' => 'fa fa-superscript',
  'fa fa-table' => 'fa fa-table',
  'fa fa-text-height' => 'fa fa-text-height',
  'fa fa-text-width' => 'fa fa-text-width',
  'fa fa-th' => 'fa fa-th',
  'fa fa-th-large' => 'fa fa-th-large',
  'fa fa-th-list' => 'fa fa-th-list',
  'fa fa-underline' => 'fa fa-underline',
  'fa fa-undo' => 'fa fa-undo',
  'fa fa-unlink' => 'fa fa-unlink',
  'fa fa-angle-double-down' => ' fa fa-angle-double-down',
  'fa fa-angle-double-left' => 'fa fa-angle-double-left',
  'fa fa-angle-double-right' => 'fa fa-angle-double-right',
  'fa fa-angle-double-up' => 'fa fa-angle-double-up',
  'fa fa-angle-down' => 'fa fa-angle-down',
  'fa fa-angle-left' => 'fa fa-angle-left',
  'fa fa-angle-right' => 'fa fa-angle-right',
  'fa fa-angle-up' => 'fa fa-angle-up',
  'fa fa-arrow-circle-down' => 'fa fa-arrow-circle-down',
  'fa fa-arrow-circle-left' => 'fa fa-arrow-circle-left',
  'fa fa-arrow-circle-o-down' => 'fa fa-arrow-circle-o-down',
  'fa fa-arrow-circle-o-left' => 'fa fa-arrow-circle-o-left',
  'fa fa-arrow-circle-o-right' => 'fa fa-arrow-circle-o-right',
  'fa fa-arrow-circle-o-up' => 'fa fa-arrow-circle-o-up',
  'fa fa-arrow-circle-right' => 'fa fa-arrow-circle-right',
  'fa fa-arrow-circle-up' => 'fa fa-arrow-circle-up',
  'fa fa-arrow-down' => 'fa fa-arrow-down',
  'fa fa-arrow-left' => 'fa fa-arrow-left',
  'fa fa-arrow-right' => 'fa fa-arrow-right',
  'fa fa-arrow-up' => 'fa fa-arrow-up',
  'fa fa-arrows-alt' => 'fa fa-arrows-alt',
  'fa fa-caret-down' => 'fa fa-caret-down',
  'fa fa-caret-left' => 'fa fa-caret-left',
  'fa fa-caret-right' => 'fa fa-caret-right',
  'fa fa-caret-up' => 'fa fa-caret-up',
  'fa fa-chevron-circle-down' => 'fa fa-chevron-circle-down',
  'fa fa-chevron-circle-left' => 'fa fa-chevron-circle-left',
  'fa fa-chevron-circle-right' => 'fa fa-chevron-circle-right',
  'fa fa-chevron-circle-up' => 'fa fa-chevron-circle-up',
  'fa fa-chevron-down' => 'fa fa-chevron-down',
  'fa fa-chevron-left' => 'fa fa-chevron-left',
  'fa fa-chevron-right' => 'fa fa-chevron-right',
  'fa fa-chevron-up' => 'fa fa-chevron-up',
  'fa fa-hand-o-down' => 'fa fa-hand-o-down',
  'fa fa-hand-o-left' => 'fa fa-hand-o-left',
  'fa fa-hand-o-right' => 'fa fa-hand-o-right',
  'fa fa-hand-o-up' => 'fa fa-hand-o-up',
  'fa fa-long-arrow-down' => 'fa fa-long-arrow-down',
  'fa fa-long-arrow-left' => 'fa fa-long-arrow-left',
  'fa fa-long-arrow-right' => 'fa fa-long-arrow-right',
  'fa fa-long-arrow-up' => 'fa fa-long-arrow-up',
  'fa fa-backward' => 'fa fa-backward',
  'fa fa-compress' => 'fa fa-compress',
  'fa fa-eject' => 'fa fa-eject',
  'fa fa-expand' => 'fa fa-expand',
  'fa fa-fast-backward' => 'fa fa-fast-backward',
  'fa fa-fast-forward' => 'fa fa-fast-forward',
  'fa fa-forward' => 'fa fa-forward',
  'fa fa-pause' => 'fa fa-pause',
  'fa fa-play' => 'fa fa-play',
  'fa fa-play-circle' => 'fa fa-play-circle',
  'fa fa-play-circle-o' => 'fa fa-play-circle-o',
  'fa fa-step-backward' => 'fa fa-step-backward',
  'fa fa-step-forward' => 'fa fa-step-forward',
  'fa fa-stop' => 'fa fa-stop',
  'fa fa-youtube-play' => 'fa fa-youtube-play'
);

#Animations list
$animations_list = array(
  'bounce' => 'bounce',
  'flash' => 'flash',
  'pulse' => 'pulse',
  'rubberBand' => 'rubberBand',
  'shake' => 'shake',
  'swing' => 'swing',
  'tada' => 'tada',
  'wobble' => 'wobble',
  'bounceIn' => 'bounceIn',
  'bounceInDown' => 'bounceInDown',
  'bounceInLeft' => 'bounceInLeft',
  'bounceInRight' => 'bounceInRight',
  'bounceInUp' => 'bounceInUp',
  'bounceOut' => 'bounceOut',
  'bounceOutDown' => 'bounceOutDown',
  'bounceOutLeft' => 'bounceOutLeft',
  'bounceOutRight' => 'bounceOutRight',
  'bounceOutUp' => 'bounceOutUp',
  'fadeIn' => 'fadeIn',
  'fadeInDown' => 'fadeInDown',
  'fadeInDownBig' => 'fadeInDownBig',
  'fadeInLeft' => 'fadeInLeft',
  'fadeInLeftBig' => 'fadeInLeftBig',
  'fadeInRight' => 'fadeInRight',
  'fadeInRightBig' => 'fadeInRightBig',
  'fadeInUp' => 'fadeInUp',
  'fadeInUpBig' => 'fadeInUpBig',
  'fadeOut' => 'fadeOut',
  'fadeOutDown' => 'fadeOutDown',
  'fadeOutDownBig' => 'fadeOutDownBig',
  'fadeOutLeft' => 'fadeOutLeft',
  'fadeOutLeftBig' => 'fadeOutLeftBig',
  'fadeOutRight' => 'fadeOutRight',
  'fadeOutRightBi' => 'fadeOutRightBig',
  'fadeOutUp' => 'fadeOutUp',
  'fadeOutUpBig' => 'fadeOutUpBig',
  'flip' => 'flip',
  'flipInX' => 'flipInX',
  'flipInY' => 'flipInY',
  'flipOutX' => 'flipOutX',
  'flipOutY' => 'flipOutY',
  'lightSpeedIn' => 'lightSpeedIn',
  'lightSpeedOut' => 'lightSpeedOut',
  'rotateIn' => 'rotateIn',
  'rotateInDownLe' => 'rotateInDownLeft',
  'rotateInDownRi' => 'rotateInDownRight',
  'rotateInUpLeft' => 'rotateInUpLeft',
  'rotateInUpRigh' => 'rotateInUpRight',
  'rotateOut' => 'rotateOut',
  'rotateOutDownL' => 'rotateOutDownLeft',
  'rotateOutDownR' => 'rotateOutDownRight',
  'rotateOutUpLef' => 'rotateOutUpLeft',
  'rotateOutUpRig' => 'rotateOutUpRight',
  'hinge' => 'hinge',
  'rollIn' => 'rollIn',
  'rollOut' => 'rollOut',
  'zoomIn' => 'zoomIn',
  'zoomInDown' => 'zoomInDown',
  'zoomInLeft' => 'zoomInLeft',
  'zoomInRight' => 'zoomInRight',
  'zoomInUp' => 'zoomInUp',
  'zoomOut' => 'zoomOut',
  'zoomOutDown' => 'zoomOutDown',
  'zoomOutLeft' => 'zoomOutLeft',
  'zoomOutRight' => 'zoomOutRight',
  'zoomOutUp' => 'zoomOutUp'
);



  #1. Recent Tweets shortcode
  vc_map( array(
     "name" => __("TREND - Tweets", 'trend'),
     "base" => "tweets",
     "icon" => "modeltheme_shortcode",
     "category" => __('TREND', 'trend'),
     "params" => array(
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Section heading", 'trend'),
           "param_name" => "title",
           "value" => __("Tweets", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Number of tweets to show", 'trend'),
           "param_name" => "no",
           "value" => __("5", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Animation", 'trend'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $animations_list
        )
     )
  ));



  #2. Google map shortcode
  vc_map( array(
     "name" => __("TREND - Google Map", 'trend'),
     "base" => "map",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Latitude", 'trend'),
           "param_name" => "latitude",
           "value" => __("51.5255069", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Longitude", 'trend'),
           "param_name" => "longitude",
           "value" => __("-0.0836207", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Animation", 'trend'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $animations_list
        )
     )
    )
  );



  #3. Contact Form shortcode
  vc_map( array(
     "name" => __("TREND - Contact form", 'trend'),
     "base" => "contact_form",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
        array(
          "type" => "dropdown",
          "heading" => __("Animation", 'trend'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $animations_list
        )
     )
    )
  );

  #21. Testimonials Slider V2
  vc_map( array(
     "name" => __("TREND - Testimonials Slider V2", 'trend'),
     "base" => "testimonials-style2",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Number of testimonials", 'trend' ),
            "param_name" => "content",
            "value" => __( "5", "trend" ),
            "description" => __( "Enter number of testimonials to show.", 'trend' )
         ),
        array(
          "type" => "dropdown",
          "heading" => __("Animation", 'trend'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $animations_list
        )
     )
  ));


  #5. Testimonials shortcode
  vc_map( array(
     "name" => __("TREND - Testimonials - V1", 'trend'),
     "base" => "testimonials",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
        array(
          "type" => "dropdown",
          "heading" => __("Animation", 'trend'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $animations_list
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Animation", 'trend'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $animations_list
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Visible Testimonials per slide", 'trend'),
          "param_name" => "visible_items",
          "value" => array(
            __('1', 'trend')   => '1',
            __('2', 'trend')   => '2',
            __('3', 'trend')   => '3',
            ),
          "std" => '2',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend')
        )
      )
  ));



  #6. Services style 1 shortcode
  vc_map( array(
     "name" => __("TREND - Service icon with text", 'trend'),
     "base" => "service",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
        array(
          "type" => "dropdown",
          "heading" => __("Icon class(FontAwesome)", 'trend'),
          "param_name" => "icon",
          "std" => 'fa fa-youtube-play',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $fa_list
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Title", 'trend'),
           "param_name" => "title",
           "value" => __("Graphic Design", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textarea",
           "holder" => "div",
           "class" => "",
           "heading" => __("Description", 'trend'),
           "param_name" => "description",
           "value" => __("Working with us you will work with professional certified designers and engineers having a vast experience.", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Animation", 'trend'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $animations_list
        )
     )
  ));

  vc_map( array(
     "name" => __("TREND - Shop feature", 'trend'),
     "base" => "shop-feature",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
        array(
          "type" => "dropdown",
          "heading" => __("Icon class(FontAwesome)", 'trend'),
          "param_name" => "icon",
          "std" => 'fa fa-youtube-play',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $fa_list
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Title", 'trend'),
           "param_name" => "heading",
           "value" => __("HOME DELIVERY", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textarea",
           "holder" => "div",
           "class" => "",
           "heading" => __("Description", 'trend'),
           "param_name" => "subheading",
           "value" => __("We deliver right to your doorstep.", 'trend'),
           "description" => __("", 'trend')
        )
     )
  ));



  #8. Subscribe form - simple layout shortcode
  vc_map( array(
     "name" => __("TREND - Mailchimp subscribe form - simple layout", 'trend'),
     "base" => "subscribe_form",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Text field placeholder", 'trend'),
           "param_name" => "placeholder",
           "value" => __("Enter email address", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Submit button text", 'trend'),
           "param_name" => "button_text",
           "value" => __("Submit", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Animation", 'trend'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $animations_list
        )
     )
  ));


  #8. Subscribe form - complex layout shortcode
  vc_map( array(
     "name" => __("TREND - Mailchimp subscribe form - complex layout", 'trend'),
     "base" => "subscribe_form2",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Newsletter text", 'trend'),
           "param_name" => "newsletter_title",
           "value" => __("SUBSCRIBE TO OUR NEWSLETTER", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Text field placeholder", 'trend'),
           "param_name" => "placeholder",
           "value" => __("Enter email address", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Submit button text", 'trend'),
           "param_name" => "button_text",
           "value" => __("Submit", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Right side info title", 'trend'),
           "param_name" => "infotitle",
           "value" => __("LATEST NEWS", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Right side info sub-title", 'trend'),
           "param_name" => "infosubtitle",
           "value" => __("in your inbox", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Animation", 'trend'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $animations_list
        )
     )
  ));



  #9.Posts calendar shortcode
  vc_map( array(
     "name" => __("TREND - Posts calendar", 'trend'),
     "base" => "posts_calendar",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Section title", 'trend'),
           "param_name" => "title",
           "value" => __("Posts calendar", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Number of posts to show", 'trend'),
           "param_name" => "number",
           "value" => __("3", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Animation", 'trend'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $animations_list
        )
     )
  ));



  #10. Jumbotron shortcode
  vc_map( array(
     "name" => __("TREND - Jumbotron", 'trend'),
     "base" => "jumbotron",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Heading", 'trend'),
           "param_name" => "heading",
           "value" => __("Hello, world!", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textarea",
           "holder" => "div",
           "class" => "",
           "heading" => __("Sub heading", 'trend'),
           "param_name" => "sub_heading",
           "value" => __("This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Button text", 'trend'),
           "param_name" => "button_text",
           "value" => __("Learn more", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Button url", 'trend'),
           "param_name" => "button_url",
           "value" => __("#", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Animation", 'trend'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $animations_list
        )
     )
  ));



  #11. Alert shortcode
  vc_map( array(
     "name" => __("TREND - Alert", 'trend'),
     "base" => "alert",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
        array(
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => __("Alert style", 'trend'),
           "param_name" => "alert_style",
           "std" => 'success',
           "description" => __("", 'trend'),
           "value" => array(
            'Success'     => 'success',
            'Info'        => 'info',
            'Warning'     => 'warning',
            'Danger'      => 'danger'
           )
        ),
        array(
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => __("Is dismissible?", 'trend'),
           "param_name" => "alert_dismissible",
           "std" => 'yes',
           "description" => __("", 'trend'),
           "value" => array(
            'Yes'    => 'yes',
            'No'     => 'no'
            )
        ),
        array(
           "type" => "textarea",
           "holder" => "div",
           "class" => "",
           "heading" => __("Alert text", 'trend'),
           "param_name" => "alert_text",
           "value" => __("<strong>Well done!</strong> You successfully read this important alert message.", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Animation", 'trend'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $animations_list
        )
     )
  ));



  #12. Progress bars shortcode
  vc_map( array(
     "name" => __("TREND - Progress bar", 'trend'),
     "base" => "progress_bar",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
        array(
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => __("Progress bar scope", 'trend'),
           "param_name" => "bar_scope",
           "std" => 'success',
           "description" => __("", 'trend'),
           "value" => array(
            'Success'     => 'success',
            'Info'        => 'info',
            'Warning'     => 'warning',
            'Danger'      => 'danger'
           )
        ),
        array(
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => __("Progress bar style", 'trend'),
           "param_name" => "bar_style",
           "std" => 'simple',
           "description" => __("", 'trend'),
           "value" => array(
            'Simple'     => 'simple',
            'Striped'    => 'progress-bar-striped'
           )
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Progress bar value (1-100)", 'trend'),
           "param_name" => "bar_value",
           "value" => __("40", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textarea",
           "holder" => "div",
           "class" => "",
           "heading" => __("Progress bar label", 'trend'),
           "param_name" => "bar_label",
           "value" => __("40% Complete", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Animation", 'trend'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $animations_list
        )

     )
  ));



  #13. Panels shortcode
  vc_map( array(
     "name" => __("TREND - Panel", 'trend'),
     "base" => "panel",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
          array(
            "type"         => "dropdown",
            "holder"       => "div",
            "class"        => "",
            "param_name"   => "panel_style",
            "std"          => 'success',
            "heading"      => __("Panel style", 'trend'),
            "description"  => __("", 'trend'),
            "value"        => array(
              'Success' => 'success',
              'Info'    => 'info',
              'Warning' => 'warning',
              'Danger'  => 'danger'
          )
        ),
        array(
           "type"         => "textfield",
           "holder"       => "div",
           "class"        => "",
           "param_name"   => "panel_title",
           "heading"      => __("Panel title", 'trend'),
           "value"        => __("Panel title", 'trend'),
           "description"  => __("", 'trend')
        ),
        array(
           "type"         => "textarea",
           "holder"       => "div",
           "class"        => "",
           "param_name"   => "panel_content",
           "heading"      => __("Panel content", 'trend'),
           "value"        => __("Panel content", 'trend'),
           "description"  => __("", 'trend')
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Animation", 'trend'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $animations_list
        )
     )
  ));



  #14.Responsive YouTube Video shortcode
  vc_map( array(
     "name" => __("TREND - Responsive YouTube Video", 'trend'),
     "base" => "responsive_video",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
        array(
           "type"        => "textarea",
           "holder"      => "div",
           "class"       => "",
           "param_name"  => "video_id",
           "heading"     => __("YouTube Video ID", 'trend'),
           "value"       => __("1UCFNOPJIJU", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Animation", 'trend'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $animations_list
        )
     )
  ));



  #15. Featured post shortcode
  vc_map( array(
     "name" => __("TREND - Featured post", 'trend'),
     "base" => "featured_post",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
        array(
          "type" => "dropdown",
          "heading" => __("Section heading icon", 'trend'),
          "param_name" => "icon",
          "std" => 'fa fa-play-circle',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $fa_list
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Section title", 'trend'),
           "param_name" => "title",
           "value" => __("Featured blog post", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Please type a post ID", 'trend'),
           "param_name" => "postid",
           "value" => __("138", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Animation", 'trend'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $animations_list
        )
     )
  ));



  #16. Service style2 shortcode
  vc_map( array(
     "name" => __("TREND - Service style2", 'trend'),
     "base" => "service_style2",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
        array(
          "type" => "dropdown",
          "heading" => __("Icon class(FontAwesome)", 'trend'),
          "param_name" => "icon",
          "std" => 'fa fa-space-shuttle',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $fa_list
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Title", 'trend'),
           "param_name" => "title",
           "value" => __("Graphic Design", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textarea",
           "holder" => "div",
           "class" => "",
           "heading" => __("Description", 'trend'),
           "param_name" => "description",
           "value" => __("Working with us you will work with professional certified designers and engineers having a vast experience.", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Animation", 'trend'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $animations_list
        )
     )
  ));



  #17. Skill counter shortcode
  vc_map( array(
     "name" => __("TREND - Skill counter", 'trend'),
     "base" => "skill",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
        array(
          "type" => "dropdown",
          "heading" => __("Icon class(FontAwesome)", 'trend'),
          "param_name" => "icon",
          "std" => 'fa fa-lightbulb-o',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $fa_list
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Title", 'trend'),
           "param_name" => "title",
           "value" => __("COMPLETED PROJECTS", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Skill value", 'trend'),
           "param_name" => "skillvalue",
           "value" => __("3200", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Animation", 'trend'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $animations_list
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Bordered", 'trend'),
          "param_name" => "has_border",
          "std" => 'unbordered',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => array(
              'Bordered'  => 'bordered',
              'Without border' => 'unbordered',
              )
        ),
     )
  ));



  #18. Pricing table shortcode
  vc_map( array(
     "name" => __("TREND - Pricing table", 'trend'),
     "base" => "pricing-table",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Package name", 'trend'),
           "param_name" => "package_name",
           "value" => __("BASIC", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Package price", 'trend'),
           "param_name" => "package_price",
           "value" => __("199", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Package currency", 'trend'),
           "param_name" => "package_currency",
           "value" => __("$", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Package basis", 'trend'),
           "param_name" => "package_basis",
           "value" => __("/ month", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Package's 1st feature", 'trend'),
           "param_name" => "package_feature1",
           "value" => __("05 Email Account", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Package's 2nd feature", 'trend'),
           "param_name" => "package_feature2",
           "value" => __("01 Website Layout", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Package's 3rd feature", 'trend'),
           "param_name" => "package_feature3",
           "value" => __("03 Photo Stock Banner", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Package's 4th feature", 'trend'),
           "param_name" => "package_feature4",
           "value" => __("01 Javascript Slider", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Package's 5th feature", 'trend'),
           "param_name" => "package_feature5",
           "value" => __("01 Hosting", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Package's 6th feature", 'trend'),
           "param_name" => "package_feature6",
           "value" => __("01 Domain Name Server", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Package button url", 'trend'),
           "param_name" => "button_url",
           "value" => __("#", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Package button text", 'trend'),
           "param_name" => "button_text",
           "value" => __("Purchase", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Animation", 'trend'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $animations_list
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Recommended?", 'trend'),
          "param_name" => "recommended",
          "value" => array(
            __('Simple', 'trend')      => 'simple',
            __('Recommended', 'trend') => 'recommended',
            ),
          "std" => 'simple',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend')
        )
     )
  ));



  #19. Heading with border
  vc_map( array(
     "name" => __("TREND - Heading with Border", 'trend'),
     "base" => "heading-border",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
        array(
           "type" => "dropdown",
          "heading" => __("Alignment", 'trend'),
          "param_name" => "align",
          "std" => 'left',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => array(
              'left' => 'left',
              'right' => 'right',
              )
        ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Heading", 'trend' ),
            "param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
            "value" => __( "OUR<br>WORK", "trend" ),
            "description" => __( "Enter your heading.", 'trend' )
         ),
        array(
          "type" => "dropdown",
          "heading" => __("Animation", 'trend'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $animations_list
        )
     )
  ));



  #20. Clients slider
  vc_map( array(
     "name" => __("TREND - Clients Slider", 'trend'),
     "base" => "clients",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Number of posts", 'trend' ),
            "param_name" => "content",
            "value" => __( "7", "trend" ),
            "description" => __( "Enter number of clients to show.", 'trend' )
         ),
        array(
          "type" => "dropdown",
          "heading" => __("Animation", 'trend'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $animations_list
        )
     )
  ));



  #21. Testimonials Slider V2
  vc_map( array(
     "name" => __("TREND - Testimonials Slider V2", 'trend'),
     "base" => "testimonials-style2",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Number of testimonials", 'trend' ),
            "param_name" => "content",
            "value" => __( "5", "trend" ),
            "description" => __( "Enter number of testimonials to show.", 'trend' )
         ),
        array(
          "type" => "dropdown",
          "heading" => __("Animation", 'trend'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $animations_list
        )
     )
  ));



  #22. Social icons
  vc_map( array(
     "name" => __("TREND - Social icons", 'trend'),
     "base" => "social_icons",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Facebook URL", 'trend' ),
            "param_name" => "facebook",
            "value" => __( "#", "trend" ),
            "description" => __( "Enter your facebook link.", 'trend' )
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Twitter URL", 'trend' ),
            "param_name" => "twitter",
            "value" => __( "#", "trend" ),
            "description" => __( "Enter your twitter link.", 'trend' )
         ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Pinterest URL", 'trend' ),
            "param_name" => "pinterest",
            "value" => __( "#", "trend" ),
            "description" => __( "Enter your pinterest link.", 'trend' )
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Google Plus URL", 'trend' ),
            "param_name" => "googleplus",
            "value" => __( "#", "trend" ),
            "description" => __( "Enter your Google+ link.", 'trend' )
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Skype Username", 'trend' ),
            "param_name" => "skype",
            "value" => __( "#", "trend" ),
            "description" => __( "Enter your Skype Username.", 'trend' )
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Instagram URL", 'trend' ),
            "param_name" => "instagram",
            "value" => __( "#", "trend" ),
            "description" => __( "Enter your instagram link.", 'trend' )
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "YouTube URL", 'trend' ),
            "param_name" => "youtube",
            "value" => __( "#", "trend" ),
            "description" => __( "Enter your YouTube link.", 'trend' )
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "LinkedIn URL", 'trend' ),
            "param_name" => "linkedin",
            "value" => __( "#", "trend" ),
            "description" => __( "Enter your linkedin link.", 'trend' )
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Dribbble URL", 'trend' ),
            "param_name" => "dribbble",
            "value" => __( "#", "trend" ),
            "description" => __( "Enter your dribbble link.", 'trend' )
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Deviantart URL", 'trend' ),
            "param_name" => "deviantart",
            "value" => __( "#", "trend" ),
            "description" => __( "Enter your deviantart link.", 'trend' )
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Digg URL", 'trend' ),
            "param_name" => "digg",
            "value" => __( "#", "trend" ),
            "description" => __( "Enter your digg link.", 'trend' )
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Flickr URL", 'trend' ),
            "param_name" => "flickr",
            "value" => __( "#", "trend" ),
            "description" => __( "Enter your flickr link.", 'trend' )
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Stumbleupon URL", 'trend' ),
            "param_name" => "stumbleupon",
            "value" => __( "#", "trend" ),
            "description" => __( "Enter your stumbleupon link.", 'trend' )
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Tumblr URL", 'trend' ),
            "param_name" => "tumblr",
            "value" => __( "#", "trend" ),
            "description" => __( "Enter your tumblr link.", 'trend' )
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Vimeo URL", 'trend' ),
            "param_name" => "vimeo",
            "value" => __( "#", "trend" ),
            "description" => __( "Enter your vimeo link.", 'trend' )
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Animation", 'trend'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $animations_list
        )
     )
  ));



  #23. List group
  vc_map( array(
     "name" => __("TREND - List group", 'trend'),
     "base" => "list_group",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "List group item heading", 'trend' ),
            "param_name" => "heading",
            "value" => __( "List group item heading", "trend" ),
            "description" => __( "", 'trend' )
         ),
         array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => __( "List group item description", 'trend' ),
            "param_name" => "description",
            "value" => __( "Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.", "trend" ),
            "description" => __( "", 'trend' )
         ),
        array(
          "type" => "dropdown",
          "heading" => __("Status", 'trend'),
          "param_name" => "active",
          "value" => array(
            __('Active', 'trend')   => 'active',
            __('Normal', 'trend')   => 'normal',
            ),
          "std" => 'normal',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend')
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Animation", 'trend'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $animations_list
        )
     )
  ));



  #BUTTONS
  vc_map( array(
     "name" => __("TREND - Button", 'trend'),
     "base" => "trend_btn",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Button text", 'trend' ),
            "param_name" => "btn_text",
            "value" => __( "Shop now", "trend" ),
            "description" => __( "", 'trend' )
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Button url", 'trend' ),
            "param_name" => "btn_url",
            "value" => __( "#", "trend" ),
            "description" => __( "", 'trend' )
         ),
        array(
          "type" => "dropdown",
          "heading" => __("Button size", 'trend'),
          "param_name" => "btn_size",
          "value" => array(
            __('Small', 'trend')   => 'btn btn-sm',
            __('Medium', 'trend')   => 'btn btn-medium',
            __('Large', 'trend')   => 'btn btn-lg'
            ),
          "std" => 'normal',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend')
        ),
        array(
          "type" => "dropdown",
          "heading" => __("Alignment", 'trend'),
          "param_name" => "align",
          "value" => array(
            __('Left', 'trend')   => 'text-left',
            __('Center', 'trend')   => 'text-center',
            __('Right', 'trend')   => 'text-right'
            ),
          "std" => 'normal',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend')
        )
     )
  ));



  #24. Thumbnails custom content
  vc_map( array(
     "name" => __("TREND - Thumbnails custom content", 'trend'),
     "base" => "thumbnails_custom_content",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
         array(
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Image source url", 'trend' ),
            "param_name" => "image",
            "value" => __( "#", "trend" ),
            "description" => __( "", 'trend' )
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Heading", 'trend' ),
            "param_name" => "heading",
            "value" => __( "Thumbnail label", "trend" ),
            "description" => __( "", 'trend' )
         ),
         array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Description", 'trend' ),
            "param_name" => "description",
            "value" => __( "Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.", "trend" ),
            "description" => __( "", 'trend' )
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Button URL", 'trend' ),
            "param_name" => "button_url",
            "value" => __( "#", "trend" ),
            "description" => __( "", 'trend' )
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Button text", 'trend' ),
            "param_name" => "button_text",
            "value" => __( "Button", "trend" ),
            "description" => __( "", 'trend' )
         ),
        array(
          "type" => "dropdown",
          "heading" => __("Animation", 'trend'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend'),
          "value" => $animations_list
        )
     )
  ));



  #25. Heading with bottom border
  vc_map( array(
     "name" => __("TREND - Heading with bottom border", 'trend'),
     "base" => "heading_border_bottom",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Heading", 'trend' ),
            "param_name" => "heading",
            "value" => __( "Our Work", "trend" ),
            "description" => __( "", 'trend' )
         ),
        array(
          "type" => "dropdown",
          "heading" => __("Heading align(left/right)", 'trend'),
          "param_name" => "text_align",
          "value" => array(
            __('Left', 'trend')   => 'text-left',
            __('Right', 'trend')   => 'text-right',
            ),
          "std" => 'text-left',
          "holder" => "div",
          "class" => "",
          "description" => __("", 'trend')
        ),
     )
  ));



 #26. Call to Action
  vc_map( array(
     "name" => __("TREND - Call to Action", 'trend'),
     "base" => "trend-call-to-action",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Heading", 'trend' ),
            "param_name" => "heading",
            "value" => __( "TREND Is The Ultimate WordPress Multi-Purpose WordPress Theme!", "trend" ),
            "description" => __( "", 'trend' )
         ),
        array(
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => __("Heading type", 'trend'),
           "param_name" => "heading_type",
           "std" => 'h2',
           "description" => __("", 'trend'),
           "value" => array(
            'Heading H1'     => 'h1',
            'Heading H2'     => 'h2',
            'Heading H3'     => 'h3',
            'Heading H4'     => 'h4',
            'Heading H5'     => 'h5',
            'Heading H6'     => 'h6'
           )
        ),
         array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Subheading", 'trend' ),
            "param_name" => "subheading",
            "value" => __( "Loaded with awesome features like Visual Composer, premium sliders, unlimited colors, advanced theme options & more!", "trend" ),
            "description" => __( "", 'trend' )
         ),
        array(
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => __("Text align", 'trend'),
           "param_name" => "align",
           "std" => 'text-left',
           "description" => __("Text align of Title and subtitle", 'trend'),
           "value" => array(
            'Align left'     => 'text-left',
            'Align center'        => 'text-center',
            'Align right'     => 'text-right'
           )
        ),
     )
  ));



  #27. Section Title&Subtitle
  vc_map( array(
     "name" => __("TREND - Section Title&Subtitle", 'trend'),
     "base" => "heading_title_subtitle",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Section title", 'trend' ),
            "param_name" => "title",
            "value" => __( "OUR <span>SERVICES</span>", "trend" ),
            "description" => __( "", 'trend' )
         ),
         array(
            "type" => "textarea",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Section subtitle", 'trend' ),
            "param_name" => "subtitle",
            "value" => __( "We have a lot of opportunities for you. Come check them out!", "trend" ),
            "description" => __( "", 'trend' )
         )
     )
  ));



  #28. Blog Posts
  vc_map( array(
     "name" => __("TREND - Blog Posts", 'trend'),
     "base" => "trend-blog-posts",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Number", 'trend' ),
            "param_name" => "number",
            "value" => __( "3", "trend" ),
            "description" => __( "", 'trend' )
         ),
        array(
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => __("Columns", 'trend'),
           "param_name" => "columns",
           "std" => 'vc_col-md-4',
           "description" => __("", 'trend'),
           "value" => array(
            '2 columns'     => 'vc_col-md-6',
            '3 columns'     => 'vc_col-md-4',
            '4 columns'     => 'vc_col-md-3'
           )
        ),
     )
  ));



  #29. Masonry banners
  vc_map( array(
     "name" => __("TREND - Masonry Banners", 'trend'),
     "base" => "shop-masonry-banners",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
        array(
           "type" => "attach_image",
           "holder" => "div",
           "class" => "",
           "heading" => __("#1 Banner Image", 'trend'),
           "param_name" => "banner_1_img",
           "value" => __("#", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("#1 Banner Title", 'trend'),
           "param_name" => "banner_1_title",
           "value" => __("Sofas", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("#1 Banner Link", 'trend'),
           "param_name" => "banner_1_url",
           "value" => __("#", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "attach_image",
           "holder" => "div",
           "class" => "",
           "heading" => __("#2 Banner Image", 'trend'),
           "param_name" => "banner_2_img",
           "value" => __("#", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("#2 Banner Title", 'trend'),
           "param_name" => "banner_2_title",
           "value" => __("Beds", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("#2 Banner Link", 'trend'),
           "param_name" => "banner_2_url",
           "value" => __("#", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "attach_image",
           "holder" => "div",
           "class" => "",
           "heading" => __("#3 Banner Image", 'trend'),
           "param_name" => "banner_3_img",
           "value" => __("#", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("#3 Banner Title", 'trend'),
           "param_name" => "banner_3_title",
           "value" => __("Chairs", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("#3 Banner Link", 'trend'),
           "param_name" => "banner_3_url",
           "value" => __("#", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "attach_image",
           "holder" => "div",
           "class" => "",
           "heading" => __("#4 Banner Image", 'trend'),
           "param_name" => "banner_4_img",
           "value" => __("#", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("#4 Banner Title", 'trend'),
           "param_name" => "banner_4_title",
           "value" => __("Chairs", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("#4 Banner Link", 'trend'),
           "param_name" => "banner_4_url",
           "value" => __("#", 'trend'),
           "description" => __("", 'trend')
        )
     )
  ));  



  #30. Sale banner
  vc_map( array(
     "name" => __("TREND - SALE BANNER", 'trend'),
     "base" => "sale-banner",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
        array(
           "type" => "attach_image",
           "holder" => "div",
           "class" => "",
           "heading" => __("Banner Image", 'trend'),
           "param_name" => "banner_img",
           "value" => __("#", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Banner button text", 'trend'),
           "param_name" => "banner_button_text",
           "value" => __("Read more", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Banner button url", 'trend'),
           "param_name" => "banner_button_url",
           "value" => __("#", 'trend'),
           "description" => __("", 'trend')
        )
     )
  ));  



  #31. Products by Category
  vc_map( array(
     "name" => __("TREND - Products by Category", 'trend'),
     "base" => "shop-categories-with-thumbnails",
     "category" => __('TREND', 'trend'),
     "icon" => "modeltheme_shortcode",
     "params" => array(
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Number of categories to show", 'trend'),
           "param_name" => "number",
           "value" => __("10", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => __("Number of products to show for each category", 'trend'),
           "param_name" => "number_of_products_by_category",
           "value" => __("4", 'trend'),
           "description" => __("", 'trend')
        ),
        array(
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => __("Show categories without products?", 'trend'),
           "param_name" => "hide_empty",
           "std" => 'true',
           "description" => __("", 'trend'),
           "value" => array(
            'Yes'     => 'true',
            'No'        => 'false'
           ),
        ),
        array(
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => __("Products per column", 'trend'),
           "param_name" => "number_of_columns",
           "value" => __("4", 'trend'),
           "description" => __("", 'trend'),
           "std" => '4',
           "value" => array(
            '2'     => '2',
            '3'        => '3',
            '4'        => '4'
           ),
        )
     )
  ));
}
?>