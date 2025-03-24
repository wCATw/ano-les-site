<script lang="ts" setup>
import {ButtonModifier} from "@scripts/types/Button";
import {computed} from "vue";

type Props = {
  modifiers: ButtonModifier[];
  btnType?: 'button' | 'submit';
};

const props = withDefaults(defineProps<Props>(), {
  btnType: 'button',
});

const modifiers = computed(() => {
  return props.modifiers.map((modifier) => 'btn--' + modifier).join(' ');
});
</script>

<template>
  <button class="btn" :class="modifiers" :type="btnType">
    <slot></slot>
  </button>
</template>
