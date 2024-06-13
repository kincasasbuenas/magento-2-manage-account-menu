# Manage Account Menu Link for Magento 2

## How to install

### 1. Install via composer (recommend)

I recommend you to install Kinuz_ManageAccountMenu module via composer. It is easy to install, update and maintaince.

Run the following command in Magento 2 root folder.

#### 1.1 Install

```
composer require kinuz/manage-account-menu
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy -f
```

Run compile if your store in Production mode:

```
php bin/magento setup:di:compile
```

### 2. Copy and paste

If you don't want to install via composer, you can use this way. 

- Download [the latest version here](https://github.com/kincasasbuenas/magento-2-manage-account-menu/archive/master.zip) 
- Extract `master.zip` file to `app/code/Kinuz/ManageAccountMenu` ; You should create a folder path `app/code/Kinuz/ManageAccountMenu` if not exist.
- Go to Magento root folder and run upgrade command line to install `Kinuz_ManageAccountMenu`:

```
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

### 2. Configuration and visualization

Go to section Stores > Configuration > Kinuz > Manage Menu Account

1. Enable to module
2. Select yes or no in the options to show or hide the account menu link or delimiters, example:
    - My Downloadable products option set Yes

        ![Inital yes setting](https://raw.githubusercontent.com/kincasasbuenas/images/main/before_admin_setting.png)

        ![Preview yes option](https://raw.githubusercontent.com/kincasasbuenas/images/main/before_active_link.png)
    
    - My Downloadable products option set No

        ![Set no setting](https://raw.githubusercontent.com/kincasasbuenas/images/main/after_setting_no.png)

        ![Preview set no option](https://raw.githubusercontent.com/kincasasbuenas/images/main/after_set_config_hide_link.png)