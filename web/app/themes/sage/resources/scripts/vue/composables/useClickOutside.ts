import type {Ref} from 'vue';
import {onMounted, onUnmounted} from "vue";

export const useClickOutside = (component: Ref, callback: Function) => {
  if (!component) {
    throw new Error('A target component has to be provided.');
  }

  if (!callback) {
    throw new Error('A callback has to be provided.');
  }

  const listener = (event: any) => {
    if (event.target === component.value || event.composedPath().includes(component.value)) {
      return;
    }
    if (typeof callback === 'function') {
      callback();
    }
  };

  onMounted(() => {
    window.addEventListener('click', listener, {capture: true});
  });
  onUnmounted(() => {
    window.removeEventListener('click', listener, {capture: true});
  });
};
