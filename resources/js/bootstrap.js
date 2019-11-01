window._ = require('lodash');

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');
// const client = require('pusher-js');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

// try {
//     // window.Popper = require('popper.js').default;
//     // window.$ = window.jQuery = require('jquery');

//     // require('bootstrap');
// } catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */


window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: true
});


// var channel = window.Echo.channel('channel1')
// channel.listen('.my-event', function(data) {
  // alert(JSON.stringify(data));
// });

var channel = window.Echo.channel('my-channel');
channel.listen('.my-event', function (e) {

	// This will change the default only for notices that don't have a `modules` option.

	// const notice = 
	PNotify.alert({
	  title: e.message,
	  text: '<a href="/orders/'+e.id+'">Заказ № '+e.id+'</a>',
	  textTrusted: true,
	  styling: 'bootstrap3',
	  icons: 'bootstrap3',
	  hide: false,
	  remove: true,
	  destroy: true,
	  modules: {

		Buttons: {
			closer: true,
			// Provide a button for the user to manually close the notice.
			closerHover: true,
			// Only show the closer button on hover.
			sticker: true,
			// Provide a button for the user to manually stick the notice.
			stickerHover: true,
			// Only show the sticker button on hover.
			labels: {close: 'Close', stick: 'Stick', unstick: 'Unstick'},
			// Lets you change the displayed text, facilitating internationalization.
			// classes: {closer: null, pinUp: null, pinDown: null}
			// The classes to use for button icons. Leave them null to use the classes from the styling you're using.
		},

	    Confirm: {
	      confirm: true
	    },

		History: {
			maxInStack: 20
		},

		Animate: {
			animate: true,
			// Use animate.css to animate the notice.
			inClass: 'animated fadeInRight',
			// The class to use to animate the notice in.
			outClass: 'animated fadeOutRight',
			// The class to use to animate the notice out.
		},

		NonBlock: {
			nonblock: false
		}

	  }	  
	});


  //   $.notify({
  //       message: e.message,
  //       url: "/orders/"+e.id,
  //       target: "_blank",
  //   	newest_on_top: true,

		// timer: 36000,

		// allow_dismiss: true,
		// showProgressbar: true,

		// animate: {
		// 	enter: 'animated fadeInRight',
		// 	exit: 'animated fadeOutRight'
		// }
  //   });

    // console.log(e.message)
    // alert(e.message)
});

// window.Echo.private('App.User.' + userId)
//     .notification((notification) => {
//         console.log(notification.type);
//     });