# KEA - Tivoli App - Final project / 3rd Semester

Tivoli shifts schedule web application



## Developer install

First, you'll need PHP 5.x installed and [NodeJS](https://nodejs.org/en/download/). Type (`php -v`) and (`node -v`)  to see if you have them installed.

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

* Install npm dependencies

    ```shell
    npm install
    ```

* Install bower dependencies

    ```shell
    bower install
    ```

* Run gulp tasks to compile all the SCSS/JS/ ( + vendor ) files.

    ```shell
    gulp
    ```

* Run the application on your local machine

    ```shell
    heroku local -f Procfile.local

    ```

* Access your application on [http://localhost:9090](http://localhost:9090) (You can select your own port and is the one from `Procfile.local` file)



## Production deploy

* Every push to master will deploy a new version of this app. Deploys happen automatically: be sure that this branch in GitHub is always in a deployable state.

* After the code was pushed to master, access [http://tivoliapp.c0dex.co/](http://tivoliapp.c0dex.co/)



## Production logs

* Access [Logging](https://devcenter.heroku.com/articles/logging) page to see all the commands you can use to see the logs.
