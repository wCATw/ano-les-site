import { Thumbs } from '@fancyapps/ui/dist/carousel/carousel.thumbs.esm';
import { Autoplay } from '@fancyapps/ui/dist/carousel/carousel.autoplay.esm';
import { Carousel, Fancybox, Panzoom } from '@fancyapps/ui';

function initCarousel(el: HTMLElement, fancybox: string): Carousel {
	const carouselData = el.dataset.carousel!;

	// @ts-ignore
	el.querySelector<HTMLElement>('.f-carousel__viewport')
		.querySelector<HTMLElement>('.f-carousel__track')
		.querySelectorAll<HTMLElement>('.f-carousel__slide')
		.forEach((slide) => {
			// @ts-ignore
			slide.querySelector<HTMLElement>('img').dataset.fancybox = `carousel-${fancybox}`;
		});

	const plugins: any = {};
	const options: any = {};

	if (carouselData.includes('thumbs')) {
		plugins.Thumbs = Thumbs;
		options.Dots = false;
	}

	if (carouselData.includes('no-nav')) {
		options.Navigation = false;
	}

	if (carouselData.includes('no-dots')) {
		options.Dots = false;
	}

	if (carouselData.includes('autoplay')) {
		plugins.Autoplay = Autoplay;
		options.Autoplay = {};

		const autoplayData = el.dataset.autoplay;
		if (autoplayData) {
			const number = Number(autoplayData);
			if (!isNaN(number)) {
				options.Autoplay.timeout = number;
			} else {
				console.error(
					'data-autoplay is not number!',
					`data-autoplay: ${autoplayData}.`,
					`result: ${number}.`,
					'dead element:',
					el,
				);
			}
		}
	}

	return new Carousel(el, options, plugins);
}

export default function initLightbox(): void {
	/**
	 * {@link https://fancyapps.com/carousel/}
	 */
	document
		.querySelectorAll<HTMLElement>('[data-carousel]')
		.forEach((carousel, index) => initCarousel(carousel, index.toString()));

	/**
	 * {@link https://fancyapps.com/panzoom/}
	 */
	document.querySelectorAll<HTMLElement>('[data-panzoom]').forEach((panzoom) => new Panzoom(panzoom));

	/**
	 * {@link https://fancyapps.com/fancybox/}
	 */
	Fancybox.bind('[data-fancybox]');

	/**
	 * Для поддержки fancybox в блоке image редактора guttenberg (нужно выбрать в админке при добавлении блока - ссылка на медиафайл, чтобы работало)
	 * Добавляем аттрибуты fancybox к ссылкам, чтобы собрать в галерею изображения
	 */
	document.querySelectorAll<HTMLElement>('.wp-block-gallery').forEach((gallery, index) => {
		const links = gallery.querySelectorAll('a');
		if (links.length) {
			links.forEach((link) => {
				link.dataset.fancybox = `gallery-${index}`;
			});
		}
	});
	Fancybox.bind('.wp-block-image a');
}
