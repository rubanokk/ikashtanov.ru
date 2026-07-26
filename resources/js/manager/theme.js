import { definePreset } from '@primeuix/themes';
import Aura from '@primeuix/themes/aura';

const AuraCustomPreset = definePreset(Aura, {
  semantic: {
    primary: {
      50: '#e9edf3',
      100: '#c8d2e1',
      200: '#a2afc8',
      300: '#7286a5',
      400: '#455a79',
      500: '#051a3a',
      600: '#041634',
      700: '#03132c',
      800: '#020f25',
      900: '#020a1b',
      950: '#444',
    },
    colorScheme: {
      light: {
        primary: {
          color: '#000000',
          contrastColor: '#ffffff',
          hoverColor: '{primary.950}',
          activeColor: '{primary.950}',
        },
        highlight: {
          background: '{primary.50}',
          focusBackground: '{primary.100}',
          color: '{primary.700}',
          focusColor: '{primary.800}',
        },
      }
    },
  },
})

export default {
  preset: AuraCustomPreset,
}
