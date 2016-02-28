# Symfony - MailerLiteBundle

Symfony bundle for [MailerLite](https://www.mailerlite.com/) API

#### MailerLite API Method :

##### Lists
* getAllLists()
* getListDetails()
* addList()
* updateList()
* deleteList()
* getActiveSubscribers()
* getUnsubscribedSubscribers()
* getBouncedSubscribers()

##### Subscribers
* addSubscriber()
* unsubscribeSubscriber()
* deleteSubscriber()


## Requirements

* Symfony 2.7.x
* guzzlehttp/guzzle >= 6.1


## Installation

##### 1) Download MailerLiteBundle using composer

Add MailerLiteBundle to your composer.json
``` php
{
    "require": {
        "erwan-haquet/mailerlite-bundle": "dev-master"
    }
}
```

Then update your composer
> composer install erwan-haquet/mailerlite-bundle

Composer will install the bundle.

##### 2) Enable the bundle

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new MailerLiteBundle\MailerLiteBundle(),
    );
}
```


##### 3) Configure it

``` php
# app/config/config.yml
mailer_lite:
    api_key: #Your MailerLite API key
    default_list: #Your default list id
 ```

## Documentation

* [MailerLiteBundle Doc]() // under construction


## Contributing

Any kind of comment, suggest.. are welcome.
Feel free to Pull Request :)

