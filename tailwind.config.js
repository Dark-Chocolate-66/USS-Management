export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      colors: {
        primary: 'var(--color-primary)',
        secondary: 'var(--color-secondary)',
        accent: {
          coral: 'var(--color-primaryaccent)',
          gold: 'var(--color-secondaccent)',
        },
        text: {
          dark: 'var(--color-primarytext)',
          medium: 'var(--color-secondtext)',
        },
        bg: {
          main: 'var(--color-mainbg)',
          light: 'var(--color-bg)',
        },
      },
      borderRadius: {
        sm: 'var(--radius-sm)',
        md: 'var(--radius-md)',
        lg: 'var(--radius-lg)',
      },
      spacing: {
        xs: 'var(--spacing-xs)',
        sm: 'var(--spacing-sm)',
        md: 'var(--spacing-md)',
        lg: 'var(--spacing-lg)',
      },
    },
  },
  plugins: [],
}
