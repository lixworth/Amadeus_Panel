module.exports = {
  pluginOptions: {
    i18n: { //lang
      locale: 'en',
      fallbackLocale: 'en',
      localeDir: 'src',
      enableInSFC: false
    },
    proxy: { //api proxy
      enabled: true,
      context: '/api',
      options: {
        target: 'http://127.0.0.1:8000',
        changeOrigin: true
      }
    }
  },
  pwa: {
    name: 'Amadeus'
  }
};
