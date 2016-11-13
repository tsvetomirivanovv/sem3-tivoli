module.exports = {
  bundle: {
    vendor: {
      scripts: [
          './bundle/jquery/dist/jquery.js',
          './bundle/bootstrap/dist/js/bootstrap.js',
          './bundle/bootstrap/dist/js/bootstrap.min.js',
          './bundle/flat-ui//dist/js/flat-ui.js',
          './bundle/growl/javascripts/jquery.growl.js',
          './bundle/jquery.easyPaginate/lib/jquery.easyPaginate.js',
          './bundle/moment/moment.js',
          './bundle/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js',
          './bundle/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'

      ],
      options: {
        rev: false
      }
    }
  }
};
