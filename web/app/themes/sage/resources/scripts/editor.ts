/**
 * @see {@link https://bud.js.org/extensions/bud-preset-wordpress/editor-integration/filters}
 */
// @ts-ignore
roots.register.filters('@scripts/filters');

// save posts with ctrl+s
window.addEventListener('keydown', (e) => {
	// if ctrl + s is pressed
	if (e.ctrlKey && e.code === 'KeyS') {
		e.preventDefault();
		const button = document.querySelector('.editor-post-publish-button') as HTMLButtonElement;
		button?.click();
	}
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
// @ts-ignore
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
