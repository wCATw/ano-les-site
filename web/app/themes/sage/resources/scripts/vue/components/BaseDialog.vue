<script lang="ts" setup>
import {computed, ref, watchEffect, defineEmits, defineProps} from 'vue';
import {useClickOutside} from "@scripts/vue/composables/useClickOutside";

// set modifiers that you need in type
type Modifier = 'p-sm' | 'bg-grey';
type Props = {
  isActive: boolean;
  modifiers?: Modifier[];
};

const props = defineProps<Props>();

const emit = defineEmits(['update:isActive']);

const dialog = ref<HTMLDialogElement>();
const dialogBody = ref<HTMLDialogElement>();

const modifiers = computed(() => {
  return props?.modifiers?.map((modifier) => 'dialog--' + modifier).join(' ') ?? '';
});

const closeDialog = () => {
  dialog.value?.close();
  emit('update:isActive', false);
};

const showDialog = () => {
  dialog.value?.showModal();
};

watchEffect(() => {
  if (props.isActive) {
    showDialog();
  } else {
    closeDialog();
  }
});
useClickOutside(dialogBody, closeDialog);
</script>

<template>
  <dialog :class="`dialog ${modifiers}`" ref="dialog" @keydown.stop.esc="closeDialog">
    <div class="dialog__body" ref="dialogBody">
      <slot/>
    </div>
    <button class="dialog__close-btn" @click.prevent="closeDialog"><i class="icon-close"></i></button>
  </dialog>
</template>

<style lang="scss" scoped>
@use '../../../styles/helpers/media';
@use '../../../styles/helpers/functions';

.dialog {
  position: absolute;
  top: 50%;
  left: 50%;
  translate: -50% -50%;
  border-radius: var(--b-radius);
  background: var(--c-grey-00);
  box-shadow: var(--shadow);

  &::backdrop {
    background: color(from var(--c-grey-90) srgb r g b / 0.8);
  }

  &--bg-grey {
    background: var(--c-grey-10);
  }
}

.dialog__body {
  padding: 40px;

  @include media.md-up {
    padding: 65px;
  }

  .dialog--p-sm & {
    padding-block: 50px 20px;
    padding-inline: 20px;
  }
}

.dialog__close-btn {
  position: absolute;
  top: 15px;
  right: 15px;
  color: var(--c-grey-50);
  background: none;
  font-size: functions.rem(18);

  @include media.md-up {
    top: 18px;
    right: 18px;
  }
}
</style>
