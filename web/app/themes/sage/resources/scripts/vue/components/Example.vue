<script setup lang="ts">
import {ref, onMounted} from 'vue';
import BaseDialog from "@scripts/vue/components/BaseDialog.vue";
import BaseButton from "@scripts/vue/components/BaseButton.vue";

let number = 0;
const exampleRef = ref(`clicked: ${number}`);
const isDialogActive = ref(false)

onMounted(() => {
  const example = document.querySelector('#example');
  if (example instanceof HTMLElement) {
    example.addEventListener('click', () => {
      exampleRef.value = `clicked: ${++number}`;
    });
  }
});
</script>

<template>
  <div id="example">
    {{ exampleRef }}
    <BaseButton :modifiers="['primary']" @click="isDialogActive = true">Base dialog</BaseButton>
    <BaseDialog v-model:is-active="isDialogActive">123</BaseDialog>
  </div>
</template>

<style scoped lang="scss"></style>
