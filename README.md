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
    
####External Library Added

Used for laravel forms generation

    "laravelcollective/html": "^5.5"

Used for csv read and write. It has pagination feature to paginate csv data 

    "league/csv": "^9.0",



####Third party tools used

1. logentries.com to save logs in cloud
2. codeclimate is used to check code quality
3. AWS is used for hosting

#### In progress

 1. Automated PHPUnit Test
 2. CircleCi integration for continuous integration
