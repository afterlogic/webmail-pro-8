# Afterlogic Webmail Pro 8 Alpha
> Note. This a early preview of the new version of product. Although we are sure it is safe to install and run Webmail Pro 8 Alpha, we are recommended to use it only for test purpose.

Afterlogic Webmail Pro 8 is a webmail front-end for your existing mail server, with personal calendar, contacts, and mobile sync.

![Afterlogic Webmail Pro 8: Message List](https://afterlogic.org/images/products/wml8/screen1.png)


## Installation instructions

During installation process you will need:
* [Git](https://git-scm.com/downloads)
* [Composer](https://getcomposer.org/download/)
* [Node.js + NPM](https://nodejs.org/en/)

1. Download and unpack the latest version of Webmail Pro 8 into your installation root directory `https://github.com/afterlogic/webmail-pro-8/archive/master.zip`

3. Download `composer.phar` from `https://getcomposer.org/composer.phar`

4. Run composer installation process by running the following from command line:
    ```bash
    php composer.phar install
    ```

  **NB:** It is strongly advised to run composer as non-root user. Otherwise, third-party scripts will be run with root permissions and composer issues a warning that it's not safe. We recommend running the script as the same user web server runs under.

5. Next, you need to build static files for current module set.

  First of all, install all npm modules via
  ```bash
  npm install
  ```
  and install gulp-cli module globaly 
  ```bash
  npm install --global gulp-cli
  ```

6. Now you can build static files
    ```bash
    gulp styles --themes Default,Funny
    ```

  ```bash
  gulp js:min
  ```
  
7. Now you are ready to open a URL pointing to the installation directory.

Upon installing the product, you'll need to [configure your installation](https://afterlogic.com/docs/aurora-files/configuration).

**IMPORTANT:**

1. Make sure data directory is writable by web server. For example:
```bash
chown -R www-data:www-data /var/www/webmail/data
```

2. It is strongly recommended to runs the product under **https**. If you run it under **http**, the majority of features will still be available, but some functionality aspects, such as authentication with Google account, won't work.

To enable automatic redirect from **http** to **https**, set **RedirectToHttps** to **On** in **data/settings/config.json** file.
