import domReady from '@roots/sage/client/dom-ready';
import {createApp} from 'vue';
import initLightbox from "@scripts/components/fancyapps";

// @ts-ignore
import Example from '@scripts/vue/components/Example.vue';
import initBurger from "@scripts/components/burger";

/**
 * Application entrypoint
 */
domReady(async () => {
	initLightbox();

	// vue Example
	const vueExample = document.querySelector('#vue-example');
	if (vueExample) {
		createApp(Example).mount(vueExample);
	}

  initBurger();
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
// @ts-ignore
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
