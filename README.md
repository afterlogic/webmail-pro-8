# Afterlogic Webmail Pro
Afterlogic Webmail Pro is a webmail front-end for your existing mail server, with personal calendar, contacts, and mobile sync.

Webmail Pro includes Paranoid Encryption module which provides strong AES-256 browser-based encryption. When [enabled](https://afterlogic.com/docs/webmail-pro-8/configuring-webmail/enabling-paranoid-encryption), encryption process occurs right in the browser, file content is transmitted to the server in encrypted form only, encryption keys are never transmitted to the server at all. Thus, even if the entire data from the server was stolen, your encrypted data is still safe: any data on the server cannot help decrypt encrypted files without the keys.

- For more information, please visit Webmail Pro [home page](https://afterlogic.com/webmail-client).
- You can check Webmail Pro [live demo](https://webmail.afterlogic.com).
- [Issue tracker for the Afterlogic Webmail Pro](https://github.com/afterlogic/webmail-pro-8/issues)

![Afterlogic Webmail Pro: Message List](https://afterlogic.org/images/products/wmp8/screens/wmp8-message-list.png)


## Installation instructions

During installation process you will need:
* [Git](https://git-scm.com/downloads)
* [Composer](https://getcomposer.org/download/)
* [Node.js + NPM](https://nodejs.org/en/)
    
    **Note!** npm 3.0 or later is required

1. Download and unpack the latest version of Webmail Pro into your installation root directory
[`https://github.com/afterlogic/webmail-pro-8/archive/latest.zip`](https://github.com/afterlogic/webmail-pro-8/archive/latest.zip)

We're assuming that you wish to install the latest stable version of the product. If you're looking for the latest code (e.g., to contribute changes), the following steps needs to be taken:

- Instead of unpacking the archive, clone the repository into the installation directory:
```
git clone https://github.com/afterlogic/webmail-pro-8.git INSTALL_FOLDER_PATH
```
- change modules' versions in `composer.json` file to "dev-master"
- adjust `composer.json` configuration file so that sources are preferred:
```
{
	"config": {
		"minimum-stability": "dev",
		"preferred-install": {
			"afterlogic/*": "source"
		}
	}.......
```

2. `composer.phar` file is available in repository, but you can download its latest version 2 from [`https://getcomposer.org/composer.phar`](https://getcomposer.org/composer.phar)

3. Start the composer installation process by running the following from the command line:
    ```bash
    php composer.phar install
    ```

    **NB:** It is strongly advised to run composer as non-root user. Otherwise, third-party scripts will be run with root permissions and composer issues a warning that it's not safe. We recommend running the script under the same user web server runs under.

4. Next, you need to build static files for the current module set.

      First of all, install all npm modules via
      ```bash
      npm install
      ```
      and install gulp-cli module globaly 
      ```bash
      npm install --global gulp-cli
      ```
      then install the modules required for adminpanel to work 
      ```bash
      cd modules/AdminPanelWebclient/vue
      npm install
      npm install -g @quasar/cli
      ```

5. Now you can build static files. Run the following commands in main directory
      ```bash
      gulp styles --themes Default,DefaultDark,DeepForest,Funny,Sand
      ```
      ```bash
      gulp js:min
      ```
      and build adminpanel 
      ```bash
      cd modules/AdminPanelWebclient/vue
      npm run build-production
      ```
  
6. Now you are ready to open a URL pointing to the installation directory in your favorite web browser. Be sure to add `/adminpanel/` to main URL to access admin interface.

7. Upon installing the product, you'll need to [configure your installation](https://afterlogic.com/docs/webmail-pro/configuring-webmail).

**IMPORTANT:**

1. Make sure data directory is writable by the web server. For example:
    ```bash
    chown -R www-data:www-data /var/www/webmail/data
    ```

2. It is strongly recommended to runs the product via **https**. If you run it via **http**, the majority of features will still be available, but some functionality aspects, such as authentication with Google account, won't work.

To enable automatic redirect from **http** to **https**, set **RedirectToHttps** to **true** in **data/settings/config.json** file.

**Protecting data directory**

All configuration files of the application and user data are stored in data directory, so it's important to [protect data directory](https://afterlogic.com/docs/webmail-pro/security/protecting-data-directory) to make sure that nobody can access that directory over the Internet directly. 

# Licensing
This product is licensed under Afterlogic Software License. The modules and other packages included in this product as dependencies are licensed under their own licenses.

NB: Afterlogic Aurora modules which have dual licensing are licensed under Afterlogic Software License within this product.
