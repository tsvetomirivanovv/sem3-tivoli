module.exports = {
  bundle: {
    vendor: {
      scripts: [
          './bundle/jquery/dist/jquery.js',
          './bundle/bootstrap/dist/js/bootstrap.js',
          './bundle/bootstrap/dist/js/bootstrap.min.js',
          './bundle/flat-ui//dist/js/flat-ui.js',
          './bundle/growl/javascripts/jquery.growl.js',
          './bundle/jquery.easyPaginate/lib/jquery.easyPaginate.js'
      ],
      options: {
        rev: false
      }
    }
  }
};
