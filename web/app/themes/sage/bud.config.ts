import {Bud} from "@roots/bud";
import '@roots/bud-vue';
import {networkInterfaces} from 'os';

// get local ip address
const nets = networkInterfaces();
let ipAddress: string;
Object.keys(nets).forEach(key => {
  const addresses = nets[key];
  for (const address of addresses ?? []) {
    if (address.family === 'IPv4' && !address.internal && !ipAddress) {
      ipAddress = address.address;
      break;
    }
  }
});

// @ts-ignore
/**
 * Compiler configuration
 *
 * @see {@link https://roots.io/sage/docs sage documentation}
 * @see {@link https://bud.js.org/learn/config bud.js configuration guide}
 *
 * @type {import('@roots/bud').Config}
 */
export default async (app: Bud) => {
  /**
   * Application assets & entrypoints
   *
   * @see {@link https://bud.js.org/reference/bud.entry}
   * @see {@link https://bud.js.org/reference/bud.assets}
   */
  app
    .compilePaths([
      app.path(`@src`),
    ])
    .entry('app', ['@scripts/app', '@styles/app'])
    .entry('editor', ['@scripts/editor', '@styles/editor'])
    .assets(['images']);

  /**
   * Set vue runtime only
   *
   * @see {@link https://bud.js.org/extensions/bud-vue}
   */
  app.vue.setRuntimeOnly(false);

  /**
   * Set public path
   *
   * @see {@link https://bud.js.org/reference/bud.setPublicPath}
   */
  app.setPublicPath('/app/themes/sage/public/');

  /**
   * Development server settings
   *
   * @see {@link https://bud.js.org/reference/bud.setUrl}
   * @see {@link https://bud.js.org/reference/bud.setProxyUrl}
   * @see {@link https://bud.js.org/reference/bud.watch}
   */
  app
    .setUrl(3000)
    .setProxyUrl(app.env.get('WP_HOME'))
    .setPublicUrl('http://' + ipAddress + ':3000')
    .watch(['resources/views', 'app']);
}
