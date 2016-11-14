<!-- HEADER -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-inverse navbar-embossed" role="navigation">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                    <span class="sr-only">Toggle navigation</span>
                  </button>
                  <a class="navbar-brand" href="index.php">Tivoli</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse-01">
                  <ul class="nav navbar-nav navbar-right">
                    <?php if (!logged_in()){ ?>
                        <li><a href="index.php">Home</a></li>
                    <?php } else {?>
                        <li><a href="shifts.php">Shifts</a></li>
                    <?php } ?>
                        <li><a href="#fakelink">Contact</a></li>
                   </ul>
                </div>
              </nav>
        </div>
    </div>
</div>
