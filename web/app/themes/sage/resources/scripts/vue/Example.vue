<script setup lang="ts">
	import { ref, onMounted } from 'vue';

	let number = 0;
	const exampleRef = ref(`clicked: ${number}`);

	onMounted(() => {
		const example = document.querySelector('#example');
		if (example instanceof HTMLElement) {
			example.addEventListener('click', (e) => {
				exampleRef.value = `clicked: ${++number}`;
			});
		}
	});
</script>

<template>
	<div id="example">
		{{ exampleRef }}
	</div>
</template>

<style scoped lang="scss"></style>
