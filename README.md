# KEA - Tivoli App - Final project / 3rd Semester

Tivoli shifts schedule web application



## Developer install

First, you'll need PHP 5.x installed. Type `php -v` and see if you have it installed.

* Install [Heroku CLI](https://devcenter.heroku.com/articles/heroku-command-line#download-and-install)

* Create an [Heroku](https://www.heroku.com/) account.

* Go the the project directory and enter your Heroku credentials

    ```shell
    heroku login
    ```

* Install heroku-config and pull `.env` file.

    ```shell
    heroku plugins:install heroku-config

    ```

    ```shell
    heroku config:pull

    ```

* Download [Procfile.local](https://drive.google.com/open?id=0Bx8RJQBMj41PbS16Q1hDamVSR3c) and add it in the project directory.

* Run the application on your local machine

    ```shell
    heroku local -f Procfile.local

    ```

* Access your application on [http://localhost:8080](http://localhost:8080)



## Production deploy

* Every push to master will deploy a new version of this app. Deploys happen automatically: be sure that this branch in GitHub is always in a deployable state.

* After the code was pushed to master, access [http://tivoliapp.c0dex.co/](http://tivoliapp.c0dex.co/)



## Production logs

* Access [Logging](https://devcenter.heroku.com/articles/logging) page to see all the commands you can use to see the logs.
