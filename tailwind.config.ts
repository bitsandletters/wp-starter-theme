import type { Config } from 'tailwindcss'

export default {
  content: [
    './*.php',
    './inc/**/*.php',
    './template-parts/**/*.php',
    './assets/**/*.ts',
  ],
  safelist: [
  ],
  theme: {
    extend: {
      colors: {
        primary: '#0070f3',
        secondary: '#1a202c',
      },
    },
  },
  plugins: [],
} satisfies Config