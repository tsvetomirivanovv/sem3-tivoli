module.exports = {
  bundle: {
    vendor: {
      scripts: [
          './vendor/bootstrap/dist/js/bootstrap.js',
          './vendor/flat-ui//dist/js/flat-ui.js',
          './vendor/jquery/dist/jquery.js'
      ],
      options: {
        rev: false
      }
    }
  }
};
