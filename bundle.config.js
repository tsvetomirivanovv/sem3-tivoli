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
          './bundle/datatables.net/js/jquery.dataTables.min.js',
          './bundle/datatables.net-bs/js/dataTables.bootstrap.min.js'
      ],
      options: {
        rev: false
      }
    }
  }
};
