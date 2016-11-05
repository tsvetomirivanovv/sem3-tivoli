module.exports = {
  bundle: {
    vendor: {
      scripts: [
          './bundle/bootstrap/dist/js/bootstrap.js',
          './bundle/flat-ui//dist/js/flat-ui.js',
          './bundle/jquery/dist/jquery.js'
      ],
      options: {
        rev: false
      }
    }
  }
};
