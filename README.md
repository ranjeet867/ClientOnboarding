[![Maintainability](https://api.codeclimate.com/v1/badges/60ee3ffac2342ecad31a/maintainability)](https://codeclimate.com/github/ranjeet867/ClientOnboarding/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/60ee3ffac2342ecad31a/test_coverage)](https://codeclimate.com/github/ranjeet867/ClientOnboarding/test_coverage)
[![StyleCI](https://styleci.io/repos/109518217/shield?branch=master)](https://styleci.io/repos/109518217)
[![CircleCI](https://circleci.com/gh/ranjeet867/ClientOnboarding.svg?style=svg)](https://circleci.com/gh/ranjeet867/ClientOnboarding)

# ClientOnboarding
Save Client data into csv file


Live Demo : http://35.196.193.75/clients

## Server Requirements
    PHP >= 7.0.0
    OpenSSL PHP Extension
    PDO PHP Extension
    Mbstring PHP Extension
    Tokenizer PHP Extension
    XML PHP Extension
    
#### External Library Added

1. Used for laravel forms generation

    `"laravelcollective/html": "^5.5"`

2. Used for csv read and write. It has pagination feature to paginate csv data 

    `"league/csv": "^9.0"`
    
3. Laravel Dusk

    `composer require --dev laravel/dusk`
    
    `php artisan dusk:install`
    
## Docker Public Image ranjeet867/laravel5.5-client

**Usage:** 

    docker pull ranjeet867/laravel5.5-client
    docker run -p 8181:8181 Laravel5.5-client



#### Third party tools used

1. logentries.com to save logs in cloud
2. codeclimate is used to check code quality
3. Google Cloud Services is used for hosting
4. StyleCI integrations
5. CircleCI Integration
6. Docker 

#### In progress

 1. Automated PHPUnit Test
 
