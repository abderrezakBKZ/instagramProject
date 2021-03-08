window._ = require('lodash');

/**
 * we'll load jquery and the bootstrap jquery plugin which provides support
 * for javascript based bootstrap features such as modals and tabs. this
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.popper = require('popper.js').default;
    window.$ = window.jquery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 * we'll load the axios http library which allows us to easily issue requests
 * to our laravel back-end. this library automatically handles sending the
 * csrf token as a header based on the value of the "xsrf" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['x-requested-with'] = 'xmlhttprequest';

/**
 * echo exposes an expressive api for subscribing to channels and listening
 * for events that are broadcast by laravel. echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import echo from 'laravel-echo';

// window.pusher = require('pusher-js');

// window.echo = new echo({
//     broadcaster: 'pusher',
//     key: process.env.mix_pusher_app_key,
//     cluster: process.env.mix_pusher_app_cluster,
//     forcetls: true
// });
